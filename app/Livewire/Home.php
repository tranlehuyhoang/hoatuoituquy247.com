<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Slide;
use App\Models\Product;
use Livewire\Component;
use App\Jobs\CheckPayment;
class Home extends Component
{
    public $slides;
    public $categories;
    public $latestPosts;
    public $latestProducts; // Biến để lưu sản phẩm mới nhất

    public function mount()
    {
        $this->slides = Slide::get();
        $this->categories = Category::with('subcategories')->get();

        $this->categories->transform(function ($category) {
            $category->random_products = Product::where('category_id', $category->id)
                ->inRandomOrder()
                ->take(8)
                ->get();
            return $category;
        });

        $this->latestPosts = Blog::latest()->take(8)->get();
        $this->latestProducts = Product::latest()->take(4)->get(); // Lấy 4 sản phẩm mới nhất
    }

    public function render()
    {
        return view('livewire.home', [
            'categories' => $this->categories,
            'latestPosts' => $this->latestPosts,
            'latestProducts' => $this->latestProducts, // Truyền sản phẩm mới nhất vào view
        ]);
    }
}