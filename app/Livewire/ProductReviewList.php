<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Productreview;

class ProductReviewList extends Component
{
    public $productId;
    public $allReviews;

    public function mount($productId){
        $this->productId = $productId;
        $this->allReviews = Productreview::where('product_id', $productId)->where('status', 1)->get();
    }
    
    public function render()
    {
        return view('livewire.product-review-list');
    }
}
