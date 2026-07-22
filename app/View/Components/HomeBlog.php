<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Blog;

class HomeBlog extends Component
{
    /**
     * Create a new component instance.
     */
    
    public $homeblogs;

    public function __construct()
    {
        $this->homeblogs = Blog::where('status', 0)
                      ->where('show_on_home', 1)
                      ->orderBy('order_no', 'asc')
                      ->limit(3)
                      ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.home-blog');
    }
}
