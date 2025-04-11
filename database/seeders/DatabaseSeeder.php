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
            'email' => 'tasker@gmail.com',
            'password' => bcrypt(12345),
            'role' => 'tasker',
        ]);

        User::create([
            'name' => 'tasker2',
            'email' => 'tasker2@gmail.com',
            'password' => bcrypt(12345),
            'role' => 'tasker',
        ]);

        User::create([
            'name' => 'worker',
            'email' => 'worker@gmail.com',
            'password' => bcrypt(12345),
            'role' => 'worker',
        ]);

        User::create([
            'name' => 'agus',
            'email' => 'agus@gmail.com',
            'password' => bcrypt(12345),
            'role' => 'worker',
        ]);

        User::create([
            'name' => 'asep',
            'email' => 'asep@gmail.com',
            'password' => bcrypt(12345),
            'role' => 'worker',
        ]);

        User::create([
            'name' => 'mamat',
            'email' => 'mamat@gmail.com',
            'password' => bcrypt(12345),
            'role' => 'worker',
        ]);
    }
}
