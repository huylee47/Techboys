<?php

namespace App\Service;

use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Cart;
use App\Models\ProductVariant;
use App\Models\Voucher;
use App\Service\CartService;
use Illuminate\Support\Facades\Auth;

class CheckoutService
{
    private $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function getCheckout()
    {
        $cartItems = $this->cartService->getCartItems();

        if ($cartItems instanceof \Illuminate\Http\JsonResponse) {
            return [
                'cartItems' => collect([]),
                'total' => 0,
                'subtotal' => 0,
            ];
        }

        $subTotal = $cartItems->sum(fn($cart) => $cart->variant->price * $cart->quantity);
        $total = $subTotal;
        return [
            'cartItems' => $cartItems,
            'subtotal' => $subTotal,
            'total' => $total
        ];
    }
    // public function storeBill($request){
    //         $userId = Auth::id();
    //         $cartId = Cart::where('cart_id')->first();;
    //         if (!$userId && !$cartId) {
    //             return redirect()->back()->with('error', 'Giỏ hàng trống!');
    //         }
    //         $voucher = null;
    //         if (!$voucher) {
    //             return redirect()->back()->with('error', 'Voucher không hợp lệ hoặc đã hết lượt sử dụng!');
    //         }
    //         $voucher->decrement('quantity',1);
    //         $bill = Bill::create([
    //             'user_id' => $userId ?? null,
    //             'total' => max(0,$request->total),     
    //             'full_name' => $request->full_name,
    //             'address' => $request->address,
    //             'phone' => $request->phone,
    //             'province_id' => $request->province_id,
    //             'district_id' => $request->district_id,
    //             'ward_id' => $request->ward_id,
    //             'payment_method' => $request->payment_method,
    //             'status_id' => 1,
    //             'voucher_code'   => $voucher ? $voucher->code : null
    //         ])->id;
    //         BillDetails::create([
    //             'bill_id' => $bill->id,
    //             'variant_id' => $cartId->variant_id,
    //             'quantity' => $cartId->quantity,
    //             'price' => $cartId->variant->price
    //         ]);
    //         Cart::where($userId ? 'user_id' : 'cart_id', $userId ?? $cartId->cart_id)->delete();
    //         return redirect()->route('client.bill.success')->with('message', 'Cảm ơn quý khách');

    // }
    public function storeBill($request)
{
    $userId = Auth::id();
    $cartId = session()->get('cart_id');

    $cartItems = Cart::where('cart_id', $cartId)->get();

    if (!$userId && $cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Giỏ hàng trống!');
    }

    $voucherCode = $request->voucher_code;
    $voucher = Voucher::where('code', $voucherCode)->where('quantity', '>', 0)->first();
    if (!$voucher) {
        return redirect()->back()->with('error', 'Voucher không hợp lệ hoặc đã hết lượt sử dụng!');
    }
    $voucher->decrement('quantity', 1);

    $total = $request->total ?? 0;
    if ($total <= 0) {
        return redirect()->back()->with('error', 'Tổng tiền không hợp lệ!');
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
        'voucher_code' => $voucher ? $voucher->code : null
    ]);

    foreach ($cartItems as $cartItem) {
        $variant = ProductVariant::find($cartItem->variant_id);
        if (!$variant) {
            return redirect()->back()->with('error', 'Không tìm thấy biến thể sản phẩm!');
        }

        if ($cartItem->quantity > $variant->stock) {
            return redirect()->back()->with('error', 'Số lượng sản phẩm "' . $variant->name . '" trong giỏ hàng vượt quá số lượng tồn kho!');
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

    Cart::where($userId ? 'user_id' : 'cart_id', $userId ?? $cartId)->delete();

    return redirect()->route('home')->with('message', 'Cảm ơn quý khách!');
}
}
