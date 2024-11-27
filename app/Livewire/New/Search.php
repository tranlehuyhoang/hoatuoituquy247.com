<?php
namespace App\Livewire\New;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Http\Request;

class Search extends Component
{
    public $search;
    public $orderby = 'popularity'; // Default sorting option

    public function mount(Request $request)
    {
        $this->search = $request->s;
        $this->orderby = $request->orderby ?? 'popularity'; // Ensure the 'orderby' value is set from the URL or defaults to 'popularity'
    }

    public function render()
    {
        // Query products based on search term and sort them according to the selected orderby value
        $products = Product::where('name', 'like', '%' . $this->search . '%');

        // Apply sorting based on the selected order
        switch ($this->orderby) {
            case 'price':
                $products = $products->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $products = $products->orderBy('price', 'desc');
                break;
            case 'date':
                $products = $products->orderBy('created_at', 'desc');
                break;
            case 'popularity':
            default:
            $products = $products->orderBy('created_at', 'desc');
                break;
        }

        $products = $products->get();

        return view('livewire.new.search', compact('products'));
    }
}
