<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->orders() as $order) {
            Order::factory()->create($order);
        }

        Order::factory()->count(8)->create();
    }

    public function orders(): array
    {
        return [
            [
                'quantity' => 5,
                'sum' => 1635,
                'status' => 'Не оплачен',
                'user_id' => 1,
            ],
            [
                'quantity' => 3,
                'sum' => 877,
                'status' => 'Ошибка оплаты',
                'user_id' => 1,
            ],
            [
                'quantity' => 4,
                'sum' => 1066,
                'status' => 'Оплачен',
                'user_id' => 1,
            ],
        ];
    }
}
