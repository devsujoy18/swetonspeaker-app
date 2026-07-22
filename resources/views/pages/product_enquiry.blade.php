<x-frontend_layout>
   
       <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url({{ asset('public_assets/images/backgrounds/page-header-bg.jpg') }})">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Product Enquiry</h2>
                   
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><span>//</span></li>
                        <li>Product Enquiry</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Contact Page Start-->
        <section class="contact-page">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-page__left">
                            <div class="contact-page__shape-1">
                                <img src="assets/images/shapes/contact-page-shape-1.png" alt="">
                            </div>
                            <h3 class="contact-page__title">Send Message</h3>
                            @if($message = Session::get('success'))
                    	    <x-alert type="success" :message="$message"></x-alert>
                    	    @endif
                            <form action="{{ route('product.enquiry.store') }}" class="contact-page__form" method="POST" id="productenqForm">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="contact-page__form-input-box">
                                            <input type="text" placeholder="Full Name" name="name" value="{{ old('name') }}">
                                            @if($errors->has('name'))
                                            <span style="color:red">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="contact-page__form-input-box">
                                            <input type="text" placeholder="Whatsapp No." name="whatsapp_no" value="{{ old('whatsapp_no') }}">
                                            @if($errors->has('whatsapp_no'))
                                            <span style="color:red">{{ $errors->first('whatsapp_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="contact-page__form-input-box">
                                            <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                            @if($errors->has('email'))
                                            <span style="color:red">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="contact-page__form-input-box">
                                            <input type="text" placeholder="Product Name" name="product_name" value="{{ old('product_name') }}">
                                            @if($errors->has('product_name'))
                                            <span style="color:red">{{ $errors->first('product_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="contact-page__form-input-box">
                                            <input type="text" placeholder="Quantity" name="quantity" value="{{ old('quantity') }}">
                                            @if($errors->has('quantity'))
                                            <span style="color:red">{{ $errors->first('quantity') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                     <div class="col-xl-12">
                                        <div class="contact-page__form-input-box">
                                            <input type="text" placeholder="Location" name="location" value="{{ old('location') }}">
                                            @if($errors->has('location'))
                                            <span style="color:red">{{ $errors->first('location') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    
                                    <div class="col-xl-12">
                                         <div class="contact-page__form-input-box text-message-box">
                                            <textarea name="comments" placeholder="Comments">{{ old('comments') }}</textarea>
                                            @if($errors->has('comments'))
                                            <span style="color:red">{{ $errors->first('comments') }}</span>
                                            @endif
                                        </div>

                                        <input type="hidden" name="recaptcha_token" id="recaptchaToken">
                                        
                                        <div class="contact-page__btn-box">
                                            <button type="submit" id="submitBtn" class="thm-btn contact-page__btn">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact Page End-->

        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
        <!--<script>
            grecaptcha.ready(function () {
                document.getElementById('productenqForm').addEventListener('submit', function(event) {
                    event.preventDefault();
                    grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', { action: 'submit' }).then(function(token) {
                        document.getElementById('recaptchaToken').value = token;
                        event.target.submit();
                    });
                });
            });
        </script>
        
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>-->

    <script>
        grecaptcha.ready(function () {
    
        const form = document.getElementById('productenqForm');
        const submitBtn = document.getElementById('submitBtn');
    
        let submitting = false;
    
        form.addEventListener('submit', function(event) {
    
            event.preventDefault();
    
            // Prevent multiple clicks
            if (submitting) {
                return;
            }
    
            submitting = true;
    
            // Disable button
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Please Wait...';
    
            grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
                action: 'submit'
            }).then(function(token) {
    
                document.getElementById('recaptchaToken').value = token;
    
                // Submit the form
                form.submit();
    
            }).catch(function() {
    
                // Re-enable if reCAPTCHA fails
                submitting = false;
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Send Message';
    
                alert('Something went wrong. Please try again.');
    
            });
    
        });
    
    });
    </script>

    
</x-frontend_layout>