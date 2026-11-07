<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Component;

class TagComponent extends Component
{
    public $tags;

    public $typeId;

    public function mount($typeId)
    {
        $this->typeId = $typeId;
        $this->tags = Tag::where('type_id', $this->typeId)->where('status', 0)->orderBy('order_no')->orderBy('id')->get();
    }

    public function render()
    {
        return view('livewire.tag-component');
    }
}
