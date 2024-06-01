<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $products = [
            [
                'name' => 'Fried Chicken Nugget',
                'type' => 'makanan',
                'price' => 19000,
                'description' => 'Lorem ipsum dolor sit amet consectetur. A bibendum in ut tellus. Est cras amet.',
                'image' => 'Fried Chicken Nugget.png',
            ],
            [
                'name' => 'Es Teh',
                'type' => 'minuman',
                'price' => 5000,
                'description' => 'Lorem ipsum dolor sit amet consectetur. A bibendum in ut tellus. Est cras amet.',
                'image' => 'Es Teh.png',
            ],
            [
                'name' => 'Keripik Kentang',
                'type' => 'snack',
                'price' => 8000,
                'description' => 'Lorem ipsum dolor sit amet consectetur. A bibendum in ut tellus. Est cras amet.',
                'image' => 'Keripik Kentang.png',
            ],
            [
                'name' => 'Mentai Beef BBQ Rice',
                'type' => 'makanan',
                'price' => 21000,
                'description' => 'Lorem ipsum dolor sit amet consectetur. A bibendum in ut tellus. Est cras amet.',
                'image' => 'Mentai Beef BBQ Rice.png',
            ],
            [
                'name' => 'Korean Sausage Egg Noodle',
                'type' => 'makanan',
                'price' => 19000,
                'description' => 'Lorem ipsum dolor sit amet consectetur. A bibendum in ut tellus. Est cras amet.',
                'image' => 'Korean Sausage Egg Noodle.png',
            ],
            [
                'name' => 'Mix Platter',
                'type' => 'snack',
                'price' => 24000,
                'description' => 'Lorem ipsum dolor sit amet consectetur. A bibendum in ut tellus. Est cras amet.',
                'image' => 'Mix Platter.png',
            ],
        ];

        foreach ($products as $product) {
            // Salin gambar dari public/seeder_images ke public/storage/images
            $sourcePath = public_path('seeder_images/' . $product['image']);
            $destinationPath = storage_path('app/public/images/' . $product['image']);

            if (File::exists($sourcePath)) {
                File::copy($sourcePath, $destinationPath);
            }

            // Buat produk baru di database
            Product::create($product);
        }
    }

}
