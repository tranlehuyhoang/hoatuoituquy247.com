<?php

namespace App\Livewire\New\Inc;

use Livewire\Component;
use App\Models\Category; // Đảm bảo đường dẫn đúng với model của bạn

class Header extends Component
{
    public $categories ;

    public function mount()
    {
        $categories = Category::with('subCategories')->where('by_cat', 0)->get();
        $this->categories = $categories;
    }

    public function render()
    {
        return view('livewire.new.inc.header', [
            'categories' => $this->categories,
        ]);
    }
}
