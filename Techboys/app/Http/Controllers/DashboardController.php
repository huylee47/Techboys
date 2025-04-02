<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\Redis;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $latestComments = Comment::latest()->take(5)->get()->map(function ($comment) {
            return [
                'user' => User::find($comment->user_id),
                'product' => Product::find($comment->product_id),
                'content' => $comment->content
            ];
        });
    
        $now = now();
    
        $onlineUsers = Cache::get('online-users', []);
        $onlineUsers = array_filter($onlineUsers, function ($expiresAt) use ($now) {
            return $expiresAt > $now;
        });
    
        $registeredUsersQuarter = User::where('role_id', 2)
        ->whereBetween('created_at', [
            $now->copy()->startOfQuarter()->format('Y-m-d H:i:s'),
            $now->copy()->endOfQuarter()->format('Y-m-d H:i:s')
        ])
        ->count();
    
            // dd($registeredUsersQuarter);
            $registeredUsersMonth = User::where('role_id', 2)
            ->whereBetween('created_at', [
                $now->copy()->startOfMonth()->format('Y-m-d H:i:s'),
                $now->copy()->endOfMonth()->format('Y-m-d H:i:s')
            ])
            ->count();
        
        
    
        $todayKey = 'daily_visitors_' . $now->format('Y_m_d');
        $currentMonthKey = 'monthly_visitors_' . $now->format('Y_m');
        $lastMonthKey = 'monthly_visitors_' . $now->subMonth()->format('Y_m');
        
        $visitorsToday = Redis::get($todayKey) ?? 0;
        $visitorsThisMonth = Redis::get($currentMonthKey) ?? 0;
        $visitorsLastMonth = Redis::get($lastMonthKey) ?? 0;
    
        $visitorGrowthPercentage = 0;
        if ($visitorsLastMonth > 0) {
            $visitorGrowthPercentage = (($visitorsThisMonth - $visitorsLastMonth) / $visitorsLastMonth) * 100;
        }
        $recentBills = Bill::orderBy('created_at', 'desc')->take(10)->get();
        
        return view('admin.dashboard.index', [
            'onlineUsers' => count($onlineUsers),
            'registeredUsersQuarter' => $registeredUsersQuarter,
            'registeredUsersMonth' => $registeredUsersMonth,
            'latestComments' => $latestComments,
            'visitorsThisMonth' => $visitorsThisMonth,
            'visitorsToday' => $visitorsToday,
            'visitorsLastMonth' => $visitorsLastMonth,
            'visitorGrowthPercentage' => round($visitorGrowthPercentage, 2),
            'user' => $user,
            'recentBills' => $recentBills,
            'now' => $now
        ]);
    }
}
