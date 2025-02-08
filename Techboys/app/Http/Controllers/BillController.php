<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillRequest;
use App\Models\Bill;
use App\Models\User;
use App\Models\Status;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::paginate(10);
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
        $bill = Bill::where('id', $id)->first();

        $pdf = Pdf::loadView('admin.bill.my_invoice', compact('bill'))->setPaper('a2')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}
