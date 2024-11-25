<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'status',
        'name',
        'price',
        'discount_price',
        'image',
        'stock',
        'product_id',
        'warranty_days',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
