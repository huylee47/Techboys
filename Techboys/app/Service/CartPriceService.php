<?php
namespace App\Service;

use App\Models\Promotion;
use App\Service\VoucherService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartPriceService
{
    protected $voucherService;

    public function __construct(VoucherService $voucherService)
    {
        $this->voucherService = $voucherService;
    }

    /**
     * 
     *
     * @param \Illuminate\Support\Collection $cartItems
     * @return array
     */
    public function calculateCartTotals($cartItems)
    {
        $subtotal = 0;
    
        foreach ($cartItems as $cart) {
            $promotion = Promotion::where('product_id', $cart->product_id)->first();
            if ($promotion && now()->lt(Carbon::parse($promotion->end_date))) {
                $cart->discounted_price = $cart->discounted_price  * (1 - $promotion->discount_percent / 100);
            } else {
                $cart->discounted_price ;
            }
    
            $subtotal += $cart->discounted_price * $cart->quantity;
        }
    
        $total = $subtotal;
        $discountAmount = 0;
        $voucher = null;
        
        if (Session::has('voucher')) {
            $voucherData = Session::get('voucher');
            $voucherResult = $this->voucherService->applyVoucher($voucherData['code'], $subtotal);
    
            if ($voucherResult['valid']) {
                $voucher = $voucherResult['voucher'];
                $discountAmount = $voucherResult['discountAmount'];
                $total = $voucherResult['newTotal'];
            } else {
                Session::forget('voucher');
            }
        }
    
        return [
            'subtotal' => $subtotal,
            'total' => $total,
            'discountAmount' => $discountAmount,
            'voucher' => $voucher,
        ];
    }
    

    /**
     * 
     *
     * @param string $voucherCode
     * @param float $subtotal
     * @return array
     */
    public function applyVoucherToCart($voucherCode, $subtotal)
    {
        $voucherResult = $this->voucherService->applyVoucher($voucherCode, $subtotal);

        if ($voucherResult['valid']) {
            Session::put('voucher', [
                'code' => $voucherCode,
                'discount_amount' => $voucherResult['discountAmount'],
                'total_after_discount' => $voucherResult['newTotal'],
            ]);
        } else {
            Session::forget('voucher');
        }

        return $voucherResult;
    }
}