<?php

namespace Tests\Feature;

use App\Models\Productcombination;
use Tests\TestCase;

class SearchPageTest extends TestCase
{
    public function test_combination_display_name_normalizes_legacy_ohm_text(): void
    {
        $ohm = html_entity_decode('&Omega;', ENT_QUOTES, 'UTF-8');

        $this->assertSame('8 '.$ohm, Productcombination::formatCombinationName("8 \u{00CE}\u{00A9}"));
        $this->assertSame('8 '.$ohm, Productcombination::formatCombinationName("8\u{00CE}\u{00A9}"));
        $this->assertSame('8 '.$ohm, Productcombination::formatCombinationName("8 \u{00E2}\u{201E}\u{00A6}"));
    }

    public function test_search_page_renders_from_header_query(): void
    {
        $ohm = html_entity_decode('&Omega;', ENT_QUOTES, 'UTF-8');

        $response = $this->get(route('search', [
            'category' => 'pro-loudspeaker',
            'product_name' => 'pt',
        ]));

        $response->assertStatus(200);
        $response->assertSee('Search');
        $response->assertSee('8 '.$ohm);
        $response->assertDontSee("\u{00CE}\u{00A9}");
    }

    public function test_category_product_list_renders_normalized_ohm_text(): void
    {
        $ohm = html_entity_decode('&Omega;', ENT_QUOTES, 'UTF-8');

        $response = $this->get(route('category.products', [
            'type' => 'pro-loudspeaker',
            'slug' => 'it-series',
        ]));

        $response->assertStatus(200);
        $response->assertSee('8 '.$ohm);
        $response->assertDontSee("\u{00CE}\u{00A9}");
    }

    public function test_product_detail_renders_normalized_ohm_text(): void
    {
        $ohm = html_entity_decode('&Omega;', ENT_QUOTES, 'UTF-8');

        $response = $this->get(route('product.public.details', [
            'type' => 'pro-loudspeaker',
            'category' => 'it-series',
            'slug' => '8-it-200-mid',
        ]));

        $response->assertStatus(200);
        $response->assertSee('8 '.$ohm);
        $response->assertDontSee("\u{00CE}\u{00A9}");
    }
}
