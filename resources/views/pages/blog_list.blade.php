
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-frontend_layout>
        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url({{ asset('public_assets/images/backgrounds/page-header-bg.jpg') }})">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Events &amp; Blogs</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><span>//</span></li>
                        <li>Events &amp; Blogs</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Blog One Start-->
        <div class="blog-page-v-1">
            <div class="container">
                <div class="section-title section-title--two text-center">
                   
                    <h2 class="section-title__title">Events &amp; Blogs</h2>
                    
                </div>
                <div class="row">
                    <!--Blog One Single Start-->
                    @forelse($blogs as $blog)
                    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="blog-one__single">
                            <div class="blog-one__img">
                                <img src="{{ url('/') }}/uploads/{{ $blog->image_path }}" alt="{{ $blog->title }}">
                                <div class="blog-one__plus">
                                    <a href="#"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <div class="blog-one__content">
                                <ul class="blog-one__meta list-unstyled">
                                    <li>
                                        <a href="#"><i class="fa fa-calendar-alt"></i>{{ $blog->publish_date->format('d M Y') }}</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="far fa-comments"></i>{{ $blog->blogreviews_count }} COMMENTS</a>
                                    </li>
                                </ul>
                                <h3 class="blog-one__title"><a href="#">{{ $blog->title }}</a></h3>
                                <div class="blog-one__btn-box">
                                    <a href="{{ route('public.blogdetails', $blog->slug ) }}" class="thm-btn blog-one__btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div>No blogs available at the moment.</div>
                    @endforelse
                    
                    <!--Blog One Single End-->
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="blog-page__pagination">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Blog One End-->

    
</x-frontend_layout>