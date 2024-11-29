<?php

namespace App\Livewire\New\Inc;
use App\Models\Category;
use Livewire\Component;

class Menu extends Component
{
    public $categories;
    public function mount()
    {
        $categories = Category::with('subCategories')->where('by_cat', 0)->get();
        $this->categories = $categories;
    }
    public function render()
    {
        return view('livewire.new.inc.menu');
    }
}
