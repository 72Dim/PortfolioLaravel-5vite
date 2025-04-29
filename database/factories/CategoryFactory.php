<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends
 */
class CategoryFactory extends Factory
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
            'catgEng' => $word,
            'catgRus' => fake('ru_RU')->word(),
            'saver' => $word.'.JPG',
        ];
    }
}
