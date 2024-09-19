<?php

namespace App\Services;

use App\Contracts\Repositories\ProductsRepositoryContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\ProductCreationServiceContract;
use App\Contracts\Services\ProductRemoverServiceContract;
use App\Contracts\Services\ProductUpdateServiceContract;
use App\Models\Product;

class ProductsService implements ProductCreationServiceContract, ProductUpdateServiceContract, ProductRemoverServiceContract
{
    public function __construct(
        private readonly ProductsRepositoryContract $productsRepository,
        private readonly ImagesServiceContract $imagesService
    ) {
    }

    public function create(array $fields): Product
    {
        if (! empty($fields['image'])) {
            $image = $this->imagesService->createImage($fields['image']);
            $fields['image_id'] = $image->id;
        }

        $product = $this->productsRepository->create($fields);

        return $product;
    }

    public function update(int $id, array $fields): Product
    {
        $product = $this->productsRepository->getById($id);
        $oldImageId = null;

        if (! empty($fields['image'])) {
            $image = $this->imagesService->createImage($fields['image']);
            $fields['image_id'] = $image->id;
            $oldImageId = $product->image_id;
        }

        $this->productsRepository->update($product, $fields);

        if (! empty($oldImageId)) {
            $this->imagesService->deleteImage($oldImageId);
        }

        return $product;
    }

    public function delete(int $id): void
    {
        $product = $this->productsRepository->getById($id);

        if (! empty($product->image_id)) {
            $this->imagesService->deleteImage($product->image_id);
        }

        $this->productsRepository->delete($id);
    }
}
