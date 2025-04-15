<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\AutoConfirmDeliveredBills;
use App\Console\Commands\PruneOldGuestCarts;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


// Task 1: Tự động xác nhận hóa đơn đã giao
// Schedule::command(AutoConfirmDeliveredBills::class)
//     ->daily()
//     ->withoutOverlapping();

// Task 2: Xóa giỏ hàng cũ của khách
// Schedule::command(PruneOldGuestCarts::class)
//     ->dailyAt('03:00');

// Ví dụ test, chạy mỗi phút
Schedule::command(AutoConfirmDeliveredBills::class)->everyMinute()->withoutOverlapping();
Schedule::command(PruneOldGuestCarts::class)->everyMinute();