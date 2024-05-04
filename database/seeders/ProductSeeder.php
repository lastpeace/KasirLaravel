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
            'name' => 'Nasi Goreng',
            'type' => 'makanan',
            'price' => 15000,
            'image' => 'path/to/nasi_goreng.jpg', // Ubah dengan path gambar yang benar
        ]);

        Product::create([
            'name' => 'Es Teh',
            'type' => 'minuman',
            'price' => 5000,
            'image' => 'path/to/es_teh.jpg', // Ubah dengan path gambar yang benar
        ]);

        Product::create([
            'name' => 'Keripik Kentang',
            'type' => 'snack',
            'price' => 8000,
            'image' => 'path/to/keripik_kentang.jpg', // Ubah dengan path gambar yang benar
        ]);
    }

}
