<?php

namespace Tests\Feature;

use App\Models\PageFaq;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PageFaqFeatureTest extends TestCase
{
    use DatabaseTransactions;

    public function test_category_list_page_renders_matching_page_faqs(): void
    {
        PageFaq::create([
            'type' => PageFaq::TypeMainSite,
            'page_type' => PageFaq::PageTypePage,
            'route_name' => 'category.list',
            'path' => '/speaker/pro-loudspeaker',
            'title' => 'FAQ route test question',
            'description' => '<p>FAQ route test answer</p>',
            'order_no' => 1,
            'is_active' => true,
        ]);

        $response = $this->get(route('category.list', ['type' => 'pro-loudspeaker']));

        $response->assertStatus(200);
        $response->assertSee('Frequently Asked Question - Sweton Speakers');
        $response->assertSee('FAQ route test question');
        $response->assertSee('FAQ route test answer');
    }

    public function test_category_products_page_renders_matching_category_faqs(): void
    {
        PageFaq::create([
            'type' => PageFaq::TypeMainSite,
            'page_type' => PageFaq::PageTypeCategory,
            'route_name' => 'category.products',
            'path' => '/speaker/pro-loudspeaker/it-series',
            'entity_type' => 'App\Models\Category',
            'entity_id' => 1,
            'slug' => 'it-series',
            'title' => 'FAQ category test question',
            'description' => '<p>FAQ category test answer</p>',
            'order_no' => 1,
            'is_active' => true,
        ]);

        $response = $this->get(route('category.products', [
            'type' => 'pro-loudspeaker',
            'slug' => 'it-series',
        ]));

        $response->assertStatus(200);
        $response->assertSee('FAQ category test question');
        $response->assertSee('FAQ category test answer');
    }
}
