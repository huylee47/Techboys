<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kjmtrue\VietnamZone\Models\District;
use Kjmtrue\VietnamZone\Models\Province;
use Kjmtrue\VietnamZone\Models\Ward;
use Carbon\Carbon;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills';

    protected $fillable = ['order_id','user_id',
     'full_name',
      'phone', 
      'total', 
      'address', 
      'email', 
      'payment_method',
      'payment_status', 
      'status_id',
      'province_id', 
      'district_id', 
      'ward_id',
        'note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }

    public function billDetails()
    {
        return $this->hasMany(BillDetails::class, 'bill_id');
    }
}
