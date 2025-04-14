<?php

namespace App\Jobs;

use App\Models\Bill;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class UpdateDeliveredOrdersStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $orders = Bill::where('status_id', 3)
            ->where('updated_at', '<=', Carbon::now()->subDays(3))
            ->get();

        foreach ($orders as $order) {
            $order->update([
                'status_id' => 4, 
                'payment_status' => 1 
            ]);
        }
    }
}
