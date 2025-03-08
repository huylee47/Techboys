<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Storage;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'rate' => 'required|numeric|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::check() ? Auth::id() : null;
        $comment->product_id = $request->product_id;
        $comment->content = $request->comment;
        $comment->rate = $request->rate;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('admin/assets/images/comment'), $imageName);

            $storage = new Storage();
            $storage->file = $imageName;
            $storage->save();

            $comment->file_id = $storage->id;
        } else {
            $comment->file_id = null;
        }

        $comment->save();

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
