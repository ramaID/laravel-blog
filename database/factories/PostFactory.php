<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'type' => $this->faker->randomElement(['note', 'snippet', 'bookmark']),
            'body' => $this->faker->realText(2_000),
            'published_at' => $this->faker->optional()->dateTime,
        ];
    }
}
