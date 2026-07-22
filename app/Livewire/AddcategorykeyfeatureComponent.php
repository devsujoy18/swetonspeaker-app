<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Keyfeature;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;

class AddcategorykeyfeatureComponent extends Component
{
    public $keyfeatures;
    #[Validate]
    public $keyfeature_id;
    #[Validate]
    public $keyfeature_value;
    #[Validate]
    public $order_no;
    public $category;
    public $editId = null;

    #[On('category-keyfeature-edit')]
    public function edit($editId){
        $this->editId = $editId;
        $existing = $this->category->keyfeatures()->wherePivot('id', $editId)->first();
        if ($existing) {
            $this->keyfeature_id = $existing->id;
            $this->keyfeature_value = $existing->pivot->keyfeature_value;
            $this->order_no = $existing->pivot->order_no;
        }
    } 

    public function mount($categoryId){
        $this->category = Category::find($categoryId);
        $this->keyfeatures = keyfeature::where('status', 0)->orderby('order_no')->get();
    }

    protected function rules(){
        $rules = [
            'keyfeature_id' => 'required',
            'keyfeature_value' => 'required',
            'order_no' => 'required|numeric'
        ];
        return $rules;
    }

    protected function messages(){
        return [
            'keyfeature_id.required' => 'Please select keyfeature',
            'keyfeature_value.required' => 'Please enter keyfeature value',
            'order_no' => 'Please enter order no'
        ];
    }

    public function storeData(){
        $this->validate($this->rules());

        if ($this->editId) {
            // Update the existing pivot record
            $this->category->keyfeatures()->updateExistingPivot($this->keyfeature_id, [
                'keyfeature_value' => $this->keyfeature_value,
                'order_no' => $this->order_no
            ]);
        }else{
            // Check if the keyfeature already exists for the category
            if ($this->category->keyfeatures()->where('keyfeature_id', $this->keyfeature_id)->exists()) {
                session()->flash('error', 'This keyfeature has already been added to this category.');
                return;
            }

            $this->category->keyfeatures()->attach($this->keyfeature_id, [
                'keyfeature_value' => $this->keyfeature_value,
                'order_no' => $this->order_no
            ]);
        }

        $this->reset(['keyfeature_id', 'keyfeature_value', 'order_no', 'editId']);
        $this->dispatch('category-keyfeature-added'); 
        $this->dispatch('close-modal');
    }

    public function render()
    {   
        // if (!$this->editId) {
        //     $this->reset(['keyfeature_id', 'keyfeature_value', 'order_no']);
        // }
        return view('livewire.addcategorykeyfeature-component')->with([
            'keyfeatures' => $this->keyfeatures
        ]);
    }
}
