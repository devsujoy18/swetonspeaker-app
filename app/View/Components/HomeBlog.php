<?php

namespace App\View\Components;

use App\Models\Blog;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class HomeBlog extends Component
{
    /**
     * Create a new component instance.
     */
    public $homeblogs;

    public function __construct()
    {
        $this->homeblogs = Cache::flexible('home.blogs', [600, 1800], function (): Collection {
            return Blog::query()
                ->select(['id', 'title', 'slug', 'short_description', 'publish_date', 'image_path', 'order_no', 'status', 'show_on_home'])
                ->where('status', 0)
                ->where('show_on_home', 1)
                ->orderBy('order_no')
                ->limit(3)
                ->get();
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.home-blog');
    }
}
