<?php

use App\Http\Controllers\VoucherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.home.home');
});
Route::get('blog', function () {
    return view('admin.tag.edit');
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
    
    Route::prefix('/voucher')->group(function () {
        Route::get('/', [VoucherController::class, 'index'])->name('admin.voucher.index');
        Route::get('/create',[VoucherController::class, 'create'])->name('admin.voucher.create');
        route::post('/store',[voucherController::class, 'store'])->name('admin.voucher.store');
        Route::get('/show',[VoucherController::class, 'show'])->name('admin.voucher.show');  
        route::get('/edit',[VoucherController::class,'edit'])->name('admin.voucher.edit');
        route::put('/update/{id}',[VoucherController::class,'update'])->name('admin.voucher.update');
        route::get('/destroy/{id}',[VoucherController::class,'destroy'])->name('admin.voucher.destroy');
    });
});