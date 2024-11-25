<?php

namespace App\Livewire;

use App\Models\Product; // Đảm bảo bạn đã import model Product
use Livewire\Component;
use Livewire\WithPagination;

class SanPham extends Component
{
    use WithPagination;

    public $productsPerPage = 20; // Số sản phẩm hiển thị trên một trang
    public $sortBy = 'default'; // Thuộc tính để lưu trữ giá trị sắp xếp
    public $priceRange = '-1'; // Thuộc tính để lưu trữ khoảng giá
    public $keyword; // Thuộc tính để lưu trữ từ khóa tìm kiếm

    protected $paginationTheme = 'bootstrap'; // Thiết lập theme phân trang

    public function mount()
    {
        // Lấy từ khóa tìm kiếm từ URL nếu có
        if (request()->has('keyword')) {
            $this->keyword = request()->input('keyword');
        }

        // Lấy giá lọc từ URL nếu có
        if (request()->has('filter_price')) {
            $this->priceRange = request()->input('filter_price');
        }
    }

    public function updatedSortBy()
    {
        // Reset lại phân trang khi thay đổi giá trị sắp xếp
        $this->resetPage();
    }

    public function updatedpriceRange()
    {
        // Reset lại phân trang khi thay đổi giá lọc
        $this->resetPage();
    }

    public function setSort($sort)
    {
        $this->sortBy = $sort; // Cập nhật giá trị sắp xếp
    }

    public function render()
    {
        // Lấy tất cả sản phẩm
        $query = Product::query();

        // Lọc theo từ khóa tìm kiếm
        if ($this->keyword) {
            $query->where('name', 'like', '%' . $this->keyword . '%'); // Tìm kiếm theo tên sản phẩm
        }

        // Lọc theo khoảng giá
        if ($this->priceRange !== '-1') {
            $ranges = explode('-', $this->priceRange); // Tách khoảng giá
            // Lọc sản phẩm theo khoảng giá với giá trị chính xác
            $query->whereBetween('price', [(float)$ranges[0], (float)$ranges[1]]);
        }

        // Sắp xếp theo giá
        if ($this->sortBy === 'price_up') {
            $query->orderBy('price', 'asc'); // Sắp xếp tăng dần
        } elseif ($this->sortBy === 'price_down') {
            $query->orderBy('price', 'desc'); // Sắp xếp giảm dần
        }

        $products = $query->paginate($this->productsPerPage); // Phân trang sản phẩm

        return view('livewire.san-pham', [
            'products' => $products,
        ]);
    }
}