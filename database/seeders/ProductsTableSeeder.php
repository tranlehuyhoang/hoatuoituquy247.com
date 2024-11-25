<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [];

        // Thêm 10 sản phẩm cho mỗi danh mục con từ ID 3 đến 27
        for ($subcategoryId = 15; $subcategoryId <= 15; $subcategoryId++) {
            for ($i = 1; $i <= 10; $i++) {
                $products[] = [
                    'brand_id' => 1, // Giả sử brand_id là 1
                    'name' => 'Sản phẩm ' . $i . ' của danh mục con ' . $subcategoryId,
                    'short_description' => '<p>Mô tả ngắn cho sản phẩm ' . $i . ' của danh mục con ' . $subcategoryId . '</p>',
                    'slug' => 'san-pham-' . $i . '-danh-muc-con-' . $subcategoryId,
                    'images' => json_encode([
                        "products/01J9XMGCJN2GSB4KD1PD7A0Y7R.png",
                        "products/01J9XMGCJHD3JBJ33064JRM90A.png",
                        "products/01J9XMGCJCJWBF1PP157TFGXZT.png",
                        "products/01J9XMGCJTSAHKQ3W032ETWFHA.png"
                    ]),
                    'description' => '<p>Màu sắc:Màu đen vàng</p><p>Kích thước:Chiều dài: 34cm, Đường kính vòng thập: 2 và 2.6cm, bề dày 0.6cm dễ dàng sử dụng cho đầu kích đường kính từ 2-2.5cm, bề dày 0.5cm</p><p>Chất liệu:Thép nhiệt mạ màu không gỉ sét</p><p>Bộ sản phẩm bao gồm:Cờ lê + chuyển đổi + túi đựng</p><p>Công dụng:Kích nâng gầm xe ô tô, xe máy trong trường hợp khẩn cấp</p>',
                    'price' => 125000, // Giá sản phẩm
                    'is_active' => 1, // Trạng thái hoạt động
                    'is_featured' => 0, // Có nổi bật hay không
                    'in_stock' => 1, // Có hàng
                    'on_sale' => 0, // Đang giảm giá hay không
                    'created_at' => now(),
                    'updated_at' => now(),
                    'subcategory_id' => $subcategoryId, // ID danh mục con
                ];
            }
        }

        DB::table('products')->insert($products);
    }
}