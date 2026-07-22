<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Livewire\Component;

class CompareCartComponent extends Component
{
    public $cart_items;
    public $cart_count;

    // Method to remove item from the cart
    public function removeItem($productId, $combinationId)
    {
        CartManagement::removeItemFromCart($productId, $combinationId);
        // Refresh the cart data after removal
        $this->cart_items = CartManagement::getCartItems();
        $this->cart_count = CartManagement::getTotalItemsInCart();
    }
    
    public function render()
    {
        $this->cart_items = CartManagement::getCartItems();
        $this->cart_count = CartManagement::getTotalItemsInCart();
        return view('livewire.compare-cart-component');
    }
}
