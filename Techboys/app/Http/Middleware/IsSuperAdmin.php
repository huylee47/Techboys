<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSuperAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user  && $user->id == 1 && $user ->username == 'admin') {
            return $next($request);
        }

        return redirect()->route('error.403')->with('error', 'Bạn không có quyền truy cập chức năng này!');
    }
}

