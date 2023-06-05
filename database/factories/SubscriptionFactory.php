<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->date('Y-m-d');
        $monthsToAdd = mt_rand(1, 3);
        $endDate = Carbon::createFromFormat('Y-m-d', $startDate)
            ->addMonths($monthsToAdd)
            ->format('Y-m-d');

        return [
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => mt_rand(0, 1) ? true : false,
            'user_id' => mt_rand(1, 3)
        ];
    }
}