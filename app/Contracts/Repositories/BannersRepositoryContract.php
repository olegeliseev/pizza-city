<?php

namespace App\Contracts\Repositories;

use App\Models\Banner;
use Illuminate\Support\Collection;

interface BannersRepositoryContract
{
    public function findForMainPage(int $limit): Collection;

    public function getModel(): Banner;
}
