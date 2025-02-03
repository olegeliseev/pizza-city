<?php

namespace App\Contracts\Services;

use App\Models\Order;

interface OrderServiceContract
{
    public function createOrder(): Order;
}
