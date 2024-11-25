<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination;

    // Khai báo các thuộc tính
    public $selectedPriceRanges = [];
    public $selectedBrands = []; // Thêm thuộc tính để lưu trữ thương hiệu đã chọn
    public $selectedStatuses = []; // Thêm thuộc tính để lưu trữ trạng thái đã chọn
    public $categories = [];
    public $brands = []; // Thêm thuộc tính để lưu trữ danh sách thương hiệu
    public $categories_all = [];
    public $categoryInfo;
    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $subcategorySlug = '';
    public $categorySlug = '';

    public function mount()
    {
        $this->categories_all = Category::with('subcategories')->get();
        $this->categories = Category::with('subcategories')->where('show_in_header', true)->get();
        $this->brands = Brand::all(); // Lấy tất cả thương hiệu

        $this->categorySlug = request()->query('category', '');
        $this->subcategorySlug = request()->query('subcategory', '');

        if ($this->categorySlug) {
            $this->categoryInfo = Category::where('slug', $this->categorySlug)->first();
        }
    }

    public function render()
    {
        $productsQuery = Product::with('variants')->where('name', 'like', "%{$this->search}%");

        // Lọc theo khoảng giá
        if (!empty($this->selectedPriceRanges)) {
            $productsQuery->where(function($query) {
                foreach ($this->selectedPriceRanges as $range) {
                    $query->orWhereRaw("price $range");
                }
            });
        }

        // Lọc theo thương hiệu
        if (!empty($this->selectedBrands)) {
            $productsQuery->whereIn('brand_id', $this->selectedBrands);
        }

        // Lọc theo trạng thái
        if (!empty($this->selectedStatuses)) {
            $productsQuery->whereIn('status', $this->selectedStatuses); // Thêm điều kiện lọc theo status
        }

        // Các điều kiện lọc khác
        if ($this->subcategorySlug) {
            $productsQuery->whereHas('subcategories', function ($query) {
                $query->where('slug', $this->subcategorySlug);
            });
        }

        if ($this->categorySlug) {
            $productsQuery->whereHas('categories', function ($query) {
                $query->where('slug', $this->categorySlug);
            });
        }

        // Sắp xếp và phân trang
        $products = $productsQuery
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(12);

        return view('livewire.shop', [
            'products' => $products,
            'categories' => $this->categories,
            'brands' => $this->brands,
            'categories_all' => $this->categories_all,
            'categoryInfo' => $this->categoryInfo,
        ]);
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }
}