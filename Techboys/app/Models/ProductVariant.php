<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_variants';
    protected $appends = ['discounted_price'];

    protected $fillable = ['product_id', 'color_id', 'price', 'stock','model_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function billDetails(){
        return $this->hasMany(BillDetails::class);
    }  
    public function cart(){
        return $this->hasMany(Cart::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function model(){
        return $this->belongsTo(ProductModel::class);
    }
    public function getDiscountedPriceAttribute()
    {
        $promotion = $this->product->promotion;
    
        if ($promotion && Carbon::now()->lt(Carbon::parse($promotion->end_date))) {
            return $this->price * (1 - $promotion->discount_percent / 100);
        }
        return $this->price;
    }

}
