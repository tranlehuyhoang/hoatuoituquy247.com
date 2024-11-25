<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order; // Đảm bảo đã import mô hình Order
use Illuminate\Support\Facades\Auth; // Import Auth để xác thực người dùng

class AccountOrders extends Component
{
    public $orders;

    public function mount()
    {
        // Lấy tất cả đơn hàng của người dùng đã đăng nhập
        $this->orders = Auth::user()->orders;
    }

    public function render()
    {
        // dd($this->orders);
    //     [▼
    //     "id" => 21
    //     "user_id" => 1
    //     "grand_total" => "615.00"
    //     "payment_method" => "bank"
    //     "payment_status" => "pending"
    //     "status" => "new"
    //     "currency" => "pending"
    //     "shipping_amount" => null
    //     "shipping_method" => "pending"
    //     "notes" => null
    //     "created_at" => "2024-10-12 17:18:10"
    //     "updated_at" => "2024-10-20 15:01:06"
    //     "order_code" => "WEB03-9191627610"
    //   ]
        return view('livewire.account-orders', [
            'orders' => $this->orders, // Truyền đơn hàng vào view
        ]);
    }
}