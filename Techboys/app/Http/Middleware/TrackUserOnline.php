<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class TrackUserOnline
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $sessionId = session()->getId();
        $expiresAt = now()->addMinutes(5); // Session sẽ hết hạn sau 5 phút

        // Lưu session vào cache
        $onlineUsers = Cache::get('online-users', []);
        $onlineUsers[$sessionId] = $expiresAt;

        Cache::put('online-users', $onlineUsers, $expiresAt);

        return $next($request);
    }
}
