<x-frontend_layout>
        <x-slot:styles>
            <style>
                .blog-rich-content {
                    max-width: 100%;
                    overflow-wrap: anywhere;
                }

                .blog-rich-content p,
                .blog-rich-content ul,
                .blog-rich-content ol,
                .blog-rich-content blockquote,
                .blog-rich-content figure,
                .blog-rich-content pre,
                .blog-rich-content table {
                    margin-bottom: 1rem;
                }

                .blog-rich-content img {
                    max-width: 100%;
                    height: auto !important;
                }

                .blog-rich-content table {
                    display: block;
                    width: 100%;
                    max-width: 100%;
                    overflow-x: auto;
                }

                .blog-rich-content pre {
                    max-width: 100%;
                    overflow-x: auto;
                    white-space: pre-wrap;
                }
            </style>
        </x-slot:styles>

         <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url({{ asset('public_assets/images/backgrounds/page-header-bg.jpg') }})">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>{{ $pageTitle }}</h2>
                    
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>&gt;&gt;</span></li>
                        <li><a href="{{ route($listRoute) }}">{{ $listTitle }}</a></li>
                        <li><span>&gt;&gt;</span></li>
                        <li>{{ $blog->title }}</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->
         <section class="blog-sidebar">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="blog-sidebar__left">
                            <div class="blog-sidebar__img-box">
                                <div class="blog-sidebar__img">
                                    <img src="{{ url('/') }}/uploads/{{ $blog->image_path }}" alt="">
                                </div>
                                <h3 class="blog-sidebar__title blog-sidebar__title-1">{{ $blog->title }}</h3>
                                <div class="blog-sidebar__text-1 blog-rich-content">{!! $blog->long_description !!}</div>
                                @if($blog->video_link)
                                <div>
                                   <iframe class="yt-ifrem" width="100%" height="300" src="{{ $blog->video_link }}" title="{{ $blog->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                                @endif
                                
                            </div>
                            @if($blog->blogimages)
                            <div class="row">
                                @foreach($blog->blogimages as $img)
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <div class="gallery-page__single">
                                        <div class="gallery-page__img">
                                            <img src="{{ url('/') }}/uploads/{{ $img->img_path }}" alt="">
                                            <div class="gallery-page__icon">
                                                <a class="img-popup" href="{{ url('/') }}/uploads/{{ $img->img_path }}">
                                                    <span class="icon-search"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                         
                        </div>
                        <div class="comment-one">
                            <h3 class="comment-one__title">
                                @if($blogreviews->count() > 0)
                                    {{ $blogreviews->count() }} {{ $blogreviews->count() === 1 ? 'comments' : 'comments' }}
                                @else
                                    No comments
                                @endif
                            </h3>
                            @forelse($blogreviews as $review)
                                <div class="comment-one__single">
                                    <div class="comment-one__image">
                                        <img src="assets/images/blog/comment-1-1.jpg" alt="">
                                    </div>
                                    <div class="comment-one__content">
                                        <p class="comment-one__date">{{ $review->created_at->format('d M Y . h:i A') }}</p>
                                        <h3>{{ $review->name }}</h3>
                                        <p>{{ $review->comment }}</p>
                                        <!--<a href="#" class="thm-btn comment-one__btn">Reply<span class="icon-double-chevron-1"></span></a>-->
                                    </div>
                                </div>
                            @empty
                            <div class="no-reviews">
                                <p>No comment available for this {{ $entityName }}. Be the first to leave a comment!</p>
                            </div>
                            @endforelse
                                
                        </div>
                            
                        <livewire:blog-review-create :blogId="$blog->id" />
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="sidebar">
                           
                            <div class="sidebar__single sidebar__post">
                                <h3 class="sidebar__title">{{ $latestTitle }}</h3>
                                <ul class="sidebar__post-list list-unstyled">
                                    @forelse($latestBlogsAndEvents as $blog)
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="{{ url('/') }}/uploads/{{ $blog->image_path }}" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <a href="{{ route($detailRoute, $blog->slug) }}">{{ $blog->title }}</a>
                                            </h3>
                                            <p>{{ $blog->publish_date->format('d M Y') }}</p>
                                        </div>
                                    </li>
                                    @empty
                                        <li>No latest events or blogs available at the moment.</li>
                                    @endforelse
                                </ul>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
</x-frontend_layout>
