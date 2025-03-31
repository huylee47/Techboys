<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;


class CountVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $now = Carbon::now();
        $ip = $request->ip();
        $todayKey = 'daily_visitors_' . $now->format('Y_m_d');
        $monthKey = 'monthly_visitors_' . $now->format('Y_m');

        $ipKey = 'visited_ip_' . $ip . '_' . $now->format('Y_m_d');

        if (!Redis::exists($ipKey)) {

            Redis::incr($todayKey);
            Redis::incr($monthKey);

            Redis::setex($ipKey, 86400, true);
        }

        return $next($request);
    }
}
