<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User_rating>
 */
class User_ratingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rating' => mt_rand(1, 10),
            'movie_id' => mt_rand(1, 15),
            'user_id' => mt_rand(1, 3)
        ];
    }
}