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
    $promotions = Promotion::with(['product.variant'])->get();
    $products = Product::doesntHave('promotion')->get();
    return view('admin.promotions.index', compact('promotions', 'products'));
    }

    public function create()
    {
        $products = Product::whereDoesntHave('promotion')->orderBy('name', 'asc')->get();
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
            'discount_percent' => 'required|numeric|min:1|max:50',
            'end_date' => 'required|date|after:' . now()->addDays(6)->toDateString(),
        ], [
            'name.required' => 'Vui lòng nhập tên khuyến mãi.',
            'name.string' => 'Tên khuyến mãi phải là chuỗi ký tự.',
            'name.max' => 'Tên khuyến mãi không được vượt quá 255 ký tự.',
    
            'product_id.required' => 'Vui lòng chọn một sản phẩm.',
            'product_id.exists' => 'Sản phẩm đã chọn không hợp lệ.',
    
            'discount_percent.required' => 'Vui lòng nhập mức giảm giá.',
            'discount_percent.numeric' => 'Mức giảm giá phải là một số.',
            'discount_percent.min' => 'Mức giảm giá tối thiểu là 1%.',
            'discount_percent.max' => 'Mức giảm giá tối đa là 50%.',
    
            'end_date.required' => 'Vui lòng chọn ngày kết thúc.',
            'end_date.date' => 'Ngày kết thúc không hợp lệ.',
            'end_date.after' => 'Ngày kết thúc phải cách ngày tạo ít nhất 1 tuần.',
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
            'discount_percent' => 'required|numeric|min:1|max:50',
            'end_date' => 'required|date|after:' . now()->addDays(6)->toDateString(),
        ], [
            'name.required' => 'Vui lòng nhập tên khuyến mãi.',
            'name.string' => 'Tên khuyến mãi phải là chuỗi ký tự.',
            'name.max' => 'Tên khuyến mãi không được vượt quá 255 ký tự.',

            'discount_percent.required' => 'Vui lòng nhập mức giảm giá.',
            'discount_percent.numeric' => 'Mức giảm giá phải là một số.',
            'discount_percent.min' => 'Mức giảm giá tối thiểu là 1%.',
            'discount_percent.max' => 'Mức giảm giá tối đa là 50%.',
    
            'end_date.required' => 'Vui lòng chọn ngày kết thúc.',
            'end_date.date' => 'Ngày kết thúc không hợp lệ.',
            'end_date.after' => 'Ngày kết thúc phải cách ngày tạo ít nhất 1 tuần.',
        ]);
        
        $promotion = Promotion::findOrFail($id);
        $promotion->update([
            'name' => $request->name,
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
