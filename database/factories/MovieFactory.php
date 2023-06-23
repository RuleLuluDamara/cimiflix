<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(mt_rand(2, 6)),
            'slug' => fake()->slug(),
            'rilis' => fake()->date('Y-m-d'),
            'resolusi' => fake()->randomElement(['HD', 'Full HD', '4K']),
            'durasi' => fake()->randomElement([1.5, 2, 3]),
            'director' => fake()->name(),
            'studio_production' => fake()->sentence(mt_rand(2, 7)),
            'excerpt' => fake()->paragraph(),
            'body' => collect(fake()->paragraphs(mt_rand(5, 10)))
                ->map(fn($p) => "<p>$p</p>")
                ->implode(''),
            'genre_id' => mt_rand(1, 9),
            'rating_umur_id' => mt_rand(1, 3),
            'status_id' => mt_rand(1, 2)
        ];
    }
}