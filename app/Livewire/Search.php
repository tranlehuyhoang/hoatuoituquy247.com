<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product;

class Search extends Component
{
    public $searchTerm;

    public function mount(Request $request)
    {
        $this->searchTerm = $request->query('query', '');
    }

    public function render()
    {
        
        $products = Product::where('name', 'like', '%' . $this->searchTerm . '%')
        ->with('variants')
        ->get();
        return view('livewire.search', [
            'products' => $products,
        ]);
    }
}