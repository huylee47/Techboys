<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Bill; // Đảm bảo import Model Bill của bạn
use Carbon\Carbon;   // Import thư viện xử lý thời gian Carbon
use Illuminate\Support\Facades\Log; // Import Facade Log để ghi log

class AutoConfirmDeliveredBills extends Command
{
    /**
     * Tên chữ ký của command (dùng để gọi từ terminal hoặc scheduler).
     * Ví dụ: php artisan bills:autoconfirm
     * @var string
     */
    protected $signature = 'bills:autoconfirm'; // Đặt tên gợi nhớ

    /**
     * Mô tả chức năng của command (hiển thị khi chạy php artisan list).
     * @var string
     */
    protected $description = 'Tự động chuyển trạng thái hóa đơn từ Đã giao (3) sang Đã nhận hàng (4) sau 3 ngày';

    /**
     * Phương thức thực thi logic chính của command.
     * Sẽ được gọi khi chạy `php artisan bills:autoconfirm` hoặc khi Scheduler kích hoạt.
     */
    public function handle()
    {
        $this->info('Bắt đầu quá trình tự động xác nhận hóa đơn...'); // Thông báo ra console khi chạy thủ công

        // 1. Xác định mốc thời gian cắt (cutoff): Hiện tại trừ đi 3 ngày
        // $cutoffDate = Carbon::now()->subDays(3);
        // $cutoffDate = Carbon::now()->subHours(1);
        // $cutoffDate = Carbon::now()->subMinutes(15);
        $cutoffDate = Carbon::now()->subSeconds(20);
        $this->line("Mốc thời gian cắt (3 ngày trước): " . $cutoffDate->toDateTimeString()); // Hiển thị mốc thời gian

        // 2. Truy vấn các hóa đơn đủ điều kiện:
        //    - Trạng thái hiện tại là "Đã giao" (status_id = 3)
        //    - Thời gian cập nhật cuối cùng (updated_at) là từ 3 ngày trước trở về trước.
        //      LƯU Ý QUAN TRỌNG: Giả định rằng 'updated_at' được cập nhật khi trạng thái chuyển thành 3.
        //      Nếu có các cập nhật khác sau khi giao hàng, 'updated_at' sẽ thay đổi -> logic sai.
        //      Để chính xác tuyệt đối, nên thêm cột 'delivered_at' (timestamp) và cập nhật cột này
        //      khi status_id = 3, sau đó truy vấn dựa trên 'delivered_at'.
        //      Ở đây, chúng ta tạm dùng 'updated_at' để không cần sửa đổi CSDL.
        $billsToUpdate = Bill::where('status_id', 3)
            ->where('updated_at', '<=', $cutoffDate)
            ->get(); // Lấy danh sách các hóa đơn thỏa mãn

        // 3. Kiểm tra xem có hóa đơn nào cần cập nhật không
        if ($billsToUpdate->isEmpty()) {
            $this->info('Không tìm thấy hóa đơn nào cần tự động xác nhận.');
            Log::info('Chạy AutoConfirmDeliveredBills: Không có hóa đơn nào cần cập nhật.'); // Ghi log
            return 0; // Kết thúc command thành công (mã 0)
        }

        $this->info("Tìm thấy " . $billsToUpdate->count() . " hóa đơn cần cập nhật.");

        $updatedCount = 0; // Biến đếm số lượng hóa đơn đã cập nhật thành công

        // 4. Duyệt qua từng hóa đơn và cập nhật
        foreach ($billsToUpdate as $bill) {
            $this->line("Đang xử lý hóa đơn ID: {$bill->id}, Order ID: {$bill->order_id}");
            try {
                // Cập nhật trạng thái sang "Đã nhận hàng" (status_id = 4)
                $bill->status_id = 4;

                // Cập nhật trạng thái thanh toán thành "Đã thanh toán" (payment_status = 1)
                // Giống như logic khi khách hàng tự bấm xác nhận
                $bill->payment_status = 1;

                // Lưu thay đổi vào cơ sở dữ liệu
                $bill->save();

                $updatedCount++;
                $this->info("-> Đã cập nhật hóa đơn ID = {$bill->id} thành trạng thái = 4.");
                Log::info("AutoConfirmDeliveredBills: Đã tự động cập nhật hóa đơn ID {$bill->id} (Order ID: {$bill->order_id}) sang trạng thái 4.");
            } catch (\Exception $e) {
                // Nếu có lỗi xảy ra khi cập nhật (ví dụ: lỗi CSDL)
                $this->error("-> Lỗi khi cập nhật hóa đơn ID: {$bill->id}. Lỗi: " . $e->getMessage());
                Log::error("AutoConfirmDeliveredBills: Lỗi khi cập nhật hóa đơn ID {$bill->id} (Order ID: {$bill->order_id}): " . $e->getMessage());
            }
        }

        // 5. Thông báo kết quả cuối cùng
        $this->info("Hoàn tất quá trình. Đã tự động xác nhận thành công {$updatedCount} hóa đơn.");
        return 0; // Kết thúc command thành công
    }
}
