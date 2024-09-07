<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menu(Request $request, ?string $slug = null): Factory|View|Application
    {
        $products = Product::query()
            ->when(
                ($search = $request->get('search')) !== null,
                fn($query) => $query->where('name', 'like', "%$search%")
            )
            ->when(($sortPopularity = $request->get('sort_popularity')) !== null, fn($query) => $query->orderBy(
                'hit',
                $sortPopularity === 'desc' ? 'desc' : 'asc'
            ))
            ->when(($sortPrice = $request->get('sort_price')) !== null, fn($query) => $query->orderBy(
                'price',
                $sortPrice === 'desc' ? 'desc' : 'asc'
            ))
            ->when(($sortName = $request->get('sort_name')) !== null, fn($query) => $query->orderBy(
                'name',
                $sortName === 'desc' ? 'desc' : 'asc'
            ))
            ->when($slug, fn($query) => $query->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            }))
            ->get();

        return view('pages.menu', ['products' => $products, 'currentCategory' => $slug]);
    }

    public function product(Product $product): Factory|View|Application
    {
        $product = Product::findOrFail($product->id);
        return view('pages.product', ['product' => $product]);
    }
}
