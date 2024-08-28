<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class MenuController extends Controller
{
    public function menu (): Factory|View|Application
    {
        $products = Product::get();
        return view('pages.menu', ['products' => $products]);
    }

    public function product (Product $product): Factory|View|Application
    {
        $product = Product::findOrFail($product->id);
        return view('pages.product', ['product' => $product]);
    }
}
