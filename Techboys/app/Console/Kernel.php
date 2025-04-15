<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Các Artisan command được cung cấp bởi ứng dụng của bạn.
     *
     * Đảm bảo các command của bạn được đăng ký ở đây nếu chúng không được tự động load,
     * thông thường thì không cần thêm thủ công nếu bạn đặt chúng trong App\Console\Commands
     * và phương thức commands() bên dưới có dòng $this->load(...).
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\AutoConfirmDeliveredBills::class,
        \App\Console\Commands\PruneOldGuestCarts::class,
        // Thêm các command khác nếu có
    ];

    /**
     * Định nghĩa lịch trình chạy command của ứng dụng.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly(); // Command ví dụ của Laravel

        // ----- TASK 1: Tự động xác nhận hóa đơn đã giao sau X thời gian -----

        // **Lựa chọn 1: Lịch trình để TEST (chạy mỗi phút)**
        // -> Bỏ comment dòng này VÀ comment dòng ->daily() bên dưới nếu bạn muốn test thường xuyên.
        // -> Đồng thời, bạn cần chỉnh logic trong AutoConfirmDeliveredBills.php thành subSeconds() hoặc subMinutes().
        // $schedule->command('bills:autoconfirm')->everyMinute()->withoutOverlapping();

        // **Lựa chọn 2: Lịch trình chạy hàng ngày (cho hoạt động bình thường)**
        // -> Sử dụng lịch trình này khi logic trong AutoConfirmDeliveredBills.php là subDays(3).
        // -> withoutOverlapping() để đảm bảo lệnh không chạy chồng chéo nếu kéo dài hơn 1 ngày (hiếm khi xảy ra với daily).
        $schedule->command('bills:autoconfirm')->daily()->withoutOverlapping();


        // ----- TASK 2: Xóa giỏ hàng cũ (quá 7 ngày) của khách -----

        // Chạy command xóa giỏ hàng khách cũ vào một thời điểm ít tải trong ngày, ví dụ 3:00 sáng.
        $schedule->command('carts:prune-guests')->dailyAt('03:00');

        // Hoặc đơn giản là chạy hàng ngày vào nửa đêm (00:00)
        // $schedule->command('carts:prune-guests')->daily();
    }

    /**
     * Đăng ký các command cho ứng dụng.
     *
     * @return void
     */
    protected function commands(): void
    {
        // Tự động load các command từ thư mục app/Console/Commands
        $this->load(__DIR__ . '/Commands');

        // Load các command được định nghĩa trong file routes/console.php
        require base_path('routes/console.php');
    }
}
