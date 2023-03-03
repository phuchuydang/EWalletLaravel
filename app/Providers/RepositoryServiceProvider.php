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

        $this->app->bind(
            'App\Interfaces\PhoneCardRepositoryInterface',
            'App\Repositories\PhoneCardRepository',
        );

        $this->app->bind(
            'App\Interfaces\WithdrawRepositoryInterface',
            'App\Repositories\WithdrawRepository',
        );

        $this->app->bind(
            'App\Interfaces\OTPRepositoryInterface',
            'App\Repositories\OTPRepository',
        );

        $this->app->bind(
            'App\Interfaces\HistoryRepositoryInterface',
            'App\Repositories\HistoryRepository',
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
