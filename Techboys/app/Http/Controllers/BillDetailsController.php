<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Promotion;
use Illuminate\Http\Request;

class BillDetailsController extends Controller
{
    public function show($id)
    {
        $bill = Bill::findOrFail($id);
        $billDetails = BillDetails::where('bill_id', $bill->id)->get();
        $productPromotions = Promotion::get();
        
        
        
        $total = $billDetails->sum(function ($detail) {
            return $detail->quantity * $detail->price;
        });
        
        // return response()->json([
        //     'bill' => $bill,
        //     'billDetails' => $billDetails,
        //     'total' => $total,
        //     'payment_status' => $bill->payment_status,
        //     'images' => $images,
        // ]);
        
        return view('admin.bill.details', compact('billDetails', 'bill','productPromotions','total'));
    }
}
