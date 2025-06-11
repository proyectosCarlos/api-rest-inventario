<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Category\CategoryServices;

class CategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CategoryServices::class, function ($app) {
            return new CategoryServices($app);
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
