<?php

namespace App\Livewire\New;

use Livewire\Component;
use App\Helpers\CartManagement;
class Cart extends Component
{
    public $cartItems = []; // Property to hold cart items
    public $total_amount = 0;
    public function mount()
    {
        $this->cartItems = CartManagement::getCartItemsFromCookie(); // Retrieve cart items from cookie
        $this->total_amount = CartManagement::calculateGrandTotal($this->cartItems);
    }
    public function incrementQuantity($productId)
    {
        $this->cartItems = CartManagement::incrementQuantityToCartItem($productId);
        $this->calculateTotals();
    }

    public function decrementQuantity($productId)
    {
        $this->cartItems = CartManagement::decrementQuantityToCartItem($productId);
        $this->calculateTotals();
    }

    public function removeItem($productId)
    {
        $this->cartItems = CartManagement::removeCartItem($productId);
        $this->calculateTotals();
    }
    public function calculateTotals()
    {
        $this->totalPrice = array_reduce($this->cartItems, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $this->totalQuantity = array_reduce($this->cartItems, function ($carry, $item) {
            return $carry + $item['quantity'];
        }, 0);
    }
    public function render()
    {
        return view('livewire.new.cart');
    }
}
