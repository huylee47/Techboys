<?php
namespace App\Service;

use App\Service\VoucherService;
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
        $subtotal = $cartItems->sum(fn($cart) => $cart->variant->price * $cart->quantity);
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