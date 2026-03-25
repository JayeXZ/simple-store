<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    User::create([
        'name'     => 'Admin',
        'email'    => 'admin@simple-store.com',
        'password' => bcrypt('password'),
        'role'     => 'admin',
    ]);
}

}
