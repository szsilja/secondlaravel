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
       $productPrefixes = ['Apple', 'Banana', 'Pear', 'Cherry', 'Plum', 'Ananas'];
       $name = fake()->name() . ' ' . $productPrefixes[fake()->numberBetween(0, 5)]; 
        return [
            'name' => fake()->name(),
            'description' => fake()->paragraph(1),
            'price' => fake()->numberBetween(1000, 4000),
            'image' => fake()->imageUrl(),
        ];
    }
}
