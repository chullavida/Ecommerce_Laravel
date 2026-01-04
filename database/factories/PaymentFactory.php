<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::inRandomOrder()->value('id') ?? Order::factory(),
            'payment_method' => $this->faker->randomElement(['paypal','stripe','bank_transfer']),
            'amount' => $this->faker->randomFloat(2,5,500),
            'transaction_id' => $this->faker->randomNumber(9),
            'status' => $this->faker->randomElement(['pending','completed','failed']),
        ];
    }
}
