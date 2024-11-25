<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'images' => 'array'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function subcategory() {
        return $this->belongsTo(Subcategory::class , 'subcategory_id' );
    }
    public function subcategories() {
        return $this->belongsTo(Subcategory::class , 'subcategory_id' );
    }
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class); // Giả sử bạn có một model Review
    }

    public function productCount()
    {
        return $this->count();
    }
    public function isOutOfStock()
    {
        // Kiểm tra tất cả các biến thể của sản phẩm
        foreach ($this->variants as $variant) {
            // Kiểm tra nếu có bất kỳ biến thể nào có stock khác 'out_of_stock'
            if ($variant->stock != 'out_of_stock') {
                // Nếu có ít nhất một biến thể còn hàng, trả về false
                return false;
            }
        }
        
        // Nếu tất cả các biến thể đều hết hàng (stock == 'out_of_stock'), trả về true
        return true;
    }
    
}
