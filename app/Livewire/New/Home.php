<?php

namespace App\Livewire\New;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
class Home extends Component
{
    public $categories;
    public function mount()
    {
        $this->categories = Category::get();
        $this->categories->transform(function ($category) {
            $category->random_products = Product::where('category_id', $category->id)
                ->inRandomOrder()
                ->take(10)
                ->get();
            return $category;
        });
    }

    public function render()
    {
        return view('livewire.new.home');
    }
}
