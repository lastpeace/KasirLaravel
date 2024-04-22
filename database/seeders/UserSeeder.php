<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        // Customer
        User::create([
            'name' => 'Customer',
            'email' => 'customer@example.com',
            'password' => Hash::make('customer'),
            'role' => 'customer',
        ]);
    }
}
