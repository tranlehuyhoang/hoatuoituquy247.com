<?php
namespace App\Livewire\Inc;

use Livewire\Component;

class RelatedProduct extends Component
{
    public $relatedProducts;

    public function mount($relatedProducts)
    {
        $this->relatedProducts = $relatedProducts;
    }

    public function render()
    {
        return view('livewire.inc.related-product');
    }
}