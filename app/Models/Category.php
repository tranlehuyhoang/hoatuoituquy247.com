<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product_cat()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'by_cat', 'id');
    }
}
