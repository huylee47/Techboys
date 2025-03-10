<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Config;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Service\VoucherService;
use App\Service\CartPriceService;
use App\Service\CartService;
use App\Service\ChatsService;
use App\Service\ProductService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Console\Commands\RemoveExpiredPromotions;
use Illuminate\Console\Scheduling\Schedule;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CartPriceService::class, function ($app) {
            return new CartPriceService($app->make(VoucherService::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        $this->commands([
            RemoveExpiredPromotions::class,
        ]);
    
        $this->app->booted(function () {
            $schedule = app(Schedule::class);
            $schedule->command('promotions:remove-expired')->daily();
        });
        $config = Config::first();
        $categories = ProductCategory::get();
        $hotproducts = Product::orderBy('purchases','desc')->take(16)->get();
        $discountedProducts = Product::whereHas('promotion')->get();
        $newProduct = Product::orderBy('created_at', 'desc')->take(20)->get();  
        $loadBanner = Banner::all();
        $cartService = app(CartService::class);
        View::share('config', $config);
        View::share('categories', $categories);
        View::share('hotproducts', $hotproducts);
        View::share('loadBanner', $loadBanner);
        View::share('discountedProducts', $discountedProducts);
        View::composer('*', function ($view) {
            $messageService = app(ChatsService::class);
            $messages = $messageService->loadMessage();
            $view->with('messages', $messages);
            $productService = app(ProductService::class);
            $newProduct = $productService->getNewProducts();
            $view->with('newProduct', $newProduct);
            $cartService = app(CartService::class); 
            $cartCount = $cartService->countItems();
            $view->with([
                'cartCount' => $cartCount,
            ]);
        });
    
    }
}
