<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $loadAll = ProductCategory::all();
        return view('admin.category.index', compact('loadAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:255',
        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
        ]);
        ProductCategory::create([         
            'name' => $request->name,
        ]);
        return redirect()->route('admin.category.index')->with('success', 'Tạo thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
        $show = ProductCategory::find($request->id);
        return view('admin.category.edit', compact('show'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        //
        $request->validate([
            'name' => 'required|max:255',
        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
        ]);
        ProductCategory::find($request->id)->update([        
            'name' => $request->name,
        ]);
        return redirect()->route('admin.category.index')->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        ProductCategory::find($request->id)->delete();
        return redirect()->route('admin.category.index')->with('success', 'Xóa thành công');
    }
}
