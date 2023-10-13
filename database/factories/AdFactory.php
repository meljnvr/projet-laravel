<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(rand(1, 3), true),
            'description' => fake()->sentences,
            'category' => fake()->word,
            'price' => fake()->randomFloat,
            'place' => fake()->city,
            'image' => fake()->imageUrl,
            'state' => fake()->word,
            'brand' => fake()->word,
            'year' => fake()->year,
            'dimensions' => fake()->sentence,
            'expiration_date' => fake()->date,
            'delivery' => fake()->word,
            'garanties' => fake()->sentences,
            'open_to_discussion' => fake()->boolean,
            'author_id' => User::all()->random()->id,
        ];
    }
}
