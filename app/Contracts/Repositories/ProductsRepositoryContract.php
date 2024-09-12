<?php

namespace App\Contracts\Repositories;

use App\DTO\MenuFilterDTO;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ProductsRepositoryContract
{
    public function getModel(): Product;

    public function findAll(): Collection;

    public function findForMainPage(string $filter, int $limit): Collection;

    public function paginateForMenu(
        MenuFilterDTO $menuFilterDTO,
        int $perPage = 10,
        array $fields = ['*'],
        string $pageName = 'page',
        int $page = 1,
    ): LengthAwarePaginator;

    public function paginateForAdmin(
        int $perPage = 10,
        array $fields = ['*'],
        string $pageName = 'page',
        int $page = 1,
    ): LengthAwarePaginator;

    public function getById(int $id, array $relations = []): Product;

    public function create(array $fields): Product;

    public function update(Product $product, array $fields): Product;

    public function delete(int $id): void;
}
