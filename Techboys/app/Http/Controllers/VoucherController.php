<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //123
        $loadAll = Voucher::all();
        return view('admin.voucher.index', compact('loadAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|max:255',
            'name' => 'required|max:255',
            'min_price' => 'required|nullable|numeric|min:0',
            'max_discount' => 'required|nullable|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'quantity' => 'required|numeric|min:1',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'discount_amount' => 'nullable|numeric|min:0',
        ], [
            'code.required' => 'Vui lòng nhập code.',
            'code.max' => 'Code không được vượt quá 255 ký tự.',
            'code.unique' => 'Code này đã tồn tại. Vui lòng nhập code khác.',
            'name.required' => 'Vui lòng nhập tên.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'min_price.min' => 'Giá tối thiểu phải là một số dương.',
            'min_price.required' => 'Vui lòng nhập giá tối thiểu.',
            'max_discount.min' => 'Giá tối đa phải là một số dương.',
            'max_discount.required' => 'Vui lòng nhập giá tối đa.',
            'max_discount.after' => 'Giá tối đa phải lớn hơn hoặc bằng giá tối thiểu.',
            'start_date.required' => 'Vui lòng chọn ngày bắt đầu.',
            'start_date.date' => 'Ngày bắt đầu phải là ngày hợp lệ.',
            'end_date.required' => 'Vui lòng chọn ngày kết thúc.',
            'end_date.date' => 'Ngày kết thúc phải là ngày hợp lệ.',
            'end_date.after' => 'Ngày kết thúc phải sau ngày bắt đầu.',
            'quantity.required' => 'Vui lòng nhập số lượng.',
            'quantity.numeric' => 'Số lượng phải là số.',
            'quantity.min' => 'Số lượng phải ít nhất là 1.',
            'discount_percent.min' => 'Giảm(%) phải là một số dương.',
            'discount_percent.max' => 'Giảm(%) phải là nhỏ hơn 100.',
            'discount_amount.min' => 'Giảm(Đ) phải là một số dương.'
        ]);

        if (empty($request->discount_percent) && empty($request->discount_amount)) {
            return redirect()->back()
                ->withErrors(['error' => 'Bạn phải điền ít nhất một trong hai trường: giảm(%) hoặc giảm(Đ)'])
                ->withInput();
        }

        if (!empty($request->discount_percent) && !empty($request->discount_amount)) {
            return redirect()->back()
                ->withErrors(['error' => 'Bạn chỉ được điền một trong hai trường: giảm(%) hoặc giảm(Đ)'])
                ->withInput();
        }

        if (!empty($request->discount_percent)) {
            if (($request->min_price) > ($request->max_discount)) {
                return redirect()->back()
                    ->withErrors(['error' => 'Giá tối thiểu phải nhỏ hơn giá tối đa.'])
                    ->withInput();
            }
        } else {
            if (!empty($request->max_discount)) {
                return redirect()->back()
                    ->withErrors(['error' => 'Không được nhập Giá giảm tối đa khi đã nhập Giảm(VNĐ).'])
                    ->withInput();
            }
        }

        Voucher::create([
            'code' => $request->code,
            'name' => $request->name,
            'discount_percent' => $request->discount_percent,
            'discount_amount' => $request->discount_amount,
            'min_price' => $request->min_price,
            'max_discount' => $request->max_discount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'quantity' => $request->quantity

        ]);
        return redirect()->route('admin.voucher.index')->with('success', 'Tạo thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        $show = Voucher::find($request->id);
        return view('admin.voucher.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
        $show = Voucher::find($request->id);
        return view('admin.voucher.edit', compact('show'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'code' => 'required|max:255',
            'name' => 'required|max:255',
            'min_price' => 'required|nullable|numeric|min:0',
            'max_discount' => 'required|nullable|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'quantity' => 'required|numeric|min:1',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'discount_amount' => 'nullable|numeric|min:0',
        ], [
            'code.required' => 'Vui lòng nhập code.',
            'code.max' => 'Code không được vượt quá 255 ký tự.',
            'code.unique' => 'Code này đã tồn tại. Vui lòng nhập code khác.',
            'name.required' => 'Vui lòng nhập tên.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'min_price.min' => 'Giá tối thiểu phải là một số dương.',
            'min_price.required' => 'Vui lòng nhập giá tối thiểu.',
            'max_discount.min' => 'Giá tối đa phải là một số dương.',
            'max_discount.required' => 'Vui lòng nhập giá tối đa.',
            'max_discount.after' => 'Giá tối đa phải lớn hơn hoặc bằng giá tối thiểu.',
            'start_date.required' => 'Vui lòng chọn ngày bắt đầu.',
            'start_date.date' => 'Ngày bắt đầu phải là ngày hợp lệ.',
            'end_date.required' => 'Vui lòng chọn ngày kết thúc.',
            'end_date.date' => 'Ngày kết thúc phải là ngày hợp lệ.',
            'end_date.after' => 'Ngày kết thúc phải sau ngày bắt đầu.',
            'quantity.required' => 'Vui lòng nhập số lượng.',
            'quantity.numeric' => 'Số lượng phải là số.',
            'quantity.min' => 'Số lượng phải ít nhất là 1.',
            'discount_percent.min' => 'Giảm(%) phải là một số dương.',
            'discount_percent.max' => 'Giảm(%) phải là nhỏ hơn 100.',
            'discount_amount.min' => 'Giảm(Đ) phải là một số dương.'
        ]);

        if (empty($request->discount_percent) && empty($request->discount_amount)) {
            return redirect()->back()
                ->withErrors(['error' => 'Bạn phải điền ít nhất một trong hai trường: giảm(%) hoặc giảm(Đ)'])
                ->withInput();
        }

        if (!empty($request->discount_percent) && !empty($request->discount_amount)) {
            return redirect()->back()
                ->withErrors(['error' => 'Bạn chỉ được điền một trong hai trường: giảm(%) hoặc giảm(Đ)'])
                ->withInput();
        }

        if (!empty($request->discount_percent)) {
            if (($request->min_price) > ($request->max_discount)) {
                return redirect()->back()
                    ->withErrors(['error' => 'Giá tối thiểu phải nhỏ hơn giá tối đa.'])
                    ->withInput();
            }
        } else {
            if (!empty($request->max_discount)) {
                return redirect()->back()
                    ->withErrors(['error' => 'Không được nhập Giá giảm tối đa khi giảm(%) để trống.'])
                    ->withInput();
            }
        }

        Voucher::find($request->id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'discount_percent' => $request->discount_percent,
            'discount_amount' => $request->discount_amount,
            'max_discount' => $request->max_discount,
            'min_price' => $request->min_price,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'quantity' => $request->quantity

        ]);
        return redirect()->route('admin.voucher.index')->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        Voucher::find($request->id)->delete();
        return redirect()->route('admin.voucher.index')->with('success', 'Xóa thành công');
    }
}
