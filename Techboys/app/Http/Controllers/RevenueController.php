<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
class RevenueController extends Controller
{
    public function index(){

        $revenueDay = Bill::whereDate('created_at', Carbon::today())
        ->where('payment_status', 1)
        ->where('status_id', 4)
        ->sum('total');
    
    $revenueWeek = Bill::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])
        ->where('payment_status', 1)
        ->where('status_id', 4)
        ->sum('total');
    
    $revenueMonth = Bill::whereMonth('created_at', Carbon::now()->month)
        ->where('payment_status', 1)
        ->where('status_id', 4)
        ->sum('total');
    
    $revenueQuarter = Bill::whereBetween('created_at', [
            Carbon::now()->startOfQuarter(),
            Carbon::now()->endOfQuarter()
        ])
        ->where('payment_status', 1)
        ->where('status_id', 4)
        ->sum('total');
    

        $successfulOrders = Bill::where('payment_status', 1)->count();

        $cancelledOrders = Bill::where('status_id', 0)->count();

        $monthlyRevenue = Bill::selectRaw('MONTH(created_at) as month, SUM(total) as revenue')
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('revenue', 'month');

        $bestSellingProducts = BillDetails::select('product_id')
        ->selectRaw('SUM(quantity) as total_sold')
        ->groupBy('product_id')
        ->orderByDesc('total_sold')
        ->take(10) 
        ->get();
    $products = Product::whereIn('id', $bestSellingProducts->pluck('product_id'))
        ->get()
        ->keyBy('id');
        $billShipping  = Bill::where('status_id',2)->count();
        $billPending = Bill::where('status_id',1)->count();
    
        return view('admin.revenue.revenue', compact(
            'revenueDay', 'revenueWeek', 'revenueMonth', 'revenueQuarter',
            'successfulOrders', 'cancelledOrders','monthlyRevenue','bestSellingProducts', 'products','billShipping','billPending'
        ));
    }
    public function filterRevenue(Request $request)
{
    $startDate = Carbon::parse($request->start_date)->startOfDay();
    $endDate = Carbon::parse($request->end_date)->endOfDay();

    $filteredRevenue = Bill::whereBetween('created_at', [$startDate, $endDate])
    ->where('payment_status', 1)
    ->selectRaw('DATE(created_at) as date, SUM(total) as revenue')
    ->groupBy('date')
    ->orderBy('date')
    ->pluck('revenue', 'date');

    $totalRevenue = $filteredRevenue->sum();
    $maxRevenueDay = $filteredRevenue->isEmpty() ? null : $filteredRevenue->keys()->last();
    $maxRevenueValue = $filteredRevenue->isEmpty() ? 0 : $filteredRevenue->max();

    $daysCount = $startDate->diffInDays($endDate);
    $averageRevenuePerDay = $daysCount > 0 ? $totalRevenue / $daysCount : 0;

    return response()->json([
        'revenue_by_date' => $filteredRevenue,
        'total_revenue' => $totalRevenue,
        'max_revenue_day' => $maxRevenueDay,
        'max_revenue_value' => $maxRevenueValue,
        'average_revenue_per_day' => $averageRevenuePerDay
    ]);
}
}
