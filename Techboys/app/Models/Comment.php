<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['user_id', 'product_id', 'content', 'rate', 'file_id', 'status_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function storage() {
        return $this->belongsTo(Storage::class, 'file_id');
    }

    public function replies() {
        return $this->hasMany(RepComment::class, 'comment_id');
    }
}
