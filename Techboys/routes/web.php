<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\BillDetailsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Client routes
Route::get('/', function () {
    return view('client.home.home');
})->name('home');

Route::get('test', function () {
    return view('admin.product.imageIndex');
});

Route::get('blog', function () {
    return view('admin.tag.edit');
});

Route::get('/login/admin', function () {
    return view('admin.log.login');
})->name('login');

Route::get('/blogs', function () {
    return view('client.user.index');
});

Route::get('login', function () {
    return view('client.login.index');
})->name('login.client');

Route::post('/login/Client', [UserController::class, 'loginClient'])->name('loginClient.auth');

// Đăng ký
Route::prefix('/register')->group(function () {
    Route::get('/create', [UserController::class, 'create'])->name('admin.log.create');
    Route::post('/store', [UserController::class, 'store'])->name('admin.log.store');
});

// Xác thực email
Route::get('/veryfi-account/{email}', [UserController::class, 'veryfi'])->name('admin.veryfi');

// Quên mật khẩu
Route::get('forgot-password', [UserController::class, 'forgot_password'])->name('admin.forgot-password');
Route::post('/check-forgot-password', [UserController::class, 'check_forgot_password'])->name('admin.check_forgot_password');

Route::get('/reset-password/{token}', [UserController::class, 'reset_password'])->name('admin.reset_password');
Route::post('/check-reset-password/{token}', [UserController::class, 'check_reset_password'])->name('admin.check_reset_password');

// Profile
Route::get('/profile', [UserController::class, 'edit'])->name('client.edit');
Route::post('/update/{id}', [UserController::class, 'update'])->name('client.update');

// Đổi mật khẩu
Route::get('/profile/changePassword', [UserController::class, 'changePassword'])->name('client.changePassword');
Route::post('/updatePassword/{id}', [UserController::class, 'updatePassword'])->name('client.updatePassword');

// Đăng xuất
Route::get('/logout', [UserController::class, 'logout'])->name('client.logout');

// Admin routes
Route::post('/login/auth', [UserController::class, 'login'])->name('login.auth');

Route::middleware(['auth', 'auth.admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home', [DashboardController::class, 'index'])->name('admin.index');
        Route::get('/blog', function () {
            return view('admin.tag.edit');
        });

        Route::prefix('/voucher')->group(function () {
            Route::get('/', [VoucherController::class, 'index'])->name('admin.voucher.index');
            Route::get('/create', [VoucherController::class, 'create'])->name('admin.voucher.create');
            Route::post('/store', [VoucherController::class, 'store'])->name('admin.voucher.store');
            Route::get('/show', [VoucherController::class, 'show'])->name('admin.voucher.show');
            Route::get('/edit', [VoucherController::class, 'edit'])->name('admin.voucher.edit');
            Route::post('/update/{id}', [VoucherController::class, 'update'])->name('admin.voucher.update');
            Route::get('/destroy/{id}', [VoucherController::class, 'destroy'])->name('admin.voucher.destroy');
        });

        Route::prefix('/product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
            Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
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

        Route::prefix('/category')->group(function () {
            Route::get('/', [ProductCategoryController::class, 'index'])->name('admin.category.index');
            Route::get('/create', [ProductCategoryController::class, 'create'])->name('admin.category.create');
            Route::post('/store', [ProductCategoryController::class, 'store'])->name('admin.category.store');
            Route::get('/edit', [ProductCategoryController::class, 'edit'])->name('admin.category.edit');
            Route::post('/update/{id}', [ProductCategoryController::class, 'update'])->name('admin.category.update');
            Route::get('/destroy/{id}', [ProductCategoryController::class, 'destroy'])->name('admin.category.destroy');
        });

        Route::prefix('/user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
            Route::get('/create', [UserController::class, 'create_user'])->name('admin.user.create');
            Route::post('/store', [UserController::class, 'store_user'])->name('admin.user.store');
            Route::post('/block/{id}', [UserController::class, 'block'])->name('admin.user.block');
            Route::post('/open/{id}', [UserController::class, 'open'])->name('admin.user.open');
        });

        Route::prefix('/bill')->group(function () {
            Route::get('/', [BillController::class, 'index'])->name('admin.bill.index');
            Route::get('/hide/{id}', [BillController::class, 'hide'])->name('admin.bill.hide');
            Route::get('/restore/{id}', [BillController::class, 'restore'])->name('admin.bill.restore');
            Route::get('/download.invoice/{id}', [BillController::class, 'download'])->name('admin.bill.download');
            Route::get('/bill-detail/{id}/show', [BillDetailsController::class, 'show'])->name('admin.bill.show');
        });

        Route::prefix('/blogs')->group(function () {
            Route::get('/', [BlogController::class, 'index'])->name('admin.blogs.index');
            Route::get('/create', [BlogController::class, 'create'])->name('admin.blogs.create');
            Route::post('/store', [BlogController::class, 'store'])->name('admin.blogs.store');
            Route::get('/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
            Route::post('/update/{id}', [BlogController::class, 'update'])->name('admin.blogs.update');
            Route::get('/destroy/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');
        });
    });
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('client.product.index');
    Route::get('/{slug}', [ProductController::class, 'productDetails'])->name('client.product.show');
});

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'showCart'])->name('client.cart.index');
    Route::post('/add', [CartController::class, 'addToCart'])->name('client.cart.add');
    Route::post('/remove', [CartController::class, 'removeFromCart'])->name('client.cart.remove');
    Route::get('/reset', [CartController::class, 'resetCart'])->name('client.cart.reset');
    Route::post('/updateQuantity', [CartController::class, 'updateQuantity'])->name('client.cart.updateQuantity');
    Route::post('/applyVoucher', [CartController::class, 'applyVoucher'])->name('client.cart.applyVoucher');
    Route::get('/getVoucherDiscount', [CartController::class, 'getDiscount'])->name('client.cart.getDiscount');
    Route::get('/getCount', [CartController::class, 'getCartCount'])->name('client.cart.getCartCount');
});