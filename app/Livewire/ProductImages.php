<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductImages extends Component
{
    public $productId;
    public $product;

    public function mount($productId){
        $this->productId = $productId;
        $this->product = Product::with(['productimages' => function ($query) {
                            $query->orderBy('order_no');
                        }])->where('id', $productId)->first();
    }

    public function changeStatus($targetId){
        $existing = $this->product->productimages()->where('id', $targetId)->first();
        if($existing){
            $newStatus = !$existing->status;
            $existing->update([
                'status' => $newStatus
            ]);
        }
    }

    public function deleteImage($targetId){
        $existing = $this->product->productimages()->where('id', $targetId)->first();
        if($existing){
            $destinantion_one = 'uploads/'.$existing->path;
            $destinantion_two = 'uploads/thumbnails/'.$existing->path;
            if(File::exists($destinantion_one)){
                File::delete($destinantion_one);
            }
            if(File::exists($destinantion_two)){
                File::delete($destinantion_two);
            }

            $existing->delete();
        }  
    }

    public function render()
    {
        return view('livewire.product-images')->with([
            'product' => $this->product
        ]);
    }
}
