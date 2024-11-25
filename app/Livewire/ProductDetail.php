<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Mail\ReviewsProduct;
use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProductDetail extends Component
{
    use LivewireAlert;

    public $slug;
    public $quantity = 1;
    public $product;
    public $selectedVariant;
    public $price;
    public $discount_price;
    public $variant_img;
    public $sku;
    public $relatedProducts;
    public $stock_status; // Thêm biến trạng thái tồn kho
    public $rating = 0;
    public $email;
    public $phone;
    public $body;
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->loadProduct();
        $this->setDefaultVariant();
        $this->loadRelatedProducts();
    }

    public function loadProduct()
    {
        $this->product = Product::with('variants')
            ->where('slug', $this->slug)
            ->firstOrFail();
    }

    public function setDefaultVariant()
    {
        if ($this->product->variants->isNotEmpty()) {
            $this->selectedVariant = $this->product->variants->first()->id;
            $this->updateVariantDetails($this->product->variants->first()->id);
        }
    }

    public function updateVariantDetails($variantId)
    {
        $variant = $this->product->variants->find($variantId);

        if ($variant) {
            $this->selectedVariant = $variantId;
            $this->price = $variant->price;
            $this->discount_price = $variant->discount_price;
            $this->sku = $variant->sku;
            $this->variant_img = $variant->image;
            $this->stock_status = $variant->stock; // Cập nhật trạng thái tồn kho
        }
    }

    public function loadRelatedProducts()
    {
        $this->relatedProducts = Product::where('category_id', $this->product->category_id)
            ->where('id', '!=', $this->product->id)
            ->inRandomOrder()
            ->take(8)
            ->get();
    }
    public function incrementQuantity()
    {
        $this->quantity++;
    }

    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }
    public function addtocart()
    {
        $cartItemCount = CartManagement::addItemToCart($this->selectedVariant, $this->quantity);

        $this->alert('success', 'Sản phẩm đã được thêm vào giỏ hàng!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->quantity = 1;
    }
    public function buyNow()
    {
        $cartItemCount = CartManagement::addItemToCart($this->selectedVariant, $this->quantity);
        $this->quantity = 1;
        return redirect('/checkout');
    }

    public function render()
    {
        return view('livewire.product-detail', [
            'product' => $this->product,
            'relatedProducts' => $this->relatedProducts,
        ]);
    }
    public function sendReview()
    {
        // You can validate the incoming data here

        // Prepare the data for the email
        $reviewData = [
            'product_name' => $this->product->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'body' => $this->body,
            'sku' => $this->sku,
            'rating' => $this->rating,
        ];

        // Send the email
        $settings = \App\Models\Setting::first();
        $recipientEmail = $settings->email; // Địa chỉ email nhận


        Mail::to($recipientEmail)->send(new ReviewsProduct([
            'reviewData' => $reviewData
        ]));
        // Optionally, you can add a success alert here
        $this->alert('success', 'Đánh giá của bạn đã được gửi!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }
}
