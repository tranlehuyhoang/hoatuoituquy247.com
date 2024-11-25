<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Livewire\Component;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProductDetail1 extends Component
{
    use LivewireAlert;

    public $slug;
    public $quantity =1;
    public $product;
    public $selectedVariant;
    public $price;
    public $discount_price;
    public $variant_img;
    public $sku;
    public $relatedProducts;
    public $stock_status; // Thêm biến trạng thái tồn kho

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
        $cartItemCount = CartManagement::addItemToCart($this->selectedVariant,$this->quantity);
    
        $this->alert('success', 'Sản phẩm đã được thêm vào giỏ hàng!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    
        $this->quantity = 1; 
    }

    public function render()
    {
        return view('livewire.product-detail1', [
            'product' => $this->product,
            'relatedProducts' => $this->relatedProducts,
        ]);
    }
}