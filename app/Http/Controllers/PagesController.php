<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\BannersRepositoryContract;
use App\Contracts\Repositories\ProductsRepositoryContract;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PagesController extends Controller
{
    public function home (ProductsRepositoryContract $productsRepository, BannersRepositoryContract $bannersRepository): Factory|View|Application
    {
        $hitProducts = $productsRepository->findForMainPage('hit', 4);
        $newProducts = $productsRepository->findForMainPage('new', 4);
        $banners = $bannersRepository->findForMainPage(3);

        return view('pages.homepage', ['hitProducts' => $hitProducts, 'newProducts' => $newProducts, 'banners' => $banners]);
    }
}
