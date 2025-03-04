<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Config;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Service\VoucherService;
use App\Service\CartPriceService;
use App\Service\CartService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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


        $config = Config::first();
        $categories = ProductCategory::get();
        $hotproducts = Product::orderBy('purchases','desc')->take(16)->get();
        $newProduct = Product::orderBy('created_at', 'desc')->take(20)->get();
        $loadBanner = Banner::all();
        $cartService = app(CartService::class);
        View::share('config', $config);
        View::share('categories', $categories);
        View::share('newProduct', $newProduct);
        View::share('hotproducts', $hotproducts);
        View::share('loadBanner', $loadBanner);
        View::composer('*', function ($view) {
            $cartService = app(CartService::class); 
            $cartCount = $cartService->countItems();
            $view->with([
                'cartCount' => $cartCount,
            ]);
        });
    
    }
}
