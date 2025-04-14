<?php

namespace App\Http\Controllers;

use App\Models\AttributesValue;
use App\Models\BillDetails;
use App\Models\Cart;
use App\Models\ProductVariant;
use App\Models\Promotion;
use App\Models\Voucher;
use App\Service\CartService;
use App\Service\CartPriceService;
use Carbon\Carbon;
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
    public function showCart()
    {
        $cartItems = $this->cartService->getCartItems();
        $voucher = Voucher::get();
        // return response()->json($cartItems);
        if ($cartItems instanceof \Illuminate\Http\JsonResponse) {
            return view('client.cart.cart', [
                'cartItems' => collect([]),
                'subtotal' => 0,
                'total' => 0,
                'discountAmount' => 0,
                'voucher' => null
            ]);
        }
    
        $attributeValues = AttributesValue::all()->keyBy('id');
        $soldQuantity = 0;
        foreach ($cartItems as $cart) {
            $promotion = Promotion::where('product_id', $cart->product_id)->first();
            if ($promotion && now()->lt(Carbon::parse($promotion->end_date))) {
                if ($cart->variant_id) {
                    $cart->discounted_price = $cart->discounted_price * (1 - $promotion->discount_percent / 100);
                } else {
                    $cart->discounted_price = $cart->product->price * (1 - $promotion->discount_percent / 100);
                }
            }
    
            if ($cart->variant_id) {
                $attributeJson = ProductVariant::where('id', $cart->variant_id)->value('attribute_values');
                $attributeArray = json_decode($attributeJson, true) ?? [];
    
                $attributeValuesList = collect($attributeArray)->map(function ($attrValueId) use ($attributeValues) {
                    return $attributeValues[$attrValueId]->value ?? 'Không xác định';
                })->toArray();
    
                $cart->attributes = implode(' ', $attributeValuesList);
            } else {
                $cart->attributes = '';
            }
            if ($cart->variant_id) {
                $qty = BillDetails::where('variant_id', $cart->variant_id)
                    ->whereHas('bill', function ($query) {
                        $query->where('status_id', 1);
                    })
                    ->sum('quantity');
                $soldQuantity += $qty;
                $cart->stock = $cart->product->variant()->where('id', $cart->variant_id)->value('stock') - $qty;
        
            } else {
                $qty = BillDetails::where('product_id', $cart->product_id)
                    ->whereNull('variant_id')
                    ->whereHas('bill', function ($query) {
                        $query->where('status_id', 1);
                    })
                    ->sum('quantity');
                $soldQuantity += $qty;
                $cart->stock = $cart->product->base_stock - $qty;
            }
        }
        $totals = $this->cartPriceService->calculateCartTotals($cartItems);
        // return response()->json([
        //     'cartItems'=>$cartItems,
        //     'soldPending'=>$soldQuantity,
            
        //  ]);
        return view('client.cart.cart', [
            'cartItems' => $cartItems,
            'subtotal' => $totals['subtotal'],
            'total' => $totals['total'],
            'discountAmount' => $totals['discountAmount'],
            'voucher' => $totals['voucher'],
            'soldQuantity'=>(int)$soldQuantity ?? 0,
            'voucherList'=>$voucher,
        ]);
    }
    
    
    
    
    
    public function addToCart(Request $request)
    {
        // dd($request->all());
        $result = $this->cartService->addToCart($request);
        // return response()->json($result);
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

        $subtotal = $cartItems->sum(fn($cart) => $cart->discounted_price * $cart->quantity);
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
    public function countItems(){
        return $this->cartService->countItems();
    }
    
}
