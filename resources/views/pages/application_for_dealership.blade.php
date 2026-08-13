<x-frontend_layout>
    @php($recaptchaEnabled = ! app()->environment(['local', 'testing']))
    
     <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url({{ asset('public_assets/images/backgrounds/page-header-bg.jpg') }})">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Application for Dealership</h2>
                   
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><span>//</span></li>
                        <li>Application for Dealership</li>
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
                            <h3 class="contact-page__title">Application</h3>
                            @if($message = Session::get('success'))
                    	    <x-alert type="success" :message="$message"></x-alert>
                    	    @endif
                            <form action="{{ route('application.dealership.store') }}" class="contact-page__form" id="contactusForm" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="contact-page__form-input-box">
                                            <input type="text" placeholder="Organisation Name" name="organisation_name" value="{{ old('organisation_name') }}">
                                            @if($errors->has('organisation_name'))
                                            <span style="color:red">{{ $errors->first('organisation_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                     <div class="col-xl-12">
                                        <div class="contact-page__form-input-box">
                                            <input type="text" placeholder="Contact Person" name="contact_person" value="{{ old('contact_person') }}">
                                            @if($errors->has('contact_person'))
                                            <span style="color:red">{{ $errors->first('contact_person') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                     <div class="col-xl-12">
                                         <div class="contact-page__form-input-box text-message-box">
                                            <textarea name="address" placeholder="Address">{{ old('address') }}</textarea>
                                            @if($errors->has('address'))
                                            <span style="color:red">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                   
                                    <div class="col-xl-12">
                                        <div class="contact-page__form-input-box">
                                            <input type="text" placeholder="Mobile No." name="mobile_no" value="{{ old('mobile_no') }}">
                                            @if($errors->has('mobile_no'))
                                            <span style="color:red">{{ $errors->first('mobile_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <p>Your main interest in : </p>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="checked-box">
                                            <input type="checkbox" name="speaker[]" id="pro" value="PRO LOUDSPEAKER">
                                            <label for="pro"><span></span>PRO LOUDSPEAKER</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="checked-box">
                                            <input type="checkbox" name="speaker[]" id="home" value="HOME LOUDSPEAKER">
                                            <label for="home"><span></span>HOME LOUDSPEAKER</label>
                                        </div>
                                    </div>
                                    @if($errors->has('speaker'))
                                            <span style="color:red">{{ $errors->first('speaker') }}</span>
                                            @endif
                                            
                                    <input type="hidden" name="recaptcha_token" id="recaptchaToken" value="{{ $recaptchaEnabled ? '' : 'local-development' }}">
                                    @error('recaptcha_token')
                                        <span class="d-block text-danger mb-3">Please verify that you are not a robot and try again.</span>
                                    @enderror
                                    @error('recaptcha')
                                        <span class="d-block text-danger mb-3">{{ $message }}</span>
                                    @enderror
                                    <span id="recaptchaClientError" class="d-none text-danger mb-3">
                                        Unable to verify reCAPTCHA. Please check your connection and try again.
                                    </span>
                                    <div class="col-xl-12">
                                        <div style="margin: 2em 0;">
                                        <p>Note:</p>
                                        <ul class="conlist">
                                            <li>
                                            - After submitting, continue to WhatsApp from the confirmation page and send your filled form details.</li>
                                            <li>- We will reply you via Whatsapp only.</li>
                                        </ul>
                                    </div>
                                    </div>
                                   
                                    
                                </div>
                                <div class="row">
                                    
                                    <div class="col-xl-12">
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
        
        @if($recaptchaEnabled)
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.getElementById('contactusForm');
                const submitButton = document.getElementById('submitBtn');
                const recaptchaToken = document.getElementById('recaptchaToken');
                const recaptchaClientError = document.getElementById('recaptchaClientError');
                let submitting = false;

                function resetSubmission() {
                    submitting = false;
                    submitButton.disabled = false;
                    submitButton.textContent = 'Send Message';
                    recaptchaClientError.classList.remove('d-none');
                }

                form.addEventListener('submit', function (event) {
                    event.preventDefault();

                    if (submitting) {
                        return;
                    }

                    submitting = true;
                    submitButton.disabled = true;
                    submitButton.textContent = 'Please Wait...';
                    recaptchaClientError.classList.add('d-none');

                    if (typeof window.grecaptcha === 'undefined') {
                        resetSubmission();

                        return;
                    }

                    window.grecaptcha.ready(function () {
                        window.grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
                            action: 'submit'
                        }).then(function (token) {
                            recaptchaToken.value = token;
                            form.submit();
                        }).catch(resetSubmission);
                    });
                });
            });
        </script>
        @endif

    
</x-frontend_layout>
