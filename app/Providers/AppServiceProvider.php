<?php

namespace App\Providers;

use App\Contracts\Services\FlashMessageContract;
use App\Services\FlashMessage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FlashMessageContract::class, FlashMessage::class);
        $this->app->singleton(FlashMessage::class, fn() => new FlashMessage(session()));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('admin', fn () => true);
        Blade::if('auth', fn () => true);
    }
}
