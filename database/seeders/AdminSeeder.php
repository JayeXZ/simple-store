<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Jaye Stanley P. Buhwilon',
            'email'    => 'buhwilonjaye@gmail.com',
            'password' => bcrypt('password'),
            'role'     => 'admin',
        ]);
    }
}
