<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills';

    protected $fillable = ['user_id', 'full_name', 'phone', 'total', 'address', 'email', 'payment_method', 'status_id', 'voucher_code'];  // Thêm voucher_code vào

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function voucher_code()
    {
        return $this->belongsTo(Voucher::class, 'voucher_code', 'Id'); // Chỉnh sửa tên cột là 'voucher_code'
    }
}
