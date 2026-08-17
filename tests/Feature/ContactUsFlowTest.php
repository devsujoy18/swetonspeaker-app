<?php

namespace Tests\Feature;

use App\Mail\ContactusMail;
use App\Models\Contactus;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tests\TestCase;

class ContactUsFlowTest extends TestCase
{
    use DatabaseTransactions;

    public function test_success_page_redirects_to_contact_us_without_a_whatsapp_link(): void
    {
        $response = $this->get(route('contact.us.success'));

        $response->assertRedirectToRoute('contact.us');
    }

    public function test_success_page_displays_the_whatsapp_link_after_submission(): void
    {
        $whatsappLink = 'https://wa.me/917044411800?text=Contact+message';

        $response = $this
            ->withSession(['whatsapp_link' => $whatsappLink])
            ->get(route('contact.us.success'));

        $response
            ->assertOk()
            ->assertSee('Message Submitted Successfully')
            ->assertSee($whatsappLink, false)
            ->assertSee('Continue to WhatsApp');
    }

    public function test_contact_submission_stores_the_data_and_redirects_to_the_success_page(): void
    {
        Http::fake([
            'https://www.google.com/recaptcha/api/siteverify' => Http::response([
                'success' => true,
                'score' => 0.9,
            ]),
        ]);
        Mail::fake();

        $response = $this->post(route('contact.us.store'), [
            'name' => 'Contact Flow Test',
            'email' => 'contact-flow@example.com',
            'phone' => '9876543210',
            'subject' => 'Contact Flow Test Subject',
            'message' => 'Contact flow test message.',
            'recaptcha_token' => 'valid-test-token',
        ]);

        $response
            ->assertRedirectToRoute('contact.us.success')
            ->assertSessionHas('whatsapp_link', fn (string $link): bool => Str::startsWith($link, 'https://wa.me/917044411800?text='));

        $contact = Contactus::query()
            ->where('email', 'contact-flow@example.com')
            ->first();

        $this->assertNotNull($contact);
        $this->assertModelExists($contact);
        Mail::assertSent(ContactusMail::class);
    }
}
