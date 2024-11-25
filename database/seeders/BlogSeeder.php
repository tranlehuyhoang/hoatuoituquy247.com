<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run()
    {
        for ($i = 3; $i <= 100; $i++) {
            DB::table('blogs')->insert([
                'title' => 'Hướng dẫn vệ sinh máy giặt đúng cách ' . $i,
                'slug' => 'huong-dan-ve-sinh-may-giat-dung-cach-' . $i,
                'description' => '<p>Máy giặt sử dụng lâu ngày không được vệ sinh đúng cách sẽ khiến máy giặt trở nên bẩn, bám cặn, điều này vô tình làm cho quần áo khi giặt sẽ không còn sạch và có mùi khó chịu.</p><p>Nếu máy giặt nhà bạn có những dấu hiệu trên thì đã đến lúc để làm sạch máy giặt hoàn toàn rồi đấy. Hãy thực hiện theo 5 bước sau để vệ sinh máy giặt thật sạch bạn nhé.</p>',
                'short_description' => 'Máy giặt sử dụng lâu ngày không được vệ sinh đúng cách sẽ khiến máy giặt trở nên bẩn, bám cặn.',
                'banner' => '01J9XQ35X1D4Z4GWJRK1CHCVJ8.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}