<?php

use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('blog', function () {
    return view('admin.tag.edit');
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

