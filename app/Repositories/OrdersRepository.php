<?php

namespace App\Repositories;

use App\Contracts\Repositories\OrdersRepositoryContract;
use App\Models\Order;
use Illuminate\Support\Collection;

class OrdersRepository implements OrdersRepositoryContract
{
    public function __construct(private readonly Order $model)
    {
    }

    public function findAllForUser(int $userId): Collection
    {
        return $this->getModel()->where('user_id', $userId)->get();
    }

    private function getModel(): Order
    {
        return $this->model;
    }

    public function create(array $fields): Order
    {
        $order = $this->getModel()->create($fields);

        return $order;
    }
}
