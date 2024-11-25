<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $subcategories = [];

        // Giả sử bạn đã có 20 danh mục cha trong bảng categories
        for ($categoryId = 24; $categoryId <= 41; $categoryId++) {
            for ($i = 1; $i <= 10; $i++) {
                $subcategories[] = [
                    'category_id' => $categoryId,
                    'name' => 'Danh mục con ' . $i . ' của Danh mục ' . $categoryId,
                    'slug' => 'danh-muc-con-' . $i . '-danh-muc-' . $categoryId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('subcategories')->insert($subcategories);
    }
}