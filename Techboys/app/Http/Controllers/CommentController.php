<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Storage;
use Illuminate\Support\Facades\Auth;
use App\Service\CommentService;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loadAll = Comment::with(['user', 'product','storage'])->get();
        return view('admin.comment.index', compact('loadAll'));
    }
    
    public function block(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->update(['status_id' => 0]);
        return redirect()->route('admin.comment.index')->with('success', 'Ẩn bình luận thành công.');
    }

    public function open(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->update(['status_id' => 1]);
        return redirect()->route('admin.comment.index')->with('success', 'Hiện bình luận thành công.');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CommentService $commentService)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Bạn phải đăng nhập để bình luận.');
        }

        $request->validate([
            'comment' => 'required',
            'rate' => 'required|numeric|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'comment.required' => 'Vui lòng nhập bình luận.',
            'rate.required' => 'Vui lòng chọn đánh giá.',
            'rate.numeric' => 'Đánh giá phải là một số.',
            'rate.min' => 'Đánh giá phải từ 1 đến 5.',
            'rate.max' => 'Đánh giá phải từ 1 đến 5.',
            'image.image' => 'Vui lòng chọn một hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2048KB.',
        ]);

        $data = [
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'content' => $request->comment,
            'rate' => $request->rate,
        ];

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('admin/assets/images/comment'), $imageName);

            $storage = new Storage();
            $storage->file = $imageName;
            $storage->save();

            $data['file_id'] = $storage->id;
        }

        $commentService->storeComment($data);

        return redirect()->back()->with('success', 'Bình luận của bạn đã được gửi.');
    }

    /**
     * Display the specified resource.
     */
    //client
    public function show(Comment $comment)
    {
        //
        
    }

    public function calculateAverageRating($productId)
    {
        $averageRating = Comment::where('product_id', $productId)->avg('rate');
        return round($averageRating, 1);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
