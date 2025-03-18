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
            'media' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,mp4|max:20480', // 20MB max
        ],[
            'comment.required' => 'Vui lòng nhập bình luận.',
            'rate.required' => 'Vui lòng chọn đánh giá.',
            'rate.numeric' => 'Đánh giá phải là một số.',
            'rate.min' => 'Đánh giá phải từ 1 đến 5.',
            'rate.max' => 'Đánh giá phải từ 1 đến 5.',
            'media.file' => 'Vui lòng chọn một tệp tin.',
            'media.mimes' => 'Tệp tin phải có định dạng: jpeg, png, jpg, gif, svg, mp4.',
            'media.max' => 'Kích thước tệp tin không được vượt quá 20480KB.',
        ]);

        $data = [
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'content' => $request->comment,
            'rate' => $request->rate, // Ensure rate is included
        ];

        if ($request->hasFile('media')) {
            $mediaName = time().'.'.$request->media->extension();
            $request->media->move(public_path('admin/assets/images/comment'), $mediaName);

            $storage = new Storage();
            $storage->file = $mediaName;
            $storage->save();

            $data['file_id'] = $storage->id;
        }

        $commentService->storeComment($data);

        return redirect()->back()->withInput()->with('success', 'Bình luận của bạn đã được gửi.');
    }

    public function reply(Request $request, CommentService $commentService)
    {
        $data = [
            'user_id' => Auth::id(),
            'comment_id' => $request->comment_id,
            'rep_content' => $request->rep_content,
            'product_id' => $request->comment_product_id,
            'content' => $request->comment_content, // Ensure content is included
            'rate' => $request->comment_rate,
            'file_id' => $request->file_id, // Ensure file_id is included
            'user_name' => $request->comment_user_name,
            'created_at' => $request->comment_created_at,
        ];

        $commentService->storeReply($data);

        return redirect()->back()->with('success', 'Phản hồi của bạn đã được gửi.');
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
