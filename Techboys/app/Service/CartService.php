<?php

namespace App\Service;

use App\Models\Cart;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class CartService{
    public function getCartItems()
    {
        if (Auth::check()) {
        $userId = Auth::id();
        // $cartItems = Cart::where('user_id', $userId)->get();
        $cartItems = Cart::where('user_id', $userId)->with('variant.product')->get();

        } else {
            $cartId = session()->get('cart_id');
    
            if (!$cartId) {
                // return response()->json(['message' => 'Giỏ hàng trống'], 200);
                return collect([]);
            }
    
            $cartItems = Cart::where('cart_id', $cartId)->with('variant.product')->get();
        }
    
        return  $cartItems;
    }
    
    public function addToCart($request) {
        $variant = ProductVariant::find($request->variant_id);
    
        if (!$variant) {
            return response()->json(['message' => 'Biến thể sản phẩm không tồn tại.'], 404);
        }
    
        if (Auth::check()) {
            $userId = Auth::id();
            $cartId = null;
        } else {
            $userId = null;
            $cartId = session()->get('cart_id');
    
            if (!$cartId) {
                $cartId = Str::uuid();
                session()->put('cart_id', $cartId);
            }
        }
    
        $cartItem = Cart::where(function ($query) use ($userId, $cartId) {
                if ($userId) {
                    $query->where('user_id', $userId);
                } else {
                    $query->where('cart_id', $cartId);
                }
            })
            ->where('variant_id', $request->variant_id)
            ->first();
    
        $maxQuantity = $variant->stock;
        $newQuantity = $cartItem ? $cartItem->quantity + $request->quantity : $request->quantity;
    
        if ($newQuantity > $maxQuantity) {
            $newQuantity = $maxQuantity;
        }
    
        if ($cartItem) {
            $cartItem->update(['quantity' => $newQuantity]);
        } else {
            Cart::create([
                'user_id' => $userId,
                'cart_id' => $cartId,
                'variant_id' => $request->variant_id,
                'quantity' => $newQuantity,
            ]);
        }
    
        return response()->json([
            'message' => 'Thêm vào giỏ hàng thành công.',
            'new_quantity' => $newQuantity,
        ]);
    }
    public function updateCart($request)
    {
        $cart = Cart::find($request->id);
    
        if (!$cart) {
            return ['error' => 'Không tìm thấy sản phẩm trong giỏ hàng'];
        }
    
        $cart->quantity = $request->quantity;
        $cart->save();
    
        $totalPrice = $cart->variant->price * $cart->quantity;
    
        return [
            'total_price' => $totalPrice
        ];
    }
    public function removeItem($request)
{
    $cartItem = Cart::find($request->id);

    if (!$cartItem) {
        return response()->json([
            'success' => false,
            'message' => 'Không tìm thấy mặt hàng trong giỏ hàng!',
        ], 404);
    }

    $cartItem->delete();

    return response()->json([
        'success' => true,
        'message' => 'Xóa mặt hàng thành công!',
    ]);
}
}