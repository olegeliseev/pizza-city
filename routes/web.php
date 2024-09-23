<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

Route::get('/', [PagesController::class, 'home'])->name('home');

Route::get('/menu/{slug?}', [MenuController::class, 'menu'])->name('menu');

Route::get('/products/{product}', [MenuController::class, 'product'])->name('product');

Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile');

Route::middleware('auth')->get('/cart', [CartController::class, 'list'])->name('cart');
Route::middleware('auth')->post('/cart/addItem', [CartController::class, 'addItem'])->name('cart.addItem');
Route::middleware('auth')->post('/cart/plusOne/{itemId}', [CartController::class, 'plusOne'])->name('cart.plusOne');
Route::middleware('auth')->post('/cart/minusOne/{itemId}', [CartController::class, 'minusOne'])->name('cart.minusOne');
Route::middleware('auth')->post('/cart/deletePosition', [CartController::class, 'deletePosition'])->name('cart.deletePosition');
Route::middleware('auth')->post('/cart/createOrder', [CartController::class, 'createOrder'])->name('cart.createOrder');

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function (Router $router) {
        $router->get('/', [AdminPagesController::class, 'admin'])->name('admin');
        $router->resource('products', AdminProductsController::class)->except(['show']);
    });

require __DIR__.'/auth.php';
