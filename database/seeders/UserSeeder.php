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

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);


        User::create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('customer123'),
            'role' => 'customer',
        ]);
    }
}
