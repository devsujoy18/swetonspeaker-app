<section class="blog-two">
            <div class="container">
                <div class="section-title section-title--two text-center">
                    <span class="section-title__tagline">Our Events</span>
                    <h2 class="section-title__title">Recent Events</h2>
                    
                </div>
                <div class="row">
                    @forelse($homeblogs as $blog)
                    <!--Blog Two Single Start-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <div class="blog-two__single">
                            <div class="blog-two__img">
                                <img src="{{ url('/') }}/uploads/{{ $blog->image_path }}" alt="">
                                <div class="blog-two__plus">
                                    <a href="{{ route('public.blogdetails', $blog->slug ) }}"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <div class="blog-two__content">
                                <div class="blog-two__date">
                                    <p>{{ $blog->publish_date->format('d M Y') }}</p>
                                </div>
                                <h3 class="blog-two__title"><a href="{{ route('public.blogdetails', $blog->slug ) }}">{{ $blog->title }} </a></h3>
                                <p class="blog-two__text">{{ $blog->short_description }}</p>
                                <a href="{{ route('public.blogdetails', $blog->slug ) }}" class="blog-two__read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!--Blog Two Single End-->
                    @empty
                        <div>No data available at the moment.</div>
                    @endforelse
                    
                </div>
            </div>
        </section>