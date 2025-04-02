<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $fillable = ['name', 'brand_id', 'category_id','is_featured', 'base_price','base_stock','purchases', 'img', 'slug', 'rate_average', 'description','weight'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function variant()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    public function image()
    {
        return $this->hasMany(Images::class, 'product_id');
    }

    public function promotion()
    {
        return $this->hasOne(Promotion::class)->where('end_date', '>=', now());
    }



    public function getDiscountedPriceAttribute()
    {
        $promotion = $this->promotion;
        if ($promotion && now()->lt(Carbon::parse($promotion->end_date))) {
            return round($this->base_price * (1 - $promotion->discount_percent / 100), 2);
        }
        return $this->base_price;
    }
    
}
