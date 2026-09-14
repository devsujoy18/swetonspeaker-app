<?php

namespace App\Livewire;

use App\Models\Blog;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class HomeEvents extends Component
{
    public function render(): View
    {
        $events = Cache::flexible('home.home-events', [600, 1800], function (): Collection {
            return Blog::query()
                ->select(['id', 'title', 'slug', 'short_description', 'publish_date', 'image_path', 'order_no'])
                ->where('type', 'event')
                ->where('status', 0)
                ->where('show_on_home', 1)
                ->orderBy('order_no')
                ->limit(3)
                ->get();
        });

        return view('livewire.home-events', compact('events'));
    }
}
