<?php

namespace Tests\Feature;

use App\Livewire\TagComponent;
use App\Livewire\TagManager;
use App\Models\Tag;
use App\View\Components\HomeTags;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class TagOrderNoTest extends TestCase
{
    use DatabaseTransactions;

    public function test_database_defaults_order_number_to_zero(): void
    {
        $tag = $this->createTag('Default');

        $this->assertSame(0, $tag->fresh()->order_no);
    }

    public function test_create_and_update_save_order_number_and_empty_input_resets_it(): void
    {
        $title = 'Order test '.Str::uuid();

        Livewire::test(TagManager::class)
            ->set('title', $title)
            ->set('typeId', 1)
            ->set('orderNo', 12)
            ->call('save')
            ->assertHasNoErrors();

        $tag = Tag::query()->where('title', $title)->firstOrFail();
        $this->assertSame(12, $tag->order_no);

        Livewire::test(TagManager::class)
            ->call('openEditModal', $tag->id)
            ->assertSet('orderNo', 12)
            ->set('orderNo', 3)
            ->call('save')
            ->assertHasNoErrors();

        $this->assertSame(3, $tag->fresh()->order_no);

        Livewire::test(TagManager::class)
            ->call('openEditModal', $tag->id)
            ->set('orderNo', '')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertSame(0, $tag->fresh()->order_no);
    }

    public function test_order_number_rejects_negative_fractional_and_non_numeric_values(): void
    {
        foreach ([-1, '1.5', 'abc'] as $orderNo) {
            Livewire::test(TagManager::class)
                ->set('title', 'Invalid order '.Str::uuid())
                ->set('typeId', 1)
                ->set('orderNo', $orderNo)
                ->call('save')
                ->assertHasErrors(['orderNo']);
        }
    }

    public function test_admin_and_frontend_tags_sort_by_order_number_then_id(): void
    {
        $first = $this->createTag('First', 2);
        $second = $this->createTag('Second', 1);
        $third = $this->createTag('Third', 1);
        $titles = [$second->title, $third->title, $first->title];

        Livewire::test(TagManager::class)->assertSeeInOrder($titles);
        Livewire::test(TagComponent::class, ['typeId' => 1])->assertSeeInOrder($titles);

        Cache::forget('home.tags.1');

        try {
            $this->assertSame(
                [$second->id, $third->id, $first->id],
                (new HomeTags(1))->tags->whereIn('id', [$first->id, $second->id, $third->id])->pluck('id')->all(),
            );
        } finally {
            Cache::forget('home.tags.1');
        }
    }

    private function createTag(string $label, ?int $orderNo = null): Tag
    {
        $attributes = [
            'title' => $label.' '.Str::uuid(),
            'type_id' => 1,
            'status' => 0,
        ];

        if ($orderNo !== null) {
            $attributes['order_no'] = $orderNo;
        }

        return Tag::query()->create($attributes);
    }
}
