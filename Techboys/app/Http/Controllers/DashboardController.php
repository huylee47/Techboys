<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index(){
        $onlineUsers = Cache::get('online-users', []);
    $now = now();
    $onlineUsers = array_filter($onlineUsers, function ($expiresAt) use ($now) {
        return $expiresAt > $now;
    });
    Cache::put('online-users', $onlineUsers, now()->addMinutes(5));

    return view('admin.dashboard.index', ['onlineUsers' => count($onlineUsers)]);
    }
}
