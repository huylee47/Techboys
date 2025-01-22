<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authentication
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login.view');
        }

        $user = Auth::user();
        if (!$user || !in_array($user->role_id, $roles)) {
            return redirect()->route('login.view')->with('error', 'Bạn không có quyền truy cập.');
        }

        return $next($request);
    }
}
