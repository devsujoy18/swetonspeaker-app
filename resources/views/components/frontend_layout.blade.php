@props([
    'showPageFaqs' => true,
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @php
        use App\Models\PageFaq;
        use App\Models\SeoMeta;

        $fallbackTitle = 'Sweton -Transducers Since 1982 :: Pro Loudspeakers | Home Loudspeakers';
        $fallbackKeywords = 'Speakers,Loudspeakers,PA Speaker,Woofer,Tweeter High Frequen(H F),Full Range Speaker,Car Speaker,Speaker Manufacturer in India,Audio Speaker Manufacturer,Audio Speaker Exporter in India,Raw Speaker in India,Cinema Speakers';
        $fallbackDescription = 'SWETON - is an Indian Brand having an in-house product range of more than forty varieties of precision transducers for Professional sound industries(Pro Audio) and more than forty varieties of transduces for Home Series(Home Audio). Audio loudspeaker manufacturer since 1982';
        $route = request()->route();
        $routeName = $route?->getName();
        $routeSlug = $route?->parameter('slug');
        $currentPath = request()->is('/') ? '/' : '/'.request()->path();
        $seoQuery = SeoMeta::active()->forType(SeoMeta::TypeMainSite);
        $seoMeta = null;

        if ($routeName === 'product.public.details' && is_string($routeSlug)) {
            $seoMeta = (clone $seoQuery)->forPageType(SeoMeta::PageTypeProduct)->forSlug($routeSlug)->latest()->first();
        }

        if (! $seoMeta && $routeName === 'category.products' && is_string($routeSlug)) {
            $seoMeta = (clone $seoQuery)->forPageType(SeoMeta::PageTypeCategory)->forSlug($routeSlug)->latest()->first();
        }

        if (! $seoMeta) {
            $seoMeta = (clone $seoQuery)->forPath($currentPath)->latest()->first();
        }

        if (! $seoMeta && $routeName) {
            $seoMeta = (clone $seoQuery)->forRoute($routeName)->latest()->first();
        }

        if (! $seoMeta) {
            $seoMeta = (clone $seoQuery)->forPageType(SeoMeta::PageTypeDefault)->latest()->first();
        }

        $seoTitle = $seoMeta?->title ?: $fallbackTitle;
        $seoKeywords = $seoMeta?->keywords ?: $fallbackKeywords;
        $seoDescription = $seoMeta?->description ?: $fallbackDescription;
        $seoRobots = $seoMeta?->robots ?: 'index, follow';

        $pageFaqQuery = PageFaq::active()->forType(PageFaq::TypeMainSite)->ordered();
        $pageFaqs = collect();

        if ($showPageFaqs && $routeName === 'product.public.details' && is_string($routeSlug)) {
            $pageFaqs = (clone $pageFaqQuery)->forPageType(PageFaq::PageTypeProduct)->forSlug($routeSlug)->get();
        }

        if ($showPageFaqs && $pageFaqs->isEmpty() && $routeName === 'category.products' && is_string($routeSlug)) {
            $pageFaqs = (clone $pageFaqQuery)->forPageType(PageFaq::PageTypeCategory)->forSlug($routeSlug)->get();
        }

        if ($showPageFaqs && $pageFaqs->isEmpty()) {
            $pageFaqs = (clone $pageFaqQuery)->forPath($currentPath)->get();
        }

        if ($showPageFaqs && $pageFaqs->isEmpty() && $routeName) {
            $pageFaqs = (clone $pageFaqQuery)
                ->forPageType(PageFaq::PageTypePage)
                ->forRoute($routeName)
                ->get();
        }
    @endphp
    <title>{{ $seoTitle }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public_assets/images/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public_assets/images/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public_assets/images/favicons/favicon-16x16.png') }}" />
    <!-- <link rel="manifest" href="{{ asset('public_assets/images/favicons/site.webmanifest') }}" /> -->
   <meta name="title" content="{{ $seoTitle }}" />
  <meta name="keywords" content="{{ $seoKeywords }}" />
  <meta name="description" content="{{ $seoDescription }}" />
  <meta name="robots" content="{{ $seoRobots }}" />
  @if($seoMeta?->canonical_url)
  <link rel="canonical" href="{{ $seoMeta->canonical_url }}" />
  @endif
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/jetly-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/reey-font/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/vegas/vegas.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/timepicker/timePicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/nice-select/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/css/sweton3.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/css/sweton-responsive1.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/css/lightbox.min.css') }}" />
    {{ $styles ?? '' }}
</head>

<body class="custom-cursor">



    <!--<div class="preloader">-->
    <!--    <div class="preloader__image"></div>-->
    <!--</div>-->
    <!-- /.preloader -->
    
    <style>
       
@media (max-width: 767px) {
     .select-box {
    float: none;
}
    .search-popup__content form input[type=text] {
        padding-left: 10px;
    }
    .search-popup__content .thm-btn {
    padding: 0;
    width: 100%;
    height: 55px;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    text-align: center;
     position: static;
    top: 0;
    right: -1px;
    border-radius: 0;
    border: 0;
}
.search-popup__content form input[type=search], .search-popup__content form input[type=text] {
    width: 100%;
    background-color: #fff;
    font-size: 14px;
}
}

@media (max-width: 767px) {
    .search-popup__content .select-box select {
        font-size: 16px;
    }
}
    </style>


    <div class="page-wrapper">
        <x-frontend_navbar></x-frontend_navbar>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        {{ $slot }}

        @if($showPageFaqs && $pageFaqs->isNotEmpty())
            <x-frontend_page_faqs :page-faqs="$pageFaqs" />
        @endif

       <x-frontend_footer></x-frontend_footer>


    </div>
    <x-mobile_navbar></x-mobile_navbar>

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <div class="search-popup__content">
            <form action="{{ route('search') }}" method="GET">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="billing_input_box">
                            <div class="select-box">
                                <select class="wide" name="category">
                                    <option value="" data-display="Select a category">Select Speaker Categories</option>
                                    <option value="pro-loudspeaker" {{ request('category') == 'pro-loudspeaker' ? 'selected' : '' }}>Pro Speaker</option>
                                    <option value="home-loudspeaker" {{ request('category') == 'home-loudspeaker' ? 'selected' : '' }}>Home Speaker</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="header-search" class="sr-only">search here</label>
                        <input type="text" id="header-search" name="product_name" placeholder="Product Name / Size / Wattage" value="{{ request('product_name') }}"/>
                        <button type="submit" aria-label="search submit" class="thm-btn">
                            <i class="icon-search-interface-symbol"></i> <span class="d-block d-md-none ml-2">Search</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-right-arrow"></i></a>
    <script src="{{ asset('public_assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/vegas/vegas.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/timepicker/timePicker.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/circleType/jquery.circleType.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/circleType/jquery.lettering.min.js') }}"></script>
    <script src="{{ asset('public_assets/js/sweton.js') }}"></script>
     <script src="{{ asset('public_assets/js/lightbox.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
        $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
    });
    </script>
    
    <!------------modal js-------->

<script>
    jQuery(document).ready(function($){
  
  window.onload = function (){
    $(".bts-popup").delay(1000).addClass('is-visible');
	}
  
	//open popup
	$('.bts-popup-trigger').on('click', function(event){
		event.preventDefault();
		$('.bts-popup').addClass('is-visible');
	});
	
	//close popup
	$('.bts-popup').on('click', function(event){
		if( $(event.target).is('.bts-popup-close') || $(event.target).is('.bts-popup') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		$('.bts-popup').removeClass('is-visible');
	    }
    });
});
</script>

    <script>
        $('.moreless-button').click(function() {
  $('.moretext').slideToggle();
  if ($('.moreless-button').text() == "Read more") {
    $(this).text("Read less")
  } else {
    $(this).text("Read more")
  }
});
    </script>
    
     <script>
        document.addEventListener('DOMContentLoaded', function () {
            var bannerSwiper = new Swiper('.banner-swiper', {
                loop: true,
                speed: 700,
                autoplay: {
                    delay: 3500,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true
                },
                effect: 'slide',
                grabCursor: true,
                pagination: {
                    el: '.banner-pagination',
                    clickable: true,
                    dynamicBullets: false
                },
                navigation: {
                    nextEl: '.banner-next',
                    prevEl: '.banner-prev'
                }
            });
        });
    </script>
    
     <!-- Featured Models Swiper Slider Init -->
     <!-- Featured Models Swiper Slider Init -->
    <!-- Featured Models Owl Carousel Init -->
    <script>
        $(document).ready(function () {
            $('.featured-models-carousel').owlCarousel({
                loop: true,
                margin: 12,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                smartSpeed: 600,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>'
                ],
                responsive: {
                    0: {
                        items: 1,
                        margin: 16
                    },
                    576: {
                        items: 1,
                        margin: 16
                    },
                    768: {
                        items: 2,
                        margin: 20
                    },
                    992: {
                        items: 3,
                        margin: 24
                    },
                    1200: {
                        items: 3,
                        margin: 28
                    }
                }
            });
        });
    </script>
    </script>
    
    {{ $scripts ?? '' }}
</body>
</html>
