<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Các trường có thể được gán giá trị
    protected $fillable = [
        'product_id', // ID của sản phẩm
        'rating', // Đánh giá từ 1 đến 5
        'comment', // Nhận xét của người dùng
        'name', // Tên người đánh giá
        'phone', // Số điện thoại
        'email', // Email

    ];

    // Quan hệ với model Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
