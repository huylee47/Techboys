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



    // public function storeBill($request)
    // {
    //     DB::beginTransaction();

    //     try {
    //         $userId = Auth::id();
    //         $cartId = session()->get('cart_id');

    //         $cartItems = Cart::where('cart_id', $cartId)->get();

    //         if ($cartItems->isEmpty()) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Giỏ hàng trống!'
    //             ], 400);
    //         }

    //         $totals = $this->cartPriceService->calculateCartTotals($cartItems);
    //         $total = $totals['total'];
    //         $voucher = $totals['voucher'];

    //         if ($total <= 0) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Tổng tiền không hợp lệ!'
    //             ], 400);
    //         }

    //         $bill = Bill::create([
    //             'user_id' => $userId ?? null,
    //             'total' => $total,
    //             'full_name' => $request->full_name,
    //             'address' => $request->address,
    //             'phone' => $request->phone,
    //             'email' => $request->email,
    //             'province_id' => $request->province_id,
    //             'district_id' => $request->district_id,
    //             'ward_id' => $request->ward_id,
    //             'payment_method' => $request->payment_method,
    //             'status_id' => 1,
    //             'payment_status' => 0,
    //         ]);

    //         foreach ($cartItems as $cartItem) {
    //             $variant = ProductVariant::find($cartItem->variant_id);

    //             if (!$variant) {
    //                 DB::rollBack();
    //                 return response()->json([
    //                     'success' => false,
    //                     'message' => 'Không tìm thấy biến thể sản phẩm!'
    //                 ], 400);
    //             }

    //             if ($cartItem->quantity > $variant->stock) {
    //                 DB::rollBack();
    //                 return response()->json([
    //                     'success' => false,
    //                     'message' => 'Số lượng sản phẩm "' . $variant->name . '" trong giỏ hàng vượt quá số lượng tồn kho!'
    //                 ], 400);
    //             }

    //             BillDetails::create([
    //                 'bill_id' => $bill->id,
    //                 'variant_id' => $cartItem->variant_id,
    //                 'product_id' => $variant->product_id,
    //                 'quantity' => $cartItem->quantity,
    //                 'price' => $variant->price
    //             ]);
    //         }

    //         if ($voucher) {
    //             $voucherModel = Voucher::where('code', $voucher->code)->first();
    //             if ($voucherModel && $voucherModel->quantity > 0) {
    //                 $voucherModel->decrement('quantity');
    //             }
    //             session()->forget('voucher');
    //         }



    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Đặt hàng thành công!',
    //             'bill_id' => $bill->id,
    //             'bill' => $bill
    //         ]);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }

    
    public function storeBill($request)
    {
        DB::beginTransaction();
    
        try {
            $userId = Auth::id();
            $cartId = session()->get('cart_id');
    
            $cartItems = Cart::where('cart_id', $cartId)->get();
    
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

            $bill->update(['payment_status' => 1]);
            Cart::where($userId ? 'user_id' : 'cart_id', $userId ?? $cartId)->delete();

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
}
