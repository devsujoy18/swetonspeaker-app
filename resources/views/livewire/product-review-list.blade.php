<div>
    <section class="review-one">
            <div class="container">
                <div class="comments-area">
                    <div class="review-one__title">
                        <h3>
                            @if($allReviews->count() > 0)
                                {{ $allReviews->count() }} {{ $allReviews->count() === 1 ? 'review' : 'reviews' }}
                            @else
                                No reviews
                            @endif
                        </h3>
                    </div>
                    @forelse($allReviews as $review)
                    <!--Start Comment Box-->
                    <div class="comment-box">
                        <div class="comment">
                            <div class="author-thumb">
                                <figure class="thumb"><img src="assets/images/shop/review-1-1.jpg" alt="">
                                </figure>
                            </div>

                            <div class="review-one__content">
                                <div class="review-one__content-top">
                                    <div class="info">
                                        <h2>{{ $review->name }} <span>{{ $review->created_at->format('d M Y . h:i A') }}</span></h2>
                                    </div>
                                    <div class="reply-btn">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fa fa-star{{ $i <= $review->user_rate ? '' : '-o' }}"></i>
                                        @endfor
                                        <!-- <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> -->
                                    </div>
                                </div>

                                <div class="review-one__content-bottom">
                                    <p>{!! $review->comment !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Comment Box-->
                    @empty
                    <div class="no-reviews">
                        <p>No reviews available for this product. Be the first to leave a review!</p>
                    </div>
                    @endforelse


                </div>
            </div>
        </section>
</div>

