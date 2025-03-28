<?php

use App\Http\Controllers\AttributesController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\BillDetailsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\RevenueController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


// Client routes
Route::middleware(['track.online'])->group(function(){
    Route::get('/', function () {
    return view('client.home.home');
    })->name('home');
});
Route::get('/online-users', function () {
    // Đếm số lượng session còn trong cache
    $onlineUsers = collect(Cache::getStore()->getPrefix())
        ->filter(fn($key) => str_contains($key, 'user-online-'))
        ->count();

    return response()->json(['online' => $onlineUsers]);
});
Route::get('/admin/get-latest-comments', [DashboardController::class, 'getLatestComments'])->name('admin.getLatestComments');


// Blog
Route::get('/blog', [BlogController::class, 'indexClient'])->name('blog');
Route::get('blog/{slug}', [BlogController::class, 'DetailBlog'])->name('DetailBlog');

//order
Route::get('/client/orders', [BillController::class, 'indexClient'])->name('client.orders');

//comment
Route::post('/comment/store', [CommentController::class, 'store'])->name('client.comment.store');
Route::post('/comment/reply', [CommentController::class, 'reply'])->name('client.comment.reply');


// About
Route::get('/about', function () {
    return view('client.about.about');
})->name('client.about.about');



Route::get('/login/admin', function () {
    return view('admin.log.login');
})->name('login');


Route::get('login', function () {
    return view('client.login.index');
})->name('login.client');

Route::post('/login/Client', [UserController::class, 'loginClient'])->name('loginClient.auth');
//banner client
// Route::get('/', [BannerController::class, 'indexClient']);
//contact client
Route::get('/contact', function () {
    return view('client.contact.contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'saveContact']);

// Đăng ký
Route::prefix('/register')->group(function () {
    Route::get('/create', [UserController::class, 'create'])->name('client.log.create');
    Route::post('/store', [UserController::class, 'store'])->name('client.log.store');
});



// Xác thực email
Route::get('/veryfi-account/{email}', [UserController::class, 'veryfi'])->name('clinet.veryfi');

// Quên mật khẩu
Route::get('forgot-password', [UserController::class, 'forgot_password'])->name('client.forgot-password');
Route::post('/check-forgot-password', [UserController::class, 'check_forgot_password'])->name('client.check_forgot_password');

Route::get('/reset-password/{token}', [UserController::class, 'reset_password'])->name('client.reset_password');
Route::post('/check-reset-password/{token}', [UserController::class, 'check_reset_password'])->name('client.check_reset_password');

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
            Route::prefix('stock-variant')->group(function (){
                Route::get('{id}',[ProductController::class, 'stock'])->name('admin.stock.index');
                Route::post('update/{ProductId}', [ProductController::class,'updateStock'])->name('admin.stock.update');
            });
  
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
            Route::get('invoice/{id}',[BillController::class,'invoiceBill'])->name('admin.bill.invoice');
            Route::post('cancel/{id}',[BillController::class,'cancelBill'])->name('admin.bill.cancel');
            Route::get('confirm/{id}',[BillController::class,'confirm'])->name('admin.bill.confirm');
            // Route::post('complete/{id}',[BillController::class,'completeBill'])->name('admin.bill.complete');
        });

        Route::prefix('/blogs')->group(function () {
            Route::get('/', [BlogController::class, 'index'])->name('admin.blogs.index');
            Route::get('/create', [BlogController::class, 'create'])->name('admin.blogs.create');
            Route::post('/store', [BlogController::class, 'store'])->name('admin.blogs.store');
            Route::get('/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
            Route::post('/update/{id}', [BlogController::class, 'update'])->name('admin.blogs.update');
            Route::get('/destroy/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');
        });
        Route::prefix('/banner')->group(function () {
            Route::get('/', [BannerController::class, 'index'])->name('admin.banner.index');
            Route::get('/create', [BannerController::class, 'create'])->name('admin.banner.create');
            Route::post('/store', [BannerController::class, 'store'])->name('admin.banner.store');
            Route::get('/edit', [BannerController::class, 'edit'])->name('admin.banner.edit');
            Route::post('/update/{id}', [BannerController::class, 'update'])->name('admin.banner.update');
            Route::get('/destroy/{id}', [BannerController::class, 'destroy'])->name('admin.banner.destroy');
        });
        Route::prefix('/comment')->group(function () {
            Route::get('/', [CommentController::class, 'index'])->name('admin.comment.index');
            Route::post('/block/{id}', [CommentController::class, 'block'])->name('admin.comment.block');
            Route::post('/open/{id}', [CommentController::class, 'open'])->name('admin.comment.open');
            Route::get('/reply/{id}', [CommentController::class, 'replyForm'])->name('admin.comment.replyForm');
            Route::post('/reply', [CommentController::class, 'replyAdmin'])->name('admin.comment.reply');
        });
        Route::prefix('/revenue')->group(function () {
            Route::get('/', [RevenueController::class, 'index'])->name('admin.revenue.revenue');
            Route::get('/filter', [RevenueController::class, 'filterRevenue'])->name('admin.revenue.filter');
        });
        Route::prefix('/chats')->group(function (){
            Route::get('/', [ChatsController::class, 'index'])->name('admin.messages');
            Route::get('/{chatId}', [ChatsController::class, 'loadMessagesAdmin']);
            Route::post('/{chatId}/send', [ChatsController::class,'sendMessageAdmin'])->name('admin.send.message');
            // Route::post('/send', [ChatsController::class, 'sendMessageAdmin']);
        });
        Route::prefix('attributes')->group( function(){
            Route::get('/', [AttributesController::class, 'index'])->name('admin.attributes.index');
            Route::get('/create', [AttributesController::class, 'create'])->name('admin.attributes.create');
            Route::post('/data', [AttributesController::class, 'store'])->name('admin.attributes.store');
            Route::get('/edit/{id}', [AttributesController::class, 'edit'])->name('admin.attributes.edit');
        Route::post('/update/{id}', [AttributesController::class, 'update'])->name('admin.attributes.update');
        Route::get('/delete/{id}', [AttributesController::class, 'destroy'])->name('admin.attributes.delete');
        });
    });
});
Route::prefix('message')->group(function () {
    Route::post('/send', [ChatsController::class, 'sendMessage'])->name('client.message.send');
    Route::get('/load', [ChatsController::class, 'loadMessage'])->name('client.message.load');
});
// Products
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'productList'])->name('client.product.index');
    Route::get('/search', [ProductController::class, 'search'])->name('client.product.search');
    Route::get('/filter', [ProductController::class, 'filter'])->name('client.product.filter');
    Route::get('/{slug}', [ProductController::class, 'productDetails'])->name('client.product.show');
});

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'showCart'])->name('client.cart.index');
    Route::post('/add', [CartController::class, 'addToCart'])->name('client.cart.add');
    // Route::post('/remove', [CartController::class, 'removeFromCart'])->name('client.cart.remove');
    Route::get('/reset', [CartController::class, 'resetCart'])->name('client.cart.reset');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('client.cart.update');
    Route::post('/applyVoucher', [CartController::class, 'applyVoucher'])->name('client.cart.applyVoucher');
    Route::post('/remove/{id}', [CartController::class, 'removeItem'])->name('client.cart.remove');
    // Route::get('/getCount', [CartController::class, 'getCartCount'])->name('client.cart.getCartCount');
    Route::get('/count', [CartController::class, 'countItems'])->name('client.cart.count');
});

Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('client.checkout.index');
    Route::get('/get-districts/{province_id}', [CheckoutController::class, 'getDistricts']);
    Route::get('/get-wards/{district_id}', [CheckoutController::class, 'getWards']);
    Route::post('/store', [CheckoutController::class, 'storeBill'])->name('client.checkout.store');
});


// CHECKOUT
// Route::get('/vnpay-payment', function () {
//     return view('client.payment.vnpay');
// })->name('client.payment.vnpay');
Route::get('/payment/vnpay/callback', [CheckoutController::class, 'vnpayCallback'])->name('client.payment.vnpay');
Route::get('/payment/cod/success', [CheckoutController::class, 'codSuccess'])->name('client.payment.cod');


//comment
Route::post('/comment/store', [CommentController::class, 'store'])->name('client.comment.store');
Route::post('/comment/reply', [CommentController::class, 'reply'])->name('client.comment.reply');



Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'productList'])->name('client.product.index');
    Route::get('/search', [ProductController::class, 'search'])->name('client.product.search');
    Route::get('/filter', [ProductController::class, 'filter'])->name('client.product.filter');
    Route::get('/{slug}', [ProductController::class, 'productDetails'])->name('client.product.show');
});

Route::get('/client/orders', [BillController::class, 'indexClient'])->name('client.orders');

