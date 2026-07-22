<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryKeyfeaturesList extends Component
{
    public $categoryId;
    public $category;

    public function mount($categoryId){
        $this->categoryId = $categoryId;
        $this->category = Category::with(['keyfeatures' => function ($query) {
                            $query->orderBy('order_no');
                        }])->where('id', $categoryId)->first();
    }

    public function changeStatus($targetId){
        $existing = $this->category->keyfeatures()->wherePivot('id', $targetId)->first();
        if($existing){
            $newStatus = !$existing->pivot->status;
            $this->category->keyfeatures()->updateExistingPivot($existing->id, [
                'status' => $newStatus
            ]);
        }
    }
    
    public function render()
    {
        return view('livewire.category-keyfeatures-list')->with([
            'category' => $this->category
        ]);
    }
}
