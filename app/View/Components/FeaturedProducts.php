<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class FeaturedProducts extends Component
{
    /**
     * Create a new component instance.
     */
    public $products;
    public function __construct()
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
                            ->where('show_on_home', 1)
                            ->orderBy('order_no')
                            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.featured-products');
    }
}
