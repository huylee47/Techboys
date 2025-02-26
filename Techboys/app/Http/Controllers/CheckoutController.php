<?php

namespace App\Http\Controllers;

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
    public function storeBill(Request $request){
        // dd($request->all());
        return $this->checkoutService->storeBill($request);
    }
    
}
