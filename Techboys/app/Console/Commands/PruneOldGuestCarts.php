<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cart; // Import Cart model
use Carbon\Carbon;   // Import Carbon
use Illuminate\Support\Facades\Log; // Import Log

class PruneOldGuestCarts extends Command
{
    /**
     * Tên chữ ký của command.
     *
     * @var string
     */
    protected $signature = 'carts:prune-guests'; // Đặt tên gợi nhớ

    /**
     * Mô tả của command.
     *
     * @var string
     */
    protected $description = 'Xóa các mục trong giỏ hàng của khách đã cũ hơn 7 ngày';

    /**
     * Thực thi command.
     */
    public function handle()
    {
        $this->info('Bắt đầu xóa các giỏ hàng cũ của khách...');

        // 1. Xác định mốc thời gian cắt: 7 ngày trước
        // $cutoffDate = Carbon::now()->subDays(7);
        // $cutoffDate = Carbon::now()->subHours(1);
        // $cutoffDate = Carbon::now()->subMinutes(15);
        $cutoffDate = Carbon::now()->subSeconds(5);
        $this->line("Xóa các mục giỏ hàng của khách được cập nhật lần cuối vào hoặc trước: " . $cutoffDate->toDateTimeString());

        // 2. Thực hiện xóa trực tiếp các bản ghi thỏa mãn điều kiện
        //    - user_id là NULL (giỏ hàng của khách)
        //    - updated_at nhỏ hơn hoặc bằng mốc thời gian cắt
        try {
            // Xác định các bản ghi cần xóa: user_id = 0 hoặc null, và cart_id tồn tại
            $deletedCount = Cart::where(function ($query) {
                $query->where('user_id', 0)
                    ->orWhereNull('user_id');
            })
                ->whereNotNull('cart_id')
                ->where('updated_at', '<=', $cutoffDate)
                ->delete();

            if ($deletedCount > 0) {
                $message = "Đã xóa thành công {$deletedCount} mục giỏ hàng cũ của khách vãng lai.";
                $this->info($message);
                Log::info("PruneOldGuestCarts: " . $message);
            } else {
                $message = "Không tìm thấy mục giỏ hàng nào của khách vãng lai cần xóa.";
                $this->info($message);
                Log::info("PruneOldGuestCarts: " . $message);
            }
        } catch (\Exception $e) {
            $this->error("Lỗi khi xóa giỏ hàng cũ của khách vãng lai: " . $e->getMessage());
            Log::error("PruneOldGuestCarts: Lỗi khi xóa giỏ hàng cũ - " . $e->getMessage());
            return 1; // Trả về mã lỗi
        }

        $this->info('Hoàn tất quá trình xóa giỏ hàng cũ của khách vãng lai.');
        return 0; // Kết thúc thành công
    }
}
