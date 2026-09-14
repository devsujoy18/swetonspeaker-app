<section class="blog-two">
    <div class="container">
        <div class="section-title section-title--two text-center">
            <span class="section-title__tagline">{{ $tagline }}</span>
            <h2 class="section-title__title">{{ $sectionTitle }}</h2>
        </div>
        <div class="row">
            @forelse($contentItems as $contentItem)
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms" wire:key="home-content-{{ $contentItem->id }}">
                    <div class="blog-two__single">
                        <div class="blog-two__img">
                            <img src="{{ url('/') }}/uploads/{{ $contentItem->image_path }}" alt="{{ $contentItem->title }}">
                            <div class="blog-two__plus">
                                <a href="{{ route($detailRoute, $contentItem->slug) }}"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="blog-two__content">
                            <div class="blog-two__date">
                                <p>{{ $contentItem->publish_date->format('d M Y') }}</p>
                            </div>
                            <h3 class="blog-two__title"><a href="{{ route($detailRoute, $contentItem->slug) }}">{{ $contentItem->title }}</a></h3>
                            <p class="blog-two__text">{{ $contentItem->short_description }}</p>
                            <a href="{{ route($detailRoute, $contentItem->slug) }}" class="blog-two__read-more">Read More</a>
                        </div>
                    </div>
                </div>
            @empty
                <div>{{ $emptyMessage }}</div>
            @endforelse
        </div>
    </div>
</section>
