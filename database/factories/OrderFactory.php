<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'status' => $this->faker->randomElement(['pendiente', 'pagada', 'cancelada', 'entregada']),
            'total' => $this->faker->randomFloat(2, 20, 500),
        ];
    }
}
