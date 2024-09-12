<?php

namespace App\Repositories;

use App\Contracts\Repositories\ProductsRepositoryContract;
use App\DTO\MenuFilterDTO;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductsRepository implements ProductsRepositoryContract
{
    public function __construct(
        private readonly Product $model
    ) {
    }

    public function getModel(): Product
    {
        return $this->model;
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function findForMainPage(string $filter, int $limit): Collection
    {
        return $this->getModel()->where($filter, true)->limit($limit)->get();
    }

    public function paginateForMenu(
        MenuFilterDTO $menuFilterDTO,
        int $perPage = 10,
        array $fields = ['*'],
        string $pageName = 'page',
        int $page = 1,
    ): LengthAwarePaginator {
        return $this->catalogQuery($menuFilterDTO)->paginate($perPage, $fields, $pageName, $page);
    }

    public function paginateForAdmin(
        int $perPage = 10,
        array $fields = ['*'],
        string $pageName = 'page',
        int $page = 1,
    ): LengthAwarePaginator {
        return $this->getModel()->paginate($perPage, $fields, $pageName, $page);
    }

    private function catalogQuery(MenuFilterDTO $menuFilterDTO): Builder
    {
        return $this->getModel()
            ->when(
                $menuFilterDTO->getSearch() !== null,
                fn($query) => $query->where('name', 'like', '%' . $menuFilterDTO->getSearch() . '%')
            )
            ->when(
                $menuFilterDTO->getOrderPopularity() !== null,
                fn($query) => $query->orderBy('hit', $menuFilterDTO->getOrderPopularity())
            )
            ->when(
                $menuFilterDTO->getOrderPrice() !== null,
                fn($query) => $query->orderBy('price', $menuFilterDTO->getOrderPrice())
            )
            ->when(
                $menuFilterDTO->getOrderName() !== null,
                fn($query) => $query->orderBy('name', $menuFilterDTO->getOrderName())
            )
            ->when(
                $menuFilterDTO->getCategorySlug(),
                fn($query) => $query->whereHas('category', function ($query) use ($menuFilterDTO) {
                    $query->where('slug', $menuFilterDTO->getCategorySlug());
                })
            );
    }

    public function getById(int $id, array $relations = []): Product
    {
        return $this
            ->getModel()
            ->when($relations, fn($query) => $query->with($relations))
            ->findOrFail($id);
    }

    public function create(array $fields): Product
    {
        $product = $this->getModel()->create($fields);

        return $product;
    }

    public function update(Product $product, array $fields): Product
    {
        $product->update($fields);

        return $product;
    }

    public function delete(int $id): void
    {
        $this->getModel()->where('id', $id)->delete();
    }
}
