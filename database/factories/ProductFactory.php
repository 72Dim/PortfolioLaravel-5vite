<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $word = fake()->word();
        return [
            'category' => fake()->randomDigitNotNull(), // число от 1 до 9.
            'prodEng' => $word,
            'prodRus' => fake('ru_RU')->word(),
            'units' => fake()->word(),
            'price' => fake()->randomFloat(2, 5, 100),
            'country' => fake()->word(),
            'picture' => $word.'.JPG',
        ];
    }
}
