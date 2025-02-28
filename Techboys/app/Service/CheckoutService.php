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
    public function __construct(CartService $cartService , CartPriceService $cartPriceService)
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
    
                $variant->decrement('stock', $cartItem->quantity);
            }
    
            if ($voucher) {
                $voucherModel = Voucher::where('code', $voucher->code)->first();
                if ($voucherModel && $voucherModel->quantity > 0) {
                    $voucherModel->decrement('quantity'); 
                }
                session()->forget('voucher');
            }
    
            Cart::where($userId ? 'user_id' : 'cart_id', $userId ?? $cartId)->delete();
    
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
    
}
