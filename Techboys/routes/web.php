<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.home.home');
});

Route::get('login', function () {return view('admin.log.login');})->name('login.view');
Route::post('/login/auth',[UserController::class,'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home',[DashboardController::class,'index'])->name('admin.index');
        Route::get('/blog', function () {
        return view('admin.tag.edit');
        });
    });
});