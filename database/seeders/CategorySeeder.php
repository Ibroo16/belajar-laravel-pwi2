<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('category_product')->insert([
            [
                'id_category' => 1,
                'category_name' => 'Makanan US',
                'description' => 'Makanan khas Amerika',
                'created_at' => now(),
            ],
            [
                'id_category' => 2,
                'category_name' => 'Makanan Asia',
                'description' => 'Makanan khas Asia',
                'created_at' => now(),
            ],
            [
                'id_category' => 3,
                'category_name' => 'Makanan Ringan',
                'description' => 'Makanan ringan',
                'created_at' => now(),
            ],
        ]);
    }
}