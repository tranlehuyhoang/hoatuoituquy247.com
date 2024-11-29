<?php

namespace App\Livewire\New;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderSuccess;
class Thanks extends Component
{
    public $code;
    public $order;
    public function mount($code)
    {
        $this->code = $code;
        $this->order = Order::where('order_code', $code)->with('items')->first();
        $this->sendOrderSuccessEmail();

    }
    protected function sendOrderSuccessEmail()
    {
        Mail::to($this->order->email)->send(new OrderSuccess($this->order));
    }

    public function render()
    {
        return view('livewire.new.thanks');
    }
}
