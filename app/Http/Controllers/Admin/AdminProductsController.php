<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\ProductsRepositoryContract;
use App\Contracts\Services\ProductCreationServiceContract;
use App\Contracts\Services\ProductUpdateServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\TagsRequest;
use App\Models\Product;
use App\Contracts\Services\FlashMessageContract;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class AdminProductsController extends Controller
{
    public function __construct(private readonly ProductsRepositoryContract $productsRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,): Factory|View|Application
    {
        $products = $this->productsRepository->paginateForAdmin(
            perPage: 10,
            fields: ['id' ,'name', 'price', 'image', 'description', 'new', 'hit'],
            page: $request->get('page',1)
        );

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
    public function store(
        ProductRequest $request,
        TagsRequest $tagsRequest,
        FlashMessageContract $flashMessage,
        ProductCreationServiceContract $productCreationService,
        TagsSynchronizerServiceContract $tagsSynchronizerService
    ): RedirectResponse
    {
        $product = $productCreationService->create($request->validated());

        $tagsSynchronizerService->sync($product, $tagsRequest->get('tags'));

        $flashMessage->success('Товар успешно создан');

        return redirect()->route('admin.products.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): Factory|View|Application
    {
        return view('pages.admin.products.edit', ['product' => $this->productsRepository->getById($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ProductRequest $request,
        TagsRequest $tagsRequest,
        int $id,
        FlashMessageContract $flashMessage,
        ProductUpdateServiceContract $productUpdateService,
        TagsSynchronizerServiceContract $tagsSynchronizerService
    ): RedirectResponse {
        $product = $productUpdateService->update($id, $request->validated());

        $tagsSynchronizerService->sync($product, $tagsRequest->get('tags'));

        $flashMessage->success('Товар успешно обновлен');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, FlashMessageContract $flashMessage): RedirectResponse
    {
        $this->productsRepository->delete($id);

        $flashMessage->success('Товар удален');

        return back();
    }
}
