<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        for ($i = 10; $i < 50; $i++) {
            DB::table('products')->insert([
                'brand_id' => 1,
                'name' => 'Bàn phím cơ Lucky65 v2 | Only KIT ' . ($i + 1),
                'short_description' => '<p>123</p>',
                'slug' => 'ban-phim-co-lucky65-v2-only-kit-' . Str::random(20), // Random slug
                'images' => json_encode([
                    'products/01JA5FPD38PSQV73JVRS5BK22C.png',
                    'products/01JA5FPD3FSCWK346DNKA1JHQB.png',
                    'products/01JA5FPD3NYKVPSRBR8VDKP0XG.png',
                    'products/01JA5FPD3T35ZMTYA7P3AT4HF8.png',
                    'products/01JA5FPD3ZN7VMXWX4XBQE2JXQ.png',
                    'products/01JA5FPD44SNXCB2JBE5FCDX7P.png',
                    'products/01JA5FPD49XDR1MYRC7028BBN8.png'
                ]),
                'description' => '<p><strong>🔖 Dự kiến hàng về: 1 tháng</strong></p><p><strong>🔖 Cách thức đặt hàng:</strong></p><ol><li>Lựa chọn màu sắc và thêm vào giỏ hàng</li><li>Bấm "Thanh toán đơn hàng" và điển thông tin nhận hàng</li><li>Chọn phương thức thanh toán COD</li><li>Chuyển khoản cọc 200.000K vào STK: TECHCOMBANK - 5685206688 - HOANG VAN MANH, ghi chú mã đơn hàng + SĐT đặt hàng</li><li>Khi hàng về tới shop, Shop chủ động liên hệ cho quý khách thông qua sđt đặt hàng.</li></ol><p><strong>🔖 Thông tin sản phẩm:</strong></p><ul><li>Tên bàn phím: Lucky65 v2</li><li>Loại: CNC Aluminum Mechanical Keyboard</li><li>Layout: 65% Layout, 67nút&nbsp;</li><li>PCB: mạch xuôi, LED RGB <strong>1.6mm non flexcut</strong></li><li>App<strong>: QMK/VIA</strong></li><li><strong>Tạ đáy thép pha lê</strong></li><li>Kiểu mount: Gasket Mounted</li><li>Dung lượng PIN: 3750mAh</li><li>Kết nối: Wired Type-C/Bluetooth/2.4G Wireless</li><li>Khối lượng: 1205g/2.66lb</li><li>Hot Swappable: 5 Pin</li><li>Kích thước: 326 x 115 x 33mm</li><li>Cấu trúc ball-catch dễ dàng tháo lắp</li><li>Badge nam châm, khoang cất receiver nằm dưới badge</li><li>Kit có sẵn đầy đủ foam</li><li><em>Kicap hỗ trợ build sẵn full phím cho anh em theo yêu cầu&nbsp;</em></li></ul>',
                'price' => 123,
                'is_active' => 1,
                'is_featured' => 0,
                'in_stock' => 1,
                'on_sale' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'subcategory_id' => 4,
                'status' => 'available',
                'category_id' => 44,
                'discount_price' => 0,
            ]);
        }
    }
}