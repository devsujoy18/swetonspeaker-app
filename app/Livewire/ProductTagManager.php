<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Tag;
use Livewire\Component;

class ProductTagManager extends Component
{
    public $tagProductId = null;
    public $tagProductName = '';
    public $selectedTags = [];

    public function openTagModal(int $productId): void
    {
        $product = Product::with('tags')->findOrFail($productId);
        $this->tagProductId = $product->id;
        $this->tagProductName = $product->name;
        $this->selectedTags = $product->tags->pluck('id')->toArray();
        $this->resetValidation();
        $this->dispatch('open-modal', name: 'product-tags');
    }

    public function saveProductTags(): void
    {
        $this->validate([
            'selectedTags' => ['array'],
            'selectedTags.*' => ['integer', 'exists:tags,id'],
        ]);

        if ($this->tagProductId) {
            $product = Product::findOrFail($this->tagProductId);
            $product->tags()->sync($this->selectedTags);
            session()->flash('success', 'Tags updated successfully.');
        }

        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.product-tag-manager', [
            'products' => Product::with('tags')->orderBy('order_no')->get(),
            'allTags' => Tag::where('status', 0)->orderBy('title')->get(),
        ]);
    }
}
