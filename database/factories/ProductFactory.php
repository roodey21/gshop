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
        $categories = \App\Models\Category::pluck('id')->toArray();
        return [
            'name' => fake()->word(),
            'slug' => fake()->slug(),
            'sku' => fake()->word(),
            'description' => fake()->sentence(),
            'category_id' => $this->faker->randomElement($categories),
            'price' => rand(1000, 100000),
            'weight' => rand(1000, 10000),
            'status' => rand(0, 1),
        ];
    }
}
