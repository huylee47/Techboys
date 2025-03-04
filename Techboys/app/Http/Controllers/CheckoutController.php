<?php

namespace App\Http\Controllers;

use App\Http\Requests\checkoutRequest;
use App\Models\Bill;
use App\Service\AddressService;
use App\Service\CheckoutService;
use Illuminate\Http\Request;
use Kjmtrue\VietnamZone\Models\District;
use Kjmtrue\VietnamZone\Models\Ward;

class CheckoutController extends Controller
{
    private $checkoutService;
    private $addressService;
    public function __construct(CheckoutService $checkoutService, AddressService $addressService){
        $this->checkoutService = $checkoutService;
        $this->addressService = $addressService;
    }
    public function index()
    {
        $checkout = $this->checkoutService->getCheckout();
        $provinces = $this->addressService->getProvinces();
        
        if (!$checkout || empty($checkout['cartItems'])) {
            return redirect()->back()->with('error', 'Không có dữ liệu giỏ hàng để thanh toán!');
        }
        return view('client.check-out.check', compact('checkout', 'provinces'));
    }
    
    public function getDistricts($province_id)
    {
        $districts = District::where('province_id', $province_id)->get();
        return response()->json($districts);
    }
    public function getWards($district_id) {
        $wards = Ward::where('district_id', $district_id)->get();
        return response()->json($wards);
    }
    // public function storeBill(Request $request){
    //     // dd($request->all());
    //     return $this->checkoutService->storeBill($request);
    // }
    public function storeBill(checkoutRequest $request)
    {
        $response = $this->checkoutService->storeBill($request);
        $billData = json_decode($response->getContent(), true);
    
        if (!$billData['success']) {
            return redirect()->route('home')->with('error', $billData['message']);
        }
    
        switch ($request->payment_method) {
            case '3':
                // return redirect()->route('home')->with('success', 'Đơn hàng đã đặt thành công!');
                return response()->json(' cod');
            case '2':
                // return redirect()->route('home')->with('success', 'Đơn hàng đã đặt thành công! Vui lòng thanh toán bằng QR Momo.');
                return response()->json(' momo');

            case '1':
                return $this->checkoutService->VNPAY($billData['bill']);
                // return response()->json(' vnpay');

            default:
                return redirect()->route('home')->with('error', 'Phương thức thanh toán không hợp lệ!');
        }
    }
    // public function vnpayCallback(Request $request){
    //     // dd($request->all());
    //     return $this->checkoutService->vnpayCallback($request);
    // }
    public function vnpayCallback(Request $request)
{
    $vnp_HashSecret = "DBZW6GGQT04IJPPQNH2GNHSQJGQQJVMK"; // Secret code VNPAY
    $inputData = $request->all();

    $vnp_SecureHash = $inputData['vnp_SecureHash'] ?? '';

    unset($inputData['vnp_SecureHash']);

    ksort($inputData);

    $hashData = "";
    $i = 0;
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashData .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
    }

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

    if ($secureHash !== $vnp_SecureHash) {
        dd([
            'calculated_hash' => $secureHash,
            'received_hash' => $vnp_SecureHash,
            'data_string' => $hashData
        ]);
    }

    if ($inputData['vnp_ResponseCode'] == '00') {
        $billId = $inputData['vnp_TxnRef'];

        $this->checkoutService->handlePaymentSuccess($billId);
        return view('client.payment.vnpay');
    } else {
        // return redirect()->route('home')->with('error', 'Thanh toán VNPAY thất bại!');
        return response()->json('vnpay_fail');
    }
}

}
