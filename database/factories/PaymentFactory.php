<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'payment_method' => $this->faker->randomElement(['tarjeta', 'paypal', 'transferencia']),
            'amount' => $this->faker->randomFloat(2, 20, 500),
            'status' => $this->faker->randomElement(['pendiente', 'completado', 'fallido']),
            'transaction_id' => $this->faker->uuid(),
        ];
    }
}
