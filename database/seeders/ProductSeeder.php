<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::create([
            'name' => 'Fried Chicken Nugget',
            'type' => 'makanan',
            'price' => 19000,
            'description' => 'Lorem ipsum dolor sit amet consectetur. A bibendum in ut tellus. Est cras amet.',
            'image' => 'images/img1.png',
        ]);

        Product::create([
            'name' => 'Es Teh',
            'type' => 'minuman',
            'price' => 5000,
            'description' => 'Lorem ipsum dolor sit amet consectetur. A bibendum in ut tellus. Est cras amet.',
            'image' => 'images/img3.png',
        ]);

        Product::create([
            'name' => 'Keripik Kentang',
            'type' => 'snack',
            'price' => 8000,
            'description' => 'Lorem ipsum dolor sit amet consectetur. A bibendum in ut tellus. Est cras amet.',
            'image' => 'images/img2.png',
        ]);

        Product::create([
            'name' => 'Mentai Beef BBQ Rice',
            'type' => 'makanan',
            'price' => 21000,
            'description' => 'Lorem ipsum dolor sit amet consectetur. A bibendum in ut tellus. Est cras amet.',
            'image' => 'images/img4.png',
        ]);

        Product::create([
            'name' => 'Korean Sausage Egg Noodle',
            'type' => 'makanan',
            'price' => 19000,
            'description' => 'Lorem ipsum dolor sit amet consectetur. A bibendum in ut tellus. Est cras amet.',
            'image' => 'images/img5.png',
        ]);

        Product::create([
            'name' => 'Mix Platter',
            'type' => 'snack',
            'price' => 24000,
            'description' => 'Lorem ipsum dolor sit amet consectetur. A bibendum in ut tellus. Est cras amet.',
            'image' => 'images/img6.png',
        ]);
    }

}
