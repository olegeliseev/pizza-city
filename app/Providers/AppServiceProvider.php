<?php

namespace App\Providers;

use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\ProductCreationServiceContract;
use App\Contracts\Services\ProductUpdateServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Services\FlashMessage;
use App\Services\ProductsService;
use App\Services\TagsSynchronizerService;
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
        $this->app->singleton(ProductCreationServiceContract::class, ProductsService::class);
        $this->app->singleton(ProductUpdateServiceContract::class, ProductsService::class);
        $this->app->singleton(TagsSynchronizerServiceContract::class, TagsSynchronizerService::class);
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
