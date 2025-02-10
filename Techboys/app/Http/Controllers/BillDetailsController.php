<?php

namespace App\Http\Controllers;

use App\Models\BillDetails;
use Illuminate\Http\Request;

class BillDetailsController extends Controller
{
    public function show($billDetailId)
    {
        $billDetail = BillDetails::findOrFail($billDetailId);

        $bill = $billDetail->bill;

        $product = $billDetail->product;
        $variant = $billDetail->variant;

        return view('admin.bill.details', compact('billDetail', 'bill', 'product', 'variant'));
    }
}
