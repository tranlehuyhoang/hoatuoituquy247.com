<?php

namespace App\Livewire\New;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category as CategoryModel;

class CuaHang extends Component
{
    use WithPagination;

    public $categorySlug;
    public $category;
    public $orderby = 'price'; // Default sort by price
    public $perPage = 60; // Default number of items per page

    public function mount()
    {
        // Initialization logic if needed
    }

    public function updatedOrderby()
    {
        $this->resetPage(); // Reset pagination when the order changes
    }

    public function render()
    {
        // Apply the sorting logic
        $productsQuery = Product::query(); // Using query builder to add pagination

        // Sort products based on the selected order
        if ($this->orderby == 'price') {
            $productsQuery = $productsQuery->orderBy('price', 'asc');
        } elseif ($this->orderby == 'price-desc') {
            $productsQuery = $productsQuery->orderBy('price', 'desc');
        } elseif ($this->orderby == 'date') {
            $productsQuery = $productsQuery->orderBy('created_at', 'desc');
        }

        // Paginate the products (use perPage for number of items per page)
        $products = $productsQuery->paginate($this->perPage);

        return view('livewire.new.cua-hang', ['products' => $products]);
    }
}
