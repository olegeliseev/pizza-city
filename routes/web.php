<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\AdminProductsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

Route::get('/', [PagesController::class, 'home'])->name('home');

Route::get('/menu/{slug?}', [MenuController::class, 'menu'])->name('menu');

Route::get('/products/{product}', [MenuController::class, 'product'])->name('product');

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function (Router $router) {
        $router->get('/', [AdminPagesController::class, 'admin'])->name('admin');
        $router->resource('products', AdminProductsController::class)->except(['show']);
    });

require __DIR__.'/auth.php';
