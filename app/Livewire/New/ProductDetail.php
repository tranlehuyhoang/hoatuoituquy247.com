<?php

namespace App\Livewire\New;

use Livewire\Component;
use App\Models\Product; // Đảm bảo bạn đã import model Product
use Illuminate\Support\Facades\Storage; // Để sử dụng Storage nếu cần
use App\Helpers\CartManagement;
class ProductDetail extends Component
{
    public $slug; // Thuộc tính để lưu slug sản phẩm
    public $product; // Thuộc tính để lưu sản phẩm

    public function mount($slug) // Sử dụng mount để lấy slug từ tham số
    {
        $this->cart_items = CartManagement::getCartItemsFromCookie();
        $this->slug = $slug; // Gán slug vào thuộc tính
        $this->loadProduct(); // Gọi phương thức để tải sản phẩm
        // dd($this->cart_items);
    }

    public function loadProduct()
    {
        // Tìm sản phẩm theo slug
        $this->product = Product::where('slug', $this->slug)->first();

        // Nếu sản phẩm không tìm thấy, có thể xử lý lỗi ở đây
        if (!$this->product) {
            // Bạn có thể redirect hoặc hiển thị thông báo
            session()->flash('message', 'Sản phẩm không tồn tại!');
        }
    }
    public function addToCart()
    {
        CartManagement::addItemToCart($this->product->id, 1);
    }
    public function render()
    {
        return view('livewire.new.product-detail', ['product' => $this->product]);
    }
}
