<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $loadAll = Blog::all();
        return view('admin.blogs.index', compact('loadAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'required|nullable|date',
            'image' => 'required|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'content.required' => 'Vui lòng nhập nội dung.',
            'published_at.date' => 'Ngày xuất bản phải là ngày hợp lệ.',
            'published_at.required' => 'Vui lòng chọn ngày xuất bản.',
            'image.image' => 'Tệp phải là một ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
            'image.max' => 'Ảnh không được vượt quá 2MB.',
            'image.required' => 'Vui lòng chọn ảnh.',

        ]);
        if ($request->hasFile('image')) {
            $image = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('admin/assets/images/blog'), $image);
        } else {
            // Xử lý trường hợp không có tệp tải lên
            return back()->withInput()->withErrors(['image' => 'Tải lên ảnh thất bại.']);
        }
        $slug = Str::slug($request->title, '-');
        $user_id = Auth::user();
        Blog::create([
            'user_id' => $user_id->id,
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'published_at' => $request->published_at,
            'image' => isset($image) ? $image : null // Sử dụng tên ảnh đã lưu
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Tạo thành công');
    }


    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
        $show = Blog::find($request->id);
        return view('admin.blogs.edit', compact('show'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'required|nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'content.required' => 'Vui lòng nhập nội dung.',
            'published_at.date' => 'Ngày xuất bản phải là ngày hợp lệ.',
            'published_at.required' => 'Vui lòng chọn ngày xuất bản.',
            'image.image' => 'Tệp phải là một ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
            'image.max' => 'Ảnh không được vượt quá 2MB.',
        ]);
        if ($request->hasFile('image')) {
            $image = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('admin/assets/images/blog'), $image);
            $imagePath = $image;
        } else {
            $imagePath = Blog::find($request->id)->image; // Giữ nguyên ảnh cũ
        }

        $slug = Str::slug($request->title, '-');
        Blog::find($request->id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'published_at' => $request->published_at,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        Blog::find($request->id)->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Xóa thành công');
    }
}
