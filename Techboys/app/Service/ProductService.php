<?php

namespace App\Service;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Images;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductModel;
use App\Models\ProductVariant;
use Illuminate\Support\Str;

class ProductService{
    public function getAllProducts() {
        return Product::withTrashed()->orderBy('name', 'asc')->get();
    }
    
    public function hide($id)
    {
    Product::find($id)->delete();
    return back()->with('success', 'Sản phẩm đã được ẩn.');
    }

    public function restore($id)
    {
    Product::withTrashed()->find($id)->restore();
    return back()->with('success', 'Sản phẩm đã được hiển thị lại.');
    }
    public function createProduct(){
        $brands = Brand::all();
        $colors = Color::all();
        $P_Models = ProductModel:: all();
        $categories = ProductCategory::all();
        return view('admin.product.add',compact('brands','colors','P_Models','categories'));
    }
    public function storeProduct($request){
    
        $imageName = null;
        if ($request->hasFile('img')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->img->getClientOriginalExtension();
            $request->img->move(public_path('admin/assets/images/product'), $imageName);
        }


        $product = Product::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'purchases' => 0,
            'img' => $imageName,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'rate_average' => 0,
            'slug' => Str::slug($request->name),
        ]);

        $image = Images::firstOrNew(['image' => $product->img]);
        $image->product_id = $product->id;
        $image->image = $imageName;
        $image->save();

        if ($request->has('color_id') && $request->has('model_id') && $request->has('price') && $request->has('stock')) {
            foreach ($request->color_id as $key => $colorId) {
                if (!empty($colorId) && !empty($request->model_id[$key]) && !empty($request->price[$key]) && !empty($request->stock[$key])) {
                    ProductVariant::create([
                        'product_id' => $product->id,
                        'color_id' => $colorId,
                        'model_id' => $request->model_id[$key],
                        'price' => $request->price[$key],
                        'stock' => $request->stock[$key] ?? 0,
                    ]);
                }
            }
        }
    
        return redirect()->route('admin.product.index')->with('success', 'Thêm sản phẩm thành công');
    }
    public function editProduct($request){
        $product = Product::where('id', $request->id)->first();
        $brands = Brand::all();
        $colors = Color::all();
        $P_Models = ProductModel:: all();
        $categories = ProductCategory::all();
        $variants = ProductVariant::where('product_id', $product->id)->get();
        return view('admin.product.edit',compact('product','brands','colors','P_Models','categories','variants'));
    }
    public function updateProduct($request, $id)
    {
        $product = Product::where('id',$id)->first();
        if ($request->hasFile('img')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->img->getClientOriginalExtension();
            $request->img->move(public_path('admin/assets/images/product'), $imageName);
        }else{
            $imageName = $product->img;
        }

        $image = Images::firstOrNew(['image' => $product->img]);
        $image->product_id = $product->id;
        $image->image = $imageName;
        $image->save();

        $product->update([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'img' => $imageName,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->name),
        ]);
    
        if ($request->has('color_id') && $request->has('model_id') && $request->has('price') && $request->has('stock')) {
            $existingVariants = $product->variant()?->pluck('id')->toArray() ?? [];
            $receivedVariantIds = [];
    
            foreach ($request->color_id as $key => $colorId) {
                if (!empty($colorId) && !empty($request->model_id[$key]) && !empty($request->price[$key]) && !empty($request->stock[$key])) {
                    $variantData = [
                        'product_id' => $product->id,
                        'color_id' => $colorId,
                        'model_id' => $request->model_id[$key],
                        'price' => $request->price[$key],
                        'stock' => $request->stock[$key],
                    ];
    
                    if (!empty($request->variant_id[$key])) {
                        $variant = ProductVariant::find($request->variant_id[$key]);
                        if ($variant) {
                            $variant->update($variantData);
                            $receivedVariantIds[] = $variant->id;
                        }
                    } else {
                        $newVariant = ProductVariant::create($variantData);
                        $receivedVariantIds[] = $newVariant->id;
                    }
                }
            }
    
            $variantsToDelete = array_diff($existingVariants, $receivedVariantIds);
            ProductVariant::whereIn('id', $variantsToDelete)->delete();
        }
    
        return redirect()->route('admin.product.index')->with('success', 'Sửa sản phẩm thành công');
    }
    public function destroyProduct($request) {
        $ids = is_array($request->id) ? $request->id : [$request->id];
    
        $product = Product::find($request->id);
    
        if ($product) {
            ProductVariant::whereIn('id', $ids)->forceDelete();
            Images::whereIn('id', $ids)->forceDelete();
            $product->forceDelete();
            
            return redirect()->route('admin.product.index')->with('success', 'Xóa sản phẩm: ' . $product->name . ' thành công');
        } else {
            return redirect()->route('admin.product.index')->with('error', 'Sản phẩm không tồn tại');
        }
    }
    
    public function imageIndex($id){
        $productDetails = Product::where('id',$id)->first();
        $images = Images::where('product_id', $id)->get();
        return view('admin.product.imageIndex', compact('images','productDetails'));
    }
    public function imageStore($request, $id){
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('admin/assets/images/product'), $imageName);
                Images::create([
                    'product_id' => $id,
                    'image' => $imageName,
                ]);
        }

        return redirect()->route('admin.product.imageIndex', $id)->with('success', 'Thêm ảnh thành công');
    }
    public function imageDestroy( $productId, $imageId) {
        $image = Images::find($imageId);
        if ($image) {
            $image->forceDelete();
            return redirect()->route('admin.product.imageIndex', $productId)->with('success', 'Xóa ảnh thành công');
        } else {
            return redirect()->route('admin.product.imageIndex', $productId)->with('error', 'Ảnh không tồn tại');
        }
    }
// CLIENT
    public function getProductBySlug($slug) {
        $product = Product::where('slug', $slug)->first();
        $images = Images::where('product_id', $product->id)->get();
        $variants = ProductVariant::where('product_id', $product->id)->get();
        if ($product) {
            $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(10)->get();
            return view('client.product.detail', compact('product','relatedProducts','images', 'variants'));
        } else {
            abort(404);
        }
    }
    public function getNewProducts(){
        return Product::with(['variant', 'promotion'])
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();
    }
}