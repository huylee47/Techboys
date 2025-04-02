<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictGHN extends Model
{
    use HasFactory;
    protected $table = 'district_ghns';
    protected $primaryKey = 'district_id';
    public $incrementing = false;
    protected $fillable = ['district_id', 'name', 'code', 'province_id'];

    public function province()
    {
        return $this->belongsTo(ProvinceGHN::class, 'province_id', 'province_id');
    }

    public function wards()
    {
        return $this->hasMany(WardGHN::class, 'district_id', 'district_id');
    }
}

