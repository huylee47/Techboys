<?php

namespace App\Service;

use App\Models\Voucher;

class VoucherService{
    public function checkVoucher($voucherCode , $carTotal){
        $voucher = Voucher::where('code', $voucherCode)->first();
    if(!$voucher){
        return ['valid' => false, 'message' => "Voucher không tồn tại"];
    }
    if ($voucher->end_date < date('Y-m-d')) {
        return ['valid' => false, 'message' => "Voucher đã quá hạn"];
    }
    if ($voucher->start_date > date('Y-m-d')) {
        return ['valid' => false, 'message' => "Voucher chưa đến ngày áp dụng"];
    }
    if ($voucher->quantity <= 0) {
        return ['valid' => false, 'message' => "Voucher đã hết lượt sử dụng"];
    }
    if ($voucher->min_price > $carTotal) {
        return ['valid' => false, 'message' => "Hoá đơn chưa đạt giá trị tối thiểu( tối thiểu : " . number_format($voucher->min_price , 0, ',', '.') . "đ)"];
    }
    return [
        'valid' => true,
        'message' => "Áp Voucher thành công ",
        'voucher' => $voucher
    ];
    }

    public function applyVoucher($voucherCode, $cartTotal) {
        
        $voucherCheck = $this->checkVoucher($voucherCode, $cartTotal);
        if (!$voucherCheck['valid']) {
            return $voucherCheck;
        }
    
        $voucher = $voucherCheck['voucher'];
        $discountAmount = 0;
    
        if ($voucher->discount_percent > 0) {
            $discountAmount = ($voucher->discount_percent / 100) * $cartTotal;
    
            if (!empty($voucher->max_discount) && $voucher->max_discount > 0) {
                $discountAmount = min($discountAmount, $voucher->max_discount);
            }
        } 
        elseif (!empty($voucher->discount_amount) && $voucher->discount_amount > 0) {
            $discountAmount = $voucher->discount_amount;
        }
    
        $newTotal = max($cartTotal - $discountAmount, 0);
    
        $voucher->decrement('quantity');
    
        return [
            'valid' => true,
            'message' => "Áp dụng voucher $voucher->name thành công!",
            'newTotal' => $newTotal,
            'discountAmount' => $discountAmount,
            'voucher' => $voucher
        ];
    }
    
}