<?php

namespace App\Livewire\New;

use Livewire\Component;
use App\Models\Order;
class Thanks extends Component
{
    public $code;
    public $order;
    public function mount($code)
    {
        $this->code = $code;
        $this->order = Order::where('order_code', $code)->with('items')->first();
    }
    public function render()
    {
        return view('livewire.new.thanks');
    }
}
