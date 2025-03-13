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
         ->where('payment_status', 1) // Chỉ tính đơn đã thanh toán
         ->sum('total');

        $revenueWeek = Bill::whereBetween('created_at', [
             Carbon::now()->startOfWeek(),
             Carbon::now()->endOfWeek()
         ])
         ->where('payment_status', 1)
         ->sum('total');

        $revenueMonth = Bill::whereMonth('created_at', Carbon::now()->month)
        ->where('payment_status', 1)
        ->sum('total');

        $revenueQuarter = Bill::whereBetween('created_at', [
             Carbon::now()->startOfQuarter(),
             Carbon::now()->endOfQuarter()
         ])
         ->where('payment_status', 1)
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

    
        return view('admin.revenue.revenue', compact(
            'revenueDay', 'revenueWeek', 'revenueMonth', 'revenueQuarter',
            'successfulOrders', 'cancelledOrders','monthlyRevenue','bestSellingProducts', 'products'
        ));
    }
    public function filterRevenue(Request $request)
{
    $startDate = Carbon::parse($request->start_date)->startOfDay();
    $endDate = Carbon::parse($request->end_date)->endOfDay();

    $filteredRevenue = Bill::whereBetween('created_at', [$startDate, $endDate])
        ->selectRaw('DATE(created_at) as date, SUM( CASE WHEN payment_status = 1 THEN total ELSE 0 END) as revenue')
        ->groupBy('date')
        ->orderBy('date')
        ->pluck('revenue', 'date');

    return response()->json($filteredRevenue);
}
}
