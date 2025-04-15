<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\AutoConfirmDeliveredBills::class,
    ];

    /**
     * Định nghĩa lịch trình chạy command của ứng dụng.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
        // Thêm dòng này: Chạy command 'bills:autoconfirm' hàng ngày
        // $schedule->command('bills:autoconfirm')->daily();

        // Đổi thành (để chạy mỗi phút):
        $schedule->command('bills:autoconfirm')->everyMinute();

        // Hoặc chạy vào một giờ cụ thể hàng ngày (ví dụ: 1 giờ sáng)
        // $schedule->command('bills:autoconfirm')->dailyAt('01:00');
    }

    /**
     * Đăng ký các command cho ứng dụng.
     *
     * @return void
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
