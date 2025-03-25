<?php

namespace App\Service;

use App\Mail\OrderDetailMail;
use App\Models\AttributesValue;
use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Voucher;
use App\Service\CartService;
use App\Service\CartPriceService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class CheckoutService
{
    private $cartService;
    private $cartPriceService;
    public function __construct(CartService $cartService, CartPriceService $cartPriceService)
    {
        $this->cartService = $cartService;
        $this->cartPriceService = $cartPriceService;
    }
    public function getCheckout()
    {
        $cartItems = $this->cartService->getCartItems();
    
        if ($cartItems instanceof \Illuminate\Http\JsonResponse) {
            return [
                'cartItems' => collect([]),
                'total' => 0,
                'subtotal' => 0,
                'discountAmount' => 0,
                'voucher' => null,
            ];
        }
    
        // Lấy danh sách tất cả các giá trị thuộc tính để tránh truy vấn nhiều lần
        $attributeValues = AttributesValue::all()->keyBy('id');
    
        foreach ($cartItems as $cart) {
            // Nếu sản phẩm có biến thể, lấy thông tin thuộc tính
            if ($cart->variant_id) {
                $attributeJson = ProductVariant::where('id', $cart->variant_id)->value('attribute_values');
                $attributeArray = json_decode($attributeJson, true) ?? [];
    
                // Chỉ lấy giá trị thuộc tính, bỏ qua tên thuộc tính
                $attributeValuesList = collect($attributeArray)->map(function ($attrValueId) use ($attributeValues) {
                    return $attributeValues[$attrValueId]->value ?? 'Không xác định';
                })->toArray();
    
                // Tạo chuỗi chỉ chứa giá trị thuộc tính
                $cart->attributes = implode(' ', $attributeValuesList);
            } else {
                $cart->attributes = '';
            }
        }
    
        $totals = $this->cartPriceService->calculateCartTotals($cartItems);
    
        return [
            'cartItems' => $cartItems,
            'subtotal' => $totals['subtotal'],
            'total' => $totals['total'],
            'discountAmount' => $totals['discountAmount'],
            'voucher' => $totals['voucher'],
        ];
    }
    

    public function storeTemporaryBill($request)
    {
        $userId = Auth::id();
        $sessionId = session()->getId();
        $tempBillId = now()->format('Ymd') . ($userId ?? $sessionId) . rand(10, 99);


        $cartItems = $this->cartService->getCartItems();
        $totals = $this->cartPriceService->calculateCartTotals($cartItems);

        $billData = [
            'id' => $tempBillId,
            'user_id' => $userId ?? null,
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'province_id' => $request->province_id,
            'district_id' => $request->district_id,
            'ward_id' => $request->ward_id,
            'payment_method' => $request->payment_method,
            'payment_status' => 0,
            'status_id' => 1,
            'cart_items' => $cartItems,
            'total' => $totals['total']
        ];

        $redisKey = $userId ? 'temp_bill_' . $userId : 'temp_bill_session_' . $sessionId;
        Redis::setex($redisKey, 3600, json_encode($billData));
        // return response()->json([
        //     'bill' => $billData,
        //     'key' => $redisKey
        // ]);
        return $this->VNPAY($billData);
    }


    public function storeBill($request)
    {
        DB::beginTransaction();
    
        try {
            $userId = Auth::id();
            $cartId = session()->get('cart_id');
            $tempBillId = $request->id;
    
            $cartItems = $userId 
                ? Cart::where('user_id', $userId)->get() 
                : Cart::where('cart_id', $cartId)->get();
    
            if ($cartItems->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Giỏ hàng trống!'
                ], 400);
            }
    
            $totals = $this->cartPriceService->calculateCartTotals($cartItems);
            $total = $totals['total'];
            $voucher = $totals['voucher'];
    
            if ($total <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tổng tiền không hợp lệ!'
                ], 400);
            }
    
            // Tạo bill
            $bill = Bill::create([
                'order_id' => $tempBillId ??  now()->format('Ymd') . ($userId ?? $cartId) . rand(10, 99) ,
                'user_id' => $userId ?? null,
                'total' => $total,
                'full_name' => $request->full_name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'province_id' => $request->province_id,
                'district_id' => $request->district_id,
                'ward_id' => $request->ward_id,
                'payment_method' => $request->payment_method,
                'payment_status' => 0,
                'status_id' => 1,
            ]);
    
            foreach ($cartItems as $cartItem) {
                if ($cartItem->variant_id) {
                    // Giảm stock an toàn với WHERE
                    $updated = ProductVariant::where('id', $cartItem->variant_id)
                        ->where('stock', '>=', $cartItem->quantity)
                        ->decrement('stock', $cartItem->quantity);
    
                    if (!$updated) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Sản phẩm biến thể "' . $cartItem->variant_id . '" đã hết hàng!'
                        ], 400);
                    }
    
                    BillDetails::create([
                        'bill_id' => $bill->id,
                        'product_id' => $cartItem->product_id,
                        'variant_id' => $cartItem->variant_id,
                        'quantity' => $cartItem->quantity,
                        'price' => ProductVariant::find($cartItem->variant_id)->price
                    ]);
                } else {
                    // Giảm stock an toàn với WHERE
                    $updated = Product::where('id', $cartItem->product_id)
                        ->where('base_stock', '>=', $cartItem->quantity)
                        ->decrement('base_stock', $cartItem->quantity);
    
                    if (!$updated) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Sản phẩm "' . $cartItem->product_id . '" đã hết hàng!'
                        ], 400);
                    }
    
                    BillDetails::create([
                        'bill_id' => $bill->id,
                        'product_id' => $cartItem->product_id,
                        'quantity' => $cartItem->quantity,
                        'price' => Product::find($cartItem->product_id)->base_price
                    ]);
                }
            }
    
            // Giảm số lượng voucher nếu có
            if ($voucher) {
                $voucherModel = Voucher::where('code', $voucher->code)->first();
                if ($voucherModel && $voucherModel->quantity > 0) {
                    $voucherModel->decrement('quantity');
                }
                session()->forget('voucher');
            }
    
            DB::commit();
    
            // Gửi email
            try {
                Log::info('Đang gửi email cho: ' . $bill->email);
                $billDetails = BillDetails::where('bill_id', $bill->id)->with('variant')->get();
                Mail::to($bill->email)->send(new OrderDetailMail($bill, $billDetails));
                Log::info('Gửi email thành công!');
            } catch (\Exception $e) {
                Log::error('Lỗi khi gửi email: ' . $e->getMessage());
            }
    
            return response()->json([
                'success' => true,
                'message' => 'Đặt hàng thành công!',
                'bill_id' => $bill->id,
                'bill' => $bill
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
    
    
    
    



    public function handlePaymentSuccess($billId)
    {
        $userId = Auth::id();
        $cartId = session()->get('cart_id');
        DB::beginTransaction();

        try {
            $bill = Bill::find($billId);

            if (!$bill) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy đơn hàng!'
                ], 404);
            }

            if ($bill->payment_status == 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Đơn hàng đã được thanh toán trước đó!'
                ], 400);
            }



            $bill->update([
                'payment_status' => 1
            ]);
            Cart::where(isset($userId) ? 'user_id' : 'cart_id', $userId ?? $cartId)->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Thanh toán thành công và cập nhật số lượng sản phẩm!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }

    public function cancelOrder($billId)
    {
        DB::beginTransaction();
        try {
            $bill = Bill::find($billId);
    
            if (!$bill) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy đơn hàng!'
                ], 404);
            }
    
            if ($bill->status_id != 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Chỉ có thể hủy đơn hàng đang trong trạng thái xử lý!'
                ], 400);
            }
    
            foreach ($bill->billDetails as $billDetail) {
                $variant = ProductVariant::find($billDetail->variant_id);
                $product = Product::find($billDetail->product_id);
                if ($variant) {
                    $variant->increment('stock', $billDetail->quantity);
                }
                else{
                    $product->increment('base_stock', $billDetail->quantity);
                }
            }
    
            $bill->update(['status_id' => 0]);
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'Đơn hàng đã được hủy thành công và tồn kho đã được khôi phục!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
    



    public function VNPAY($bill)
    {

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('client.payment.vnpay');
        $vnp_TmnCode = "SEEY5PUL"; //Mã website tại VNPAY 
        $vnp_HashSecret = "DBZW6GGQT04IJPPQNH2GNHSQJGQQJVMK"; //Chuỗi bí mật

        $vnp_TxnRef = $bill['id'];
        //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán đơn hàng #" . $bill['id'];
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $bill['total'] * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "";
        $vnp_IpAddr = request()->ip();
        //Add Params of 2.0.1 Version

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        );
        if (isset($_POST['payment_method'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
    public function handleOrderSuccess($billId)
    {
        $userId = Auth::id();
        $cartId = session()->get('cart_id');
        // dd($cartId, $userId,$billId);
        DB::beginTransaction();
    
        try {
            Log::info("Bắt đầu xử lý đơn hàng với billId: {$billId['id']}");
            $bill = Bill::find($billId['id']);
            if (!$bill) {
                Log::error("Không tìm thấy đơn hàng với billId: {$billId['id']}");
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy đơn hàng!'
                ], 404);
            }
            // Log::info("Tìm thấy bill, kiểm tra chi tiết đơn hàng...");
        
            $billDetails = BillDetails::where('bill_id', $billId['id'])->get();
            if ($billDetails->isEmpty()) {
                Log::error("Không tìm thấy chi tiết đơn hàng cho billId: {$billId['id']}");
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy chi tiết đơn hàng!'
                ], 404);
            }
            
            // dd($bill, $billDetails);
        
            // Log::info('Bill Details:', $billDetails->toArray());
        
            foreach ($billDetails as $billDetail) {
                $variant = ProductVariant::find($billDetail->variant_id);
                $product = Product::find($billDetail->product_id);
                if ($variant) {
                    Log::info("Trừ stock cho variant_id {$variant->id}, Số lượng: {$billDetail->quantity}");
                } else {
                    Log::error("Không tìm thấy product_id: " . $billDetail->product_id);
                }
            }
        
            Cart::where(isset($userId) ? 'user_id' : 'cart_id', $userId ?? $cartId)->delete();
            
            DB::commit();
            Log::info("Xử lý đơn hàng thành công!");
        
            return response()->json([
                'success' => true,
                'message' => 'Đơn hàng COD đã được xác nhận và số lượng sản phẩm đã cập nhật!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Lỗi khi xử lý đơn hàng: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
        
    }
    

    public function COD($billID)
    {
        try {
            $response = $this->handleOrderSuccess($billID);
            $data = json_decode($response->getContent(), true);
            // dd($data);
            if (!$data['success']) {
                return redirect()->route('home')->with('error', $data['message']);
            }

            // return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('home')->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
