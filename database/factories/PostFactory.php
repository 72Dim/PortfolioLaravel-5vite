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
        $w = fake()->word();
        return [
            'title' => $w,                      /* default one word */
            'content' => fake()->sentence(2),   /* default 160 characters */
            'description' => $w.'.JPG',
            'created_at' => fake()->dateTimeBetween(),
            'updated_at' => fake()->dateTimeBetween(),
        ];
    }
}
