<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Transaction;
use Livewire\Component;

class Checkpayment extends Component
{
    public $orderCode;
    public $order;
    public $shipping_amount;
    public $grand_total;
    public $transaction;

    public function mount($orderCode)
    {

        $this->orderCode = $orderCode;
        $this->order = Order::where('order_code', $orderCode)->first();

        // Kiểm tra nếu order không tồn tại
        if (!$this->order) {
            abort(404, 'Order không tồn tại.');
        }

        $this->shipping_amount = $this->order->shipping_amount;
        $this->grand_total = $this->order->grand_total;

        // Lấy transaction dựa trên order_code
        $this->transaction = Transaction::where('order_code', $orderCode)->first();
 
        // Kiểm tra nếu transaction tồn tại và điều kiện thanh toán
        if ($this->transaction 
            && $this->transaction->amount_in == ($this->shipping_amount + $this->grand_total)
            && str_contains($this->transaction->transaction_content, $orderCode)
        ) {
            // Cập nhật trạng thái thanh toán của order
            $this->order->update(['payment_status' => 'paid']);
        }
    }

    public function render()
    {
        return view('livewire.checkpayment');
    }
}
