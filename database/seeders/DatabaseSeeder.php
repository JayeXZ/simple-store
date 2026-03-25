<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Create admin user first
    $this->call(AdminSeeder::class);

    // Create 10 regular customers
    User::factory(10)->create();

    // Create 5 categories
    Category::factory(5)->create();

    // Create 20 products
    Product::factory(20)->create();

    // Create 10 orders with 30 order items
    Order::factory(10)->create();
    OrderItem::factory(30)->create();
}

}
