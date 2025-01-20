<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $table = 'cart_details';
    protected $fillable = ['cart_id', 'variant_id', 'quantity'];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }
    public function variant(){
        return $this->belongsTo(ProductVariant::class);
    }
}
