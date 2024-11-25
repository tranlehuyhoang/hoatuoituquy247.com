<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Livewire\Component;

class Cart extends Component
{
    public $cartItems = [];
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function mount()
    {
        $this->cartItems = CartManagement::getCartItemsFromCookie();
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

    public function render()
    {
        return view('livewire.cart', [
            'cartItems' => $this->cartItems,
            'totalPrice' => $this->totalPrice,
            'totalQuantity' => $this->totalQuantity,
        ]);
    }
}