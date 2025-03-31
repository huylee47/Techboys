<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status_id', 'discount_percent', 'product_id', 'start_date','end_date'];

    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'promotion_product', 'promotion_id', 'product_id');
    }
}
