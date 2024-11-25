<?php

namespace App\Livewire;

use App\Jobs\CheckPayment;
use App\Models\Order;
use Livewire\Component;

class Bank extends Component
{
    public $orderCode; // To store the order code
    public $order; // To store the order information
    public $orderItems; // To store the order items
    public $shippingAddress; // To store the shipping address

    // Mount function to retrieve order information based on the order code
    public function mount($orderCode)
    {
        $this->orderCode = $orderCode; // Store the order code
        // Retrieve the order from the database
        $this->order = Order::where('order_code', $orderCode)
        ->where('payment_method', 'bank') // Điều kiện phương thức thanh toán là bank
        ->where('payment_status', 'pending') // Điều kiện trạng thái thanh toán là pending
        ->first();

        // Check if the order exists
        if (!$this->order) {
            return redirect()->to('/thanks/'.$this->orderCode);  // Redirect to the desired page if order doesn't exist
        }

        // Retrieve the order items and shipping address
        $this->orderItems = $this->order->items; // Assuming 'items' is a relationship
        $this->shippingAddress = $this->order->address; // Assuming 'address' is a relationship
  
    }

    public function render()
    {
        return view('livewire.bank' ,[
            'orderItems' => $this->orderItems, // Pass order items to the view
            'shippingAddress' => $this->shippingAddress, // Pass shipping address to the view
        ]);
    }
}
