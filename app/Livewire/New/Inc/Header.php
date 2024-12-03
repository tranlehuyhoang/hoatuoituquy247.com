<?php

namespace App\Livewire\New\Inc;

use Livewire\Component;
use App\Models\Category; // Đảm bảo đường dẫn đúng với model của bạn
use App\Helpers\CartManagement;
use App\Models\ActivityHistory;
class Header extends Component
{
    public $categories ;
    public $cartItems ;
    public $total_amount = 0;

    public function mount()
    {
        $this->cartItems = CartManagement::getCartItemsFromCookie(); // Retrieve cart items from cookie
        $this->total_amount = CartManagement::calculateGrandTotal($this->cartItems);
        $categories = Category::with('subCategories')->where('by_cat', null)->get();
        $this->categories = $categories;
        ActivityHistory::create([
            'time' => now(), // Thời gian hiện tại
            'device' => request()->header('User-Agent'), // Thiết bị người dùng
        ]);
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
        return view('livewire.new.inc.header', [
            'categories' => $this->categories,
        ]);
    }
}
