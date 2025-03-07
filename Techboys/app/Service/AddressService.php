<?php
namespace App\Service;

use Kjmtrue\VietnamZone\Models\Province;
use Kjmtrue\VietnamZone\Models\District;
use Kjmtrue\VietnamZone\Models\Ward;

class AddressService
{
    public function getProvinces()
    {   
        // filter City by id and Province by name
        return Province::orderByRaw("
            CASE 
                WHEN name LIKE 'Thành phố%' THEN 1 
                ELSE 2 
            END, 
            CASE 
                WHEN name LIKE 'Thành phố%' THEN id 
                ELSE NULL 
            END ASC,
            name ASC
        ")->get();
    }
    
    

    public function getDistricts($province_id)
    {
        $districts = District::where('province_id', $province_id)->get();
        return response()->json($districts);
    }

    public function getWards($district_id)
    {
        $wards = Ward::where('district_id', $district_id)->get();
        return response()->json($wards);
    }
}
