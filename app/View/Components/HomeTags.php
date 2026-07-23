<?php

namespace App\View\Components;

use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class HomeTags extends Component
{
    /**
     * @var Collection<int, Tag>
     */
    public Collection $tags;

    /**
     * Create a new component instance.
     */
    public function __construct(public int $typeId)
    {
        $this->tags = Cache::flexible("home.tags.{$this->typeId}", [600, 1800], function (): Collection {
            return Tag::query()
                ->select(['id', 'title', 'slug', 'type_id'])
                ->where('type_id', $this->typeId)
                ->where('status', 0)
                ->orderBy('title')
                ->get();
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home-tags');
    }
}
