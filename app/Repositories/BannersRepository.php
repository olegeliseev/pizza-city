<?php

namespace App\Repositories;

use App\Contracts\Repositories\BannersRepositoryContract;
use App\Models\Banner;
use Illuminate\Support\Collection;

class BannersRepository implements BannersRepositoryContract
{
    public function __construct(private readonly Banner $model)
    {
    }

    public function findForMainPage(int $limit): Collection
    {
        return $this->getModel()->with('image')->limit($limit)->get();
    }

    public function getModel(): Banner
    {
        return $this->model;
    }
}
