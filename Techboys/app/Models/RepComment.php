<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepComment extends Model
{
    use HasFactory;
    protected $table = 'rep_comment'; // Update table name
    protected $fillable = ['user_id', 'product_id', 'content', 'rate', 'file_id', 'rep_content', 'comment_id'];

    public function comment() {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

  
}
