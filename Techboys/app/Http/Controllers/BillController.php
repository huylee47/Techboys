<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillRequest;
use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Promotion;
use App\Models\User;
use App\Models\Status;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::orderBy('status_id')->paginate(10);
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
        $total = $billDetails->sum(function ($detail) {
            return $detail->quantity * $detail->price;
        });

        $pdf = Pdf::loadView('admin.bill.my_invoice', compact('bill','billDetails','productPromotions','total'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        $fileName = 'bill_' . $bill->order_id . '_' . $bill->created_at->format('Ymd') . '.pdf';
        return $pdf->download($fileName);
    }
    public function invoiceBill($id) {
        $bill = Bill::where('id', $id)->first();
    
        if (!$bill) {
            return redirect()->route('admin.bill.index')->with('error', 'Không tìm thấy hóa đơn!');
        }
    
        if ($bill->status_id != 1) {
            return redirect()->route('admin.bill.index')->with('error', 'Hoá đơn không hợp lệ để xuất!');
        }
    
        try {
            $bill->update(['status_id' => 2]);
            return redirect()->route('admin.bill.index')->with('success', 'Hoá đơn đã được xuất!');
        } catch (\Exception $e) {
            return redirect()->route('admin.bill.index')->with('error', 'Đã xảy ra lỗi khi xuất hoá đơn!');
        }
    }
    
    public function cancelBill($id) {
        $bill = Bill::where('id', $id)->first();
    
        if (!$bill) {
            return redirect()->route('admin.bill.index')->with('error', 'Không tìm thấy hóa đơn!');
        }
    
        if ($bill->status_id != 1) {
            return redirect()->route('admin.bill.index')->with('error', 'Hoá đơn không hợp lệ để xuất!');
        }
    
        try {
            $bill->update(['status_id' => 0]);
            return redirect()->route('admin.bill.index')->with('success', 'Hoá đơn đã được huỷ!');
        } catch (\Exception $e) {
            return redirect()->route('admin.bill.index')->with('error', 'Đã xảy ra lỗi khi huỷ hoá đơn!');
        }
    }

    
}
