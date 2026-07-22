<div>
    <section class="testimonial-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Product Highlight</span>
                            <h2 class="section-title__title">Featured Products</h2>
                        </div>
                        <div class="testimonial-one__carousel owl-carousel owl-theme thm-owl__carousel"
                            data-owl-options='{
                            "loop": true,
                            "autoplay": false,
                            "margin": 30,
                            "nav": true,
                            "dots": false,
                            "smartSpeed": 500,
                            "autoplayTimeout": 10000,
                            "navText": ["<span class=\"icon-right-arrow\"></span>","<span class=\"icon-left-arrow\"></span>"],
                            "responsive": {
                                "0": {
                                    "items": 1
                                },
                                "768": {
                                    "items": 1
                                },
                                "992": {
                                    "items": 1
                                },
                                "1200": {
                                    "items": 1
                                }
                            }
                        }'>

                        @if($products)
                        @foreach($products as $item)
                            <div class="item">
                                <div class="testimonial-one__single">
                                    <div class="row">

                                        <div class="col-md-5">
                                            @if($item->productimages->first())
                                                @php
                                                    $productimg = $item->productimages->first();
                                                @endphp
                                                <img class="img-fluid" src="{{ url('/') }}/uploads/{{ $productimg->path }}">
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            </div>
                                        <div class="col-md-5">
                                            <h2>{{ $item->name }}</h2>
                                            <p style="font-size: 20px;">{{ $item->category->name }}</p>
                                            
                                            <div class="row">
                                                
                                                    
                                               
                                            

                                            @if($item->combinations->first())
                                                @php
                                                    $firstCombination = $item->combinations->first();
                                                @endphp

                                                @if($firstCombination->productkeyfeatures)
                                                    @foreach($firstCombination->productkeyfeatures as $keyfeature)
                                                    <div class="col-6">
                                                        <div class="index-fpro">
                                                            <h3>{{ $keyfeature->value }}</h3>
                                                            <p>{{ $keyfeature->keyfeature->name }}</p>
                                                        </div>
                                                         </div>
                                                    @endforeach
                                                @endif
                                            @endif
                                            
                                            @php
                                                if($item->category->type_id == 1){
                                                  $type = 'pro-loudspeaker';
                                                }else{
                                                    $type = 'home-loudspeaker';
                                                }
                                            @endphp
                                            </div>
                                            <a href="{{ route('product.public.details', [ 
                                                            'type' => $type, 
                                                            'category' => $item->category->slug,
                                                            'slug' => $item->slug
                                                            ] )}}" class="thm-btn services-one__btn mt-2">Read More</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>