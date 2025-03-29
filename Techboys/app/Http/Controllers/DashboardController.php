<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comment;
use App\Models\Product;
class DashboardController extends Controller
{
    public function index(){
    $user = Auth::user();
    $latestComments = Comment::latest()->take(5)->get()->map(function ($comment) {
        return [
            'user' => User::find($comment->user_id),
            'product' => Product::find($comment->product_id),
            'content' => $comment->content
        ];
    });

    $onlineUsers = Cache::get('online-users', []);
    $now = now();
    $onlineUsers = array_filter($onlineUsers, function ($expiresAt) use ($now) {
        return $expiresAt > $now;
    });
    Cache::put('online-users', $onlineUsers, now()->addMinutes(5));

    return view('admin.dashboard.index', [
        'onlineUsers' => count($onlineUsers),
        'registeredUsers' => User::where('role_id', 2)->count(),
        'latestComments' => $latestComments,
        'user' => $user,
        'now' => $now
    ]);
    }
}
