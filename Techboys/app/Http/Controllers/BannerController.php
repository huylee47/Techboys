<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //admin
    public function index()
    {
        //
        $loadAll = Banner::all();
        return view('admin.banner.index', compact('loadAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'image.image' => 'Tệp phải là một ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
            'image.max' => 'Ảnh không được vượt quá 2MB.',
            'image.required' => 'Vui lòng chọn ảnh.',

        ]);
        if ($request->hasFile('image')) {
            $image = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('admin/assets/images/banner'), $image);
        } else {
            // Xử lý trường hợp không có tệp tải lên
            return back()->withInput()->withErrors(['image' => 'Tải lên ảnh thất bại.']);
        }
        Banner::create([
            'title' => $request->title,
            'image' => isset($image) ? $image : null // Sử dụng tên ảnh đã lưu
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Tạo thành công');
    }


    /**
     * Display the specified resource.
     */
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
        $show = Banner::find($request->id);
        return view('admin.banner.edit', compact('show'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'image.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
            'image.max' => 'Ảnh không được vượt quá 2MB.',
        ]);
        if ($request->hasFile('image')) {
            $image = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('admin/assets/images/banner'), $image);
            $imagePath = $image;
        } else {
            $imagePath = Banner::find($request->id)->image; // Giữ nguyên ảnh cũ
        }
        Banner::find($request->id)->update([
            'title' => $request->title,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Sửa thành công');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        Banner::find($request->id)->delete();
        return redirect()->route('admin.banner.index')->with('success', 'Xóa thành công');
    }
//client
    public function indexClient()
    {
        $loadBanner = Banner::all();
        return view('client.home.home', compact('loadBanner'));
    }
}
