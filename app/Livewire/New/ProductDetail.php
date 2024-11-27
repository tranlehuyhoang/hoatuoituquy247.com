<?php

namespace App\Livewire\New;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category; // Make sure to import the Category model
use App\Helpers\CartManagement;
use App\Models\Review;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class ProductDetail extends Component
{
    use LivewireAlert;
    public $slug, $author, $email, $comment, $rating, $phone;
    public $product;
    public $relatedProducts = []; // Array to store related products

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->cart_items = CartManagement::getCartItemsFromCookie();
        $this->loadProduct();
    }

    public function loadProduct()
    {
        // Find the product by its slug
        $this->product = Product::where('slug', $this->slug)->first();

        // If the product is not found, you can handle the error here
        if (!$this->product) {
            session()->flash('message', 'Sản phẩm không tồn tại!');
            return redirect('/'); // Redirect to homepage or other page
        }

        // Fetch 6 random products from the same category
        $this->relatedProducts = Product::where('category_id', $this->product->category_id)
            ->where('id', '!=', $this->product->id) // Exclude the current product
            ->inRandomOrder() // Randomly order the products
            ->limit(6) // Limit to 6 products
            ->get();
    }

    public function addToCart()
    {
        CartManagement::addItemToCart($this->product->id, 1);
        return redirect('/gio-hang');
    }
    public function submitReview()
    {
        // Create a review in the database
        Review::create([
            'product_id' => $this->product->id,
            'email' => $this->email,
            'comment' => $this->comment,
            'rating' => $this->rating,
            'name' => $this->author,
        ]);

        $this->alert('success', 'Cảm ơn bạn đã đánh giá sản phẩm!');
        $this->reset(['author', 'email', 'comment', 'rating']); // Reset form fields
    }
    public function render()
    {
        return view('livewire.new.product-detail', [
            'product' => $this->product,
            'relatedProducts' => $this->relatedProducts
        ]);
    }
}
