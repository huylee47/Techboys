<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Route::prefix('checkout')->group(function () {
//     Route::get('/', [CheckoutController::class, 'index'])->name('client.checkout.index');
//     Route::get('/get-districts/{province_id}', [CheckoutController::class, 'getDistricts']);
//     Route::get('/get-wards/{district_id}', [CheckoutController::class, 'getWards']);
//     Route::post('/store', [CheckoutController::class, 'storeBill'])->name('client.checkout.store');
// });
Route::prefix('/product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::get('/createC', [ProductController::class, 'createC'])->name('admin.product.createC');

    Route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/show', [ProductController::class, 'show'])->name('admin.product.show');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
    Route::get('/hide/{id}', [ProductController::class, 'hide'])->name('admin.product.hide');
    Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('admin.product.restore');
    Route::get('/image/{productId}', [ProductController::class, 'imageIndex'])->name('admin.product.imageIndex');
    Route::post('/image/{productId}/store', [ProductController::class, 'imageStore'])->name('admin.product.imageStore');
    Route::get('/image/{productId}/destroy/{imageId}', [ProductController::class, 'imageDestroy'])->name('admin.product.imageDestroy');
});