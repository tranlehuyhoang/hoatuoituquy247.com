<?php

namespace App\Livewire\New;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category as CategoryModel;

class Category extends Component
{
    use WithPagination;

    public $categorySlug;
    public $category;
    public $orderby = 'price'; // Default sort by price
    public $perPage = 60; // Default number of items per page

    public function mount($slug)
    {
        $this->categorySlug = $slug;
        $this->loadCategory();
    }

    public function loadCategory()
    {
        $this->category = CategoryModel::where('slug', $this->categorySlug)->first();
    }

    public function updatedOrderby()
    {
        $this->resetPage(); // Reset pagination when the order changes
    }

    public function render()
    {
        // Apply the sorting logic
        $productsQuery = Product::where('category_id', $this->category->id);

        // Sort products based on the selected order
        if ($this->orderby == 'price') {
            $productsQuery = $productsQuery->orderBy('price', 'asc');
        } elseif ($this->orderby == 'price-desc') {
            $productsQuery = $productsQuery->orderBy('price', 'desc');
        } elseif ($this->orderby == 'date') {
            $productsQuery = $productsQuery->orderBy('created_at', 'desc');
        }

        // Paginate the products
        $products = $this->category ? $productsQuery->paginate($this->perPage) : collect();

        return view('livewire.new.category', ['products' => $products]);
    }
}
