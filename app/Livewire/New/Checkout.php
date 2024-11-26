<?php

namespace App\Livewire\New;

use Livewire\Component;
use App\Helpers\CartManagement;
class Checkout extends Component
{
    public $cartItems = []; // Property to hold cart items
    public function mount()
    {
        $this->cartItems = CartManagement::getCartItemsFromCookie(); // Retrieve cart items from cookie
    }
    public function render()
    {
        return view('livewire.new.checkout');
    }
}
