<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Console\Scheduling\Schedule;

use App\Models\Banner;
use App\Models\Config;
use App\Models\Product;
use App\Models\ProductCategory;

use App\Service\VoucherService;
use App\Service\CartPriceService;
use App\Service\CartService;
use App\Service\ChatsService;
use App\Service\ProductService;

use App\Console\Commands\RemoveExpiredPromotions;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CartPriceService::class, function ($app) {
            return new CartPriceService($app->make(VoucherService::class));
        });
    }

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
        $hotproducts = Product::withoutTrashed()->orderBy('purchases', 'desc')->take(16)->get();
        $discountedProducts = Product::withoutTrashed()->whereHas('promotion')->get();
        $newProduct = Product::withoutTrashed()->orderBy('created_at', 'desc')->take(20)->get();
        $loadBanner = Banner::all();

        View::share(compact(
            'config',
            'categories',
            'hotproducts',
            'discountedProducts',
            'newProduct',
            'loadBanner'
        ));

        View::composer('*', function ($view) {
            $messageService = app(ChatsService::class);
            $productService = app(ProductService::class);
            $cartService = app(CartService::class);

            $view->with([
                'messages'    => $messageService->loadMessage(),
                'newProduct'  => $productService->getNewProducts(),
                'cartCount'   => $cartService->countItems(),
            ]);
        });
    }
}
