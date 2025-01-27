<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public $faker;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /* working version
            $word = fake()->word();
            return [
                'title' => $word,                   /* default one word *
                'content' => fake()->sentence(2),   /* default 160 characters *
                'description' => $word.'.JPG',
                'created_at' => fake()->dateTimeBetween(),
                'updated_at' => fake()->dateTimeBetween(),
            ];
        */
        /* working version
            $faker = Faker::create();
            $word = $faker->word();
            return [
                'title' => $word,                          /* default one word *
                'content' => $faker->sentence(2), /* default 160 characters *
                'description' => $word.'.JPG',
                'created_at' => $faker->dateTimeBetween(),
                'updated_at' => $faker->dateTimeBetween(),
            ];
        */
        $this->faker = Faker::create();
        $word = $this->faker->word();
        return [
            'title' => $word,                       /* default one word */
            'content' => $this->faker->sentence(2), /* default 160 characters */
            'description' => $w.'.JPG',
            'created_at' => $this->faker->dateTimeBetween(),
            'updated_at' => $this->faker->dateTimeBetween(),
        ];
    }
}
