<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
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
Route::get('/login/admin', function () {
    return view('admin.log.login');
})->name('login');
Route::post('/login/auth', [UserController::class, 'login'])->name('login.auth');





Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home', [DashboardController::class, 'index'])->name('admin.index');
        Route::get('/blog', function () {
            return view('admin.tag.edit');
        });
        Route::prefix('/voucher')->group(function () {
            Route::get('/', [VoucherController::class, 'index'])->name('admin.voucher.index');
            Route::get('/create', [VoucherController::class, 'create'])->name('admin.voucher.create');
            route::post('/store', [voucherController::class, 'store'])->name('admin.voucher.store');
            Route::get('/show', [VoucherController::class, 'show'])->name('admin.voucher.show');
            route::get('/edit', [VoucherController::class, 'edit'])->name('admin.voucher.edit');
            route::put('/update/{id}', [VoucherController::class, 'update'])->name('admin.voucher.update');
            route::get('/destroy/{id}', [VoucherController::class, 'destroy'])->name('admin.voucher.destroy');
        });

        Route::prefix('/product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
            Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
            route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');
            Route::get('/show', [ProductController::class, 'show'])->name('admin.product.show');
            route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
            route::post('/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
            route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
            Route::get('/hide/{id}', [ProductController::class, 'hide'])->name('admin.product.hide');
            Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('admin.product.restore');
            Route::get('/image/{productId}', [ProductController::class, 'imageIndex'])->name('admin.product.imageIndex');
            route::post('/image/{productId}/store', [ProductController::class, 'imageStore'])->name('admin.product.imageStore');
            route::get('/image/{productId}/destroy/{imageId}', [ProductController::class, 'imageDestroy'])->name('admin.product.imageDestroy');
        });

        Route::prefix('/category')->group(function () {
            Route::get('/', [ProductCategoryController::class, 'index'])->name('admin.category.index');
            Route::get('/create', [ProductCategoryController::class, 'create'])->name('admin.category.create');
            route::post('/store', [ProductCategoryController::class, 'store'])->name('admin.category.store');
            route::get('/edit', [ProductCategoryController::class, 'edit'])->name('admin.category.edit');
            route::put('/update/{id}', [ProductCategoryController::class, 'update'])->name('admin.category.update');
            route::get('/destroy/{id}', [ProductCategoryController::class, 'destroy'])->name('admin.category.destroy');
        });
        Route::prefix('/user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
            Route::put('/block/{id}', [UserController::class, 'block'])->name('admin.user.block');
            Route::put('/open/{id}', [UserController::class, 'open'])->name('admin.user.open');
            // Route::put('/user/{id}', [UserController::class, 'user'])->name('admin.user.user');
            // Route::put('/admin/{id}', [UserController::class, 'admin'])->name('admin.user.admin');
        });
        Route::prefix('/bill')->group(function () {
            Route::get('/', [BillController::class, 'index'])->name('admin.bill.index');
            Route::get('/hide/{id}', [BillController::class, 'hide'])->name('admin.bill.hide');
            Route::get('/restore/{id}', [BillController::class, 'restore'])->name('admin.bill.restore');
            Route::get('/download.invoice/{id}', [BillController::class, 'download'])->name('admin.bill.download');
        });
    });
});
