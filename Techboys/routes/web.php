<?php

use App\Http\Controllers\VoucherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.home.home');
});
Route::get('test', function () {
    return view('admin.product.imageIndex');
}); 
Route::get('blog', function () {
    return view('admin.tag.edit');
}); 
    Route::get('/login/admin', function () {return view('admin.log.login');})->name('login.view');
    Route::post('/login/auth',[UserController::class,'login'])->name('login');
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home',[DashboardController::class,'index'])->name('admin.index');
        Route::get('/blog', function () {
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
        Route::prefix('/product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
            Route::get('/create',[ProductController::class, 'create'])->name('admin.product.create');
            route::post('/store',[ProductController::class, 'store'])->name('admin.product.store');
            Route::get('/show',[ProductController::class, 'show'])->name('admin.product.show');  
            route::get('/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
            route::post('/update/{id}',[ProductController::class,'update'])->name('admin.product.update');
            route::get('/destroy/{id}',[ProductController::class,'destroy'])->name('admin.product.destroy');
            Route::get('/hide/{id}', [ProductController::class, 'hide'])->name('admin.product.hide');
            Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('admin.product.restore');
            Route::get('/image/{productId}', [ProductController::class, 'imageIndex'])->name('admin.product.imageIndex');
            route::post('/image/{productId}/store', [ProductController::class, 'imageStore'])->name('admin.product.imageStore');
            route::get('/image/{productId}/destroy/{imageId}', [ProductController::class, 'imageDestroy'])->name('admin.product.imageDestroy');
            
        });
        
    });

});