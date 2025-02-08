<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.home.home');
});
Route::get('blog', function () {
    return view('admin.tag.edit');
});

Route::prefix('/blogs')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('admin.blogs.index');
    Route::get('/create', [BlogController::class, 'create'])->name('admin.blogs.create');
    route::post('/store', [BlogController::class, 'store'])->name('admin.blogs.store');
    route::get('/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');   
    route::post('/update/{id}', [BlogController::class, 'update'])->name('admin.blogs.update');
    route::get('/destroy/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');




    
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
});
Route::get('login', function () {
    return view('admin.log.login');
})->name('login.view');
Route::post('/login/auth', [UserController::class, 'login'])->name('login');

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
    });
});
