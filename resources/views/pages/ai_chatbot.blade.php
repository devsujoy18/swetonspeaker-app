<x-frontend_layout>
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{ asset('public_assets/images/backgrounds/page-header-bg.jpg') }})"></div>
        <div class="container">
            <div class="page-header__inner">
                <h2>AI Speaker Finder</h2>

                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><span>//</span></li>
                    <li>AI Speaker Finder</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="contact-page">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Speaker Finder</span>
                <h2 class="section-title__title">Find the right speaker for your needs</h2>
                <p>Use the chat button to answer a few questions and explore matching Sweton products.</p>
            </div>
        </div>
    </section>
</x-frontend_layout>
