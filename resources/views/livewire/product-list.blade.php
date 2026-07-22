<div>
    <script>
        document.addEventListener('scrollToTop', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url('{{ asset("public_assets/images/backgrounds/page-header-bg.jpg") }}')"></div>
        <div class="container">
                <div class="page-header__inner">
                    <h2>{{ $category_name }}</h2>
                    
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>></span></li>
                        <li>
                            <a href="{{ route('category.list', $type_id == 1 ? 'pro-loudspeaker' : 'home-loudspeaker') }}">
                                {{ $type_id == 1 ? 'Pro Loudspeaker' : 'Home Loudspeaker'}}
                            </a>
                        </li>
                        <li><span>></span></li>
                        <li>{{ $category_name }}</li>
                    </ul>
                </div>
            </div>
    </section>
    <!--Product Start-->
        <section class="product">
            <div class="container">
                <div class="row">

                    @if($message)
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <div class="col-xl-12 col-lg-12">
                        <div class="product__items">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="product__showing-result">
                                        <div class="product__showing-text-box">
                                            <p class="product__showing-text">Showing {{ $products->count() }} of {{ $products->count() }} results</p>
                                        </div>
                                        <div class="product__showing-sort">
                                            <div class="select-box">
                                                 <div class="btn-group">
                                                    <a href="#" id="list" class="btn btn-default btn-sm"><i class="fas fa-list"></i></a> 
                                                    <a href="#" id="grid" class="btn btn-default btn-sm"><i class="fas fa-th-large"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product__all">
                                <div class="row" id="products">

                                    @if($products)
                                        @foreach($products as $product)
                                            <div class="item col-xl-6 col-lg-6 col-md-6">
                                                <section class="bdr-out">
                                               <div class="services-one1__single">
                                                    <div class="services-one1__img">
                                                         @foreach($product->combinations as $combination)
                                                            <a href="#" class="ohm-btn">{{ $combination->name }}</a>
                                                            @endforeach
                                                        <div class="thumbnail">
                                                            @if($product->productimages->first())
                                                                @php
                                                                    $productimg = $product->productimages->first();
                                                                @endphp
                                                               <img src="{{ url('/') }}/uploads/{{ $productimg->path }}" alt="{{ $product->name }}"> 
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                        @php
                                                            $type = $type_id == 1 ? "pro-loudspeaker" : "home-loudspeaker";
                                                        @endphp
                                                        <div class="services-one1__content">
                                                        <h3 class="services-one__title"><a href="{{ route('product.public.details', [ 
                                                            'type' => $type, 
                                                            'category' => $category_slug,
                                                            'slug' => $product->slug
                                                            ] )}}">{{ $product->name }}</a></h3>
                                                        <div class="hm-keyft">
                                                            <div class="row">
                                                             @if($product->combinations->first())
                                                                @php
                                                                    $firstCombination = $product->combinations->first();
                                                                @endphp
                                                                @if($firstCombination->productkeyfeatures)
                                                                @foreach($firstCombination->productkeyfeatures as $keyfeature)
                                                                 <div class="col-6 col-md-12">
                                                                    <p>
                                                                        <strong>{{ $keyfeature->keyfeature->name }} :</strong><br>
                                                                        {{ $keyfeature->value }}
                                                                    </p>
                                                                    </div>
                                                                @endforeach
                                                                @endif 
                                                            @endif  
                                                            </div>
                                                        </div>
                                                       
                                                    </div>

                                                   
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="services-one__btn-box flt-left">
                                                            <!--<a href="#" class="thm-btn services-one__btn"><i class="fas fa-arrows-alt-h"></i> Compare</a>-->
                                                            <div class="dropdown flt-left">
                                                              <button style="border: 0;" class="thm-btn services-one__btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                               <i class="fas fa-arrows-alt-h"></i> Compare
                                                              </button>
                                                              <ul class="dropdown-menu">
                                                                @foreach($product->combinations as $combination)
                                                                <li wire:click.prevent="addTocompare({{ $product->id }},{{ $combination->id }})">
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        {{ $combination->name }}
                                                                    </a>
                                                                </li>
                                                                @endforeach
                                                              </ul>
                                                            </div>
                                                            @if($product->is_sealable == 1 && !empty($product->buy_link))
                                                            <a href="{{ $product->buy_link }}" class="thm-btn services-one__btn" style="background: #303030; margin-left: 1px;" target="_blank">Buy Now</a>
                                                            @endif
                                                            
                                                        </div>
                                                        <span class="fl-right">
                                                            
                                                            <a href="{{ route('product.public.details', [ 
                                                            'type' => $type, 
                                                            'category' => $category_slug,
                                                            'slug' => $product->slug
                                                            ] )}}" class="thm-btn in-read">Read More</a>
                                                        </span>
                                                        
                                                    </div>
                                                    
                                                       </section>
                                                     
                                                
                                            </div>
                                        @endforeach
                                    @endif
                                    
                                    
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Product End-->
</div>
