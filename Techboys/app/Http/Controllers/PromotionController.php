<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Product;
use App\Service\PromotionService;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    private $promotionService;
    public function __construct(PromotionService $promotionService)
    {
        $this->promotionService = $promotionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $promotions = Promotion::with('product')->paginate(10);
    $products = Product::doesntHave('promotion')->get();
    return view('admin.promotions.index', compact('promotions', 'products'));
    }

    public function create()
    {
        $products = Product::whereDoesntHave('promotion')->get();
        return view('admin.promotions.add', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        'product_id' => 'required|exists:products,id',
        'discount_percent' => 'required|numeric|min:1|max:100',
        'end_date' => 'required|date|after:today',
        ]);

        Promotion::create([
            'name' => $request->name,
            'status_id' => 1, 
            'product_id' => $request->product_id,
            'discount_percent' => $request->discount_percent,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('admin.promotion.index')->with('success', 'Khuyến mãi đã được thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
    $products = Product::all();
    return view('admin.promotions.edit', compact('promotion', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'discount_percent' => 'required|numeric|min:1|max:100',
            'end_date' => 'required|date|after:today',
        ]);
    
        $promotion = Promotion::findOrFail($id);
        $promotion->update([
            'name' => $request->name,
            'product_id' => $request->product_id,
            'discount_percent' => $request->discount_percent,
            'end_date' => $request->end_date,
        ]);
    
        return redirect()->route('admin.promotion.index')->with('success', 'Khuyến mãi đã được cập nhật!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        {
            $promotion = Promotion::findOrFail($id);
            $promotion->delete();
            return redirect()->route('admin.promotion.index')->with('success', 'Khuyến mãi đã được xóa!');
        }
    }
}
