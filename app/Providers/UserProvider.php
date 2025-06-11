<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\User\UserServices;

class UserProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(UserServices::class, function ($app) {
            return new UserServices($app);
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
