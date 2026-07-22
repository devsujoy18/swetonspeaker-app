<div>
    <section class="testimonal-two">
            <div class="container">
                <div class="section-title section-title--two text-center">
                    <span class="section-title__tagline">Categories</span>
                    <h2 class="section-title__title">
                        
                        {{ $type == 'pro-loudspeaker' ? 'Pro Loudspeakers' : 'Home Loudspeakers' }}
                    </h2>
                    
                </div>
                <div class="testimonial-one__carousel owl-carousel owl-theme thm-owl__carousel" 
                data-owl-options='{
                            "loop": true,
                            "autoplay": true,
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
                                    "items": 2
                                },
                                "992": {
                                    "items": 3
                                },
                                "1200": {
                                    "items": 3
                                }
                            }
                        }'>
                    
                    @if($categories)
                        @foreach($categories as $category)
                            <div class="item">
                                 <div class="wow fadeInUp" data-wow-delay="100ms">
                                    <div class="services-one__single">
                                        <div class="services-one__img">
                                            @if($category->image)
                                            <img src="{{ url('/') }}/uploads/{{ $category->image }}" alt="">
                                            @endif
                                            
                                        </div>
                                        <div class="services-one__content">
                                            <h3 class="services-one__title"><a href="#">{{ $category->name }}</a></h3>
                                            
                                            <div class="hm-keyft">
                                                <div class="row">
                                                @if($category->keyfeatures)
                                                    @foreach($category->keyfeatures as $keyfeature)
                                                    <div class="col-6">
                                                        <p><strong>{{ $keyfeature->name }} :</strong><br>{{ $keyfeature->pivot->keyfeature_value }}</p>
                                                    </div>
                                                    @endforeach
                                                @endif          
                                            </div>
                                            @php
                                                $type = $category->type_id == 1 ? "pro-loudspeaker" : "home-loudspeaker";
                                            @endphp
                                            </div>
                                            <div class="services-one__btn-box">
                                                <a href="{{ route('category.products', [ 
                                                            'type' => $type, 
                                                            'slug' => $category->slug
                                                            ] )}}" class="thm-btn services-one__btn">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    
                    
                   
                </div>
            </div>
        </section>
</div>