<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = ['image', 'variant_id'];
    
    public function variant(){
        return $this->belongsTo(ProductVariant::class);
    }
}
