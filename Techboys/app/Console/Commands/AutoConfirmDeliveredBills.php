<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Bill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log; // Thêm facade Log

class AutoConfirmDeliveredBills extends Command
{
    /**
     * Tên và chữ ký của command.
     *
     * @var string
     */
    // protected $signature = 'app:auto-confirm-delivered-bills'; // Tên mặc định
    protected $signature = 'bills:autoconfirm'; // Đặt tên ngắn gọn hơn

    /**
     * Mô tả của command.
     *
     * @var string
     */
    protected $description = 'Automatically confirm delivered bills (status 3) to received (status 4) after 3 days';

    /**
     * Thực thi command.
     */
    public function handle()
    {
        $this->info('Starting automatic bill confirmation process...'); // Thông báo bắt đầu

        // Lấy ngày cách đây 3 ngày
        $cutoffDate = Carbon::now()->subDays(3);

        // Tìm các hóa đơn có status_id = 3 (Đã giao)
        // và được cập nhật lần cuối (khi chuyển sang status 3) trước hoặc bằng $cutoffDate
        $billsToUpdate = Bill::where('status_id', 3)
            ->where('updated_at', '<=', $cutoffDate)
            ->get();

        if ($billsToUpdate->isEmpty()) {
            $this->info('No bills found needing automatic confirmation.'); // Thông báo nếu không có bill nào
            return 0; // Kết thúc command thành công
        }

        $updatedCount = 0;
        foreach ($billsToUpdate as $bill) {
            try {
                // Cập nhật status_id thành 4 (Đã nhận hàng)
                // Đồng thời cập nhật payment_status thành 1 (Đã thanh toán) giống như khi khách hàng xác nhận
                $bill->status_id = 4;
                $bill->payment_status = 1;
                $bill->save(); // Lưu thay đổi

                $updatedCount++;
                Log::info("Bill #{$bill->id} (Order ID: {$bill->order_id}) automatically confirmed to status 4."); // Ghi log chi tiết
            } catch (\Exception $e) {
                Log::error("Error updating bill #{$bill->id} (Order ID: {$bill->order_id}): " . $e->getMessage()); // Ghi log lỗi
                $this->error("Error updating bill #{$bill->id}: " . $e->getMessage()); // Hiển thị lỗi ra console
            }
        }

        $this->info("Process finished. Automatically confirmed {$updatedCount} bills."); // Thông báo kết quả
        return 0; // Kết thúc command thành công
    }
}
