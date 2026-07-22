<style>
.asset-bg{
    position: absolute;
    top: 0;
    left: 0;
    min-width: 100%;
    height: fit-content;
}
.main-slider{
    overflow: hidden;
    height: fit-content;
}
    /*"effect": "fade",*/
    /*            "pagination": {*/
    /*            "el": "#main-slider-pagination",*/
    /*            "type": "bullets",*/
    /*            "clickable": true*/
    /*            },*/
    /*            "navigation": {*/
    /*            "nextEl": "#main-slider__swiper-button-next",*/
    /*            "prevEl": "#main-slider__swiper-button-prev"*/
    /*            },*/
    /*            "autoplay": {*/
    /*            "delay": 5000*/
    /*            }}'*/
    @media only screen and (max-width: 767px) {
    .testimonal-two {
        padding: 50px 0 60px;
        padding-bottom: 0;
    }
    .asset-bg {
    position: absolute;
    top: 0;
    min-width: 100%;
    height: -webkit-fill-available !important;
    right: 0;
    left: auto !important;
}
}

/* css for mobile view start*/


/* -----------------------------
       Company Title Section
    ----------------------------- */
    .company-title {
      background: linear-gradient(to bottom, #f0f0f0, #cfcfcf);
      text-align: center;
      padding: 19px 15px;
    padding-top: 7em;
    }

    .company-title h1 {
      font-size: 30px;
      font-weight: 800;
      margin-bottom: 10px;
      letter-spacing: 1px;
    }

    .badge-box span {
      background: #d40000;
      color: #fff;
      padding: 6px 14px;
      font-size: 13px;
      font-weight: 600;
      border-radius: 4px;
      margin: 0 4px;
      display: inline-block;
    }

/* -----------------------------
       Hero / Product Section
    ----------------------------- */
    .hero-section {
      background: radial-gradient(circle, #2b2b2b, #000);
      /*padding: 40px 15px;*/
      position: relative;
    }

    .hero-img {
      max-width: 100%;
      filter: drop-shadow(0 10px 25px rgba(0, 0, 0, 0.8));
    }

    .nav-arrow {
      width: 42px;
      height: 42px;
      background: rgba(255, 255, 255, 0.15);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 22px;
      cursor: pointer;
    }

    /* -----------------------------
       CTA Buttons Section
    ----------------------------- */
    .cta-section {
      background: linear-gradient(to bottom, #3a3a3a, #1e1e1e);
      padding: 35px 15px;
      text-align: center;
    }

    .cta-btn {
     /*background: linear-gradient(to bottom, #ffffff, #dcdcdc);*/
    border: none;
    border-radius: 30px;
    padding: 5px 28px;
    font-weight: 700;
    letter-spacing: 1px;
    margin-bottom: 7px;
    width: 100%;
    max-width: 420px;
    }

    .cta-btn.red {
      background: linear-gradient(to bottom, #ff1a1a, #c90000);
      color: #fff;
    }

    /* -----------------------------
       Info Section
    ----------------------------- */
    .info-section {
      background: linear-gradient(to bottom, #ededed, #cfcfcf);
          padding: 24px 15px;
      text-align: center;
    }

    .info-section p {
      font-size: 18px;
      font-weight: 700;
      letter-spacing: 1px;
    }

    /* -----------------------------
       Celebration Section
    ----------------------------- */
    .celebration {
      background: #2b2b2b;
      color: #fff;
      padding: 25px 15px;
      text-align: center;
    }

    .celebration span {
      color: #ff1a1a;
      font-weight: 800;
    }

    /* -----------------------------
       Download Section
    ----------------------------- */
    .download-section {
    background: linear-gradient(to bottom, #ffffff, #b9b4b4);
    padding: 25px 15px;
    text-align: center;
}

    .download-btn {
      background: linear-gradient(to bottom, #ff1a1a, #c90000);
      color: #fff;
      border: none;
      border-radius: 30px;
      padding: 8px 26px;
      font-weight: 700;
      margin: 8px;
      display: inline-block;
    }


    .carousel-control-prev,
.carousel-control-next {
  width: auto;
}

.carousel-control-prev {
  left: -50px;
}

.carousel-control-next {
  right: -50px;
}

/* =============================
   Button Hover Effects
============================= */

/* Common transition for all buttons */
.cta-btn,
.download-btn {
  transition: 
    transform 0.25s ease,
    box-shadow 0.25s ease,
    background 0.25s ease;
}

/* White CTA buttons hover */
.cta-btn:hover {
  transform: translateY(-3px);
  box-shadow: 
    0 8px 18px rgba(0, 0, 0, 0.35),
    inset 0 -2px 0 rgba(255, 255, 255, 0.6);
}

/* Red CTA + Download buttons hover */
.cta-btn.red:hover,
.download-btn:hover {
  transform: translateY(-3px) scale(1.02);
  box-shadow:
    0 10px 25px rgba(255, 0, 0, 0.45),
    inset 0 -2px 0 rgba(255, 255, 255, 0.25);
}

/* Active / click effect */
.cta-btn:active,
.download-btn:active {
  transform: translateY(0) scale(0.98);
  box-shadow: inset 0 3px 8px rgba(0, 0, 0, 0.4);
}

/* Focus (keyboard accessibility) */
.cta-btn:focus-visible,
.download-btn:focus-visible {
  outline: none;
  box-shadow: 0 0 0 3px rgba(255, 0, 0, 0.4);
}


    /* -----------------------------
       Responsive Tweaks
    ----------------------------- */
    @media (max-width: 576px) {
      .company-title h1 {
        font-size: 27px;
      }

      .info-section p {
        font-size: 19px;
      }
    }

    @media only screen and (max-width: 600px) {
   .main-header{
           background: #ff0808 !important;
   }
   .main-menu__main-menu-box {
        background: #3a0204 !important;
        padding: 10px;
    }
    .swiper-wrapper1{
        display:none !important;
    }
    .logo-wth{
        width: 164px !important;
    }
    .main-menu__logo {

    padding: 20px 0 !important;
}
.downarw{
    display:none;
}
.celebration h4{
    color:#fff;
}
.buy-online{
    color:#fff;
}
.testimonial-one{
    display:none;
}
}





 .wp-chat h3{
        text-align: left;
    font-size: 17px;
    }
    .wp-chat p{
      font-weight: 500;
    color: #000;
    text-align: left;
    line-height: 15px;
    margin-top: 5px;
    }
    .shop-a-m2{
        background: #fff;
    border: 1px solid red;
    margin-top: 10px;
    color: #000;
    padding: 12px;
    margin-bottom: 0em;
    border-radius: 5px;
    text-align: center;
    }
    @media(max-width:600px){
        .img-pos{
            position:relative;
        }
        .img-pos img{
            position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, 28%);
        }
        .wp-chat p {
    font-size: 14px;
}
    }
</style>
<x-frontend_layout>
        <section class="main-slider clearfix">
            <a class="downarw" href="#aboutpage"><img style="" src="{{ asset('public_assets/images/arrow-d.jpg') }}"></a>
            <div class="">
                <div class="swiper-wrapper1">
                    
                    <div class="">
                        <!--<div class="image-layer" style="background-image: url('{{ asset("public_assets/images/backgrounds/bgg.jpg") }}'); display: block;"></div>-->
                         <img class="asset-bg" src="{{ asset("public_assets/images/backgrounds/bgg.jpg") }}">
                        <!-- /.image-layer -->
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="main-slider__content">
                                        <img style="display:block; margin-bottom: 10px;" src="{{ asset('public_assets/images/resources/logonew.png') }}">
                                        <p style="display:block; opacity: 1; visibility: visible;" class="main-slider__text">Established in the year 1982. Sweton is one of the pioneer brands of India recognized as the market leader in India.</p>
                                        <div class="main-slider__btn-box">
                                            <a href="{{ route('category.list', 'pro-loudspeaker') }}" class="thm-btn main-slider__btn" style="">Pro Loud Speakers</a>
                                            <a href="{{ route('category.list', 'home-loudspeaker') }}" class="thm-btn main-slider__btn" style="">Home Loud Speakers</a>
                                            <div>
                                                 <a href="{{ url('application-for-dealership') }}" class="thm-btn main-slider__btn" style="">Application for Dealership</a>
                                              <a href="{{ url('attention-manufacturers') }}" class="thm-btn main-slider__btn" style="">Attention Manufacturers</a>
                                              <a href="https://www.swetonspeakers.com/shop/" class="buy-online thm-btn main-slider__btn">Buy online</a>  
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--<div class="swiper-slide">-->
                    <!--    <div class="image-layer"-->
                    <!--        style="background-image: url('{{ asset("public_assets/images/backgrounds/main-slider-1-1.jpg") }}')"></div>-->
                        <!-- /.image-layer -->
                    <!--    <div class="container">-->
                    <!--        <div class="row">-->
                    <!--            <div class="col-xl-12">-->
                    <!--                <div class="main-slider__content">-->
                    <!--                    <img style="display:block; margin-bottom: 10px;" src="{{ asset('public_assets/images/resources/logonew.png') }}">-->
                    <!--                    <p class="main-slider__text">Among the very few Indian Brands having an in-house product range of more than forty varieties of precision transducers for Professional sound industries.</p>-->
                    <!--                    <div class="main-slider__btn-box">-->
                    <!--                        <a href="{{ route('category.list', 'pro-loudspeaker') }}" class="thm-btn main-slider__btn" style="">Pro Loud Speakers</a>-->
                    <!--                        <a href="{{ route('category.list', 'home-loudspeaker') }}" class="thm-btn main-slider__btn" style="">Home Speakers</a>-->
                    <!--                        <div>-->
                    <!--                          <a href="#" class="thm-btn main-slider__btn" style="">Application for Dealership</a>-->
                    <!--                          <a href="#" class="thm-btn main-slider__btn" style="">Attention Manufacturers</a>-->
                    <!--                          <a href="#" class="thm-btn main-slider__btn">Buy online</a>  -->
                    <!--                        </div>-->
                                            
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <!--<div class="swiper-slide">-->
                    <!--    <div class="image-layer"-->
                    <!--        style="background-image: url('{{ asset("public_assets/images/backgrounds/main-slider-1-2.jpg") }}')"></div>-->
                        <!-- /.image-layer -->
                    <!--    <div class="container">-->
                    <!--        <div class="row">-->
                    <!--            <div class="col-xl-12">-->
                    <!--                <div class="main-slider__content">-->
                    <!--                    <img style="display:block; margin-bottom: 10px;" src="{{ asset('public_assets/images/resources/logonew.png') }}">-->
                    <!--                    <p class="main-slider__text">The horizon where four decades of experience meet futuristic ideas.</p>-->
                    <!--                    <div class="main-slider__btn-box">-->
                    <!--                        <a href="{{ route('category.list', 'pro-loudspeaker') }}" class="thm-btn main-slider__btn" style="">Pro Loud Speakers</a>-->
                    <!--                        <a href="{{ route('category.list', 'home-loudspeaker') }}" class="thm-btn main-slider__btn" style="">Home Speakers</a>-->
                    <!--                        <div>-->
                    <!--                          <a href="#" class="thm-btn main-slider__btn" style="">Application for Dealership</a>-->
                    <!--                          <a href="#" class="thm-btn main-slider__btn" style="">Attention Manufacturers</a>-->
                    <!--                          <a href="#" class="thm-btn main-slider__btn">Buy online</a>  -->
                    <!--                        </div>-->
                                            
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

                  

                </div>
                
                 <!-- =============================
                       Company Title
                  ============================== -->
                  <!--<section class="company-title">-->
                  <!--  <img src="{{ asset('public_assets/images/resources/logo-1.png') }}" alt="">-->
                  <!--</section>-->
                    <section class="company-title mobile-view">
                    <h1>OCTUNE ELECTRONICS LLP</h1>
                    <div class="badge-box">
                      <span>ISO 9001:2025</span>
                      <span>LIC. 2018-50459</span>
                    </div>
                  </section>
                  
                 


            </div>
        </section>
        <!--Main Slider End-->
        
         <!-- =============================
                        mobile Hero / Product Slider
                    ============================== -->
                    <section class="hero-section mobile-view">
                      <div class="container">
                        <div class="row justify-content-center align-items-center">
                          <div class="col-12 col-md-10">
                    
                            <!-- Bootstrap Carousel -->
                            <div id="speakerCarousel" class="carousel slide" data-bs-ride="carousel">
                    
                              <!-- Slides -->
                              <div class="carousel-inner text-center">
                    
                                <div class="carousel-item active">
                                  <img
                                    src="{{ asset('public_assets/images/resources/mobile-1.jpg') }}"
                                    class="img-fluid hero-img"
                                    alt="Speaker 1"
                                  />
                                </div>
                    
                                <div class="carousel-item">
                                  <img
                                    src="{{ asset('public_assets/images/resources/mobile-2.jpg') }}"
                                    class="img-fluid hero-img"
                                    alt="Speaker 2"
                                  />
                                </div>
                    
                                <div class="carousel-item">
                                  <img
                                    src="{{ asset('public_assets/images/resources/mobile-3.jpg') }}"
                                    class="img-fluid hero-img"
                                    alt="Speaker 3"
                                  />
                                </div>
                    
                              </div>
                    
                              <!-- Left Arrow -->
                              <button
                                class="carousel-control-prev"
                                type="button"
                                data-bs-target="#speakerCarousel"
                                data-bs-slide="prev"
                              >
                                <span class="nav-arrow">&lt;</span>
                              </button>
                    
                              <!-- Right Arrow -->
                              <button
                                class="carousel-control-next"
                                type="button"
                                data-bs-target="#speakerCarousel"
                                data-bs-slide="next"
                              >
                                <span class="nav-arrow">&gt;</span>
                              </button>
                    
                            </div>
                    
                          </div>
                        </div>
                      </div>
                    </section>
        
        
        
                         <!-- =============================
                       CTA Buttons
                  ============================== -->
                  <section class="cta-section mobile-view">
                    <div class="container">
                      <a href="{{ route('category.list', 'pro-loudspeaker') }}"><button class="cta-btn">PRO LOUD SPEAKERS</button></a><br />
                      <a href="{{ route('category.list', 'home-loudspeaker') }}"><button class="cta-btn">HOME LOUD SPEAKERS</button></a><br />
                      <a href="{{ url('application-for-dealership') }}"><button class="cta-btn">APPLICATION FOR DEALERSHIP</button></a><br />
                      <a href="{{ url('attention-manufacturers') }}"><button class="cta-btn">ATTENTION MANUFACTURERS</button></a><br />
                      <a href="https://www.swetonspeakers.com/shop/"><button class="cta-btn buy-online">BUY ONLINE</button></a>
                    </div>
                  </section>
                  
                   <!-- =============================
                       Government Certificate Info
                  ============================== -->
                  <section class="info-section mobile-view">
                    <div class="container">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal"><p>
                        OCTUNE ELECTRONICS LLP<br> HAS RECEIVED CERTIFICATE<br> OF APPRECIATION FROM<br>
                        THE GOVERNMENT OF INDIA<br> (MINISTRY OF FINANCE).
                      </p></a>
                      
                      <div class="row">
                           <div class="col-md-12">
                             <div class="shop-a-m2">
                                 <div class="row">
                                     <div class="col-2">
                                         <div class="img-pos"><img style="width:40px" src="{{ asset('public_assets/images/resources/wa-logo.png') }}"></div>
                                     </div>
                                     <div class="col-10 wp-chat">
                                         <h3>Now let's chat on WhatsApp!!!</h3>
                                         <p>Save <b><a style="color:red" href="https://wa.me/9073003001?text=Hi">9073003001</a></b> and send <b>Hi</b> to avail our service 24*7 on WhatsApp.</p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                      </div>
                    </div>
                  </section>
                  
                  <!-- =============================
                       Celebration Section
                  ============================== -->
                  <section class="celebration mobile-view">
                    <div class="container">
                      <h4>
                        <span style="font-size: 27px;">SWETON</span> IS CELEBRATING<br/>
                        43 YEARS OF SUCCESS,<br/> TRUST AND RELIABILITY.
                      </h4>
                    </div>
                  </section>
                
                  <!-- =============================
                       Download Buttons
                  ============================== -->
                  <section class="download-section mobile-view">
                    <div class="container">
                      <a href="https://www.swetonspeakers.com/assets/frontend/images/Sweton Transducer, Kolkata.pdf" class="download-btn"><i class="fas fa-file-pdf"></i> Download Pro Series Brochure</a>
                      <a href="https://www.swetonspeakers.com/assets/frontend/images/Sweton_Home_Series_Catalogue.pdf" class="download-btn"><i class="fas fa-file-pdf"></i> Download Home Series Brochure</a>
                    </div>
                  </section>
        
        
        <section class="top-one1" style="background:#fff">
            <div style="margin-top:0px; margin-bottom: 0;">
                <div class="container">
                    <div class="row">
                         <div class="col-md-12">
                             <div class="shop-a-m1"><a href="#" data-bs-toggle="modal" data-bs-target="#imageModal">Octune Electronics LLP has received Certificate of Appreciation from The Government of India (Ministry of Finance).</a></div>
                         </div>
                          <div class="col-md-12">
                             <div class="shop-a-m2">
                                 <div class="row">
                                     <div class="col-2">
                                         <div class="img-pos"><img style="width:40px" src="{{ asset('public_assets/images/resources/wa-logo.png') }}"></div>
                                     </div>
                                     <div class="col-10 wp-chat">
                                         <h3>Now let's chat on WhatsApp!!!</h3>
                                         <p>Save <b><a style="color:red" href="https://wa.me/9073003001?text=Hi">9073003001</a></b> and send <b>Hi</b> to avail our service 24*7 on WhatsApp.</p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         
                         <div class="col-md-12 mt-2" style="margin-top: 1em;">
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="shop-a-m1 mb11" style="background: #a90404;"><a href="https://www.swetonspeakers.com/assets/frontend/images/Sweton Transducer, Kolkata.pdf">Download Pro Series Brochure</a></div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="shop-a-m1 mm1" style="background: #a90404;"><a href="https://www.swetonspeakers.com/assets/frontend/images/Sweton_Home_Series_Catalogue.pdf">Download Home Series Brochure</a></div>
                                 </div>
                             </div>
                             
                         </div>
                         <!--<div class="col-md-6">-->
                         <!--    <div class="shop-a-m2"><p>For bulk/ tailor made  requirement, please whatsapp at <b>9831011477</b></p></div>-->
                         <!--</div>-->
                     </div>
                        <!-- The Modal -->
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                  
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                          
                                            <!-- Modal Header -->
                                            <div class="modal-header" style="padding: 10px;">
                                              <h4 style="margin-bottom: 0; font-size: 15px; padding: 0px; margin: 0;" class="modal-title">Certificate of Appreciation</h4>
                                              <button class="cross11" type="button" data-bs-dismiss="modal" aria-label="Close">×</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                              <img class="input-check__icon" style="transform: inherit;position: inherit;" width="100%" height="auto" src="https://www.swetonspeakers.com/assets/frontend/images/certi.jpg">
                                            </div>
                                            
                                         
                                            
                                          </div>
                                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Experience One Start-->
        <section class="experience-one" id="aboutpage">
            <div class="experience-one-shape-1 shapeMover"
                style="background-image: url('{{ asset("public_assets/images/experience-one-shape-1.webp") }}')"></div>
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">About Experience</span>
                    <h2 class="section-title__title desk-view" style="color:#fff">Celebrating <span class="color-red">43 years</span> of customar satisfaction and trust
                    </h2>
                </div>
                <div class="row">
                    <!--Experience One Single Start-->
                    <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="100ms">
                        <div class="experience-one__single">
                            <div class="experience-one__icon">
                                <span class="icon-service"></span>
                            </div>
                            <div class="experience-one__content">
                                <h3 class="experience-one__title"><a href="#">Symbolises Elegance</a>
                                </h3>
                                <p class="experience-one__text">SWETON symbolises elegance, style and superior craftsmanship where each and every product is finest in technical superiority and aesthetic sophistication. </p>
                            </div>
                        </div>
                    </div>
                    <!--Experience One Single End-->
                    <!--Experience One Single Start-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                        <div class="experience-one__single">
                            <div class="experience-one__icon">
                                <span class="icon-management"></span>
                            </div>
                            <div class="experience-one__content">
                                <h3 class="experience-one__title"><a href="team.html">Regular Upgradation</a></h3>
                                <p class="experience-one__text">SWETON believes in regular upgradation and development and a dedicated R&D Team works continuously with most precision software and equipment.</p>
                            </div>
                        </div>
                    </div>
                    <!--Experience One Single End-->
                    <!--Experience One Single Start-->
                    <div class="col-xl-4 col-lg-4 wow fadeInRight" data-wow-delay="300ms">
                        <div class="experience-one__single">
                            <div class="experience-one__icon">
                                <span class="icon-headphones"></span>
                            </div>
                            <div class="experience-one__content">
                                <h3 class="experience-one__title"><a href="contact.html">In-house Product Range</a></h3>
                                <p class="experience-one__text">SWETON – Among the very few Indian Brands having an in-house product range of more than forty varities of precision transducers for Professional sound industries.</p>
                            </div>
                        </div>
                    </div>
                    <!--Experience One Single End-->
                </div>
            </div>
        </section>
        <!--Experience One End-->

       
          <x-featured-products></x-featured-products>

         <x-featured-category type="pro-loudspeaker"></x-featured-category>

        <!--Contact Two Start-->
        <section class="contact-two">
            <div class="contact-two-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url('{{ asset("public_assets/images/contact-one-bg.webp") }}')"></div>
            <div class="container">
                <div class="contact-two__inner">
                    <div class="section-title section-title--two text-center">
                        <span class="section-title__tagline"> <img style="width: 160px;" src="{{ asset('public_assets/images/resources/logonew.png') }}"></span>
                        <h2 class="section-title__title">Inspire. Innovate. Entertain.</h2>
                        <p class=" section-title__text">The horizon where four decades of experience meet futuristic ideas.</p>
                        <p style="padding-top: 2px;" class=" section-title__text">Established in the year 1982. Sweton is one of the pioneer brand of India recognized as the market leader in India.</p>
                    </div>
                    <div class="contact-two__details-box">
                        <ul class="list-unstyled contact-two__details">
                            <li>
                                <div class="icon">
                                    <span class="fa fa-envelope"></span>
                                </div>
                                <div class="content">
                                    <span>Send us an email</span>
                                    <p><a href="mailto:sales@swetonspeakers.com">sales@swetonspeakers.com</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="fab fa-whatsapp"></span>
                                   
                                </div>
                                <div class="content">
                                    <span>Whatsapp</span>
                                    <p><a href="https://api.whatsapp.com/send?phone=917044411800">+91 7044411800</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact Two  End-->



        <x-featured-category type="home-loudspeaker"></x-featured-category>




        <!--About One Start-->
        <section class="about-one">
            <div class="about-one__bg float-bob-y"
                style="background-image: url('{{ asset("public_assets/images/backgrounds/about-one-bg-img-1.jpg") }}')">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-one__left">
                            <div class="about-one__img wow slideInLeft" data-wow-delay="100ms"
                                data-wow-duration="2500ms">
                                <img src="{{ asset('public_assets/images/about-1-1.webp') }}" alt="">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-one__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">OUR INTRODUCTION</span>
                                <h2 style="font-size: 30px;" class="section-title__title">Welcome to the world of <img style="width: 160px;" src="{{ asset('public_assets/images/resources/logonew1.png') }}"></h2>
                            </div>
                            <h3>Among the very few Indian Brands</h3>
                            <p class="about-one__right-text-1">SWETON – Among the very few Indian Brands having an in-house product range of more than forty varieties of precision transducers for Professional sound industries. Also, more than forty varieties of transduces for Home Series. Probably, the only manufacturer in India cater to both Pro and Home series.</p>
                            <ul class="about-one__points list-unstyled">
                                <li>
                                    <div class="about-one__points-single">
                                        <div class="about-one__points-icon">
                                            <span class="icon-repair"></span>
                                        </div>
                                        <div class="about-one__points-text">
                                            <h3 class="about-one__points-title"><a href="{{ url('about-us') }}">About Us</a></h3>
                                            <p class="about-one__points-subtitle">Read more ...</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="about-one__points-single">
                                        <div class="about-one__points-icon">
                                            <span class="icon-phone"></span>
                                        </div>
                                        <div class="about-one__points-text">
                                            <h3 class="about-one__points-title"><a href="{{ route('public.blogs') }}">Our Blogs &amp; Events</a></h3>
                                            <p class="about-one__points-subtitle">Read more ...</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <a href="{{ url('contact-us') }}" class="thm-btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About One End-->



        <!--FAQ One Start-->
        <section class="faq-one">
            <div class="faq-one-shape-1 shapeMover"
                style="background-image: url('{{ asset("public_assets/images/faq-one-shape.webp") }}')"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="faq-one__left">
                           
                            <iframe width="100%" height="203" src="https://www.youtube.com/embed/f5OQRLoth-A" title="Aatank DJ Sound Box Full Power Hard Bass DJ 6 Dual Bass 6 line array   #VkiVan" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                            <iframe width="100%" height="203" src="https://www.youtube.com/embed/-6HZNh0ffDw" title="Sweton Transducers at a glance ..." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                       
                            <a href="{{ url('videos') }}" class="thm-btn vw-btn">View More</a>
                       
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="faq-one__right">
                            <h3>Why SWETON Speaker instead of Chinese</h3>
                            <table class="table table-striped table-red rwd-table">
                                <thead>
                                    <tr>
                                        <th><img class="ss11" style="" src="https://www.swetonspeakers.com/assets/frontend/images/logo1.png" alt=""></th>
                                        <th class="china-h">CHINESE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td data-th="SWETON">Consistency in quality. Long Life.</td>
                                        <td data-th="CHINESE">Consistency doubtful. Limited life.</td>
                                    </tr>
                                    <tr>
                                        <td data-th="SWETON">Only best quality of raw materials used.</td>
                                        <td data-th="CHINESE">No guarantee of quality of raw materials.</td>
                                    </tr>
                                    <tr>
                                        <td data-th="SWETON">Regular supply available.</td>
                                        <td data-th="CHINESE">No such guarantee of regular supply.</td>
                                    </tr>
                                    <tr>
                                        <td data-th="SWETON">Normally NO price fluctuation due to change in foreign exchange rate.</td>
                                        <td data-th="CHINESE">High risk of Price fluctuation due to change in exchange rate of US $.</td>
                                    </tr>
                                    <tr>
                                        <td data-th="SWETON">RE-Con Kit available.</td>
                                        <td data-th="CHINESE"> Re-Con Kit not available easily.</td>
                                    </tr>
                                    <tr>
                                        <td data-th="SWETON">Over 43 years of experience in quality manufacturing.</td>
                                        <td data-th="CHINESE">Very difficult to find such reliable supplier.</td>
                                    </tr>
                                    <tr>
                                        <td data-th="SWETON">Make in India - Manufactured in Kolkata. Creates Employment and wealth in our own Country.</td>
                                        <td data-th="CHINESE">Imported from China. NO EMPLOYEMENT Created  in India. Employment created in China. </td>
                                    </tr>
                                    <tr>
                                        <td data-th="SWETON">Make in India - To suit the taste and requirement  of Indian market. Performs well under Extreme condition.</td>
                                        <td data-th="CHINESE">No experience of Indian  taste. Not suitable for extreme condition.</td>
                                    </tr>
                                     <tr>
                                        <td data-th="SWETON">Make in India - Proud of Our Origin. We believe in our Quality.</td>
                                        <td data-th="CHINESE">Make false claim like - Designed in Italy , U.S. or England.Because they know that their quality is inferior.</td>
                                    </tr>
                                    <tr>
                                        <td data-th="SWETON">Any customisation in design &amp; quality can be made quickly.</td>
                                        <td data-th="CHINESE">It takes atleast 3 months to make any changes.</td>
                                    </tr>
                                 </tbody>
                             </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--FAQ One End-->

        <!--Counter One Start-->
        <section class="counter-one">
            <div class="counter-one__bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url('{{ asset("public_assets/images/contact-one-bg.webp") }}')"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="counter-one__list list-unstyled">
                            <li class="counter-one__single">
                                <h3 class="odometer" data-count="43">00</h3>
                                <span class="counter-one__plus">+</span>
                                <p class="counter-one__text">Glorious Years</p>
                            </li>
                            <li class="counter-one__single">
                                <h3 class="odometer" data-count="1">00</h3>
                                <span class="counter-one__plus">Cr+</span>
                                <p class="counter-one__text">Happy Customers</p>
                            </li>
                            <li class="counter-one__single">
                                <h3 class="odometer" data-count="80">00</h3>
                                <span class="counter-one__plus">+</span>
                                <p class="counter-one__text">Products</p>
                            </li>
                            <li class="counter-one__single">
                                <h3 class="odometer" data-count="100">00</h3>
                                <span class="counter-one__plus">%</span>
                                <p class="counter-one__text">Satisfactions</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Counter One End-->
        
       <!--Testimonial two Start-->
        <section class="testimonal-two">
            <div class="container">
                <div class="section-title section-title--two text-center">
                    <span class="section-title__tagline">TESTIMONIAL</span>
                    <h2 class="section-title__title">Our Customers Review</h2>
                    <!--<p class=" section-title__text">Duis aute irure dolor in repreh enderit in volup -->
                    <!--    tate velit esse-->
                    <!--    cillum dolore <br> eu fugiat nulla dolor atur with Lorem ipsum is simply </p>-->
                </div>
                <div class="testimonial-two__carousel owl-carousel owl-theme thm-owl__carousel" data-owl-options='{
                    "loop": true,
                    "autoplay": true,
                    "margin": 30,
                    "nav": false,
                    "dots": true,
                    "smartSpeed": 500,
                    "autoplayTimeout": 10000,
                    "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow1\"></span>"],
                    "responsive": {
                        "0": {
                            "items": 1
                        },
                        "768": {
                            "items": 2
                        },
                        "992": {
                            "items": 2
                        },
                        "1200": {
                            "items": 2
                        }
                    }
                }'>
                    <!--Testimonial two Single Start-->
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <div id="section" class="testimonial-two__text">
                                    <div class="article">
                                    <p class="testimonial-two__text">Yesterday I received the courier. As expected all the speakers were of good quality.well packed and all items are as same as I seen in your website.
                                </p>
                                 <p class="moretext">
                                      your effort in make in india must be appreciated.i will test my speakers accordingly to choose the proper drivers for my purpose. There after I willtake each one in large no. ths will happen  in a week.once again I thank you for making me take the first step for make in india.
                                    </p>
                                    </div>
                                <a class="moreless-button">Read more</a>
                                </div>
                                
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/testimonial/testimonial-2-1.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">Varun mohan, </h3>
                                        <p class="testimonial-two__client-title">Kerala</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial two Single End-->
                    <!--Testimonial two Single Start-->
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">As we are nearing our 40 years of Service to our nation, we decided to hear from our very old dealer partners about their experience of Sweton.
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">Subal Mallik</h3>
                                        <p class="testimonial-two__client-title">Dhanbad</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial two Single End-->
                    <!--Testimonial two Single Start-->
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">As we are nearing our 40 years of Service to our nation, we decided to hear from our very old dealer partners about their experience of Sweton.
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">Atish Singh</h3>
                                        <p class="testimonial-two__client-title">Odisha</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial two Single End-->
                    <!--Testimonial two Single Start-->
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">Great website built-up. Hassle free user experience. Really appreciated !!!
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/testimonial/testimonial-2-2.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">Asim Saha</h3>
                                        <p class="testimonial-two__client-title">Kolkata</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial two Single End-->
                     <!--Testimonial two Single Start-->
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">Nice build quality... Got in time, Sound quality is awosme n bass is insane... Thanks for the delivery sir.... I'll write review soon
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Sumit Nawani</h3>
                                        <p class="testimonial-two__client-title">Uttarakhand</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial two Single End-->
                    
                     <!--Testimonial two Single Start-->
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">Yesterday I received the courier. As expected all the speakers were of good quality.well packed and all items are as same as I seen in your website.your effort in make in india must be appreciated.i will test my speakers accordingly to choose the proper drivers for my purpose. There after I willtake each one in large no. ths will happen  in a week.once again I thank you for making me take the first step for make in india.
Mont eve audios
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Varun mohan</h3>
                                        <p class="testimonial-two__client-title">Kerala</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial two Single End-->

                   <!--Testimonial two Single Start-->
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">Good product. Value for money. Trustable indian brand
Mont eve audios
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Biju Ayroor</h3>
                                        <p class="testimonial-two__client-title">Thankappan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">Recd. The speakers. Thank you sir. Impressed with your service
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Krishnamurthy</h3>
                                        <p class="testimonial-two__client-title">Dwarka, New Delhi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">I have purchased the Home Series products from Sweton (100-watt tweeters, 12dB crossover, 150-watt dual-magnet woofers, and a 12-inch subwoofer). After using these products for many days, I truly feel that no other company can match Sweton in terms of quality and price. I experienced the sound myself, and I got exactly the clear and powerful sound I wanted.
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Shivam kumar prajapati</h3>
                                        <p class="testimonial-two__client-title">India</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">For last 2 yrs, i have been using Sweton's drivers like, Full range speakers, woofers and subwoofers.
So, according to me, sweton's products are amazing! really amazing! . 
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Partha Sarathi Manna</h3>
                                        <p class="testimonial-two__client-title">India</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">I know sweton for almost 20-25 years . Excellent quality and best price.. I have purchased multiple speakers all are very good quality 
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Vikash Kumar</h3>
                                        <p class="testimonial-two__client-title">India</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">I am fan of sweton speaker since my childhood almost for 25 year I know about the sweton speaker.. Currently I am in bangalore and I know there are more than thousands of speaker manufacture  company in india.. but I believe the quality of sweton speaker is best among in all these.  
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Bikash Kumar</h3>
                                        <p class="testimonial-two__client-title">India</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">mind blowing heavy bass punch 10''inch 100watt woofer.  
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Prince Raj</h3>
                                        <p class="testimonial-two__client-title">India</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">In this price range ...very very nice products. All speakers  quality is fabulous , awesome bass in subwoofer . A big thank to Sweton ❤️  
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Somnath Chatterjee</h3>
                                        <p class="testimonial-two__client-title">Kolkata</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">Very good woofers and tweeters i give 🌟🌟🌟🌟🌟 
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- PARTHO BHATTACHARYA</h3>
                                        <p class="testimonial-two__client-title">Kolkata</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">Excellent quality product and sound quality compair to same as other forigen brand  and resoblnable price
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Diptiman Mohanty</h3>
                                        <p class="testimonial-two__client-title">Kolkata</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">Good budget friendly price I am happy 15 inches speakers
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Somnath Mondal</h3>
                                        <p class="testimonial-two__client-title">Kolkata</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">🔊Nice products 👍🏻 love SWETON products 🙃🙂 {KOLKATA _UX1_MUMBAI} …
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Ujjwal Biswas</h3>
                                        <p class="testimonial-two__client-title">Kolkata</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!--Testimonial two End-->
 <!--Testimonial two Single Start-->
                   
                </div>
            </div>
        </section>
        <!--Testimonial two End-->

       


        <!--Blog Two Start-->
        <x-home-blog></x-home-blog>
        <!--Blog Two End-->	
</x-frontend_layout>