<?php

namespace App\Http\Controllers;

use App\Http\Requests\checkoutRequest;
use App\Models\Bill;
use App\Service\AddressService;
use App\Service\CheckoutService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
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
        if ($request->payment_method == 1) {
            return $this->checkoutService->storeTemporaryBill($request);
        }
    
        if ($request->payment_method != 2) {
            return redirect()->route('home')->with('error', 'Phương thức thanh toán không hợp lệ!');
        }
    
        $response = $this->checkoutService->storeBill($request);
        // dd($response);
        $billData = json_decode($response->getContent(), true);
        // dd($billData);
    
        if (!$billData['success']) {
            return redirect()->route('home')->with('error', $billData['message']);
        }
    
        $billcod = $this->checkoutService->COD($billData['bill']);
        // dd($billcod);
        return redirect()->route('client.payment.cod', ['bill_id' => $billData['bill']]);
    }
    

    public function vnpayCallback(Request $request)
    {
        $vnp_HashSecret = "DBZW6GGQT04IJPPQNH2GNHSQJGQQJVMK";
        $inputData = $request->all();
        $vnp_SecureHash = $inputData['vnp_SecureHash'] ?? '';
    
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
    
        $hashData = "";
        $i = 0;
        foreach ($inputData as $key => $value) {
            $hashData .= ($i == 1 ? '&' : '') . urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
    
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        if ($secureHash !== $vnp_SecureHash) {
            return response()->json(['error' => 'Invalid hash'], 400);
        }
    
        $userId = Auth::id();
        $sessionId = session()->getId();
        $redisKey = $userId ? 'temp_bill_' . $userId : 'temp_bill_session_' . $sessionId;
    
        $tempBill = Redis::get($redisKey);
    
        if (!$tempBill) {
            // dd($tempBill);
            dd($redisKey);
            return response()->json(['error' => 'Không tìm thấy đơn hàng tạm thời.'], 400);
        }
    
        $billData = json_decode($tempBill, true);
    
        if ($inputData['vnp_ResponseCode'] == '00') {
            $billData['payment_status'] = 1;
    
            $response = $this->checkoutService->storeBill(new checkoutRequest($billData));
            // dd($response->getContent());
            $newBill = json_decode($response->getContent(), true);
    
            Redis::del($redisKey);
    
            $this->checkoutService->handlePaymentSuccess($newBill['bill_id']);
    
            return view('client.payment.vnpay');
        } else {
            // return $this->checkoutService->handlePaymentFail($billData['id']);
            return view('client.payment.error');
        }
    }
    
    
public function codSuccess(){
    return view('client.payment.cod');
}

}
