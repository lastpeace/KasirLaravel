<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Table;

class TableSeeder extends Seeder
{
    public function run()
    {
        $tables = [
            ['name' => 'Table 1', 'capacity' => '2'],
            ['name' => 'Table 2', 'capacity' => '2'],
            ['name' => 'Table 3', 'capacity' => '6'],
            ['name' => 'Table 4', 'capacity' => '6'],
            ['name' => 'Table 5', 'capacity' => '6'],
            ['name' => 'Table 6', 'capacity' => '4'],
            ['name' => 'Table 7', 'capacity' => '6'],
            ['name' => 'Table 8', 'capacity' => '4'],
            ['name' => 'Table 9', 'capacity' => '4'],
            ['name' => 'Table 10', 'capacity' => '10'],
            ['name' => 'Table 11', 'capacity' => '10'],
        ];

        Table::insert($tables);
    }
}
