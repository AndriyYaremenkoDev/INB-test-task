<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Api\Number\NumberService;
use App\Contracts\Api\Number\NumberServiceInterface;

class NumberServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(NumberServiceInterface::class, NumberService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
