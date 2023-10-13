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
    public function definition()
    {
        return [
            'title' => fake()->name(),
            'slug' => fake()->slug(),
            'category_id' => rand(1,2),
            'brand_id' => rand(1,2),
            'sku' => fake()->name(),
            'price' => rand(1000,2000),
            'qty' => rand(1,2),
            'status' => rand(0,1),

        ];
    }
}
