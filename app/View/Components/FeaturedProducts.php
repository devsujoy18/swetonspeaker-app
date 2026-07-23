<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class FeaturedProducts extends Component
{
    /**
     * Create a new component instance.
     */
    public $products;

    public function __construct()
    {
        $this->products = Cache::flexible('home.featured-products', [600, 1800], function (): Collection {
            return Product::query()
                ->select(['id', 'name', 'slug', 'category_id', 'order_no', 'show_on_home', 'status'])
                ->with([
                    'category:id,name,slug,type_id',
                    'productimages' => function ($query): void {
                        $query->select(['id', 'product_id', 'path', 'order_no'])
                            ->orderBy('order_no')
                            ->limit(1);
                    },
                    'combinations' => function ($query): void {
                        $query->select(['id', 'product_id', 'order_no'])
                            ->orderBy('order_no');
                    },
                    'combinations.productkeyfeatures' => function ($query): void {
                        $query->select(['id', 'product_id', 'productcombination_id', 'keyfeature_id', 'value', 'order_no', 'status'])
                            ->where('status', 0)
                            ->orderBy('order_no');
                    },
                    'combinations.productkeyfeatures.keyfeature:id,name',
                ])
                ->where('status', 0)
                ->where('show_on_home', 1)
                ->orderBy('order_no')
                ->get();
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.featured-products');
    }
}
