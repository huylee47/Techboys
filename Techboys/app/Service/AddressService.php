<?php
namespace App\Service;

use App\Models\DistrictGHN;
use App\Models\ProvinceGHN;
use App\Models\WardGHN;

class AddressService
{
    public function getProvinces()
    {   
        $specialCities = [
            'Hà Nội' => 1,
            'Hồ Chí Minh' => 2,
            'Hải Phòng' => 3,
            'Đà Nẵng' => 4,
            'Huế' => 5,
            'Cần Thơ' => 6,
        ];
    
        return ProvinceGHN::orderByRaw(
            "CASE 
                WHEN name = 'Hà Nội' THEN 1
                WHEN name = 'Hồ Chí Minh' THEN 2
                WHEN name = 'Hải Phòng' THEN 3
                WHEN name = 'Đà Nẵng' THEN 4
                WHEN name = 'Huế' THEN 5
                WHEN name = 'Cần Thơ' THEN 6
                ELSE 7
            END, 
            name ASC"
        )->get();
    }
    
    
    
    

    public function getDistricts($province_id)
    {
        $districts = DistrictGHN::where('province_id', $province_id)
                             ->orderBy('name', 'ASC') 
                             ->get();
        return response()->json($districts);
    }
    
    public function getWards($district_id)
    {
        $wards = WardGHN::where('district_id', $district_id)
                     ->orderBy('name', 'ASC')  // Sắp xếp theo tên
                     ->get();
        return response()->json($wards);
    }
    
}
