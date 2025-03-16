<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['user_id', 'product_id', 'content', 'rate', 'file_id', 'status_id'];

    public function User() {
        return $this->belongsTo(User::class);
    }
    public function Product() {
        return $this->belongsTo(Product::class);
    }
    public function storage() {
        return $this->belongsTo(Storage::class, 'file_id');
    }

}
