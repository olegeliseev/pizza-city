<?php

namespace App\Providers;

use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\ProductCreationServiceContract;
use App\Contracts\Services\ProductRemoverServiceContract;
use App\Contracts\Services\ProductUpdateServiceContract;
use App\Contracts\Services\RolesServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Services\FlashMessage;
use App\Services\ImagesService;
use App\Services\ProductsService;
use App\Services\RolesService;
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
        $this->app->singleton(ImagesServiceContract::class, function () {
            return $this->app->make(ImagesService::class, ['disk' => 'public']);
        });
        $this->app->singleton(ProductRemoverServiceContract::class, ProductsService::class);
        $this->app->singleton(RolesServiceContract::class, RolesService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(RolesServiceContract $rolesService): void
    {
        Blade::if('admin', fn() => auth()->check() && $rolesService->userIsAdmin(auth()->user()->id));
    }
}
