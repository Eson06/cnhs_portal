<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\role;
use App\Models\User;
use App\Models\user_role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'lrn' => '000',
            'name' => 'JASON GARAB',
            'user_name' => 'SUPERADMIN',
            'password' => bcrypt('Admin123'),
        ]);

           user_role::create([
            'user_id' => 1,
            'role_id' => '1',
        ]);

        role::create([
            'id' => 1,
            'role_name' => 'SUPER ADMINISTRATOR',
        ]);

        role::create([
            'id' => 2,
            'role_name' => 'ADMIN',
        ]);

        role::create([
            'id' => 3,
            'role_name' => 'TEACHER',
        ]);

            role::create([
            'id' => 4,
            'role_name' => 'STUDENT',
        ]);
    }
}
