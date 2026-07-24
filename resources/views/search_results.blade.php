<x-frontend_layout>
	<section class="page-header">
        <div class="page-header-bg" style="background-image: url('{{ asset("public_assets/images/backgrounds/page-header-bg.jpg") }}')"></div>
        <div class="container">
                <div class="page-header__inner">
                    <h2>Search</h2>
                    
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>//</span></li>
                        <li>Search</li>
                    </ul>
                </div>
            </div>

    </section>
	<!--Product Start-->
        <section class="product">
            <div class="container">
                <div class="row">
                    
                    <div class="col-xl-12 col-lg-12">
                        <div class="product__items">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="product__showing-result">
                                        <div class="product__showing-text-box">
                                            <p class="product__showing-text">Showing {{ $products->count() }} results</p>
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
                                    @if($products->isEmpty())
                                        <p>No products found.</p>
                                    @else
                                        @foreach($products as $product)
                                            @php
                                                $category = $product->category;
                                                $firstImage = $product->productimages->first();
                                                $firstCombination = $product->combinations->first();
                                                $type = $category->type_id == 1 ? 'pro-loudspeaker' : 'home-loudspeaker';
                                                $productUrl = route('product.public.details', [
                                                    'type' => $type,
                                                    'category' => $category->slug,
                                                    'slug' => $product->slug,
                                                ]);
                                            @endphp
                                            <div class="item col-xl-6 col-lg-6 col-md-6">
                                                <section class="bdr-out">
                                               <div class="services-one1__single">
                                                    <div class="services-one1__img">
                                                        <div class="thumbnail">
                                                            @if($firstImage)
                                                               <img src="{{ url('/') }}/uploads/{{ $firstImage->path }}" alt="{{ $product->name }}" loading="lazy" decoding="async"> 
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                        <div class="services-one1__content">
                                                        <h3 class="services-one__title"><a href="{{ $productUrl }}">{{ $product->name }}</a></h3>
                                                        <div class="hm-keyft">
                                                             @if($firstCombination)
                                                                @if($firstCombination->productkeyfeatures)
                                                                @foreach($firstCombination->productkeyfeatures as $keyfeature)
                                                                    <p>
                                                                        <strong>{{ $keyfeature->keyfeature?->name }} :</strong><br>
                                                                        {{ $keyfeature->value }}
                                                                    </p>
                                                                @endforeach
                                                                @endif 
                                                            @endif         
                                                        </div>
                                                       
                                                    </div>

                                                   
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="services-one__btn-box flt-left flo-mob-n">
                                                            <!--<a href="#" class="thm-btn services-one__btn"><i class="fas fa-arrows-alt-h"></i> Compare</a>-->
                                                            {{--<div class="dropdown flt-left">
                                                              <button style="border: 0;" class="thm-btn services-one__btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                               <i class="fas fa-arrows-alt-h"></i> Compare
                                                              </button>
                                                              <ul class="dropdown-menu">
                                                                @foreach($product->combinations as $combination)
                                                                <li wire:click.prevent="addTocompare({{ $product->id }},{{ $combination->id }})">
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        {{ $combination->display_name }}
                                                                    </a>
                                                                </li>
                                                                @endforeach
                                                              </ul>
                                                            </div>--}}
                                                            @if($product->is_sealable == 1 && !empty($product->buy_link))
                                                            <a href="{{ $product->buy_link }}" class="thm-btn services-one__btn" style="background: #303030; margin-left: 1px;" target="_blank">Buy Now</a>
                                                            @endif
                                                            
                                                        </div>
                                                        <span class="fl-right flo-mob-n1">
                                                            @foreach($product->combinations as $combination)
                                                            <a href="#" class="ohm-btn">{{ $combination->display_name }}</a>
                                                            @endforeach
                                                            <a href="{{ $productUrl }}" class="thm-btn in-read">Read More</a>
                                                        </span>
                                                        
                                                    </div>
                                                    
                                                       </section>
                                                     
                                                
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            @if($products->hasPages())
                                <div class="mt-4">
                                    {{ $products->links('pagination::simple-bootstrap-5') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Product End-->
</x-frontend_layout>
