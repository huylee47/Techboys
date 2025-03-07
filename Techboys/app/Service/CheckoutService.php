<?php

namespace App\Service;

use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Cart;
use App\Models\ProductVariant;
use App\Models\Voucher;
use App\Service\CartService;
use App\Service\CartPriceService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        $tempBillId = now()->timestamp . ($userId ?? $sessionId);
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

            if ($userId) {
                $cartItems = Cart::where('user_id', $userId)->get();
            } else {
                $cartItems = Cart::where('cart_id', $cartId)->get();
            }


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

            $bill = Bill::create([
                'id' => $tempBillId,
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
                $variant = ProductVariant::find($cartItem->variant_id);

                if (!$variant) {
                    DB::rollBack();
                    return response()->json([
                        'success' => false,
                        'message' => 'Không tìm thấy biến thể sản phẩm!'
                    ], 400);
                }

                if ($cartItem->quantity > $variant->stock) {
                    DB::rollBack();
                    return response()->json([
                        'success' => false,
                        'message' => 'Số lượng sản phẩm "' . $variant->name . '" trong giỏ hàng vượt quá số lượng tồn kho!'
                    ], 400);
                }

                BillDetails::create([
                    'bill_id' => $bill->id,
                    'variant_id' => $cartItem->variant_id,
                    'product_id' => $variant->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $variant->price
                ]);
            }

            if ($voucher) {
                $voucherModel = Voucher::where('code', $voucher->code)->first();
                if ($voucherModel && $voucherModel->quantity > 0) {
                    $voucherModel->decrement('quantity');
                }
                session()->forget('voucher');
            }


            DB::commit();

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

            $billDetails = BillDetails::where('bill_id', $billId)->get();

            foreach ($billDetails as $billDetail) {
                $variant = ProductVariant::find($billDetail->variant_id);
                if ($variant) {
                    $variant->decrement('stock', $billDetail->quantity);
                }
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

    public function handlePaymentFail($billId)
    {
        DB::beginTransaction();
        try {
            $bill = Bill::find($billId);
            if (!$bill) {
                Log::warning("handlePaymentFail - Không tìm thấy đơn hàng với billId: $billId");
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy đơn hàng!'
                ], 404);
            }
            
            $billDetails = BillDetails::where('bill_id', $billId)->get();
            Log::info("handlePaymentFail - Bill Details: " . json_encode($billDetails->toArray(), JSON_PRETTY_PRINT));
            
            foreach ($billDetails as $billDetail) {
                $variant = ProductVariant::find($billDetail->variant_id);
                if ($variant) {
                    $variant->increment('stock', $billDetail->quantity);
                    Log::info("Stock được cập nhật cho variant_id {$variant->id}, tăng: {$billDetail->quantity}");
                } else {
                    Log::error("handlePaymentFail - Không tìm thấy variant_id: " . json_encode($billDetail->variant_id));
                }
            }
            
            $deletedRows = BillDetails::where('bill_id', $billId)->delete();
            Log::info("handlePaymentFail - Số lượng billDetails bị xóa: $deletedRows");
            
            $unpaidBills = Bill::where('payment_status', 0)
                ->where('created_at', '<', now()->subMinutes(15))
                ->get();
            
            foreach ($unpaidBills as $bill) {
                $bill->update(['status_id' => 0]);
                Log::info("handlePaymentFail - Cập nhật status_id = 0 cho billId: {$bill->id}");
            }
            
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Xử lý đơn hàng thất bại thành công!'
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
                if ($variant) {
                    Log::info("Trừ stock cho variant_id {$variant->id}, Số lượng: {$billDetail->quantity}");
                    $variant->decrement('stock', $billDetail->quantity);
                } else {
                    Log::error("Không tìm thấy variant_id: " . $billDetail->variant_id);
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
