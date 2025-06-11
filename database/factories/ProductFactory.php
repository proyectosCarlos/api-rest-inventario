<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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

        return [

            'category_id' => fake()->numberBetween(1, 10),
            'name' => fake()->unique()->words(2, true),
            'description' => fake()->text(),
            'price' => fake()->numberBetween(100, 20000),
            'stock' => fake()->numberBetween(1, 100),
        ];
    }
}
