<?php

namespace App\Providers;

use App\Contracts\Services\CartServiceContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\OrderServiceContract;
use App\Contracts\Services\ProductCreationServiceContract;
use App\Contracts\Services\ProductRemoverServiceContract;
use App\Contracts\Services\ProductUpdateServiceContract;
use App\Contracts\Services\RolesServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Http\ViewComposers\CartComposer;
use App\Services\CartService;
use App\Services\FlashMessage;
use App\Services\ImagesService;
use App\Services\OrderService;
use App\Services\ProductsService;
use App\Services\RolesService;
use App\Services\TagsSynchronizerService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

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
        $this->app->singleton(CartServiceContract::class, CartService::class);
        $this->app->singleton(OrderServiceContract::class, OrderService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(RolesServiceContract $rolesService): void
    {
        Blade::if('admin', fn() => auth()->check() && $rolesService->userIsAdmin(auth()->user()->id));

        View::composer(
            [
                'components.layouts.parts.header',
                'components.panels.menu.menu_grid',
                'components.panels.product.product',
            ],
            CartComposer::class);
    }
}
