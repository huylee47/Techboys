<?php

namespace App\Service;

use App\Models\Comment;
use App\Models\RepComment;

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

    public function storeReply($data)
    {
        $reply = new RepComment();
        $reply->user_id = $data['user_id'];
        $reply->product_id = $data['product_id'];
        $reply->comment_id = $data['comment_id'];
        $reply->rep_content = $data['rep_content'];
        $reply->content = $data['content']; 
        $reply->rate = $data['rate'];
        $reply->file_id = $data['file_id'] ?? null; 
        $reply->save();

        return $reply;
    }
}