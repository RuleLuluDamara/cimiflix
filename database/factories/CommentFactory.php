<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $waktuComment = Carbon::create(2023, mt_rand(1, 12), mt_rand(1, 28));

        return [
            'message' => fake()->sentence(mt_rand(2, 10)),
            'waktu_comment' => $waktuComment,
            'movie_id' => mt_rand(1, 15),
            'user_id' => mt_rand(1, 3)
        ];
    }
}