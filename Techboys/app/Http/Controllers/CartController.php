<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Service\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private $cartService;
    
    public function __construct(CartService $cartService){
        $this->cartService = $cartService;
    } 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
    // CLIENT
    public function showCart()
    {
        $cartItems = $this->cartService->getCartItems();
    
        if ($cartItems instanceof \Illuminate\Http\JsonResponse) {
            return view('client.cart.cart', [
                'cartItems' => collect([]),
                'subtotal' => 0,
                'total' => 0
            ]);
        }
    
        $subtotal = $cartItems->sum(function ($cart) {
            return $cart->variant->price * $cart->quantity;
        });
    
        $total = $subtotal;
    
        return view('client.cart.cart', compact('cartItems', 'subtotal', 'total'));
    }
    
    public function addToCart(Request $request){
        
        $this->cartService->addToCart($request);
        return redirect()->route('client.cart.index')->with('success', 'Thêm thành công');
    }
    public function updateCart(Request $request)
    {
        $result = $this->cartService->updateCart($request);
    
        if (isset($result['error'])) {
            return response()->json($result, 404);
        }
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get(); 
        $subtotal = $cartItems->sum(function ($cart) {
            return $cart->variant->price * $cart->quantity;
        });
        $total = $subtotal;
    
        return response()->json([
            'success' => true,
            'new_total_price' => number_format($result['total_price'], 0, ',', '.') . ' đ', 
            'subtotal' => number_format($subtotal, 0, ',', '.') . ' đ',
            'total' => number_format($total, 0, ',', '.') . ' đ', // 
        ]);
    }
}
