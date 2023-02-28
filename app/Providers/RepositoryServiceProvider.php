<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Interfaces\AccountRepositoryInterface',
            'App\Repositories\AccountRepository',
        );
        $this->app->bind(
            'App\Interfaces\WalletRepositoryInterface',
            'App\Repositories\WalletRepository',
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
