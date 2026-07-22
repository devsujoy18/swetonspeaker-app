<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producttsparameter;

class ProductTsparameterList extends Component
{
     public $listData;

    public function mount($results){
        $this->listData = $results;
    }

    public function changeStatus($targetId){
        $existing = Producttsparameter::find($targetId);
        if($existing){
            $newStatus = !$existing->status;
            $existing->update([
                'status' => $newStatus
            ]);
        }
    }

    public function deleteData($targetId){
        $existing = Producttsparameter::find($targetId);
        if($existing){
            $existing->delete();
        }
    }

    public function render()
    {
        return view('livewire.product-tsparameter-list');
    }
}
