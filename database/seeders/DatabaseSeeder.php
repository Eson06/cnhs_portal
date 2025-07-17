<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'JASON GARAB',
            'user_name' => 'SUPERADMIN',
            'status' => 'ACTIVE',
            'role' => 'SUPERADMIN',
            'password' => bcrypt('Admin123'),
        ]);

        role::create([
            'id' => 1,
            'role_name' => 'SUPER ADMINISTRATOR',
        ]);

        role::create([
            'id' => 2,
            'role_name' => 'ENCODER',
        ]);

        role::create([
            'id' => 3,
            'role_name' => 'MONITORING',
        ]);
    }
}
