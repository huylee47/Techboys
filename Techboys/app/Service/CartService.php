<?php

namespace App\Service;

use App\Models\BillDetails;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Promotion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Str;


class CartService{
    private $cartPriceService;

        public function __construct(CartPriceService $cartPriceService){
            $this->cartPriceService = $cartPriceService;
        }
        public function getCartItems()
        {
            if (Auth::check()) {
                $userId = Auth::id();
                Log::info('User ID: ' . $userId);
        
                $cartItems = Cart::where('user_id', $userId)
                    ->with('variant.product')
                    ->get();
            } else {
                $cartId = session()->get('cart_id');
                Log::info('Session cart_id: ' . $cartId);
        
                if (!$cartId) {
                    return collect([]);
                }
        
                $cartItems = Cart::where('cart_id', $cartId)
                    ->with('variant.product')
                    ->get();
            }
        
            return $cartItems;
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
        
            $soldQuantity = 0;
            if ($request->variant_id) {
                $soldQuantity = BillDetails::where('variant_id', $request->variant_id)
                    ->whereHas('bill', function ($query) {
                        $query->where('status_id', 1);
                    })
                    ->sum('quantity');
            } else {
                $soldQuantity = BillDetails::where('product_id', $request->product_id)
                    ->whereNull('variant_id')
                    ->whereHas('bill', function ($query) {
                        $query->where('status_id', 1);
                    })
                    ->sum('quantity');
            }
        
            $stock = $request->variant_id
                ? ProductVariant::where('id', $request->variant_id)->value('stock')
                : Product::where('id', $request->product_id)->value('base_stock');
        
            $availableStock = $stock - $soldQuantity;
        
            $cartItem = Cart::where(function ($query) use ($userId, $cartId) {
                    if ($userId) {
                        $query->where('user_id', $userId);
                    } else {
                        $query->where('cart_id', $cartId);
                    }
                })
                ->where('product_id', $request->product_id)
                ->when($request->variant_id, function ($q) use ($request) {
                    return $q->where('variant_id', $request->variant_id);
                }, function ($q) {
                    return $q->whereNull('variant_id');
                })
                ->first();
        
            $currentQty = $cartItem?->quantity ?? 0;
            $maxCanAdd = $availableStock - $currentQty;
            $qtyToAdd = min($request->quantity, $maxCanAdd);
        
            if ($qtyToAdd <= 0) {
                return response()->json([
                    'message' => 'Đã đạt giới hạn tồn kho. Không thể thêm thêm.',
                    'added_quantity' => 0,
                    'current_quantity' => $currentQty,
                    'max_stock' => $availableStock
                ]);
            }
        
            if ($cartItem) {
                $cartItem->increment('quantity', $qtyToAdd);
            } else {
                Cart::create([
                    'user_id' => $userId,
                    'cart_id' => $cartId,
                    'product_id' => (int) $request->product_id,
                    'variant_id' => $request->variant_id,
                    'quantity' => $qtyToAdd,
                ]);
            }
        
            session()->put('cart_id', $cartId);
        
            return response()->json([
                'message' => 'Thêm vào giỏ hàng thành công',
                'added_quantity' => $qtyToAdd,
                'product_id' => (int) $request->product_id,
                'variant_id' => $request->variant_id,
                'current_quantity' => $currentQty + $qtyToAdd,
                'max_stock' => $availableStock
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
        $promotion = Promotion::where('product_id', $cart->product_id)->first();
        if ($promotion && now()->lt(Carbon::parse($promotion->end_date))) {
            $totalPrice = $cart->discounted_price * $cart->quantity;
        } else {
            $totalPrice = $cart->discounted_price  * $cart->quantity;
        }
    
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
    $cartItems = $this->getCartItems();
    $totals = $this->cartPriceService->calculateCartTotals($cartItems);
    $cartCount = $this->countItems();
    return response()->json([
        'success' => true,
        'message' => 'Xóa mặt hàng thành công!',
        'cart_count' => $cartCount,
        'subtotal' => number_format($totals['total'], 0, ',', '.') .'đ',
        'total' => number_format($totals['total'], 0, ',', '.') .'đ',
        'discount_amount' => number_format($totals['discountAmount'], 0, ',', '.') .'đ',
    ]);
}
public function countItems(){
    $cartItems = $this->getCartItems();
    return $cartItems->count();
}
}