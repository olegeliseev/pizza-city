<?php
// routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Product;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Главная
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

// Главная > Меню
Breadcrumbs::for('menu', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Меню', route('menu'));
});

// Главная > Меню > [Категория] > [Товар]
Breadcrumbs::for('product', fn (BreadcrumbTrail $trail, Product $product) => $trail
    ->parent('menu')
    ->push($product->category->name, route('menu', $product->category->slug))
    ->push($product->name, route('product', $product))
);
