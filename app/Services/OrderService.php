<?php

namespace App\Services;

use App\Contracts\Repositories\OrdersRepositoryContract;
use App\Contracts\Services\CartServiceContract;
use App\Contracts\Services\OrderServiceContract;
use App\Enums\PaymentStatus;
use App\Models\Order;

class OrderService implements OrderServiceContract
{
    public function __construct(
        private readonly OrdersRepositoryContract $ordersRepository,
        private readonly CartServiceContract $cartService,
    ) {
    }

    //Болванка для создания заказа с рандомным статусом, в будущем будет заменено на полноценный функционал заказов
    public function createOrder(): Order
    {
        $cart = $this->cartService->getCart();
        $sum = 0;
        $quantity = 0;

        foreach ($cart->products()->get() as $product) {
            $quantity += $product->pivot->quantity;
            $sum += $product->price * $product->pivot->quantity;
        }

        $fields = [
            'quantity' => $quantity,
            'sum' => $sum,
            'status' => PaymentStatus::random(),
            'user_id' => auth()->user()->id,
        ];

        return $this->ordersRepository->create($fields);
    }
}
