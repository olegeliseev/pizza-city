<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ProductsRepositoryContract;
use App\DTO\MenuFilterDTO;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menu(
        Request $request,
        ProductsRepositoryContract $productsRepository,
        ?string $slug = null
    ): Factory|View|Application {
        $menuFilterDTO = (new MenuFilterDTO())
            ->setSearch($request->get('search'))
            ->setOrderPopularity($request->get('order_popularity'))
            ->setOrderPrice($request->get('order_price'))
            ->setOrderName($request->get('order_name'))
            ->setCategorySlug($slug)
        ;

        $products = $productsRepository->paginateForMenu(
            menuFilterDTO: $menuFilterDTO,
            perPage: 8,
            fields: ['id' ,'name', 'price', 'image_id', 'description', 'new', 'hit'],
            page: $request->get('page',1),
            relations: ['image'],
        );

        return view('pages.menu', ['products' => $products, 'currentCategory' => $slug, 'filter' => $menuFilterDTO]);
    }

    public function product(int $id, ProductsRepositoryContract $productsRepository): Factory|View|Application
    {
        $product = $productsRepository->getById($id, ['tags', 'image']);

        return view('pages.product', ['product' => $product]);
    }
}
