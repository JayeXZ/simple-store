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
