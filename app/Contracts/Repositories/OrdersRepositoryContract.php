<?php

namespace App\Contracts\Repositories;

use App\Models\Order;
use Illuminate\Support\Collection;

interface OrdersRepositoryContract
{
    public function findAllForUser(int $userId): Collection;

    public function create(array $fields): Order;
}
