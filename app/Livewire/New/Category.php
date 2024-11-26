<?php

namespace App\Livewire\New;

use Livewire\Component;
use App\Models\Product; // Đảm bảo bạn đã import model Product
use App\Models\Category as CategoryModel; // Đảm bảo bạn đã import model Category

class Category extends Component
{
    public $categorySlug; // Thuộc tính để lưu slug danh mục
    public $products; // Thuộc tính để lưu danh sách sản phẩm

    public function mount($slug) // Sử dụng mount để lấy slug từ tham số
    {
        $this->categorySlug = $slug;
        $this->loadProducts(); // Gọi phương thức để tải sản phẩm
        // dd($this->products);
    }

    public function loadProducts()
    {
        // Tìm danh mục theo slug
        $category = CategoryModel::where('slug', $this->categorySlug)->first();

        // Nếu có danh mục, lấy sản phẩm tương ứng
        if ($category) {
            $this->products = $category->products; // Giả sử có mối quan hệ 'products' trong model Category
        } else {
            $this->products = []; // Nếu không tìm thấy danh mục, gán mảng rỗng
        }
    }

    public function render()
    {
        return view('livewire.new.category', ['products' => $this->products]);
    }
}
