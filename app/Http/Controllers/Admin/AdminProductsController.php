<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Contracts\Services\FlashMessageContract;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View|Application
    {
        $products = Product::get();
        return view('pages.admin.products.list', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|View|Application
    {
        return view('pages.admin.products.create', ['product' => new Product()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request, FlashMessageContract $flashMessage): RedirectResponse
    {
        Product::create($request->validated());
        $flashMessage->success('Товар успешно создан');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): Factory|View|Application
    {
        return view('pages.admin.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ProductRequest $request,
        Product $product,
        FlashMessageContract $flashMessage
    ): RedirectResponse {
        $product->update(array_merge($request->validated(), ['new' => $request->has('new'), 'hit' => $request->has('hit')]));
        $flashMessage->success('Товар успешно обновлен');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, FlashMessageContract $flashMessage): RedirectResponse
    {
        $product->delete();
        $flashMessage->success('Товар удален');
        return back();
    }
}
