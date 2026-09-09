@props([
    'pageFaqs',
    'embedded' => false,
])

@php
    $faqGroupName = 'page-faq-accrodion-'.md5(request()->path() ?: 'home');
@endphp

<section class="{{ $embedded ? 'page-faqs-inline' : 'product' }}">
    <style>
        .page-faqs-block .accrodion {
            background-color: #e7eff8;
            border-radius: 4px;
            margin-bottom: 24px;
            overflow: hidden;
        }

        .page-faqs-block .accrodion-title {
            cursor: pointer;
            padding: 24px 32px;
        }

        .page-faqs-block .accrodion-title h4 {
            align-items: center;
            color: #000000;
            display: flex;
            font-size: 24px;
            font-weight: 700;
            justify-content: space-between;
            line-height: 1.35;
            margin: 0;
        }

        .page-faqs-block .accrodion.active .accrodion-title h4 {
            color: #cf1f1f;
        }

        .page-faqs-block .faq-toggle-icon {
            color: #000000;
            flex-shrink: 0;
            height: 24px;
            margin-left: 20px;
            position: relative;
            width: 24px;
        }

        .page-faqs-block .faq-toggle-icon::before,
        .page-faqs-block .faq-toggle-icon::after {
            background-color: currentColor;
            content: '';
            left: 50%;
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .page-faqs-block .faq-toggle-icon::before {
            height: 4px;
            width: 18px;
        }

        .page-faqs-block .faq-toggle-icon::after {
            height: 18px;
            width: 4px;
        }

        .page-faqs-block .accrodion.active .faq-toggle-icon {
            color: #cf1f1f;
        }

        .page-faqs-block .accrodion.active .faq-toggle-icon::after {
            display: none;
        }

        .page-faqs-block .accrodion-content .inner {
            border-top: 1px solid rgba(0, 0, 0, 0.2);
            color: #000000;
            margin: 0 32px;
            padding: 24px 0 28px;
        }

        .page-faqs-block .accrodion-content .inner p:last-child {
            margin-bottom: 0;
        }

        .page-faqs-inline {
            margin: 40px 0;
        }

        @media (max-width: 767px) {
            .page-faqs-block .accrodion-title {
                padding: 20px;
            }

            .page-faqs-block .accrodion-title h4 {
                font-size: 18px;
            }

            .page-faqs-block .accrodion-content .inner {
                margin: 0 20px;
                padding: 18px 0 22px;
            }
        }
    </style>

    @unless($embedded)
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
    @endunless
                <h2 class="services-one__title" style="margin-bottom:10px">Frequently Asked Question - Sweton Speakers</h2>
                <div class="faq-one__right page-faqs-block">
                    <div class="accrodion-grp faq-one-accrodion faq-one-accrodion-1" data-grp-name="{{ $faqGroupName }}">
                        @foreach($pageFaqs as $pageFaq)
                            <div class="accrodion {{ $loop->first ? 'active' : '' }}">
                                <div class="accrodion-title">
                                    <h4>
                                        <span>{{ $pageFaq->title }}</span>
                                        <span class="faq-toggle-icon" aria-hidden="true"></span>
                                    </h4>
                                </div>
                                <div class="accrodion-content" @if(! $loop->first) style="display: none;" @endif>
                                    <div class="inner">
                                        {!! $pageFaq->description !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
    @unless($embedded)
                </div>
            </div>
        </div>
    @endunless
</section>
