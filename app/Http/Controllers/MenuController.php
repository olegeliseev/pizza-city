<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class MenuController extends Controller
{
    public function menu (): Factory|View|Application
    {
        return view('pages.menu');
    }

    public function product ($product): Factory|View|Application
    {
        return view('pages.product', ['product' => $product]);
    }
}
