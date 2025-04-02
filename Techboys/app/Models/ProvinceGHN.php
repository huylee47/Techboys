<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ProvinceGHN extends Model
{
    use HasFactory;
    protected $table = 'province_ghns';
    protected $primaryKey = 'province_id'; 
    public $incrementing = false; 
    protected $fillable = ['province_id', 'name'];

    public function districts()
    {
        return $this->hasMany(DistrictGHN::class, 'province_id', 'province_id');
    }
}

