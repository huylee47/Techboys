<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Bill; 
use Carbon\Carbon;   
use Illuminate\Support\Facades\Log; 

class AutoConfirmDeliveredBills extends Command
{
    /**
     * php artisan bills:autoconfirm
     * @var string
     */
    protected $signature = 'bills:autoconfirm';

    protected $description = 'Tự động chuyển trạng thái hóa đơn từ Đã giao (3) sang Đã nhận hàng (4) sau 3 ngày';
    public function handle()
    {
        $this->info('Bắt đầu quá trình tự động xác nhận hóa đơn...'); // Thông báo ra console khi chạy thủ công

        // 1. Xác định mốc thời gian cắt (cutoff): Hiện tại trừ đi 3 ngày
        // $cutoffDate = Carbon::now()->subDays(3);
        // $cutoffDate = Carbon::now()->subHours(1);
        // $cutoffDate = Carbon::now()->subMinutes(15);
        $cutoffDate = Carbon::now()->subSeconds(20);
        $this->line("Mốc thời gian cắt (3 ngày trước): " . $cutoffDate->toDateTimeString()); // Hiển thị mốc thời gian

        $billsToUpdate = Bill::where('status_id', 3)
            ->where('updated_at', '<=', $cutoffDate)
            ->get(); 

        if ($billsToUpdate->isEmpty()) {
            $this->info('Không tìm thấy hóa đơn nào cần tự động xác nhận.');
            Log::info('Chạy AutoConfirmDeliveredBills: Không có hóa đơn nào cần cập nhật.'); // Ghi log
            return 0; 
        }

        $this->info("Tìm thấy " . $billsToUpdate->count() . " hóa đơn cần cập nhật.");

        $updatedCount = 0; 

        foreach ($billsToUpdate as $bill) {
            $this->line("Đang xử lý hóa đơn ID: {$bill->id}, Order ID: {$bill->order_id}");
            try {
                $bill->status_id = 4;

                // $bill->payment_status = 1;

                $bill->save();

                $updatedCount++;
                $this->info("-> Đã cập nhật hóa đơn ID = {$bill->id} thành trạng thái = 4.");
                Log::info("AutoConfirmDeliveredBills: Đã tự động cập nhật hóa đơn ID {$bill->id} (Order ID: {$bill->order_id}) sang trạng thái 4.");
            } catch (\Exception $e) {
                $this->error("-> Lỗi khi cập nhật hóa đơn ID: {$bill->id}. Lỗi: " . $e->getMessage());
                Log::error("AutoConfirmDeliveredBills: Lỗi khi cập nhật hóa đơn ID {$bill->id} (Order ID: {$bill->order_id}): " . $e->getMessage());
            }
        }

        $this->info("Hoàn tất quá trình. Đã tự động xác nhận thành công {$updatedCount} hóa đơn.");
        return 0; 
    }
}
