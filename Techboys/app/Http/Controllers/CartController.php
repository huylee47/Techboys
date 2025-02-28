<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Service\CartService;
use App\Service\CartPriceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $cartService;
    protected $cartPriceService;

    public function __construct(CartService $cartService, CartPriceService $cartPriceService)
    {
        $this->cartService = $cartService;
        $this->cartPriceService = $cartPriceService;
    }
    public function destroy(Cart $cart)
    {
        //
    }
    // CLIENT
    public function showCart(Request $request)
    {
        $cartItems = $this->cartService->getCartItems();

        if ($cartItems instanceof \Illuminate\Http\JsonResponse) {
            return view('client.cart.cart', [
                'cartItems' => collect([]),
                'subtotal' => 0,
                'total' => 0,
                'discountAmount' => 0,
                'voucher' => null
            ]);
        }

        $totals = $this->cartPriceService->calculateCartTotals($cartItems);

        return view('client.cart.cart', [
            'cartItems' => $cartItems,
            'subtotal' => $totals['subtotal'],
            'total' => $totals['total'],
            'discountAmount' => $totals['discountAmount'],
            'voucher' => $totals['voucher'],
        ]);
    }
    
    public function addToCart(Request $request)
    {
        $this->cartService->addToCart($request);
        return redirect()->route('client.cart.index')->with('success', 'Thêm sản phẩm thành công');
    }
    
    public function updateCart(Request $request)
    {
        $result = $this->cartService->updateCart($request);

        if (isset($result['error'])) {
            return response()->json($result, 404);
        }

        $cartItems = $this->cartService->getCartItems();
        $totals = $this->cartPriceService->calculateCartTotals($cartItems);

        return response()->json([
            'success' => true,
            'new_total_price' => number_format($result['total_price'], 0, ',', '.') . ' đ',
            'subtotal' => number_format($totals['subtotal'], 0, ',', '.') . ' đ',
            'total' => number_format($totals['total'], 0, ',', '.') . ' đ',
            'discount_amount' => number_format($totals['discountAmount'], 0, ',', '.') . ' đ',
        ]);
    }

    
    public function applyVoucher(Request $request)
    {
        $voucherCode = $request->input('voucher_code');
        $cartItems = $this->cartService->getCartItems();

        if ($cartItems->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Giỏ hàng trống, không thể áp dụng voucher.',
                'total' => '0 đ'
            ], 400);
        }

        $subtotal = $cartItems->sum(fn($cart) => $cart->variant->price * $cart->quantity);
        $voucherResult = $this->cartPriceService->applyVoucherToCart($voucherCode, $subtotal);

        if (!$voucherResult['valid']) {
            return response()->json([
                'success' => false,
                'message' => $voucherResult['message'],
                'total' => number_format($subtotal, 0, ',', '.') . ' đ'
            ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => $voucherResult['message'],
            'total_before_discount' => number_format($subtotal, 0, ',', '.') . ' đ',
            'discount_amount' => number_format($voucherResult['discountAmount'], 0, ',', '.') . ' đ',
            'total_after_discount' => number_format($voucherResult['newTotal'], 0, ',', '.') . ' đ',
            'voucher' => $voucherResult['voucher']
        ]);
    }
    public function removeItem(Request $request){
        return $this->cartService->removeItem($request);
    }
    
}
