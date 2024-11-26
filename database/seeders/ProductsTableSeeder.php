<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [

            // Thêm 9 sản phẩm khác
        ];

        for ($i = 1; $i <= 11; $i++) {
            $products[] = [
                'name' => 'Sản Phẩm ' . $i,
                'short_description' => 'Mô tả ngắn cho sản phẩm ' . $i,
                'slug' => 'san-pham1-' . $i,
                'images' => json_encode(['products/01JDMBZD1MHDGJVD59FJ55V9V2.webp']),
                'description' => '<p>Mô tả chi tiết cho sản phẩm ' . $i . '</p>',
                'price' => 1000 * $i,
                'is_active' => 1,
                'is_featured' => ($i % 2 == 0) ? 1 : 0, // Chỉ định sản phẩm nổi bật cho các sản phẩm chẵn
                'in_stock' => 1,
                'on_sale' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'status' => null,
                'category_id' => 46,
                'discount_price' => 0,
            ];
        }

        DB::table('products')->insert($products);
    }
}
