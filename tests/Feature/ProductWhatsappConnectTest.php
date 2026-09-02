<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ProductWhatsappConnectTest extends TestCase
{
    use DatabaseTransactions;

    public function test_product_whatsapp_form_displays_the_product_name(): void
    {
        $product = Product::query()->with('category')->firstOrFail();

        $this->get($this->whatsappFormUrl($product))
            ->assertOk()
            ->assertSee($product->name);
    }

    public function test_product_whatsapp_form_redirects_with_the_product_and_selected_details(): void
    {
        $product = Product::query()->with('category')->firstOrFail();

        $response = $this->post($this->whatsappFormUrl($product), [
            'requirement' => 'T/S parameters',
            'person_type' => 'Sound Engineer',
        ]);

        $response->assertRedirect();
        $redirectUrl = $response->headers->get('Location');

        $this->assertStringStartsWith('https://wa.me/917044411800?text=', $redirectUrl);
        $this->assertStringContainsString(urlencode('Model Name: '.$product->name), $redirectUrl);
        $this->assertStringContainsString(urlencode('Requirement: T/S parameters'), $redirectUrl);
        $this->assertStringContainsString(urlencode('Person Type: Sound Engineer'), $redirectUrl);
    }

    public function test_product_whatsapp_form_requires_a_requirement_and_person_type(): void
    {
        $product = Product::query()->with('category')->firstOrFail();

        $response = $this->from($this->whatsappFormUrl($product))
            ->post($this->whatsappFormUrl($product));

        $response
            ->assertRedirect($this->whatsappFormUrl($product))
            ->assertSessionHasErrors([
                'requirement' => 'Please select a requirement.',
                'person_type' => 'Please select a person type.',
            ]);

        $this->get($this->whatsappFormUrl($product))
            ->assertOk()
            ->assertSee('Please select a requirement.')
            ->assertSee('Please select a person type.');
    }

    private function whatsappFormUrl(Product $product): string
    {
        return route('product.whatsapp.form', [
            'type' => $product->category->type_id === 1 ? 'pro-loudspeaker' : 'home-loudspeaker',
            'category' => $product->category->slug,
            'slug' => $product->slug,
        ]);
    }
}
