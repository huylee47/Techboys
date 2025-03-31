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
        $promotions = Promotion::paginate(10);
        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        $products = Product::whereDoesntHave('promotion')->get();
        return view('admin.promotions.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'discount_percent' => 'required|numeric|min:1|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'product_ids' => 'required|array|min:1', 
            'product_ids.*' => 'exists:products,id', 
        ]);

        foreach ($request->product_ids as $product_id) {
            Promotion::create([
                'name' => $request->name,
                'product_id' => $product_id,
                'discount_percent' => $request->discount_percent,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
        }

        return redirect()->route('admin.promotions.index')->with('success', 'Khuyến mãi đã được tạo!');
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
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        {
            $promotion->delete();
            return redirect()->route('admin.promotions.index')->with('success', 'Khuyến mãi đã được xóa!');
        }
    }
}
