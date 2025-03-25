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
        DB::beginTransaction();
    
        try {
            $isFeatured = $request->is_featured;
            if ($isFeatured == 0){
                $base_stock = $request->base_stock;
                $base_price = $request->base_price;
            }
            else{
                $base_stock = 0;
                $base_price = 0;
            }
            $imageName = null;
            if ($request->hasFile('img')) {
                $imageName = time() . '_' . uniqid() . '.' . $request->img->getClientOriginalExtension();
                $request->img->move(public_path('admin/assets/images/product'), $imageName);
            }
    
            $product = Product::create([
                'name' => $request->name,
                'brand_id' => $request->brand_id,
                'purchases' => 0,
                'is_featured' => $request->is_featured ?? 0,
                'base_price' => $base_price,
                'base_stock' => $base_stock,
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
    
            DB::commit();
            // return response()->json([
            //     'success' => 'Thêm sản phẩm thành công.',
            //     'product' => $product,
            //     'variants' => ProductVariant::where('product_id', $product->id)->get(),
            // ]);
    
            return redirect()->route('admin.product.index')->with('success', 'Thêm sản phẩm thành công');
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(
                [
                    'error' => 'Lỗi: ' . $e->getMessage(),
                ]
            );
            // return redirect()->route('admin.product.create')->with('error', 'Lỗi: ' . $e->getMessage());
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
        // dd($request->all());
        $isFeatured = $request->is_featured;
        if ($isFeatured == 0){
            $base_stock = $request->base_stock;
            $base_price = $request->base_price;
        }
        else{
            $base_stock = 0;
            $base_price = 0;
        }
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
            'is_featured' => $request->is_featured ?? 0,
            'base_price' => $base_price,
            'base_stock' => $base_stock,
            'img' => $imageName,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->name),
        ]);
        if ($isFeatured == 1) {
            $existingVariants = ProductVariant::where('product_id', $id)->get();

            $newVariants = collect($request->input('variants', []));
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
                    $finalAttributes = array_replace($fixedAttributes, $combination);

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
        //     'variants' => ProductVariant::where('product_id', $id)->get() ?? "Xoá thất bại",
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
    $product = Product::where('slug', $slug)->firstOrFail();
    $images = Images::where('product_id', $product->id)->get();
    $variants = ProductVariant::where('product_id', $product->id)->get();
    $attributeValues = AttributesValue::all()->keyBy('id');
    $comment = Comment::where('product_id', $product->id)->get();
    $relatedProducts = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->take(10)
        ->get();

    $groupedAttributes = []; // Lưu danh sách nhóm thuộc tính

    if ($variants->isNotEmpty()) {
        $formattedVariants = $variants->map(function ($variant) use ($attributeValues, &$groupedAttributes): array {
            $attributes = json_decode($variant->attribute_values, true);

            $formattedAttributes = collect($attributes)->mapWithKeys(function ($attrValueId, $attrName) use ($attributeValues, &$groupedAttributes) {
                $attributeValue = $attributeValues[$attrValueId]->value ?? 'Không xác định';
                $attributeId = $attributeValues[$attrValueId]->attribute_id ?? null;

                // Nhóm thuộc tính vào danh sách
                $groupedAttributes[$attrName]['values'][] = ['id' => $attrValueId, 'value' => $attributeValue];
                $groupedAttributes[$attrName]['id'] = $attributeId;

                return [$attrName => ['id' => $attrValueId, 'value' => $attributeValue]];
            })->toArray();

            return [
                'id' => $variant->id,
                'price' => $variant->price,
                'discounted_price' => $variant->discounted_price,
                'stock' => $variant->stock,
                'attributes' => $formattedAttributes, // Chứa cả id và value
            ];
        });
        // dd($formattedVariants);
        // Loại bỏ các giá trị trùng nhau trong từng nhóm thuộc tính
        foreach ($groupedAttributes as $key => &$data) {
            $data['values'] = collect($data['values'])->unique('id')->values()->toArray();
        }

        $defaultVariant = $formattedVariants->first();
        // return response()->json([
        //     'formattedVariants' => $formattedVariants[1],
        // ]);
        return view('client.product.detail', compact('product', 'comment', 'images', 'formattedVariants', 'defaultVariant', 'relatedProducts', 'attributeValues', 'groupedAttributes','variants'));
    } else {
        $formattedVariants = [];
        $defaultVariant = [
            'price' => $product->base_price,
            'discounted_price' => $product->discounted_price,
            'stock' => $product->base_stock ?? 0,
        ];
// dd($variants);
        return view('client.product.detail', compact('product', 'comment', 'images', 'formattedVariants', 'defaultVariant', 'relatedProducts', 'groupedAttributes','variants'));
    }
}







    public function getNewProducts(){
        return Product::with(['variant', 'promotion'])
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();
    }
}