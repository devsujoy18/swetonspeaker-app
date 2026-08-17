<x-frontend_layout>
    <section class="page-header">
        <div class="page-header-bg"
             style="background-image:url({{ asset('public_assets/images/backgrounds/page-header-bg.jpg') }})">
        </div>

        <div class="container">
            <div class="page-header__inner">
                <h2>Thank You</h2>

                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><span>//</span></li>
                    <li>Message Submitted</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="contact-page py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-body text-center p-5">
                            <div class="mb-4 text-success display-1" aria-hidden="true">&#10003;</div>

                            <h2 class="mb-3">Message Submitted Successfully</h2>

                            <p class="text-muted mb-4">
                                Thank you for contacting <strong>Sweton Speakers</strong>.
                                We have received your message and our team will contact you shortly.
                            </p>

                            <div class="alert alert-success">
                                <strong>For a faster response,</strong><br>
                                send your message details to us on WhatsApp.
                            </div>

                            <div class="mt-4">
                                <a href="{{ session('whatsapp_link') }}" class="thm-btn me-3">
                                    Continue to WhatsApp
                                </a>

                                <a href="{{ url('/') }}" class="btn btn-outline-dark">
                                    &larr; Back to Home
                                </a>
                            </div>

                            <hr class="my-5">

                            <h5 class="mb-3">What happens next?</h5>

                            <div class="row text-start">
                                <div class="col-md-4 mb-3">Your message has been recorded.</div>
                                <div class="col-md-4 mb-3">Our team has been notified.</div>
                                <div class="col-md-4 mb-3">Continue on WhatsApp for faster assistance.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-frontend_layout>
