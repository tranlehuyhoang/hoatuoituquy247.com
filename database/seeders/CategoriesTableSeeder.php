<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [];

        for ($i = 3; $i <= 20; $i++) {
            $categories[] = [
                'name' => 'Danh mục ' . $i,
                'banner' => 'category_banners/01J9XKJ76ZNYGBSHP11F4F1HE2.png',
                'slug' => 'danh-muc-' . $i,
                'image' => 'categories/01J9XKJ76F9FTCF5NT472SXAWA.png',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('categories')->insert($categories);
    }
}
