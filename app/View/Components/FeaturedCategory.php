<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class FeaturedCategory extends Component
{
    /**
     * Create a new component instance.
     */
    public $categories;

    public function __construct(public string $type)
    {
        $typeId = $type === 'pro-loudspeaker' ? 1 : 2;

        $this->categories = Cache::flexible("home.featured-categories.{$typeId}", [600, 1800], function () use ($typeId): Collection {
            return Category::query()
                ->select(['id', 'name', 'slug', 'type_id', 'image', 'order_no', 'status', 'show_on_home'])
                ->with(['keyfeatures' => function ($query): void {
                    $query->select(['keyfeatures.id', 'keyfeatures.name'])
                        ->where('keyfeatures.status', 0)
                        ->orderBy('category_keyfeature.order_no');
                }])
                ->where('categories.status', 0)
                ->where('show_on_home', 1)
                ->where('type_id', $typeId)
                ->orderBy('categories.order_no')
                ->get();
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.featured-category');
    }
}
