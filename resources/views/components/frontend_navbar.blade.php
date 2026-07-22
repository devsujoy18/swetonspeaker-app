<header class="main-header">
    <nav class="main-menu">
        <div class="main-menu__wrapper">
            <div class="main-menu__wrapper-inner">
                <div class="main-menu__left">
                    <div class="main-menu__logo">
                        <a href="{{ url('/') }}"><img class="desk-view" src="{{ asset('public_assets/images/resources/logo-1.png') }}" alt="">
                        <img class="mobile-view logo-wth" src="{{ asset('public_assets/images/resources/logo-wh.png') }}">
                        </a>
                    </div>
                </div>
                <div class="main-menu__main-menu-box">
                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                    <ul class="main-menu__list">
                        <li class="">
                            <a href="{{ url('/') }}">Home </a>

                        </li>
                        <li>
                            <a href="{{ url('about-us') }}">About</a>
                        </li>
                        <li class="dropdown">
                            <a href="#">Products</a>
                            <ul class="shadow-box">
                                <li><a href="{{ route('category.list', 'pro-loudspeaker') }}">Pro Loudspeakers</a></li>
                                <li><a href="{{ route('category.list', 'home-loudspeaker') }}">Home Loudspeakers</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('public.blogs') }}">Events &amp; Blogs</a>
                        </li>
                        <li>
                            <a href="{{ url('videos') }}">Videos</a>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#">Contact</a>
                            <ul class="shadow-box">
                                <li><a href="{{ url('contact-us') }}">Contact Details</a></li>
                                <li><a href="{{ url('application-for-dealership') }}">Aplication for dealership</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <div class="main-menu__right">
                    <div class="main-menu__search-cart-call-box">
                        <div class="main-menu__search-cart-box">
                            <div class="main-menu__search-box">
                                <a href="#" class="main-menu__search search-toggler icon-search-interface-symbol"></a>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                </div>
            </div>
                  
        </div> 
         
    </nav>
    @if (Request::is('speaker*'))
        <livewire:compare-cart-component />
    @endif
</header>