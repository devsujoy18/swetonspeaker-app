<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public $category_id;

    public $category_name;

    public $category_slug;

    public $type_id;

    public $products;

    public $cart_count;

    public $message;

    public $pageDescription;

    public function mount($slug, $pageDescription = null)
    {
        // $this->listData = $results;
        $category = Category::where('slug', $slug)->first();
        $this->category_id = $category->id;
        $this->category_name = $category->name;
        $this->category_slug = $category->slug;
        $this->type_id = $category->type_id;
        $this->pageDescription = $pageDescription;
    }

    // Add to Compare
    public function addTocompare($productId, $combinationId)
    {
        $cartData = CartManagement::addItemsToCart($productId, $combinationId);
        $this->cart_count = $cartData['cart_count'];
        $this->message = $cartData['message'];
        $this->dispatch('scrollToTop');
    }

    public function render()
    {
        $this->products = Product::with(
            [
                'category',
                'productimages' => function ($query) {
                    $query->orderBy('order_no', 'asc')->take(1); // Get the image with the lowest order_no
                },
                'combinations.productkeyfeatures' => function ($query) {
                    $query->where('status', 0)
                        ->orderBy('order_no'); // Orders the productkeyfeatures by order_no
                },
            ])
            ->where('status', 0)
            ->where('category_id', $this->category_id)
            ->orderBy('order_no')
            ->get();

        return view('livewire.product-list');
    }
}
