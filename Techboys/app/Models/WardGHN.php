<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WardGHN extends Model
{
    use HasFactory;
    protected $table = 'ward_ghns';
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $fillable = ['code', 'name', 'district_id'];

    public function district()
    {
        return $this->belongsTo(DistrictGHN::class, 'district_id', 'district_id');
    }
}

