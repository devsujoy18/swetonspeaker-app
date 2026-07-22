<?php

namespace App\Livewire;

use App\Models\Tag;
use Illuminate\Validation\Rule;
use Livewire\Component;

class TagManager extends Component
{
    public $tagId = null;
    public $title = '';
    public $status = 0;
    public $typeId = null;
    public $types = [
        1 => 'Pro Loudspeaker',
        2 => 'Home Loudspeaker',
    ];

    public function openCreateModal(): void
    {
        $this->resetForm();
        $this->dispatch('open-modal', name: 'tag-form');
    }

    public function openEditModal(int $id): void
    {
        $tag = Tag::findOrFail($id);
        $this->tagId = $tag->id;
        $this->title = $tag->title;
        $this->status = (int) $tag->status;
        $this->typeId = $tag->type_id;
        $this->resetValidation();
        $this->dispatch('open-modal', name: 'tag-form');
    }

    public function save(): void
    {
        $this->validate([
            'title' => [
                'required',
                'string',
                'max:150',
                Rule::unique('tags', 'title')->ignore($this->tagId),
            ],
            'typeId' => ['nullable', 'integer'],
            'status' => ['required', 'integer', 'in:0,1'],
        ]);

        Tag::updateOrCreate(
            ['id' => $this->tagId],
            [
                'title' => $this->title,
                'type_id' => (int) $this->typeId,
                'status' => (int) $this->status,
            ]
        );

        session()->flash('success', $this->tagId ? 'Tag updated successfully.' : 'Tag created successfully.');

        $this->resetForm();
        $this->dispatch('close-modal');
    }

    public function changeStatus(int $id): void
    {
        $tag = Tag::findOrFail($id);
        $tag->status = $tag->status == 1 ? 0 : 1;
        $tag->save();
    }

    public function deleteTag(int $id): void
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        session()->flash('success', 'Tag deleted successfully.');
    }

    public function resetForm(): void
    {
        $this->tagId = null;
        $this->title = '';
        $this->status = 0;
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.tag-manager', [
            'tags' => Tag::orderBy('title')->get(),
        ]);
    }
}
