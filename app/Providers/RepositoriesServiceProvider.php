<?php

namespace App\Providers;

use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Contracts\Repositories\ProductsRepositoryContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use App\Repositories\CategoriesRepository;
use App\Repositories\ImagesRepository;
use App\Repositories\ProductsRepository;
use App\Repositories\TagsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CategoriesRepositoryContract::class, CategoriesRepository::class);
        $this->app->singleton(ProductsRepositoryContract::class, ProductsRepository::class);
        $this->app->singleton(TagsRepositoryContract::class, TagsRepository::class);
        $this->app->singleton(ImagesRepositoryContract::class, ImagesRepository::class);
    }
}
