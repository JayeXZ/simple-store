<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
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
    $name = fake()->unique()->words(3, true);
    return [
        'category_id' => Category::inRandomOrder()->first()->id,
        'name'        => ucfirst($name),
        'slug'        => Str::slug($name),
        'description' => fake()->paragraph(),
        'price'       => fake()->randomFloat(2, 10, 500),
        'stock'       => fake()->numberBetween(0, 100),
        'image'       => null,
    ];
}



}
