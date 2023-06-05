<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

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
        $paymentDate = Carbon::create(2023, mt_rand(1, 12), mt_rand(1, 28));

        return [
            'payment_date' => $paymentDate,
            'total' => rand(10, 100) . '.00',
            'status' => mt_rand(0, 1) ? true : false,
            'subscription_id' => mt_rand(1, 3),
            'payment_method_id' => mt_rand(1, 3)
        ];
    }
}