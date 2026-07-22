<x-frontend_layout>
    <style>
        .item {
          height: auto;
          width: 100%;
          background: #fff;
        }

        .gallery_sec a {
            position: relative;
            transition: 0.3s ease-in-out;
            -webkit-transition: 0.3s ease-in-out;
            -moz-transition: 0.3s ease-in-out;
            -ms-transition: 0.3s ease-in-out;
            -o-transition: 0.3s ease-in-out;
        }


        .gallery_sec a::before {
            position: absolute;
            content: "";
            width: 30px;
            height: 30px;
            background: none;
            background-size: contain;
            background-repeat: no-repeat;
          top:45%;
          left:50%;
          transform:translate(-50%, -50%);
        }

        .gallery_sec img {
            transition: 0.3s ease-in-out;
            -webkit-transition: 0.3s ease-in-out;
            -moz-transition: 0.3s ease-in-out;
            -ms-transition: 0.3s ease-in-out;
            -o-transition: 0.3s ease-in-out;
        }

        .gallery_sec a:hover img {
            position: relative;
            width: 100%;
        }

        .gallery_sec a:hover img {
            opacity: 1;
        }

        .gallery_sec a:hover::before {
            position: absolute;
            content: "";
            width: 50px;
            height: 50px;
            background: url(https://i.ibb.co/3fMkjjF/Resize.png);
            background-size: contain;
            background-repeat: no-repeat;
            z-index: 99;
            background-color:#fff;
            opacity: .2;
        }
        .fancybox-image {
            background: #fff !important;
        }
        .key_features li{
            padding: 10px 0;
        }

    </style>
	<section class="page-header">
        <div class="page-header-bg" style="background-image: url('{{ asset("public_assets/images/backgrounds/page-header-bg.jpg") }}')"></div>
        <div class="container">
                <div class="page-header__inner">
                    <h2>Products</h2>
                    
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>></span></li>
                        <li>
                            <a href="{{ route('category.list', $type) }}">
                                {{ $type == 'pro-loudspeaker' ? 'Pro Loudspeaker' : 'Home Loudspeaker'}}
                            </a>
                        </li>
                        <li><span>></span></li>
                        <li>
                           <a href="{{ url('speaker') }}/{{ $type }}/{{ $category->slug }}">
                                {{ $category->name }}
                            </a> 
                        </li>
                        <li><span>></span></li>
                        <li>{{ $product->name }} </li>
                    </ul>
                </div>
            </div>

    </section>

    <!--Product Details Start-->
        <section class="product-details">
            <div class="container">
                
                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <section class="gallery_sec">
                        <div class="product-details__img">
                            <div id="owl-demo" class="owlprodet owl-carousel owl-theme">
                                @if($product->productimages)
                                @foreach($product->productimages as $productimg)
                                <div class="item">
                                    <a  class="example-image-link" data-lightbox="example-set" href="{{ url('/') }}/uploads/{{ $productimg->path }}">
                                        <img class="example-image img-fluid" src="{{ url('/') }}/uploads/{{ $productimg->path }}">
                                    </a>
                                </div>
                                @endforeach
                                @endif

                              <!-- <div class="item"><a  data-fancybox="gallery" href="assets/images/pro/MAD_4881.png"><img class="img-fluid" src="assets/images/pro/MAD_4881.png"></a></div>
                              <div class="item"><a  data-fancybox="gallery" href="assets/images/pro/MAD_4881.png"><img class="img-fluid" src="assets/images/pro/MAD_4881.png"></a></div>
                              <div class="item"><a  data-fancybox="gallery" href="assets/images/pro/MAD_4881.png"><img class="img-fluid" src="assets/images/pro/MAD_4881.png"></a></div>
                              <div class="item"><a  data-fancybox="gallery" href="assets/images/pro/MAD_4881.png"><img class="img-fluid" src="assets/images/pro/MAD_4881.png"></a></div>
                              <div class="item"><a  data-fancybox="gallery" href="assets/images/pro/MAD_4881.png"><img class="img-fluid" src="assets/images/pro/MAD_4881.png"></a></div>
                              <div class="item"><a  data-fancybox="gallery" href="assets/images/pro/MAD_4881.png"><img class="img-fluid" src="assets/images/pro/MAD_4881.png"></a></div> -->
                            </div>
                        </div>
                        </section>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="row">
                    <div class="col-md-12 mb-4">
                        <!--<span class="inchesWrapper"><i class="fas fa-circle-notch"></i> 21.0 In</span>-->
                        @foreach($product->combinations as $combination)
                        <span class="oham">{{ $combination->name }}</span>
                        @endforeach
                        {{--<a href="#" class="compare"><i class="fas fa-balance-scale"></i> Compare</a>--}}
                        @if($product->drawing)
                        <a href="{{ url('/') }}/uploads/{{ $product->drawing }}" class="sidebarDownloadElem" target="_blank"><i class="fas fa-arrow-down"></i> Drawing</a>
                        @endif
                        @if($product->datasheet)
                        <a href="{{ url('/') }}/uploads/{{ $product->datasheet }}" class="sidebarDownloadElem" target="_blank"><i class="fas fa-file-download"></i> Datasheet</a>
                        @endif
                    </div>
                </div>
                        <div class="product-details__top">
                            <h3 class="product-details__title">{{ $product->name }}</h3>
                        </div>
                        
                        <div style="margin0: 1em; 0px">
                            {!! $product->description !!}
                        </div>
                        
                        <div class="product-details__content" style="margin-top: 1em;">
                            <h4>Key Features</h4>
                            <ul class="key_features">
                                @if($product->combinations->first())
                                    @php
                                        $firstCombination = $product->combinations->first();
                                    @endphp
                                    @if($firstCombination->productkeyfeatures)
                                    @foreach($firstCombination->productkeyfeatures as $keyfeature)
                                        <li>
                                            <b>{{ $keyfeature->keyfeature->name }} :</b> 
                                            <span>{{ $keyfeature->value }}</span>
                                        </li>
                                    @endforeach
                                    @endif 
                                @endif
                            </ul>
                        </div>
                        <a href="{{ route('product.enquiry') }}" class="thm-btn services-one__btn mt-5">Product Enquiry</a>
                        @if($product->is_sealable == 1 && !empty($product->buy_link))
                        <a href="{{ $product->buy_link }}" class="thm-btn services-one__btn mt-5" style="background: #303030;" target="_blank">Buy Now</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!--Product Details End-->

        <!--Product Description Start-->
        
        <section class="product-description">
            <div class="container">
                <ul class="nav nav-tabs custom-tab" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#spe" type="button" role="tab" aria-controls="spe" aria-selected="true">Specifications</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#des" type="button" role="tab" aria-controls="des" aria-selected="false">Parameters</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#par" type="button" role="tab" aria-controls="par" aria-selected="false">Mounting Info</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#mou" type="button" role="tab" aria-controls="mou" aria-selected="false">Recone Kit</button>
                  </li>
                  
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="spe" role="tabpanel" aria-labelledby="home-tab">
                      <ul class="clearfix cust-para">
                        @if($firstCombination->productspecifications)
                            @foreach($firstCombination->productspecifications as $specification)
                            <li class="float30">
                                <span>{{ $specification->specification->name }}</span>
                                <sup class="note"></sup>
                                <b>{{ $specification->value }}</b>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                  </div>
                  <div class="tab-pane fade" id="des" role="tabpanel" aria-labelledby="profile-tab">
                       <ul class="clearfix cust-para">
                            @if($firstCombination->producttsparameters)
                                @foreach($firstCombination->producttsparameters as $tsparameter)
                                <li class="float30">
                                    <span>{{ $tsparameter->tsparameter->name }}</span>
                                    <sup class="note"></sup>
                                    <b>{{ $tsparameter->value }}</b>
                                </li>
                                @endforeach
                            @endif
                        </ul>
                  </div>
                  <div class="tab-pane fade" id="par" role="tabpanel" aria-labelledby="contact-tab">
                        <ul class="clearfix cust-para">
                            @if($firstCombination->productmountinginfos)
                                @foreach($firstCombination->productmountinginfos as $mountinginfo)
                                <li class="float30">
                                    <span>{{ $mountinginfo->mountinginfo->name }}</span>
                                    <sup class="note"></sup>
                                    <b>{{ $mountinginfo->value }}</b>
                                </li>
                                @endforeach
                            @endif
                        </ul>
                  </div>
                  <div class="tab-pane fade" id="mou" role="tabpanel" aria-labelledby="contact-tab">
                       <ul class="clearfix cust-para">
                        @if($firstCombination->productreconkits)
                                @foreach($firstCombination->productreconkits as $reconkit)
                                <li class="float30">
                                    <span>{{ $reconkit->reconkit->name }}</span>
                                    <sup class="note"></sup>
                                    <b>{{ $reconkit->value }}</b>
                                </li>
                                @endforeach
                        @endif
                        </ul>
                  </div>
                </div>
               
            </div>
        </section>
        <!--Product Description End-->

        <!--Review One Start-->
        <livewire:product-review-list :productId="$product->id" />
        <!--Review One End-->

        <!--Start Review Form-->
        <livewire:product-review-create :productId="$product->id" />
        <!--End Review Form-->


<x-slot name="scripts">
    <script src='https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js'></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
    </script>
</x-slot>

</x-frontend_layout>