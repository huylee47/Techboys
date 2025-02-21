<?php

namespace App\Service;

use App\Models\Cart;
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
                return response()->json(['message' => 'Giỏ hàng trống'], 200);
            }
    
            $cartItems = Cart::where('cart_id', $cartId)->with('variant.product')->get();
        }
    
        return  $cartItems;
    }
    
    public function addToCart($request) {
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
        // dd([
        //     'user_id' => $userId,
        //     'cart_id' => $cartId,
        //     'request_data' => $request->all()
        // ]);
        $cartItem = Cart::where(function ($query) use ($userId, $cartId) {
                if ($userId) {
                    $query->where('user_id', $userId);
                } else {
                    $query->where('cart_id', $cartId);
                }
            })
            ->where('variant_id', $request->variant_id)
            ->first();
    
        if ($cartItem) {
            $cartItem->increment('quantity', $request->quantity);
        } else {
            Cart::create([
                'user_id' => $userId,
                'cart_id' => $cartId,
                'variant_id' => $request->variant_id,
                'quantity' => $request->quantity
            ]);
        }
    
        return response()->json(['message' => 'Thêm vào giỏ hàng thành công']);
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
    
}