<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', // ID của danh mục cha
        'name',        // Tên của danh mục con
        'slug',        // Slug cho danh mục con
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Nếu bạn muốn thêm phương thức để tạo slug

}
