<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menu(Request $request): Factory|View|Application
    {
        $products = Product::query()
            ->when(
                ($search = $request->get('search')) !== null,
                fn($query) => $query->where('name', 'like', "%$search%")
            )
            ->when(($sortPrice = $request->get('sort_price')) !== null, fn($query) => $query->orderBy(
                'price',
                $sortPrice === 'desc' ? 'desc' : 'asc'
            ))
            ->when(($sortName = $request->get('sort_name')) !== null, fn($query) => $query->orderBy(
                'name',
                $sortName === 'desc' ? 'desc' : 'asc'
            ))
            ->get();

        return view('pages.menu', ['products' => $products]);
    }

    public function product(Product $product): Factory|View|Application
    {
        $product = Product::findOrFail($product->id);
        return view('pages.product', ['product' => $product]);
    }
}
