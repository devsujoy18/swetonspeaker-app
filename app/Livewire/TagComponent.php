<?php

namespace App\Livewire;

use App\Models\Tag;
use Illuminate\Validation\Rule;
use Livewire\Component;

class TagComponent extends Component
{
	public $tags;
	public $typeId;

	public function mount($typeId){
		$this->typeId = $typeId;
		$this->tags = Tag::where('type_id', $this->typeId)->where('status', 0)->orderBy('title')->get();
	}

	public function render()
    {
        return view('livewire.tag-component');
    }
}