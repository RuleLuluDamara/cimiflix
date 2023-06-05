<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bookmark>
 */
class BookmarkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $waktuBookmark = Carbon::create(2023, mt_rand(1, 12), mt_rand(1, 28));

        return [
            'waktu_bookmark' => $waktuBookmark,
            'movie_id' => mt_rand(1, 15),
            'user_id' => mt_rand(1, 3)
        ];
    }
}