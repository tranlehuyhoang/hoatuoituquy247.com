<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'hotline',
        'email',
        'website',
        'copyright',
        'logo',
        'logo_light',
        'purchase_terms',
        'purchase_guide',
        'payment_guide',
        'shipping_policy',
        'warranty_policy',
        'privacy_policy',
        'return_policy',
        'introduction',
        'contact',
        'recruitment',
        'so_tai_khoan',
        'ngan_hang',
        'facebook',
        'youtube',
        'shopee',
        'zalo',
        'web_icon',
        'company_description',
        'ministry_of_industry_and_trade_link',
        'map',
        'web_name',
        'description_web',
        'banner_web',
    ];
}
