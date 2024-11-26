<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Hoa Sinh Nhật',
                'short_description' => 'Hoa Sinh Nhật',
                'slug' => 'hoa-sinh-nhat1',
                'images' => json_encode(['products/01JDMBZD1MHDGJVD59FJ55V9V2.webp']),
                'description' => '<p>Hoa Sinh Nhật</p>',
                'price' => 1000,
                'is_active' => 1,
                'is_featured' => 0,
                'in_stock' => 1,
                'on_sale' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'status' => null,
                'category_id' => 45,
                'discount_price' => 0,
            ],
            // Thêm 9 sản phẩm khác
        ];

        for ($i = 2; $i <= 10; $i++) {
            $products[] = [
                'name' => 'Sản Phẩm ' . $i,
                'short_description' => 'Mô tả ngắn cho sản phẩm ' . $i,
                'slug' => 'san-pham-' . $i,
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
                'category_id' => 45,
                'discount_price' => 0,
            ];
        }

        DB::table('products')->insert($products);
    }
}
