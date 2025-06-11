<?php

namespace App\Providers;

use App\Models\Product;
use App\Services\Product\ProductServices;
use Illuminate\Support\ServiceProvider;


class ProductProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductServices::class, function ($app) {
            return new ProductServices($app);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
