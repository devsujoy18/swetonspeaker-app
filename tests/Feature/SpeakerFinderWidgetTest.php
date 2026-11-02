<?php

namespace Tests\Feature;

use App\Livewire\SpeakerFinderWidget;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class SpeakerFinderWidgetTest extends TestCase
{
    use DatabaseTransactions;

    public function test_tags_are_limited_to_active_products_in_the_selected_series(): void
    {
        $pro = $this->createProduct(1, '8 Finder MID');
        $home = $this->createProduct(2, '10 Finder Home');
        $inactive = $this->createProduct(1, '12 Finder Inactive', status: 1);
        $tag = $this->createTag('Finder tag', $pro);
        $this->createTag('Home finder tag', $home);
        $this->createTag('Inactive finder tag', $inactive);
        $inactiveTag = $this->createTag('Hidden finder tag', $pro);
        $inactiveTag->status = 1;
        $inactiveTag->save();

        Livewire::test(SpeakerFinderWidget::class)
            ->call('openWidget')
            ->call('chooseSeries', 1)
            ->assertSet('step', 'filter')
            ->assertSee('Tags')
            ->assertSee('Sizes')
            ->call('chooseFilter', 'tag')
            ->assertSee($tag->title)
            ->assertDontSee('Home finder tag')
            ->assertDontSee('Inactive finder tag')
            ->assertDontSee('Hidden finder tag')
            ->call('chooseTag', $tag->id)
            ->assertSet('step', 'results')
            ->assertSee($pro->name)
            ->assertDontSee($home->name)
            ->assertDontSee($inactive->name)
            ->assertSee('View product')
            ->call('goBack')
            ->assertSet('step', 'tag')
            ->call('goBack')
            ->assertSet('step', 'filter')
            ->call('resetConversation')
            ->assertSet('step', 'series');
    }

    public function test_sizes_keep_the_existing_application_filter_and_navigation(): void
    {
        $product = $this->createProduct(1, '8 Finder MID');
        $otherSize = $this->createProduct(1, '10 Finder MID');

        Livewire::test(SpeakerFinderWidget::class)
            ->call('openWidget')
            ->call('chooseSeries', 1)
            ->call('chooseFilter', 'size')
            ->assertSet('step', 'size')
            ->call('toggleSize', 8)
            ->call('continueFromSizes')
            ->assertSet('step', 'application')
            ->call('chooseApplication', 'mid')
            ->assertSet('step', 'results')
            ->assertSee($product->name)
            ->assertDontSee($otherSize->name)
            ->call('goBack')
            ->assertSet('step', 'application')
            ->call('goBack')
            ->assertSet('step', 'size')
            ->call('goBack')
            ->assertSet('step', 'filter');
    }

    public function test_inactive_tagged_product_is_not_selectable(): void
    {
        $product = $this->createProduct(1, '8 Finder MID');
        $tag = $this->createTag('Finder tag', $product);
        $widget = Livewire::test(SpeakerFinderWidget::class)
            ->call('openWidget')
            ->call('chooseSeries', 1)
            ->call('chooseFilter', 'tag');

        $product->status = 1;
        $product->save();

        $widget->call('chooseTag', $tag->id)
            ->assertSet('step', 'tag')
            ->assertSet('results', [])
            ->assertSee('Please choose one of the available tags.');
    }

    private function createProduct(int $typeId, string $name, int $status = 0): Product
    {
        $category = new Category;
        $category->name = 'Finder '.Str::uuid();
        $category->slug = Str::uuid();
        $category->type_id = $typeId;
        $category->status = 0;
        $category->save();

        $product = new Product;
        $product->name = $name;
        $product->slug = Str::uuid();
        $product->category_id = $category->id;
        $product->status = $status;
        $product->save();
        $product->combinations()->create(['name' => '8 Ω', 'status' => 0]);

        return $product;
    }

    private function createTag(string $title, Product $product): Tag
    {
        $tag = Tag::query()->create([
            'title' => $title,
            'slug' => Str::uuid(),
            'type_id' => $product->category->type_id,
            'status' => 0,
        ]);
        $product->tags()->attach($tag);

        return $tag;
    }
}
