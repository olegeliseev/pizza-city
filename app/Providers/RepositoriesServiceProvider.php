<?php

namespace App\Providers;

use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Contracts\Repositories\ProductsRepositoryContract;
use App\Repositories\CategoriesRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CategoriesRepositoryContract::class, CategoriesRepository::class);
        $this->app->singleton(ProductsRepositoryContract::class, ProductsRepository::class);
    }
}
