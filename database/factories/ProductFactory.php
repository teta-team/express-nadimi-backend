<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
            'slug' => $this->faker->unique()->slug(),
            'name' => [
                'en' => $this->faker->words(2, true),
                'fa' => $this->faker->words(2, true),
                'ar' => $this->faker->words(2, true),
            ],
            'category' => $this->faker->randomElement(['orchard-fruits', 'stone-fruits', 'citrus-fruits', 'tropical-fruits']),
            'status' => 'available',
            'months' => array_fill(0, 12, true),
            'hidden' => false,
        ];
    }

    public function hidden(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'hidden' => true,
            ];
        });
    }
}
