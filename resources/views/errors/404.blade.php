<x-frontend_layout>
    <!-- ===== 404 Page Section ===== -->
        <style>
            .page-404-section {
                background: linear-gradient(135deg, #fff5f5 0%, #fff 60%, #fff5f5 100%);
                padding: 60px 20px 80px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .e404-card {
                background: #fff;
                border-radius: 20px;
                box-shadow: 0 8px 40px rgba(207,31,31,0.10), 0 2px 12px rgba(0,0,0,0.06);
                max-width: 780px;
                width: 100%;
                padding: 50px 48px 40px;
                text-align: center;
                position: relative;
                border: 1px solid #fde8e8;
            }

            .e404-card-header {
                display: flex;
                align-items: flex-end;
                justify-content: center;
                gap: 18px;
                margin-bottom: 0;
            }

            .e404-badge {
                background: #1a1a1a;
                color: #fff;
                font-size: 0.72rem;
                font-weight: 700;
                letter-spacing: 1.5px;
                padding: 7px 16px;
                border-radius: 30px;
                margin-bottom: 18px;
                display: inline-block;
                text-transform: uppercase;
            }

            .e404-big {
                font-family: 'Saira', sans-serif;
                font-size: clamp(5rem, 15vw, 9.5rem);
                font-weight: 900;
                color: #cf1f1f;
                line-height: 1;
            }

            .e404-divider {
                width: 50px;
                height: 3px;
                background: #1a1a1a;
                margin: 0 auto 18px;
                border-radius: 2px;
            }

            /* Sound-wave bars */
            .e404-wave {
                display: flex;
                align-items: flex-end;
                justify-content: center;
                gap: 4px;
                height: 44px;
                margin-bottom: 22px;
            }
            .e404-wave span {
                display: block;
                width: 5px;
                border-radius: 3px;
                background: #cf1f1f;
                animation: e404WaveBar 1.2s ease-in-out infinite;
            }
            .e404-wave span:nth-child(1)  { height: 18px; animation-delay: 0s; }
            .e404-wave span:nth-child(2)  { height: 30px; animation-delay: 0.1s; }
            .e404-wave span:nth-child(3)  { height: 40px; animation-delay: 0.2s; }
            .e404-wave span:nth-child(4)  { height: 26px; animation-delay: 0.15s; }
            .e404-wave span:nth-child(5)  { height: 38px; animation-delay: 0.05s; }
            .e404-wave span:nth-child(6)  { height: 44px; animation-delay: 0.25s; }
            .e404-wave span:nth-child(7)  { height: 34px; animation-delay: 0.1s; }
            .e404-wave span:nth-child(8)  { height: 22px; animation-delay: 0.2s; }
            .e404-wave span:nth-child(9)  { height: 14px; animation-delay: 0.05s; }
            @keyframes e404WaveBar {
                0%, 100% { transform: scaleY(1); opacity: 1; }
                50%       { transform: scaleY(0.45); opacity: 0.55; }
            }

            .e404-title {
                font-family: 'Saira', sans-serif;
                font-size: 1.85rem;
                font-weight: 700;
                color: #1a1a1a;
                margin-bottom: 10px;
            }

            .e404-text {
                color: #888;
                font-size: 0.98rem;
                margin-bottom: 30px;
                line-height: 1.6;
                max-width: 440px;
                margin-left: auto;
                margin-right: auto;
            }

            .e404-home-btn {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 13px 36px;
                background: #cf1f1f;
                color: #fff;
                font-weight: 700;
                font-size: 0.95rem;
                border-radius: 8px;
                text-decoration: none !important;
                transition: background 0.25s ease, transform 0.2s ease;
                box-shadow: 0 4px 14px rgba(207,31,31,0.30);
            }
            .e404-home-btn:hover {
                background: #a81919;
                color: #fff;
                transform: translateY(-2px);
            }

            /* ===== Quick Links – Premium Design ===== */
            .e404-ql-section {
                
                padding-top: 28px;
            }

            .e404-ql-heading {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                margin-bottom: 22px;
            }
            .e404-ql-heading-line {
                flex: 1;
                height: 1px;
                background: linear-gradient(to right, transparent, #f0d8d8);
            }
            .e404-ql-heading-line.right {
                background: linear-gradient(to left, transparent, #f0d8d8);
            }
            .e404-ql-heading span {
                font-size: 0.72rem;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 2px;
                color: #bbb;
                white-space: nowrap;
            }

            /* Two-panel grid */
            .e404-ql-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 16px;
            }

            .e404-ql-panel {
                background: #fff;
                border: 1px solid #f0e0e0;
                border-radius: 14px;
                overflow: hidden;
                transition: box-shadow 0.3s ease, border-color 0.3s ease;
            }
            .e404-ql-panel:hover {
                box-shadow: 0 6px 24px rgba(207,31,31,0.10);
                border-color: #f4bebe;
            }

            /* Panel header */
            .e404-ql-panel-hd {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 13px 16px;
                background: linear-gradient(135deg, #1a1a1a 0%, #3a0808 100%);
            }
            .e404-ql-panel-hd .ql-icon {
                width: 30px;
                height: 30px;
                border-radius: 8px;
                background: rgba(207,31,31,0.85);
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }
            .e404-ql-panel-hd .ql-icon i {
                color: #fff;
                font-size: 0.8rem;
            }
            .e404-ql-panel-hd h4 {
                color: #fff;
                font-size: 0.78rem;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 1.2px;
                margin: 0;
            }

            /* Panel body */
            .e404-ql-panel-body {
                padding: 14px 14px 0 14px;
            }

            /* Pill chips */
            .e404-ql-chips {
                display: flex;
                flex-wrap: wrap;
                gap: 7px;
                margin-bottom: 14px;
            }
            .e404-ql-chips a {
                display: inline-block;
                padding: 5px 12px;
                background: #fdf4f4;
                border: 1px solid #f5dede;
                border-radius: 20px;
                font-size: 0.76rem;
                font-weight: 600;
                color: #b33;
                text-decoration: none;
                white-space: nowrap;
                transition: all 0.22s ease;
            }
            .e404-ql-chips a:hover {
                background: #cf1f1f;
                border-color: #cf1f1f;
                color: #fff;
                transform: translateY(-2px);
                box-shadow: 0 4px 10px rgba(207,31,31,0.25);
                text-decoration: none;
            }

            /* View Range button */
            .e404-ql-cta {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 7px;
                padding: 10px 16px;
                background: linear-gradient(135deg, #fdf4f4, #fff);
                border-top: 1px solid #f5e0e0;
                font-size: 0.76rem;
                font-weight: 800;
                color: #cf1f1f;
                text-decoration: none;
                text-transform: uppercase;
                letter-spacing: 0.8px;
                transition: all 0.25s ease;
            }
            .e404-ql-cta i {
                font-size: 0.7rem;
                transition: transform 0.25s ease;
            }
            .e404-ql-cta:hover {
                background: #cf1f1f;
                color: #fff;
                text-decoration: none;
            }
            .e404-ql-cta:hover i {
                transform: translateX(4px);
            }

            @media (max-width: 640px) {
                .e404-card { padding: 32px 16px 28px; }
                .e404-ql-grid { grid-template-columns: 1fr; }
                .page-404-section {
    background: linear-gradient(135deg, #fff5f5 0%, #fff 60%, #fff5f5 100%);
    padding: 119px 20px 80px;
 
}
.e404-big {
    font-size: 36px;
}
.e404-title {
    font-size: 20px;
}
.e404-home-btn {
    padding: 13px 17px;
}
            }
        </style>
    <!--<section class="page-header">-->
    <!--    <div class="page-header-bg" style="background-image: url('{{ asset("public_assets/images/backgrounds/page-header-bg.jpg") }}')"></div>-->
    <!--    <div class="container">-->
    <!--        <div class="page-header__inner">-->
    <!--            <h2>404 Error</h2>-->
    <!--            <ul class="thm-breadcrumb list-unstyled">-->
    <!--                <li><a href="#">Home</a></li>-->
    <!--                <li><span>//</span></li>-->
    <!--                <li>404 Error</li>-->
    <!--            </ul>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
  
         <section class="page-404-section">
            <div class="e404-card">

                <!-- Header row: badge + big 404 -->
                <div class="e404-card-header">
                    <div>
                        <!--<span class="e404-badge">Sweton Speakers</span>-->
                        <div class="e404-big">404</div>
                    </div>
                </div>

                <!-- Divider line under 404 -->
                <div class="e404-divider" style="margin-top:14px;"></div>

                <!-- Animated sound-wave bars -->
                <div class="e404-wave">
                    <span></span><span></span><span></span>
                    <span></span><span></span><span></span>
                    <span></span><span></span><span></span>
                </div>

                <!-- Heading & text -->
                <h1 class="e404-title">Oops! Page Not Found</h1>
                <!--<p class="e404-text">The page you're looking for has been moved, deleted, or never existed. Let's get you back on track.</p>-->

                <!-- CTA button -->
                <a href="{{ url('/') }}" class="e404-home-btn">
                    <i class="fas fa-home"></i> Go to Homepage
                </a>
                <a href="https://shop.swetonspeakers.com/" class="e404-home-btn" style="background: #890e0e;">
                    <i class="fa fa-shopping-cart"></i> Buy Online</i>
                </a>

                <!-- ===== Quick Links – Premium ===== -->
                <div class="e404-ql-section">

                    <!-- Decorated heading -->
                    <div class="e404-ql-heading">
                        <div class="e404-ql-heading-line"></div>
                        <span>Quick Links</span>
                        <div class="e404-ql-heading-line right"></div>
                    </div>

                    <!-- Two-panel grid -->
                    <div class="e404-ql-grid">

                        <!-- Pro Audio Drivers -->
                        <div class="e404-ql-panel">
                            <div class="e404-ql-panel-hd">
                                <div class="ql-icon"><i class="fas fa-broadcast-tower"></i></div>
                                <h4>Pro Audio Drivers</h4>
                            </div>
                            <div class="e404-ql-panel-body">
                                <div class="e404-ql-chips">
                                    <a href="https://www.swetonspeakers.com/tags?tag=live-event">Live Event</a>
                                    <a href="https://www.swetonspeakers.com/tags?tag=mid-bass">Mid-bass</a>
                                    <a href="https://www.swetonspeakers.com/tags?tag=midrange">Midrange</a>
                                    <a href="https://www.swetonspeakers.com/tags?tag=outdoor">Outdoor</a>
                                    <a href="https://www.swetonspeakers.com/tags?tag=roadshows">Roadshows</a>
                                    <a href="https://www.swetonspeakers.com/tags?tag=subwoofer">Subwoofer</a>
                                    <a href="https://www.swetonspeakers.com/tags?tag=weddings">Weddings</a>
                                </div>
                            </div>
                            <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker" class="e404-ql-cta">View Pro Audio Range <i class="fas fa-arrow-right"></i></a>
                        </div>

                        <!-- Home Audio Drivers -->
                        <div class="e404-ql-panel">
                            <div class="e404-ql-panel-hd">
                                <div class="ql-icon"><i class="fas fa-home"></i></div>
                                <h4>Home Audio Drivers</h4>
                            </div>
                            <div class="e404-ql-panel-body">
                                <div class="e404-ql-chips">
                                    <a href="https://shop.swetonspeakers.com/home-loudspeaker/woofer-series">Woofer Series</a>
                                    <a href="https://shop.swetonspeakers.com/home-loudspeaker/full-range-speaker-series">Full Range Speakers</a>
                                    <a href="https://shop.swetonspeakers.com/home-loudspeaker/subwoofer-series">Subwoofer Series</a>
                                    <a href="https://shop.swetonspeakers.com/home-loudspeaker/tweeter-series">Tweeter Series</a>
                                    <a href="https://www.swetonspeakers.com/speaker/home-loudspeaker/speaker-series">Speaker Series</a>
                                    <a href="https://shop.swetonspeakers.com/home-loudspeaker/satellite-series">Satellite Series</a>
                                    <a href="https://shop.swetonspeakers.com/home-loudspeaker/dividing-cross-over-network">Dividing Cross Over Network</a>
                                    <a href="https://www.swetonspeakers.com/speaker/home-loudspeaker/car-speaker-series">Car Speaker Series</a>
                                </div>
                            </div>
                            <a href="https://www.swetonspeakers.com/speaker/home-loudspeaker" class="e404-ql-cta">View Home Audio Range <i class="fas fa-arrow-right"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    <!--<section class="product">-->
    <!--    <div style="text-align:center; padding:50px;">-->
    <!--        <h1 style="font-size:80px;">404</h1>-->
    <!--        <h2>Oops! Page Not Found</h2>-->
    <!--        <p>The page you are looking for doesn't exist.</p>-->
        
    <!--        <a href="{{ url('/') }}" style="padding:10px 20px; background:#3490dc; color:#fff; text-decoration:none;">-->
    <!--            Go Home-->
    <!--        </a>-->
    <!--    </div>-->
    <!--</section>-->
</x-frontend_layout>