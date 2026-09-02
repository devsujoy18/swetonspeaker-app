<x-frontend_layout>
    <x-slot:styles>
        <link rel="stylesheet" href="{{ asset('public_assets/css/product-whatsapp-connect.css') }}">
    </x-slot:styles>

    <section class="page-header">
        <div class="page-header-bg" style="background-image: url('{{ asset('public_assets/images/backgrounds/page-header-bg.jpg') }}')"></div>
        <div class="container">
            <div class="page-header__inner">
                <h2>Connect on WhatsApp</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><span>></span></li>
                    <li><a href="{{ route('product.public.details', ['type' => $type, 'category' => $category->slug, 'slug' => $product->slug]) }}">{{ $product->name }}</a></li>
                    <li><span>></span></li>
                    <li>Connect on WhatsApp</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="product-whatsapp-connect">
        <div class="container">
            <div class="product-whatsapp-connect__card">
                <h3>Fill out this form to connect with us on <span>WhatsApp: 7044411800</span></h3>

                <form action="{{ route('product.whatsapp.connect', ['type' => $type, 'category' => $category->slug, 'slug' => $product->slug]) }}" class="contact-page__form" method="POST">
                    @csrf

                    <div class="product-whatsapp-connect__field">
                        <span class="product-whatsapp-connect__label">Model Name</span>
                        <strong>{{ $product->name }}</strong>
                    </div>

                    <fieldset class="product-whatsapp-connect__field">
                        <legend class="product-whatsapp-connect__label">Requirement</legend>
                        @foreach(['Complete cut sheet', 'Recommended volume & tuning', 'T/S parameters', 'DSP / crossover recommendations', 'Build cautions'] as $requirement)
                            <label class="product-whatsapp-connect__option">
                                <input type="radio" name="requirement" value="{{ $requirement }}" @checked(old('requirement') === $requirement) @if($loop->first) required @endif>
                                <span>{{ $requirement }}</span>
                            </label>
                        @endforeach
                        @if($errors->has('requirement'))
                            <span style="color:red">{{ $errors->first('requirement') }}</span>
                        @endif
                    </fieldset>

                    <fieldset class="product-whatsapp-connect__field">
                        <legend class="product-whatsapp-connect__label">Person Type</legend>
                        @foreach(['Box Maker', 'Dealer', 'Sound Engineer', 'Rental', 'OEM / Bulk'] as $personType)
                            <label class="product-whatsapp-connect__option">
                                <input type="radio" name="person_type" value="{{ $personType }}" @checked(old('person_type') === $personType) @if($loop->first) required @endif>
                                <span>{{ $personType }}</span>
                            </label>
                        @endforeach
                        @if($errors->has('person_type'))
                            <span style="color:red">{{ $errors->first('person_type') }}</span>
                        @endif
                    </fieldset>

                    <button type="submit" class="thm-btn product-whatsapp-connect__submit">Connect on WhatsApp</button>
                </form>
            </div>
        </div>
    </section>
</x-frontend_layout>
