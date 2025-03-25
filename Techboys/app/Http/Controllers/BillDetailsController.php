<?php

namespace App\Http\Controllers;

use App\Models\AttributesValue;
use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Promotion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BillDetailsController extends Controller
{
    public function show($id)
    {
        $bill = Bill::findOrFail($id);
        $billDetails = BillDetails::where('bill_id', $bill->id)->get();
        $productPromotions = Promotion::get();
    
        $attributeValues = AttributesValue::all()->keyBy('id');
    
        foreach ($billDetails as $detail) {
            $promotion = Promotion::where('product_id', $detail->product_id)->first();
            if ($promotion && now()->lt(Carbon::parse($promotion->end_date))) {
                if ($detail->variant_id) {
                    $detail->discounted_price = $detail->price * (1 - $promotion->discount_percent / 100);
                } else {
                    $detail->discounted_price = $detail->product->price * (1 - $promotion->discount_percent / 100);
                }
            }
    
            if ($detail->variant_id) {
                $attributeJson = ProductVariant::where('id', $detail->variant_id)->value('attribute_values');
                $attributeArray = json_decode($attributeJson, true) ?? [];
    
                $attributeValuesList = collect($attributeArray)->map(function ($attrValueId) use ($attributeValues) {
                    return $attributeValues[$attrValueId]->value ?? 'Không xác định';
                })->toArray();
    
                $detail->attributes = implode(' ', $attributeValuesList);
            } else {
                $detail->attributes = '';
            }
        }
    
        $total = $billDetails->sum(function ($detail) {
            return $detail->quantity * $detail->price;
        });
    
        return view('admin.bill.details', compact('billDetails', 'bill', 'productPromotions', 'total'));
    }
    
}
