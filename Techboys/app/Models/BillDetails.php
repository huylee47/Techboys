<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetails extends Model
{
    use HasFactory;
    protected $table = 'bill_details';
    protected $fillable = ['bill_id', 'product_id','variant_id', 'quantity', 'price','slug'];

    public function bill(){
        return $this->belongsTo(Bill::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function variant(){
        return $this->belongsTo(ProductVariant::class);
    }
}
