<?php

namespace App\Providers;

use App\Repositories\ExchangeRate\ExchangeRateRepository;
use App\Repositories\ExchangeRate\ExchangeRateRepositoryInterface;
use App\Repositories\RequestedExchangeRate\RequestedExchangeRateRepository;
use App\Repositories\RequestedExchangeRate\RequestedExchangeRateRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ExchangeRateRepositoryInterface::class, ExchangeRateRepository::class);
        $this->app->bind(RequestedExchangeRateRepositoryInterface::class, RequestedExchangeRateRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
