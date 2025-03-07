<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use Illuminate\Http\Request;
use Carbon\Carbon;
class RevenueController extends Controller
{
    public function index(){

        $revenueDay = Revenue::whereDate('created_at', Carbon::today())
         ->where('payment_status', 1) // Chỉ tính đơn đã thanh toán
         ->sum('total');

        $revenueWeek = Revenue::whereBetween('created_at', [
             Carbon::now()->startOfWeek(),
             Carbon::now()->endOfWeek()
         ])
         ->where('payment_status', 1)
         ->sum('total');

        $revenueMonth = Revenue::whereMonth('created_at', Carbon::now()->month)
        ->where('payment_status', 1)
        ->sum('total');

        $revenueQuarter = Revenue::whereBetween('created_at', [
             Carbon::now()->startOfQuarter(),
             Carbon::now()->endOfQuarter()
         ])
         ->where('payment_status', 1)
         ->sum('total');

        $successfulOrders = Revenue::where('payment_status', 1)->count();

        $cancelledOrders = Revenue::where('status_id', 0)->count();

        $monthlyRevenue = Revenue::selectRaw('MONTH(created_at) as month, SUM(total) as revenue')
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('revenue', 'month');

    
        return view('admin.revenue.revenue', compact(
            'revenueDay', 'revenueWeek', 'revenueMonth', 'revenueQuarter',
            'successfulOrders', 'cancelledOrders','monthlyRevenue'
        ));
    }
    public function filterRevenue(Request $request)
{
    $startDate = Carbon::parse($request->start_date)->startOfDay();
    $endDate = Carbon::parse($request->end_date)->endOfDay();

    $filteredRevenue = Revenue::whereBetween('created_at', [$startDate, $endDate])
        ->selectRaw('DATE(created_at) as date, SUM(total) as revenue')
        ->groupBy('date')
        ->orderBy('date')
        ->pluck('revenue', 'date');

    return response()->json($filteredRevenue);
}
}
