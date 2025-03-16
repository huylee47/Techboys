<?php

use App\Http\Controllers\CheckoutController;
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