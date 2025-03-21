<?php

namespace App\Service;

use App\Models\Attributes;
use App\Models\AttributesValue;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Images;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductModel;
use App\Models\ProductVariant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
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
        $categories = ProductCategory::all();
        $attributes = Attributes::with('values')->get();
        return view('admin.product.add',compact('brands','categories','attributes'));
    }
    public function createProductC(){
        $brands = Brand::all();
        $categories = ProductCategory::all();
        $attributes = Attributes::with('values')->get();
        return view('admin.product.addC',compact('brands','categories','attributes'));
    }
    private function generateCombinations($arrays, $prefix = [])
    {
        $result = [];
    
        if (empty($arrays)) {
            return [$prefix];
        }
    
        $keys = array_keys($arrays);
        $firstKey = array_shift($keys);
        $remaining = array_intersect_key($arrays, array_flip($keys));
    
        foreach ($arrays[$firstKey] as $value) {
            $newPrefix = array_merge($prefix, [$firstKey => $value]);
            $result = array_merge($result, $this->generateCombinations($remaining, $newPrefix));
        }
    
        return $result;
    }

    
    public function storeProduct($request) {
        DB::beginTransaction(); // Bắt đầu transaction
    
        try {
            $imageName = null;
            if ($request->hasFile('img')) {
                $imageName = time() . '_' . uniqid() . '.' . $request->img->getClientOriginalExtension();
                $request->img->move(public_path('admin/assets/images/product'), $imageName);
            }
    
            $product = Product::create([
                'name' => $request->name,
                'brand_id' => $request->brand_id,
                'purchases' => 0,
                'base_price' => $request->base_price,
                'is_featured' => $request->is_featured ?? 0,
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
    
            if ($request->is_featured == 1) {
                foreach ($request->variants as $variantData) {
                    $attributeValues = [];
                    foreach ($variantData['attributes'] as $attributeName => $values) {
                        $attributeValues[$attributeName] = is_array($values) ? $values : [$values];
                    }
    
                    $combinations = $this->generateCombinations($attributeValues);
    
                    foreach ($combinations as $combination) {
                        ProductVariant::create([
                            'product_id' => $product->id,
                            'stock' => 0,
                            'attribute_values' => json_encode($combination, JSON_UNESCAPED_UNICODE),
                            'price' => $variantData['price'] ?? $product->base_price,
                        ]);
                    }
                }
            }
    
            DB::commit(); // Xác nhận transaction nếu không có lỗi
    
            return redirect()->route('admin.product.index')->with('success', 'Thêm sản phẩm thành công');
    
        } catch (\Exception $e) {
            DB::rollBack(); // Hoàn tác nếu có lỗi
    
            return redirect()->route('admin.product.create')->with('error', 'Lỗi: ' . $e->getMessage());
        }
    }
    
    public function editProduct($id)
    {
        $attributesList = Attributes::with('values')->get();
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $categories = ProductCategory::all();
        $variants = ProductVariant::where('product_id', $id)->get();
        $variantAttributes = ProductVariant::where('product_id', $id)->get()->map(function ($variant) {
            return json_decode($variant->attribute_values, true);
        });
        $attributes = AttributesValue::with('attribute')->get()->groupBy('attributes_id')->map(function ($values) {
            return [
                'id' => $values->first()->attributes_id,
                'name' => $values->first()->attribute->name,
                'is_multiple' => $values->first()->attribute->is_multiple,
                'values' => $values->map(function ($value) {
                    return [
                        'id' => $value->id,
                        'value' => $value->value,
                    ];
                })->values(),
            ];
        })->keyBy('name');
        $groupedVariants = $variants->groupBy(function ($variant) use ($attributes) {
            $attributeValues = json_decode($variant->attribute_values, true);
            $fixedAttributes = [];
            foreach ($attributeValues as $attrName => $value) {
                if (isset($attributes[$attrName]) && $attributes[$attrName]['is_multiple'] == 0) {
                    $fixedAttributes[$attrName] = $value;
                }
            }
            ksort($fixedAttributes);
            return json_encode($fixedAttributes, JSON_UNESCAPED_UNICODE);
        });
        $formattedVariants = $groupedVariants->map(function ($variants, $attributeKey) {
            $variableAttributes = [];
            foreach ($variants as $variant) {
                $attributeValues = json_decode($variant->attribute_values, true);
                foreach ($attributeValues as $attrName => $value) {
                    if (!isset($variableAttributes[$attrName])) {
                        $variableAttributes[$attrName] = [];
                    }
                    if (!in_array($value, $variableAttributes[$attrName])) {
                        $variableAttributes[$attrName][] = $value;
                    }
                }
            }
            return [
                'variable_attributes' => $variableAttributes,
                'price' => $variants->first()->price,
            ];
        })->values();
        
        // return response()->json([
        //     'product' => $product,
        //     'variants' => $variants,
        //     'attributes' => $attributes,
        //     'formattedVariants' => $formattedVariants,
        //     'variantAttributes' => $variantAttributes,
        //     'attributesList' => $attributesList,
        // ]);
        return view('admin.product.edit', compact('product', 'variants', 'attributes', 'formattedVariants', 'variantAttributes', 'attributesList','brands','categories'));
    }
    public function updateProduct($request, $id)
    {
        $isFeatured = $request->is_featured;
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
            'description' => $request->description,
            'base_price' => $request->base_price,
            'is_featured' => $request->is_featured ?? 0,
        ]);
        if ($isFeatured == 1) {
            $existingVariants = ProductVariant::where('product_id', $id)->get();

            $newVariants = collect($request->input('variants', [])); // Dữ liệu từ form
            // dd($newVariants);
            $attributes = AttributesValue::with('attribute')->get()->groupBy('attributes_id')->mapWithKeys(function ($values) {
                return [$values->first()->attribute->name => [
                    'id' => $values->first()->attributes_id,
                    'is_multiple' => $values->first()->attribute->is_multiple,
                ]];
            });

            $variantsToDelete = $existingVariants->pluck('id')->toArray();

            foreach ($newVariants as $newVariant) {
                $attributeValues = $newVariant['attributes'] ?? [];
                $fixedAttributes = [];
                $variableAttributes = [];

                foreach ($attributeValues as $attrName => $value) {
                    if (isset($attributes[$attrName])) {
                        if ($attributes[$attrName]['is_multiple'] == 1) {
                            $variableAttributes[$attrName] = (array) $value;
                        } else {
                            $fixedAttributes[$attrName] = $value;
                        }
                    }
                }

                $combinations = $this->generateCombinations($variableAttributes);

                foreach ($combinations as $combination) {
                    $finalAttributes = array_merge($fixedAttributes, $combination);

                    $existingVariant = $existingVariants->first(function ($variant) use ($finalAttributes) {
                        return json_decode($variant->attribute_values, true) == $finalAttributes;
                    });

                    if ($existingVariant) {
                        $existingVariant->update([
                            'price' => $newVariant['price'],
                            'attribute_values' => json_encode($finalAttributes, JSON_UNESCAPED_UNICODE),
                        ]);

                        $variantsToDelete = array_diff($variantsToDelete, [$existingVariant->id]);
                    } else {
                        ProductVariant::create([
                            'product_id' => $id,
                            'price' => $newVariant['price'],
                            'attribute_values' => json_encode($finalAttributes, JSON_UNESCAPED_UNICODE),
                        ]);
                    }
                }
            }

            ProductVariant::whereIn('id', $variantsToDelete)->delete();
        }
        else{
            ProductVariant::where('product_id', $id)->delete();
        }
        // return response()->json([
        //     'success' => 'Cập nhật biến thể thành công.',
        //     'product' => $product,
        //     'variants' => ProductVariant::where('product_id', $id)->get() ?? "Đã xoá các biến thể",
        // ]);

    
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
    $attributeValues = AttributesValue::all()->keyBy('id');
    $defaultVariant = $variants->first();

    // Gom nhóm biến thể theo thuộc tính giống nhau
    $groupedVariants = [];

    foreach ($variants as $variant) {
        $attributes = json_decode($variant->attribute_values, true);
        $groupKey = json_encode($attributes, JSON_UNESCAPED_UNICODE); // Chuỗi định danh nhóm

        if (!isset($groupedVariants[$groupKey])) {
            $groupedVariants[$groupKey] = [
                'attributes' => $attributes,
                'variants' => []
            ];
        }

        $groupedVariants[$groupKey]['variants'][] = $variant;
    }

    if ($product) {
        $comment = Comment::where('product_id', $product->id)->get();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(10)
            ->get();
         
        // return response()->json([
        //     'product' => $product,
        //     'comment' => $comment,
        //     'variants' => $variants,
        //     'attributeValues' => $attributeValues,
        //     'defaultVariant' => $defaultVariant,
        //     'groupedVariants' => $groupedVariants,
        // ]);
            
        return view('client.product.detail', compact('product', 'comment', 'relatedProducts', 'images', 'variants', 'attributeValues', 'defaultVariant', 'groupedVariants'));
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