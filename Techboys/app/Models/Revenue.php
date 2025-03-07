<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Revenue extends Model
{
    protected $table = 'bills'; 

    protected $fillable = [
        'user_id',
        'full_name',
        'phone',
        'total',
        'address',
        'province_id',
        'district_id',
        'ward_id',
        'email',
        'payment_method',
        'payment_status',
        'status_id'  
    ];

public static function revenueToday()
{
    return self::whereDate('created_at', Carbon::today())
        ->where('status_id', 3)
        ->sum('total');
}

public static function revenueWeek()
{
    return self::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])
        ->where('status_id', 3)
        ->sum('total');
}

public static function revenueMonth()
{
    return self::whereMonth('created_at', Carbon::now()->month)
        ->where('status_id', 3)
        ->sum('total');
}

public static function revenueQuarter()
{
    return self::whereBetween('created_at', [
            Carbon::now()->startOfQuarter(),
            Carbon::now()->endOfQuarter()
        ])
        ->where('status_id', 3)
        ->sum('total');
}

public function getFormattedTotalAttribute()
{
    return number_format($this->total, 0, ',', '.') . ' VNĐ';
}

}
