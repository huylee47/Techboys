<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = ['user_id','cart_id','variant_id','product_id', 'quantity'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    // public function cartDetails(){
    //     return $this->hasMany(CartDetail::class);
    // }
    public function variant(){
        return $this->belongsTo(ProductVariant::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function getStockAttribute()
{
    return $this->variant ? $this->variant->stock : $this->product->base_stock;
}
public function getDiscountedPriceAttribute()
{
    return $this->variant ? $this->variant->discounted_price : $this->product->discounted_price;
}



}
