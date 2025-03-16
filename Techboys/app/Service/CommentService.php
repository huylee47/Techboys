<?php

namespace App\Service;

use App\Models\Comment;

class CommentService
{
    public function storeComment($data)
    {
        $comment = new Comment();
        $comment->user_id = $data['user_id'];
        $comment->product_id = $data['product_id'];
        $comment->content = $data['content'];
        $comment->rate = $data['rate'];
        $comment->file_id = $data['file_id'] ?? null;
        $comment->save();

        return $comment;
    }
}