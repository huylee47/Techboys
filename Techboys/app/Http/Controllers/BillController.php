<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillRequest;
use App\Models\AttributesValue;
use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Promotion;
use App\Models\User;
use App\Models\Status;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    // public function index()
    // {
    //     $bills = Bill::orderByDesc('created_at')->paginate(10);
    //     return view('admin.bill.index', compact('bills'));
    // }
    public function index(Request $request)
    {
        $query = Bill::query();
    
        // Lọc theo trạng thái nếu có request
        if ($request->has('status')) {
            $query->where('status_id', $request->status);
        }
    
        $bills = $query->orderByDesc('created_at')->paginate(10);
        return view('admin.bill.index', compact('bills'));
    }
    
    public function hide($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->deleted_at = now();
        $bill->save();
        return redirect()->route('admin.bill.index')->with('success', 'Hóa đơn đã được ẩn!');
    }

    public function restore($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->deleted_at = null;
        $bill->save();
        return redirect()->route('admin.bill.index')->with('success', 'Hóa đơn đã được khôi phục!');
    }

    public function download($id)
    {
        $bill = Bill::findOrFail($id);
        $billDetails = BillDetails::where('bill_id', $bill->id)->get();
        $productPromotions = Promotion::get();
        $attributeValues = AttributesValue::all()->keyBy('id');
    
        foreach ($billDetails as $detail) {
            $promotion = Promotion::where('product_id', $detail->product_id)->first();
            if ($promotion && now()->lt(Carbon::parse($promotion->end_date))) {
                $detail->discounted_price = $detail->price * (1 - $promotion->discount_percent / 100);
            } else {
                $detail->discounted_price = $detail->price;
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
            return $detail->quantity * $detail->discounted_price;
        });
    
        $pdf = Pdf::loadView('admin.bill.my_invoice', compact('bill', 'billDetails', 'productPromotions', 'total'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
    
        $fileName = 'bill_' . $bill->order_id . '_' . $bill->created_at->format('Ymd') . '.pdf';
        // return view('admin.bill.my_invoice',compact('bill', 'billDetails', 'productPromotions', 'total'));
        return $pdf->download($fileName);
    }
    
    public function invoiceBill($id) {
        $bill = Bill::find($id);
        
        if (!$bill) {
            return redirect()->route('admin.bill.index')->with('error', 'Không tìm thấy hóa đơn!');
        }
    
        if ($bill->status_id != 1) {
            return redirect()->route('admin.bill.index')->with('error', 'Hoá đơn không hợp lệ để xuất!');
        }
    
        $billDetails = BillDetails::where('bill_id', $id)->get();
    
        try {
            DB::beginTransaction();
    
            $bill->update([
                'status_id' => 2,
            ]);
    
            foreach ($billDetails as $billDetail) {
                $product = Product::find($billDetail->product_id);
                if ($product) {
                    $product->increment('purchases', $billDetail->quantity);
                }
            }
    
            DB::commit();
            return redirect()->route('admin.bill.index')->with('success', 'Hoá đơn đã được xuất!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.bill.index')->with('error', 'Đã xảy ra lỗi khi xuất hoá đơn!');
        }
    }
    
    
    public function cancelBill(Request $request,$id) {
        $bill = Bill::find($id);
    
        if (!$bill) {
            return redirect()->route('admin.bill.index')->with('error', 'Không tìm thấy hóa đơn!');
        }
    
        // Kiểm tra chỉ cho phép hủy đơn nếu đang ở trạng thái "Chờ xác nhận"
        if ($bill->status_id != 1) {
            return redirect()->route('admin.bill.index')->with('error', 'Hoá đơn không hợp lệ để huỷ!');
        }
    
        try {
            DB::beginTransaction();
    
            // Lấy danh sách sản phẩm trong hóa đơn
            // $billDetails = BillDetails::where('bill_id', $id)->get();
    
            // foreach ($billDetails as $billDetail) {
            //     if ($billDetail->variant_id) {
            //         $variant = ProductVariant::find($billDetail->variant_id);
            //         if ($variant) {
            //             $variant->increment('stock', $billDetail->quantity);
            //         }
            //     } else {
            //         $product = Product::find($billDetail->product_id);
            //         if ($product) {
            //             $product->increment('base_stock', $billDetail->quantity);
            //         }
            //     }
            // }
    
            // Cập nhật trạng thái hóa đơn thành "Đã huỷ" (giả sử status_id = 0 là "Đã huỷ")
            $bill->update([
                'status_id' => 0,
                'note' => $request->note
            ]);
    
            DB::commit();
    
            return redirect()->route('admin.bill.index')->with('success', 'Hoá đơn đã được huỷ thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.bill.index')->with('error', 'Đã xảy ra lỗi khi huỷ hoá đơn!');
        }
    }
    public function confirm($id){
            $bill = Bill::find($id);
            
            if (!$bill) {
                return redirect()->route('admin.bill.index')->with('error', 'Không tìm thấy hóa đơn!');
            }
        
            if ($bill->status_id != 2) {
                return redirect()->route('admin.bill.index')->with('error', 'Hoá đơn không hợp lệ!');
            }
        
            $billDetails = BillDetails::where('bill_id', $id)->get();
        
            try {
                DB::beginTransaction();
        
                $bill->update([
                    'status_id' => 3,
                ]);
        
                DB::commit();
                return redirect()->route('admin.bill.index')->with('success', 'Hoá đơn đã được giao thành công!');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('admin.bill.index')->with('error', 'Đã xảy ra lỗi khi xác nhận!');
            }
    }
    

    //client
    public function indexClient()
    {
        $loadAll = Bill::with(['billDetails.product', 'status'])
                       ->where('user_id', Auth::id())
                       ->get();
        return view('client.order.order', compact('loadAll'));
    }

    public function searchOrder(Request $request)
    {
        $orderId = $request->input('order_id');
        $phone = $request->input('phone');

        $query = Bill::with(['billDetails.product', 'status'])->where('order_id', $orderId);

        // If the user is not logged in, validate the phone number
        if (!Auth::check()) {
            $query->where('phone', $phone);
        }

        $searchedOrder = $query->first();

        $loadAll = Auth::check() ? Bill::with(['billDetails.product', 'status'])
                                       ->where('user_id', Auth::id())
                                       ->get() : [];

        return view('client.order.order', compact('searchedOrder', 'loadAll'));
    }
}
