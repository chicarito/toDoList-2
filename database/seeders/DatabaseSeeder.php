<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(12345),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'tasker',
            'email' => 'raffiahmad0649@gmail.com',
            'password' => bcrypt(12345),
            'role' => 'tasker',
        ]);

        User::create([
            'name' => 'worker',
            'email' => 'ahmadraffi349@gmail.com',
            'password' => bcrypt(12345),
            'role' => 'worker',
        ]);
    }
}
