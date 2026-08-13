<?php

namespace Tests\Feature;

use App\Mail\ApplicationfordealershipMail;
use App\Models\Applicatiodealership;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tests\TestCase;

class ApplicationDealershipFlowTest extends TestCase
{
    use DatabaseTransactions;

    public function test_success_page_redirects_to_the_application_without_a_whatsapp_link(): void
    {
        $response = $this->get(route('application.dealership.success'));

        $response->assertRedirectToRoute('application.dealership');
    }

    public function test_success_page_displays_the_whatsapp_link_after_submission(): void
    {
        $whatsappLink = 'https://wa.me/917044411800?text=Dealership+application';

        $response = $this
            ->withSession(['whatsapp_link' => $whatsappLink])
            ->get(route('application.dealership.success'));

        $response
            ->assertOk()
            ->assertSee('Dealership Application Submitted Successfully')
            ->assertSee($whatsappLink, false)
            ->assertSee('Continue to WhatsApp');
    }

    public function test_application_submission_stores_the_data_and_redirects_to_the_success_page(): void
    {
        Http::fake();
        Mail::fake();

        $response = $this->post(route('application.dealership.store'), [
            'organisation_name' => 'Dealership Flow Test',
            'contact_person' => 'Test Person',
            'address' => 'Test Address',
            'mobile_no' => '9876543210',
            'speaker' => ['PRO LOUDSPEAKER'],
            'recaptcha_token' => 'valid-test-token',
        ]);

        $response
            ->assertRedirectToRoute('application.dealership.success')
            ->assertSessionHas('whatsapp_link', fn (string $link): bool => Str::startsWith($link, 'https://wa.me/917044411800?text='));

        $application = Applicatiodealership::query()
            ->where('organisation_name', 'Dealership Flow Test')
            ->first();

        $this->assertNotNull($application);
        $this->assertModelExists($application);
        Http::assertNothingSent();
        Mail::assertSent(ApplicationfordealershipMail::class);
    }
}
