<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween(1,5),
            'sum' => $this->faker->numberBetween(400, 2000),
            'status' => $this->faker->randomElement($this->statuses()),
            'user_id' => User::get()->random()->id,
        ];
    }

    private function statuses(): array
    {
        return [
            'Оплачен',
            'Не оплачен',
            'Ошибка оплаты',
        ];
    }
}
