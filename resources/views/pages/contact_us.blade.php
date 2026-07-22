<x-frontend_layout>
      <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url({{ asset('public_assets/images/backgrounds/page-header-bg.jpg') }})">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Contact Us</h2>
                   
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index-2.html">Home</a></li>
                        <li><span>//</span></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Contact Page Start-->
        <section class="contact-page">
            <div class="container">
                <div class="row">
                    
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-page__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">GET IN TOUCH</span>
                                <h2 class="section-title__title">Our Address</h2>
                            </div>
                            <p class="contact-page__right-text"><b>Octune Electronics LLP<br>
                             Sweton Speakers</b></p>
                            <div class="mt-5">
                                <div class="contact-page__points-box">
                                    <h3 class="contact-page__points-title">Registered Office Address</h3>
                                    <ul class="contact-page__points-list list-unstyled">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-send"></span>
                                            </div>
                                            <div class="text">
                                                <p>85 N S ROAD PO KODALIA
                                                Kolkata - 700146</p>
                                            </div>
                                        </li>
                                       
                                    </ul>
                                </div>
                                <div class="mt-5">
                                    <h3 class="contact-page__points-title">Additional Place of Business</h3>
                                    <ul class="contact-page__points-list list-unstyled">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-send"></span>
                                            </div>
                                            <div class="text">
                                                <p>8, Madan Street,<br>
                                                East India Building, 1st Floor,<br>
                                                Near E-Mall,<br>
                                                Kolkata - 700072, West Bengal</p>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <hr>
                                
                            </div>
                            <div>
                                    <ul class="contact-page__points-list list-unstyled">
                                    <li>
                                            <div class="icon">
                                                <span class="icon-mail"></span>
                                            </div>
                                            <div class="text">
                                                <p><a href="mailto:sales@swetonspeakers.com">sales@swetonspeakers.com</a></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-call"></span>
                                            </div>
                                            <div class="text">
                                                <p><a href="tel:62813221467"> +91 7044411800</a></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-clock"></span>
                                            </div>
                                            <div class="text">
                                                <p>10:00 AM - 04:00 PM</p>
                                            </div>
                                        </li>
                                        </ul>
                                </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-page__left">
                            <div class="contact-page__shape-1">
                                <img src="assets/images/shapes/contact-page-shape-1.png" alt="">
                            </div>
                            <h3 class="contact-page__title">Leave a message</h3>
                            @if($message = Session::get('success'))
                    	    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    	    @endif
                    	    @if($message = Session::get('recaptcha'))
                    	    <x-alert type="danger" :message="$message"></x-alert>
                    	    @endif
                            <form action="{{ route('contact.us.store') }}" class="contact-page__form" id="contactusForm" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="contact-page__form-input-box">
                                            <input type="text" placeholder="Name" name="name" value="{{ old('name') }}">
                                            @if($errors->has('name'))
                                            <span style="color:red">{{ $errors->first('name') }}</span>
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
                                            <input type="text" placeholder="Subject" name="subject" value="{{ old('subject') }}">
                                            @if($errors->has('subject'))
                                            <span style="color:red">{{ $errors->first('subject') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="contact-page__form-input-box">
                                            <input type="text" placeholder="Phone" name="phone" value="{{ old('phone') }}">
                                            @if($errors->has('phone'))
                                            <span style="color:red">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-xl-12">
                                        <div class="contact-page__form-input-box text-message-box">
                                            <textarea name="message" placeholder="Comment">{{ old('message') }}</textarea>
                                        </div>
                                        
                                        <input type="hidden" name="recaptcha_token" id="recaptchaToken">
                                        
                                        <div style="margin-bottom: 1em;">
                                        <p>Note:</p>
                                        <ul class="conlist">
                                            <li>
                                            - You will be redirected to your Whatsapp and you are requested to send filled up form details via whatsapp also.</li>
                                            <li>- We will reply you via Whatsapp only.</li>
                                        </ul>
                                    </div>
                                        <div class="contact-page__btn-box">
                                            <button type="submit" class="thm-btn contact-page__btn">Send Message</button>
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

        <!--Google Map Start-->
        <section class="google-map">
            <div class="container">
                <iframe
                    
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7368.674042574696!2d88.35446!3d22.566495!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0277bbc7839ff9%3A0xc79f4c283b183d3!2sSweton%20Speakers!5e0!3m2!1sen!2sin!4v1727772082803!5m2!1sen!2sin" class="google-map__one" allowfullscreen></iframe>
            </div>
        </section>
        <!--Google Map End-->
        
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
    	<script>
    		grecaptcha.ready(function () {
    		    document.getElementById('contactusForm').addEventListener('submit', function(event) {
    		        event.preventDefault();
    		        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', { action: 'submit' }).then(function(token) {
    		            document.getElementById('recaptchaToken').value = token;
    		            event.target.submit();
    		        });
    		    });
    		});
    	</script>
    
</x-frontend_layout>