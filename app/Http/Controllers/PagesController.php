<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PagesController extends Controller
{
    public function home (): Factory|View|Application
    {
        $hitProducts = Product::where('hit', true)->limit(4)->get();
        $newProducts = Product::where('new', true)->limit(4)->get();

        return view('pages.homepage', ['hitProducts' => $hitProducts, 'newProducts' => $newProducts]);
    }
}
