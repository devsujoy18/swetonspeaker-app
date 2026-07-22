<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;

class FeaturedCategory extends Component
{
    /**
     * Create a new component instance.
     */
    
    public $categories;

    public function __construct( public string $type )
    {
        if($type == 'pro-loudspeaker'){
            $this->categories = Category::with(['keyfeatures' => function ($query) {
                                    $query->where('keyfeatures.status', 0)
                                          ->orderBy('pivot_order_no', 'asc');
                                }])
                                ->where('categories.status', 0)
                                ->where('show_on_home', 1)
                                ->where('type_id', 1)
                                ->orderBy('categories.order_no')
                                ->get();
        }else{
            $this->categories = Category::with(['keyfeatures' => function ($query) {
                                    $query->where('keyfeatures.status', 0)
                                            ->orderBy('pivot_order_no', 'asc');
                                }])
                                ->where('categories.status', 0)
                                ->where('show_on_home', 1)
                                ->where('type_id', 2)
                                ->orderBy('categories.order_no')
                                ->get();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.featured-category');
    }
}
