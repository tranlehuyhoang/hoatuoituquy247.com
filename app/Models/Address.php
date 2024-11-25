<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'full_name',           // Họ và tên
        'phone',               // Số điện thoại
        'province',            // Tỉnh/Thành phố
        'district',            // Quận/Huyện
        'ward',                // Xã/Phường
        'detailed_address',    // Địa chỉ chi tiết
        'order_id',            // Liên kết với order
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

 
}
