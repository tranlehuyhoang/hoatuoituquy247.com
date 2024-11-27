<?php

namespace App\Livewire\New;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Helpers\CartManagement;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Checkout extends Component
{
    use LivewireAlert; // Thêm trait LivewireAlert

    public $shipping_amount = 30000; // Set your shipping fee here
    public $shipping_method = 'home_delivery'; // Set your shipping fee here
    public $subtotal; // To hold the subtotal amount
    public $profit_loss; // To hold the subtotal amount
    public $note; // To hold the total amount including shipping
    public $paymentMethod; // To hold the total amount including shipping
    public $total; // To hold the total amount including shipping
    public $cartItems = []; // Property to hold cart items
    public function mount()
    {
        $this->cartItems = CartManagement::getCartItemsFromCookie(); // Retrieve cart items from cookie
        $this->calculateTotals(); // Calculate the totals based on fetched items


    }
    public function placeOrder()
    {
        // Kiểm tra xem giỏ hàng có trống không
        if (empty($this->cartItems)) {
            $this->alert('error', 'Giỏ hàng của bạn đang trống. Vui lòng thêm sản phẩm trước khi đặt hàng.');
            return; // Ngừng thực hiện nếu giỏ hàng trống
        }

        // Thực hiện giao dịch cơ sở dữ liệu để đảm bảo tính nhất quán
        DB::transaction(function () {
            $order_code = $this->generateUniqueOrderCode();

            // Tạo đơn hàng
            if ($this->total > 800000) {
                $this->shipping_amount = 0;
            }

            // Create the order
            $order = Order::create([
                'user_id' => auth()->id() ?? 1,
                'grand_total' => $this->total ,
                'payment_method' => $this->paymentMethod ?? 'bank',
                'payment_status' => 'pending',
                'currency' => 'VND',
                'shipping_method' => $this->shipping_method,
                'order_code' => $order_code,
                'notes' => $this->note,
                'shipping_amount' => $this->shipping_method === 'in_store_pickup' ? 0 : $this->shipping_amount,
            ]);

            // Tạo địa chỉ giao hàng
            Address::create([
                'order_id' => $order->id,
                'full_name' => $this->shippingAddress['full_name'] ?? '',
                'phone' => $this->shippingAddress['phone'] ?? '',
                'province' => $this->shippingAddress['province'] ?? '',
                'district' => $this->shippingAddress['district'] ?? '',
                'ward' => $this->shippingAddress['ward'] ?? '',
                'detailed_address' => $this->shippingAddress['detailed_address'] ?? '',
            ]);
                // dd($order);
            // Tạo mục đơn hàng cho từng sản phẩm trong giỏ
            foreach ($this->cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_amount' => $item['unit_amount'],
                    'total_amount' => $item['total_amount'],
                ]);
            }

            CartManagement::clearCartItems();
            if($this->paymentMethod == 'bank'){
                return redirect()->route('bank', ['orderCode' => $order->order_code]);
            }else{
                return redirect()->route('thanks', ['orderCode' => $order->order_code]);
            }


        });
    }
    protected function generateUniqueOrderCode()
    {
        do {
            $uniqueNumber = mt_rand(1000000000, 9999999999); // Tạo số ngẫu nhiên 10 chữ số
            $order_code = 'WEB03' . $uniqueNumber; // Tạo mã đơn hàng
        } while (Order::where('order_code', $order_code)->exists()); // Kiểm tra xem mã có tồn tại trong DB không

        return $order_code; // Trả về mã đơn hàng duy nhất
    }
    public function calculateTotals()
    {
        $this->subtotal = 0; // Initialize subtotal to zero
        foreach ($this->cartItems as $item) {
            $this->subtotal += $item['total_amount']; // Sum the total amount of each item
        }
        // dd($this->profit_loss);
        $this->total = $this->subtotal; // Calculate total including shipping fee
    }
    public function render()
    {
        return view('livewire.new.checkout');
    }
}
