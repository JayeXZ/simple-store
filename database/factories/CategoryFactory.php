
public function definition(): array
{
    $name = fake()->unique()->words(2, true);
    return [
        'name' => ucfirst($name),
        'slug' => Str::slug($name),
    ];
}
