<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat user
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        // Buat order
        Order::create([
            'user_id' => $user->id,
            'product_id' => 1,
            'quantity' => 2,
            'total_price' => 20000,
            'status' => 'completed',
        ]);

        // Buat reservation
        Reservation::create([
            'name' => 'John Doe',
            'user_id' => $user->id,
            'phone_number' => '123456789',
            'date' => '2024-05-20',
            'time' => '19:00',
            'number_of_people' => 4,
            'table_number' => 5,
            'notes' => 'Prefer smoking area',
        ]);
    }
}
