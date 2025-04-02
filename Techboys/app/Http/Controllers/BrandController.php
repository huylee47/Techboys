<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Service\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // private $brandService;
    // public function __construct(BrandService $brandService){
    //     $this->brandService = $brandService;
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::with('product')->get();
        // dd($usedBrandArray);
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
            Brand::create([
                'name' => $request->name,
            ]);
            return redirect()->route('admin.brand.index')->with('success', 'Thêm mới thương hiệu thành công');


    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::where('id', $id)->first();
        $usedBrandArray = Product::pluck('brand_id')->toArray();

        return view('admin.brand.edit', compact('brand','usedBrandArray'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request)
    {
        Brand::find($request->id)->update([        
            'name' => $request->name,
        ]);
        return redirect()->route('admin.brand.index')->with('success', 'Cập nhật thương hiệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Brand::find($request->id)->delete();
        return redirect()->route('admin.brand.index')->with('success', 'Xóa thương hiệu thành công');
    }
}
