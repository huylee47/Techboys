<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\ProvinceGHN;
use App\Models\DistrictGHN;
use App\Models\WardGHN;

class CrawlGHNData extends Command
{
    protected $signature = 'ghn:crawl';
    protected $description = 'Crawl địa giới hành chính của GHN và lưu vào database';
    private $ghnApi = 'https://dev-online-gateway.ghn.vn/shiip/public-api/';
    private $token = 'efbd95a6-0e9a-11f0-9f28-eacfdef119b3';

    public function handle()
    {
        $this->info("Bắt đầu crawl dữ liệu từ GHN...");

        // Crawl tỉnh/thành phố
        $provinces = Http::withHeaders(['Token' => $this->token])
            ->get($this->ghnApi . 'master-data/province')
            ->json()['data'] ?? [];

        foreach ($provinces as $province) {
            ProvinceGHN::updateOrCreate(
                ['province_id' => $province['ProvinceID']],
                ['name' => $province['ProvinceName']]
            );
        }

        // Crawl quận/huyện
        $districts = Http::withHeaders(['Token' => $this->token])
            ->get($this->ghnApi . 'master-data/district')
            ->json()['data'] ?? [];

        foreach ($districts as $district) {
            // Lưu trực tiếp quận/huyện vào cơ sở dữ liệu mà không kiểm tra sự tồn tại của tỉnh
            DistrictGHN::updateOrCreate(
                ['district_id' => $district['DistrictID']],
                [
                    'name' => $district['DistrictName'],
                    'code' => $district['Code'] ?? null,
                    'province_id' => $district['ProvinceID'] // Dữ liệu sẽ được lưu dù tỉnh có tồn tại hay không
                ]
            );
        }

        // Crawl phường/xã cho từng quận/huyện
        foreach ($districts as $district) {
            $districtId = $district['DistrictID'];
            $wards = Http::withHeaders(['Token' => $this->token])
                ->post($this->ghnApi . 'master-data/ward', [
                    'district_id' => $districtId
                ])
                ->json()['data'] ?? [];

            if (empty($wards)) {
                $this->warn("Không có dữ liệu phường/xã cho district_id: {$districtId}");
            }

            foreach ($wards as $ward) {
                // Kiểm tra nếu WardCode và DistrictID không rỗng hoặc null
                if (isset($ward['WardCode'], $ward['DistrictID'])) {
                    WardGHN::updateOrCreate(
                        ['code' => $ward['WardCode']],
                        [
                            'name' => $ward['WardName'],
                            'district_id' => $ward['DistrictID']
                        ]
                    );
                } else {
                    $this->warn("⚠️ Dữ liệu phường/xã không hợp lệ: WardCode hoặc DistrictID không có.");
                }
            }
        }

        $this->info("Crawl dữ liệu GHN thành công!");
    }
}
