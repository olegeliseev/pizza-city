<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\ProductsRepositoryContract;
use App\Contracts\Services\ProductCreationServiceContract;
use App\Contracts\Services\ProductRemoverServiceContract;
use App\Contracts\Services\ProductUpdateServiceContract;
use App\DTO\MenuFilterDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateProductRequest;
use App\Http\Requests\Api\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ProductsRepositoryContract $productsRepository)
    {
        return ProductResource::collection($productsRepository->paginateForMenu(
            menuFilterDTO: new MenuFilterDTO(),
            perPage: $request->get('perPage', 10),
            fields: ['id' ,'name', 'price', 'image_id', 'description', 'new', 'hit'],
            page: $request->get('page',1),
            relations: ['image:id,path'],
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request, ProductCreationServiceContract $productCreationService): ProductResource
    {
        return new ProductResource($productCreationService->create($request->validated(), $request->get('categories', [])));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id, ProductsRepositoryContract $productsRepository): ProductResource
    {
        return new ProductResource($productsRepository->getById($id, ['image:id,path', 'category:id,name,slug']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, int $id, ProductUpdateServiceContract $productUpdateService): ProductResource
    {
        return new ProductResource($productUpdateService->update($id, $request->validated(), $request->get('categories', [])));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, ProductRemoverServiceContract $productRemoverService): array
    {
        $productRemoverService->delete($id);

        return [$id];
    }
}
