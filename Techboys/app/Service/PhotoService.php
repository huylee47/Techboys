<?php

namespace App\Service;

use App\Models\Images;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class PhotoService
{
    public function imageIndex($id){
        $productDetails = Product::where('id',$id)->first();
        $images = Images::where('product_id', $id)->get();
        return view('admin.product.imageIndex', compact('images','productDetails'));
    }

    public function addPhoto( $request,$id)
    {
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('admin/assets/images/product'), $imageName);
            Images::create([
                'product_id' => $id,
                'image' => $imageName,
            ]);

        }
    }

    public function deletePhoto($request)
    {
        $photoDetail = Images::find($request);
        if ($photoDetail) {
            $imagePath = public_path('admin/assets/images/product/' . $photoDetail->img) ?? '';
            if (File::exists($imagePath)) {
                // Xóa file
                File::delete($imagePath);
            }
            $photoDetail->forceDelete();
        }
    }
}
