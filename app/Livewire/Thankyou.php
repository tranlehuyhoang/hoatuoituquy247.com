<?php

namespace App\Livewire;

use App\Mail\OrderSuccess;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Thankyou extends Component
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
        $this->order = Order::where('order_code', $orderCode)->first();

        // Check if the order exists
        if (!$this->order) {
            return redirect()->to('/'); // Redirect to the desired page if order doesn't exist
        }

        // Retrieve the order items and shipping address
        $this->orderItems = $this->order->items; // Assuming 'items' is a relationship
        $this->shippingAddress = $this->order->address; // Assuming 'address' is a relationship

        // Gửi email xác nhận đơn hàng
        $this->sendOrderSuccessEmail();
    }

    // Phương thức gửi email xác nhận
    protected function sendOrderSuccessEmail()
    {
        Mail::to(auth()->user()->email)->send(new OrderSuccess($this->order, $this->orderItems, $this->shippingAddress,$this->orderCode));
    }

    public function render()
    {
        return view('livewire.thankyou', [
            'orderItems' => $this->orderItems, // Pass order items to the view
            'shippingAddress' => $this->shippingAddress, // Pass shipping address to the view
        ]);
    }
}
