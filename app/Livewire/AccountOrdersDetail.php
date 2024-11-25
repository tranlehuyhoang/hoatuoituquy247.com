<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class AccountOrdersDetail extends Component
{
    public $orderCode; // Để lưu trữ mã đơn hàng
    public $order; // Để lưu trữ thông tin đơn hàng
    public $orderItems; // Để lưu trữ các mục trong đơn hàng
    public $shippingAddress; // Để lưu trữ địa chỉ giao hàng

    // Phương thức mount để lấy thông tin đơn hàng dựa trên mã đơn hàng
    public function mount($orderCode)
    {
        $this->orderCode = $orderCode; // Lưu mã đơn hàng
        // Lấy đơn hàng từ cơ sở dữ liệu
        $this->order = Order::where('order_code', $orderCode)->first();

        // Kiểm tra xem đơn hàng có tồn tại không
        if (!$this->order) {
            return redirect()->to('/'); // Chuyển hướng nếu không tìm thấy đơn hàng
        }

        // Lấy các mục trong đơn hàng và địa chỉ giao hàng
        $this->orderItems = $this->order->items; // Giả sử 'items' là một quan hệ
        $this->shippingAddress = $this->order->address; // Giả sử 'address' là một quan hệ
    }

    public function render()
    {
        // dd([
        //     'order' => $this->order, // Truyền thông tin đơn hàng vào view
        //     'orderItems' => $this->orderItems, // Truyền các mục đơn hàng vào view
        //     'shippingAddress' => $this->shippingAddress, // Truyền địa chỉ giao hàng vào view
        // ]);
        return view('livewire.account-orders-detail', [
            'order' => $this->order, // Truyền thông tin đơn hàng vào view
            'orderItems' => $this->orderItems, // Truyền các mục đơn hàng vào view
            'shippingAddress' => $this->shippingAddress, // Truyền địa chỉ giao hàng vào view
        ]);
    }
}