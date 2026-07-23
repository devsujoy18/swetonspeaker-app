   <style>
        /* Global Transitions for All Sections */
        .site-footer-two {
            margin-top: 0em !important;
        }

        section {
            transition: all 0.5s ease-in-out;
        }

        .wow {
            visibility: hidden;
        }

        /* Custom styles for new specifications section */
        .custom-spec-section {
            /*margin-top: 30px;*/
            padding: 40px 0;
            background-color: #000000;
            transition: all 0.5s ease-in-out;
        }

        .main-header {
            background: #161616;
        }

        .bg-white1 {
            background-color: #ffffff;
            margin: 7px 0;
            transition: all 0.5s ease-in-out;
        }

        .custom-spec-card {
            background-color: #fff;
            border: none;
            border-radius: 24px;
            padding: 40px;
            height: 100%;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), box-shadow 0.4s ease;
        }

        .custom-spec-card .custom-desc {
            color: #000;
        }

        .custom-spec-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(207, 31, 31, 0.2);
        }

        .custom-spec-card.visual-card {
            padding: 0;
            border: none;
            display: block;
        }

        .custom-spec-card.small-card {
            padding: 15px 30px;
            min-height: auto;
            justify-content: flex-start;
            background: transparent !important;
            box-shadow: none !important;
            border-radius: 0 !important;
        }

        .custom-spec-card.small-card:hover {
            transform: none !important;
            box-shadow: none !important;
        }

        .right-bordered-col {
            border-right: 1px solid rgba(255, 255, 255, 0.3);
        }

        @media (max-width: 767px) {
            .right-bordered-col {
                border-right: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.3);
                padding-bottom: 20px;
                margin-bottom: 20px;
            }
        }

        .custom-text-gold {
            color: #cf1f1f;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
            margin-bottom: 15px;
            display: inline-block;
        }

        .custom-main-title {
            font-size: 2.7rem;
            line-height: 1.1;
            font-weight: 600;
            margin-bottom: 20px;
            color: #000;
            font-family: 'Saira', sans-serif;
        }

        .custom-desc {
            color: #1e1e1e;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .custom-btn {
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none !important;
            transition: all 0.3s ease;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .custom-btn-primary {
            background-color: #cf1f1f;
            color: #ffffff;
            border: 2px solid #cf1f1f;
        }

        .custom-btn-primary:hover {
            background-color: #a81919;
            border-color: #a81919;
            color: #fff;
            transform: scale(1.05);
        }

        .custom-btn-outline {
            background-color: transparent;
            border: 1px solid #4b5563;
            color: #000;
        }

        .custom-btn-outline:hover {
            background-color: #374151;
            color: #fff;
            border-color: #9ca3af;
            transform: scale(1.05);
        }

        .custom-tag {
            display: inline-block;
            background-color: #1f2937;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-top: 10px;
            color: #fff;
            margin-bottom: 25px;
        }

        .custom-pill-row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
            margin-top: auto;
        }

        .custom-pill {
            background-color: #1f2937;
            border: 1px solid #374151;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.8rem;
            color: #d1d5db;
            transition: all 0.3s ease;
            height: 39px;
        }

        .custom-pill:hover {
            background-color: #cf1f1f;
            border-color: #cf1f1f;
            transform: scale(1.05);
            color: #fff;
        }

        .custom-footer-text {
            font-size: 0.75rem;
            color: #6b7280;
            margin-top: 15px;
        }

        .custom-stat-box {
            background-color: #ffffff;
            border: none;
            border-radius: 16px;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            height: 100%;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94), box-shadow 0.3s ease;
        }

        .custom-stat-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -2px rgba(0, 0, 0, 0.05);
        }

        .custom-icon-circle {
            min-width: 40px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .custom-icon-circle.yellow {
            background-color: #cf1f1f;
            color: #ffffff;
        }

        .custom-icon-circle.dark-yellow {
            background-color: #374151;
            color: #cf1f1f;
        }

        .custom-stat-box:hover .custom-icon-circle {
            transform: rotate(360deg);
        }

        .custom-stat-info h5 {
            color: #111827;
            margin: 0;
            font-size: 0.9rem;
            font-weight: 700;
        }

        .custom-stat-info p {
            color: #4b5563;
            font-size: 0.7rem;
            margin: 0;
            line-height: 1.2;
        }

        .custom-visual-placeholder {
            background: linear-gradient(135deg, #1f2937, #111827);
            border: 1px dashed #4b5563;
            border-radius: 24px;
            height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
            margin-bottom: 24px;
        }

        .card-bottom-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 10px 0 15px 0;
            color: #000;
            font-family: 'Saira', sans-serif;
        }

        /* Product Showcase Section - Red Theme */
        .product-showcase-section {
            background: linear-gradient(135deg, #ffffff 0%, #e5c5c5 100%);
            padding: 40px 0;
            position: relative;
            overflow: hidden;
            transition: all 0.5s ease-in-out;
        }

        .product-showcase-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 50%, rgba(207, 31, 31, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .product-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            border: 1px solid #fb7474;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-10px);
            /*box-shadow: 0 20px 40px rgba(207, 31, 31, 0.3);*/
            border-color: #cf1f1f;
        }

        .product-image {
            position: relative;
            overflow: hidden;
            background: #fff;
            height: 280px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.1);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: #cf1f1f;
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            z-index: 2;
        }

        .product-content {
            padding: 0px 20px 20px;
            background: linear-gradient(-45deg, #ffffff 0%, #ffffff 100%);
        }

        .product-category {
           color: #cf1f1f;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 10px;
    line-height: 15px;
        }

        .product-title {
            color: #000;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.3;
            font-family: 'Saira', sans-serif;
        }

        .product-specs {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 20px;
        }

        .spec-item {
            background: #f9c3c3;
            padding: 12px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .spec-item:hover {
            background: #cf1f1f;
            transform: scale(1.05);
        }

        .spec-label {
            color: #000;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
            transition: all 0.3s ease;
            line-height: 14px;
        }

        .spec-value {
            color: #000;
            font-size: 1rem;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .product-footer {
            display: flex;
            gap: 10px;
            padding-top: 15px;
            border-top: 1px solid #2a2a2a;
        }

        .btn-details {
            flex: 1;
            padding: 12px 20px;
            background: #cf1f1f;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-details:hover {
            background: #a81919;
            transform: scale(1.05);
            color: white;
        }

        .btn-dealership {
            flex: 1;
            padding: 12px 20px;
            background: transparent;
            color: #cf1f1f;
            border: 2px solid #cf1f1f;
            border-radius: 10px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-dealership:hover {
            background: #cf1f1f;
            color: white;
            transform: scale(1.05);
        }

        /* Why Dealers Choose Sweton Section - White Background */
        .dealer-benefits-section {
            background: #ffffff;
            padding: 80px 0;
            transition: all 0.5s ease-in-out;
        }

        .benefit-card {
            background: #ffe4e4;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            border: 2px solid transparent;
            height: 100%;
        }

        .benefit-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: #cf1f1f;
            background: #ffffff;
        }

        .benefit-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #cf1f1f 0%, #a81919 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            transition: all 0.4s ease;
        }

        .benefit-card:hover .benefit-icon {
            transform: rotate(360deg) scale(1.1);
        }

        .benefit-icon i {
            font-size: 2rem;
            color: white;
        }

        .benefit-title {
            color: #1a1a1a;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .benefit-description {
            color: #666;
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-tagline {
            color: #cf1f1f;
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 15px;
        }

        .section-title-main {
            color: #1a1a1a;
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            line-height: 1.2;
            font-family: 'Saira', sans-serif;
        }

        .product-showcase-section .section-title-main {
            color: #000;
        }

        .section-description {
            color: #666;
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .product-showcase-section .section-description {
            color: #666;
        }

        /* Flex Section Header - Left Aligned with Right Button */
        .section-header-flex {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 60px;
            gap: 40px;
        }

        .section-header-left {
            flex: 1;
            text-align: left;
        }

        .section-header-left .section-tagline {
            text-align: left;
        }

        .section-header-left .section-title-main {
            text-align: left;
            max-width: 100%;
        }

        .section-header-left .section-description {
            text-align: left;
            margin: 0;
            max-width: 600px;
        }

        .section-header-right {
            display: flex;
            align-items: center;
            padding-top: 10px;
        }

        .btn-download-brochure {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 32px;
            background: #cf1f1f;
            color: white;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            white-space: nowrap;
            box-shadow: 0 4px 12px rgba(207, 31, 31, 0.3);
        }

        .btn-download-brochure:hover {
            background: #a81919;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(207, 31, 31, 0.4);
            color: white;
        }

        .btn-download-brochure i {
            font-size: 1.1rem;
        }

        .banner-top-mobile {
            margin-top: 74px;
        }

        /* Responsive Design */
        @media (max-width: 991px) {
            .custom-pill-row {
                margin-top: 20px;
            }

            .custom-spec-card {
                height: auto;
                margin-bottom: 12px;
            }

            .custom-stat-box {
                margin-bottom: 15px;
            }

            .product-card {
                margin-bottom: 30px;
            }

            .benefit-card {
                margin-bottom: 30px;
            }

            .shop-a-m2 {
                margin-bottom: 16px;
            }

            .custom-spec-section {
                padding: 40px 0 30px;
            }
        }

        @media (max-width: 768px) {
            .custom-main-title {
                font-size: 2rem;
            }

            .custom-btn {
                width: 100%;
                margin-right: 0;
            }

            .section-title-main {
                font-size: 2rem;
            }

            .product-title {
                font-size: 1.3rem;
            }

            .product-specs {
                grid-template-columns: repeat(2, 1fr);
            }

            .product-footer {
                flex-direction: column;
                margin-top:0px !important;
            }

            .section-header-flex {
                flex-direction: column;
                gap: 30px;
            }

            .section-header-right {
                width: 100%;
                justify-content: flex-start;
            }

            .btn-download-brochure {
                width: 100%;
                justify-content: center;
            }

            .product-showcase-section,
            .dealer-benefits-section {
                padding: 50px 0;
            }
        }

        /* Experience One Section Transitions */
        .experience-one {
            transition: all 0.5s ease-in-out;
        }

        .experience-one__single {
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .experience-one__single:hover {
            transform: translateY(-10px);
        }

        /* Testimonial Section Transitions */
        .testimonial-one,
        .testimonal-two {
            transition: all 0.5s ease-in-out;
        }

        .services-one__single {
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .services-one__single:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /* Real World Use Section */
        .real-world-section {
            background: linear-gradient(-45deg, #ffffff 0%, #ffd9d9 100%);
            padding: 40px 0;
            color: white;
        }

        .video-card {
            background: #111;
            border: 1px solid #222;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            height: 100%;
        }

        .video-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(207, 31, 31, 0.15);
            border-color: #cf1f1f;
        }

        .video-thumbnail {
            background: #1a1a1a;
            position: relative;
            border-bottom: 1px solid #222;
            display: block;
            overflow: hidden;
        }

        .video-thumbnail img {
            transition: transform 0.5s ease;
            display: block;
        }

        .video-card:hover .video-thumbnail img {
            transform: scale(1.05);
        }

        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

        .play-button i {
            color: #ffffff;
            font-size: 1.5rem;
            background: #cf1f1f;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
            box-shadow: 0 0 20px rgba(207, 31, 31, 0.5);
        }

        .video-card:hover .play-button i {
            transform: scale(1.1);
            background: #a81919;
        }

        .video-content {
            padding: 25px;
        }

        .video-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: white;
        }

        .video-description {
            font-size: 0.95rem;
            color: #9ca3af;
            line-height: 1.5;
            margin: 0;
        }

        .section-header-flex .text-white {
            color: black !important;
        }

        .btn-view-all {
            display: inline-flex;
            align-items: center;
            padding: 12px 24px;
            background: transparent;
            border: 2px solid #cf1f1f;
            color: #cf1f1f;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-view-all:hover {
            background: #333;
            border-color: #555;
            color: white;
        }

        /* Dealer Banner Section */
        .dealer-banner-section {
            background-color: #ffffff;
            padding: 40px 0px;
        }

        .dealer-banner {
            background: linear-gradient(95deg, #cd0b0b 0%, #000000 100%);
            border: 1px solid #3d0d0d;
            border-radius: 20px;
            padding: 50px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .dealer-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at top right, rgba(207, 31, 31, 0.1), transparent 60%);
            pointer-events: none;
        }

        .dealer-banner:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
            border-color: #cf1f1f;
        }

        .dealer-content {
            max-width: 600px;
            position: relative;
            z-index: 2;
        }

        .dealer-title {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 15px;
            color: white;
        }

        .dealer-text {
            font-size: 1.05rem;
            color: #ccc;
            margin: 0;
            line-height: 1.6;
        }

        .dealer-actions {
            display: flex;
            gap: 15px;
            position: relative;
            z-index: 2;
        }

        .btn-apply {
            background: #cf1f1f;
            color: white;
            padding: 15px 30px;
            border-radius: 10px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(207, 31, 31, 0.3);
        }

        .btn-apply:hover {
            background: #a81919;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(207, 31, 31, 0.4);
            color: white;
        }

        .btn-sales {
            background: transparent;
            border: 1px solid #444;
            color: white;
            padding: 15px 30px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-sales:hover {
            border-color: #fff;
            background: rgba(255, 255, 255, 0.05);
            color: white;
        }

        @media (max-width: 991px) {
            .dealer-banner {
                flex-direction: column;
                text-align: left;
                padding: 40px;
                align-items: flex-start;
                gap: 30px;
            }

            .dealer-actions {
                flex-direction: column;
                width: 100%;
            }

            .btn-apply,
            .btn-sales {
                width: 100%;
                text-align: center;
                justify-content: center;
                display: flex;
            }
        }

        /* WhatsApp Floating Button */
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50%;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .whatsapp-float:hover {
            background-color: #128c7e;
            color: #FFF;
            transform: scale(1.1);
        }

        /* Move scroll-to-top up to avoid overlap */
        .scroll-to-top {
            bottom: 110px !important;
        }

        /*new css end ------------------------------------------*/
        .asset-bg {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            height: fit-content;
        }

        .main-slider {
            overflow: hidden;
            height: fit-content;
        }

        /*"effect": "fade",*/
        /*            "pagination": {*/
        /*            "el": "#main-slider-pagination",*/
        /*            "type": "bullets",*/
        /*            "clickable": true*/
        /*            },*/
        /*            "navigation": {*/
        /*            "nextEl": "#main-slider__swiper-button-next",*/
        /*            "prevEl": "#main-slider__swiper-button-prev"*/
        /*            },*/
        /*            "autoplay": {*/
        /*            "delay": 5000*/
        /*            }}'*/
        @media only screen and (max-width: 767px) {
            .testimonal-two {
                padding: 50px 0 60px;
                padding-bottom: 0;
            }

            .asset-bg {
                position: absolute;
                top: 0;
                min-width: 100%;
                height: -webkit-fill-available !important;
                right: 0;
                left: auto !important;
            }
        }

        /* css for mobile view start*/


        /* -----------------------------
       Company Title Section
    ----------------------------- */
        .company-title {
            background: linear-gradient(to bottom, #f0f0f0, #cfcfcf);
            text-align: center;
            padding: 19px 15px;
            padding-top: 7em;
        }

        .company-title h1 {
            font-size: 30px;
            font-weight: 800;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .badge-box span {
            background: #d40000;
            color: #fff;
            padding: 6px 14px;
            font-size: 13px;
            font-weight: 600;
            border-radius: 4px;
            margin: 0 4px;
            display: inline-block;
        }

        /* -----------------------------
       Hero / Product Section
    ----------------------------- */
        .hero-section {
            background: radial-gradient(circle, #2b2b2b, #000);
            /*padding: 40px 15px;*/
            position: relative;
        }

        .hero-img {
            max-width: 100%;
            filter: drop-shadow(0 10px 25px rgba(0, 0, 0, 0.8));
        }

        .nav-arrow {
            width: 42px;
            height: 42px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 22px;
            cursor: pointer;
        }

        /* -----------------------------
       CTA Buttons Section
    ----------------------------- */
        .cta-section {
            background: linear-gradient(to bottom, #3a3a3a, #1e1e1e);
            padding: 35px 15px;
            text-align: center;
        }

        .cta-btn {
            /*background: linear-gradient(to bottom, #ffffff, #dcdcdc);*/
            border: none;
            border-radius: 30px;
            padding: 5px 28px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 7px;
            width: 100%;
            max-width: 420px;
        }

        .cta-btn.red {
            background: linear-gradient(to bottom, #ff1a1a, #c90000);
            color: #fff;
        }

        /* -----------------------------
       Info Section
    ----------------------------- */
        .info-section {
            background: linear-gradient(to bottom, #ededed, #cfcfcf);
            padding: 24px 15px;
            text-align: center;
        }

        .info-section p {
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        /* -----------------------------
       Celebration Section
    ----------------------------- */
        .celebration {
            background: #2b2b2b;
            color: #fff;
            padding: 25px 15px;
            text-align: center;
        }

        .celebration span {
            color: #ff1a1a;
            font-weight: 800;
        }

        /* -----------------------------
       Download Section
    ----------------------------- */
        .download-section {
            background: linear-gradient(to bottom, #ffffff, #b9b4b4);
            padding: 25px 15px;
            text-align: center;
        }

        .download-btn {
            background: linear-gradient(to bottom, #ff1a1a, #c90000);
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 8px 26px;
            font-weight: 700;
            margin: 8px;
            display: inline-block;
        }


        .carousel-control-prev,
        .carousel-control-next {
            width: auto;
        }

        .carousel-control-prev {
            left: -50px;
        }

        .carousel-control-next {
            right: -50px;
        }

        /* =============================
   Button Hover Effects
============================= */

        /* Common transition for all buttons */
        .cta-btn,
        .download-btn {
            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                background 0.25s ease;
        }

        /* White CTA buttons hover */
        .cta-btn:hover {
            transform: translateY(-3px);
            box-shadow:
                0 8px 18px rgba(0, 0, 0, 0.35),
                inset 0 -2px 0 rgba(255, 255, 255, 0.6);
        }

        /* Red CTA + Download buttons hover */
        .cta-btn.red:hover,
        .download-btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow:
                0 10px 25px rgba(255, 0, 0, 0.45),
                inset 0 -2px 0 rgba(255, 255, 255, 0.25);
        }

        /* Active / click effect */
        .cta-btn:active,
        .download-btn:active {
            transform: translateY(0) scale(0.98);
            box-shadow: inset 0 3px 8px rgba(0, 0, 0, 0.4);
        }

        /* Focus (keyboard accessibility) */
        .cta-btn:focus-visible,
        .download-btn:focus-visible {
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 0, 0, 0.4);
        }


        /* -----------------------------
       Responsive Tweaks
    ----------------------------- */
        @media (max-width: 576px) {
            .company-title h1 {
                font-size: 27px;
            }

            .info-section p {
                font-size: 19px;
            }
        }

        @media only screen and (max-width: 600px) {
            .whatsapp-float {
                width: 50px;
                height: 50px;
                bottom: 6px;
                right: 11px;
            }

            .main-header {
                background: #ff0808 !important;
            }

            .main-menu__main-menu-box {
                background: #3a0204 !important;
                padding: 10px;
            }

            .swiper-wrapper1 {
                display: none !important;
            }

            .logo-wth {
                width: 164px !important;
            }

            .main-menu__logo {

                padding: 20px 0 !important;
            }

            .downarw {
                display: none;
            }

            .celebration h4 {
                color: #fff;
            }

            .buy-online {
                color: #fff;
            }

            .testimonial-one {
                display: none;
            }
        }

        .testimonal-two {
            position: relative;
            display: block;
            padding: 62px 0 47px !important;
        }

        .blog-two,
        .team-one {
            position: relative;
            display: block;
            padding: 40px 0 40px !important;
        }



        .wp-chat h3 {
            text-align: left;
            font-size: 17px;
            color: #fff;
        }

        .wp-chat p {
            font-weight: 500;
            color: #fff;
            text-align: left;
            line-height: 15px;
            margin-top: 5px;
        }

        .shop-a-m2 {
            background: #9f0000;
            border: 1px solid red;
            margin: 10px;
            color: #ffffff;
            padding: 9px;
            margin-bottom: 0em;
            border-radius: 20px;
            text-align: center;
        }

        /* ===== BANNER SWIPER SLIDER ===== */
        .banner-swiper-wrap {
            position: relative;
            width: 100%;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 20px;
            box-shadow: 0 8px 30px rgba(207, 31, 31, 0.12);
        }

        .banner-swiper {
            width: 100%;
            height: 350px;
            background: #fff5f5;
        }

        @media (max-width: 991px) {
            .banner-swiper {
                height: 300px;
            }
        }

        @media (max-width: 576px) {
            .banner-swiper {
                height: 250px;
            }
        }

        .banner-slide-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
            transition: transform 0.6s ease;
        }

        .banner-swiper .swiper-slide:hover .banner-slide-img {
            transform: scale(1.04);
        }

        /* Navigation arrows */
        .banner-prev,
        .banner-next {
            color: #cf1f1f !important;
            background: rgba(255, 255, 255, 0.92);
            width: 40px !important;
            height: 40px !important;
            border-radius: 50%;
            box-shadow: 0 3px 12px rgba(207, 31, 31, 0.2);
            transition: all 0.3s ease;
        }

        .banner-prev:hover,
        .banner-next:hover {
            background: #cf1f1f !important;
            color: #ffffff !important;
            box-shadow: 0 5px 20px rgba(207, 31, 31, 0.35);
        }

        .banner-prev::after,
        .banner-next::after {
            font-size: 14px !important;
            font-weight: 900;
        }

        /* Pagination dots */
        .banner-pagination .swiper-pagination-bullet {
            background: rgba(207, 31, 31, 0.3);
            width: 8px;
            height: 8px;
            opacity: 1;
            transition: all 0.3s ease;
        }

        .banner-pagination .swiper-pagination-bullet-active {
            background: #cf1f1f;
            width: 24px;
            border-radius: 4px;
        }

        .custom-btn-primary1 {

            color: #000;
            border: 2px solid #cf1f1f;
            background: #fff;
        }

        .custom-btn-primary1:hover {

            color: #cf1f1f;
            border: 2px solid #cf1f1f;
            background: #fff;
        }



        @media(max-width:600px) {
            .img-pos {
                position: relative;
            }

            .img-pos img {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, 28%);
            }

            .wp-chat p {
                font-size: 14px;
            }

            .custom-spec-card {

                padding: 25px;
            }

            .custom-spec-section {
                padding: 30px 0 30px;
            }

            .banner-top-mobile {
                margin-top: 6em;
                padding-bottom: 0;
            }
        }


        .loop-button {
            /* Set up a large gradient background */
            background: linear-gradient(-45deg, #ff0000, #330000, #000000, #ff0000);
            background-size: 400% 400%;

            /* Animation call: Name | Duration | Timing | Iteration */
            animation: gradient-shift 5s ease infinite;

            color: white;
            padding: 16px 32px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        /* Define the movement of the background */
        @keyframes gradient-shift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Optional: Slight lift on hover */
        .loop-button:hover {
            transform: translateY(-2px);
            filter: brightness(1.2);
            transition: 0.3s;
        }

        .spec-item:hover .spec-label {
            color: #fff;
        }

        .spec-item:hover .spec-value {
            color: #fff;
        }

        .faq-one {
            padding: 40px 0;
        }

        .about-one {
            padding: 40px 0 !important;
        }


        /* Real World Use Tabs */
        .custom-video-tabs {
            list-style: none;
            padding: 0;
            margin: 0 0 40px 0;
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .custom-video-tabs .tab-btn {
            background: #ffffff;
            border: 2px solid #fde8e8;
            color: #1a1a1a;
            border-radius: 50px;
            padding: 6px 24px;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        }

        .custom-video-tabs .tab-btn:hover {
            border-color: #cf1f1f;
            color: #cf1f1f;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(207, 31, 31, 0.1);
        }

        .custom-video-tabs .tab-btn.active {
            background: #cf1f1f;
            color: #fff;
            border-color: #cf1f1f;
            box-shadow: 0 8px 20px rgba(207, 31, 31, 0.3);
            transform: translateY(-2px);
        }

        .video-tab-content {
            transition: opacity 0.4s ease-in-out;
        }

        /* ===== FEATURED MODELS OWL CAROUSEL ===== */
        .featured-models-slider-wrap {
            position: relative;
            padding: 0 60px;
        }

        .featured-models-carousel {
            width: 100%;
            padding-bottom: 55px !important;
        }

        .featured-models-carousel .item {
            height: 100%;
            display: flex;
        }

        .featured-models-carousel .owl-stage {
            display: flex;
        }

        .featured-models-carousel .product-card {
            width: 100%;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .featured-models-carousel .product-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .featured-models-carousel .product-footer {
            margin-top: auto;
        }

        /* Custom prev/next nav buttons */
        .featured-models-carousel .owl-nav {
            margin-top: 0;
        }

        .featured-models-carousel .owl-nav button.owl-prev,
        .featured-models-carousel .owl-nav button.owl-next {
            position: absolute;
            top: 50%;
            transform: translateY(calc(-50% - 27px));
            z-index: 10;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: #ffffff !important;
            border: 2px solid #fde8e8 !important;
            color: #cf1f1f !important;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 16px rgba(207, 31, 31, 0.15);
            transition: all 0.3s ease;
            font-size: 1rem;
            user-select: none;
            padding: 0 !important;
            margin: 0 !important;
        }

        .featured-models-carousel .owl-nav button.owl-prev:hover,
        .featured-models-carousel .owl-nav button.owl-next:hover {
            background: #cf1f1f !important;
            border-color: #cf1f1f !important;
            color: #ffffff !important;
            box-shadow: 0 6px 24px rgba(207, 31, 31, 0.35);
            transform: translateY(calc(-50% - 27px)) scale(1.08);
        }

        .featured-models-carousel .owl-nav button.owl-prev {
            left: -60px;
        }

        .featured-models-carousel .owl-nav button.owl-next {
            right: -60px;
        }

        /* Pagination dots */
        .featured-models-carousel .owl-dots {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
        }

        .featured-models-carousel .owl-dots .owl-dot {
            outline: none;
        }

        .featured-models-carousel .owl-dots .owl-dot span {
            background: rgba(207, 31, 31, 0.25) !important;
            width: 9px;
            height: 9px;
            margin: 5px 4px;
            display: inline-block;
            transition: all 0.3s ease;
            border-radius: 50%;
        }

        .featured-models-carousel .owl-dots .owl-dot.active span {
            background: #cf1f1f !important;
            width: 26px;
            border-radius: 5px;
        }

        @media (max-width: 991px) {
            .featured-models-slider-wrap {
                padding: 0 48px;
            }

            .featured-models-carousel .owl-nav button.owl-prev {
                left: -48px;
            }

            .featured-models-carousel .owl-nav button.owl-next {
                right: -48px;
            }
        }

        @media (max-width: 576px) {
            .featured-models-slider-wrap {
                padding: 0 40px;
            }

            .featured-models-carousel .owl-nav button.owl-prev,
            .featured-models-carousel .owl-nav button.owl-next {
                width: 36px;
                height: 36px;
                font-size: 0.85rem;
            }

            .featured-models-carousel .owl-nav button.owl-prev {
                left: -40px;
            }

            .featured-models-carousel .owl-nav button.owl-next {
                right: -40px;
            }
        }
        .bg-blk {
    background-position: bottom;
    background-size: contain;
    background-image: url({{ asset('public_assets/images/bg1.jpg') }});
}
.spadd-left-0{
    padding: 40px 0px 40px 24px !important;
}
    </style>
<x-frontend_layout>
        <section class="main-slider clearfix">
            <a class="downarw" href="#aboutpage"><img style="" src="{{ asset('public_assets/images/arrow-d.jpg') }}"></a>
            <div class="">
                <div class="swiper-wrapper1">
                    
                    <div class="">
                       
                         <img class="asset-bg" src="{{ asset("public_assets/images/backgrounds/bgg.jpg") }}">
                        
                        <div class="container" style="padding-top: 142px;">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="main-slider__content">
                                        <img style="display:block; margin-bottom: 30px;" src="{{ asset('public_assets/images/resources/logonew.png') }}">
                                        <h2 style="color: #fff; font-weight: bold; margin-bottom: 10px; font-size: 36px;">Built for India's toughest sound conditions.</h2>
                                        <p style="display:block; opacity: 1; visibility: visible;font-size: 16px;
    line-height: 22px;font-weight: 500;" class="main-slider__text">Professional loudspeaker drivers engineered for long hours, high
                                power handling, and real-world reliability — trusted by DJs, rental operators, and
                                system integrators across India.</p>
                                        <div class="main-slider__btn-box">
                                            <a href="{{ route('category.list', 'pro-loudspeaker') }}" class="thm-btn main-slider__btn" style="">Pro Loud Speakers</a>
                                            <a href="{{ route('category.list', 'home-loudspeaker') }}" class="thm-btn main-slider__btn" style="">Home Loud Speakers</a>
                                            <div>
                                                 <a href="{{ url('application-for-dealership') }}" class="thm-btn main-slider__btn" style="">Application for Dealership</a>
                                              <a href="{{ url('attention-manufacturers') }}" class="thm-btn main-slider__btn" style="">Attention Manufacturers</a>
                                              <a href="https://shop.swetonspeakers.com" class="buy-online thm-btn main-slider__btn">Buy online</a>  
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                 

                  

                </div>
                
             
                  <!--  <section class="company-title mobile-view">-->
                  <!--  <h1>OCTUNE ELECTRONICS LLP</h1>-->
                  <!--  <div class="badge-box">-->
                  <!--    <span>ISO 9001:2025</span>-->
                  <!--    <span>LIC. 2018-50459</span>-->
                  <!--  </div>-->
                  <!--</section>-->
                  
                 


            </div>
        </section>
        <!--Main Slider End-->
        <!--        <section class="custom-spec-section banner-top-mobile desk-view" style="background: linear-gradient(-45deg, #fffcfc 0%, #f5d4d4 100%);">-->
        <!--    <div class="container">-->
                
        <!--        <div class="row">-->
                    
        <!--            <div class="col-lg-7">-->
        <!--                <div class="spadd-left-0 custom-spec-card"-->
        <!--                    style="background: linear-gradient(-45deg, #e9c3c3 0%, #ffffff 100%);">-->
        <!--                    <img style="width: 200px; margin-bottom: 20px;" src="{{ asset('public_assets/images/logonew11.png') }}">-->
        <!--                    <h2 class="custom-main-title">Built for India's toughest sound conditions.</h2>-->
        <!--                    <p class="custom-desc">Professional loudspeaker drivers engineered for long hours, high-->
        <!--                        power handling, and real-world reliability — trusted by DJs, rental operators, and-->
        <!--                        system integrators across India.</p>-->

        <!--                    <div class="d-flex flex-wrap" style="gap: 10px;">-->
        <!--                        <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker" class="custom-btn custom-btn-primary1">Explore Pro Audio-->
        <!--                            Drivers</a>-->
        <!--                        <a href="https://www.swetonspeakers.com/speaker/home-loudspeaker" class="custom-btn custom-btn-primary1">Explore Home Audio</a>-->
        <!--                        <a href="https://www.swetonspeakers.com/application-for-dealership" class="custom-btn custom-btn-primary1">Dealership-->
        <!--                        </a>-->
        <!--                    </div>-->

        <!--                    <div class="d-flex flex-wrap" style="gap: 10px;">-->
        <!--                        <a href="https://www.swetonspeakers.com/attention-manufacturers" class="custom-btn custom-btn-primary1">Attention Manufacturers-->
        <!--                        </a>-->
        <!--                        <a href="https://shop.swetonspeakers.com/" class="loop-button custom-btn custom-btn-primary">Buy Online</a>-->
        <!--                    </div>-->

        <!--                </div>-->
        <!--            </div>-->

                   
        <!--            <div class="col-lg-5">-->
        <!--                <div class="custom-spec-card visual-card bg-blk" style="">-->
        <!--                     Visual Placeholder -->
        <!--                    <div class="row">-->
        <!--                        <div class="col-md-12">-->
        <!--                            <img class="img-fluid" src="{{ asset('public_assets/images/bgg.png') }}">-->
        <!--                              Banner Swiper Slider -->
        <!--                    <div class="banner-swiper-wrap">-->
        <!--                        <div class="swiper-container banner-swiper">-->
        <!--                            <div class="swiper-wrapper">-->
        <!--                                 <div class="swiper-slide">-->
        <!--                                    <img src="{{ asset('public_assets/images/ban34.webp') }}"-->
        <!--                                        alt="Sweton Quality" class="banner-slide-img">-->
        <!--                                </div>-->
        <!--                                <div class="swiper-slide">-->
        <!--                                    <img src="{{ asset('public_assets/images/ban4.webp') }}"-->
        <!--                                        alt="Sweton Performance" class="banner-slide-img">-->
        <!--                                </div>-->
        <!--                                <div class="swiper-slide">-->
        <!--                                    <img src="{{ asset('public_assets/images/ban5.webp') }}"-->
        <!--                                        alt="Sweton Performance" class="banner-slide-img">-->
        <!--                                </div>-->
        <!--                                <div class="swiper-slide">-->
                                            
        <!--                                    <img src="{{ asset('public_assets/images/ban1.webp') }}" alt="Sweton Speakers"-->
        <!--                                        class="banner-slide-img">-->
        <!--                                </div>-->
        <!--                                <div class="swiper-slide">-->
        <!--                                    <img src="{{ asset('public_assets/images/ban2.webp') }}"-->
        <!--                                        alt="Sweton Excellence" class="banner-slide-img">-->
        <!--                                </div>-->
                                       
        <!--                            </div>-->
        <!--                             Navigation -->
        <!--                            <div class="swiper-button-prev banner-prev"></div>-->
        <!--                            <div class="swiper-button-next banner-next"></div>-->
        <!--                             Pagination -->
        <!--                            <div class="swiper-pagination banner-pagination"></div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                        </div>-->
        <!--                    </div>-->




        <!--                     Bottom Small Cards Row -->
        <!--                    <div class="row">-->
        <!--                        <div class="col-md-6 mb-1 mb-md-0">-->
        <!--                            <div class="custom-spec-card small-card right-bordered-col">-->
        <!--                                <h4-->
        <!--                                    style="color: #fff; font-size: 1.1rem; margin-bottom: 8px; font-weight: 700;">-->
        <!--                                    Reliability First</h4>-->
        <!--                                <p style="color: #9ca3af; font-size: 0.85rem; margin: 0; line-height: 1.4;">-->
        <!--                                    Designed for heat, long shows & rough handling.</p>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-6">-->
        <!--                            <div class="custom-spec-card small-card">-->
        <!--                                <h4-->
        <!--                                    style="color: #fff; font-size: 1.1rem; margin-bottom: 8px; font-weight: 700;">-->
        <!--                                    Consistency</h4>-->
        <!--                                <p style="color: #9ca3af; font-size: 0.85rem; margin: 0; line-height: 1.4;">Same-->
        <!--                                    performance across batches — protects dealer reputation.</p>-->
        <!--                            </div>-->
        <!--                        </div>-->
                                
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!-- </section>-->
        
       <!-- =============================
                        mobile Hero / Product Slider
                    ============================== -->
                    
                    <section class="company-title mobile-view">
                    <h1>OCTUNE ELECTRONICS LLP</h1>
                    <div class="badge-box">
                      <span>ISO 9001:2025</span>
                      <span>LIC. 2018-50459</span>
                    </div>
                  </section>
                    <section class="hero-section mobile-view">
                      <div class="container">
                        <div class="row justify-content-center align-items-center">
                          <div class="col-12 col-md-10">
                    
                            <!-- Bootstrap Carousel -->
                            <div id="speakerCarousel" class="carousel slide" data-bs-ride="carousel">
                    
                              <!-- Slides -->
                              <div class="carousel-inner text-center">
                    
                                <div class="carousel-item active">
                                    <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker/pt-series/15-pt-1500-mb">
                                  <img
                                    src="{{ asset('public_assets/images/resources/mobile-1a.jpg') }}"
                                    class="img-fluid hero-img"
                                    alt="Speaker 1"
                                  /></a>
                                </div>
                    
                                <div class="carousel-item">
                                    <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker/kl-series/21-kl-2160-sub">
                                  <img
                                    src="{{ asset('public_assets/images/resources/mobile-2a.jpg') }}"
                                    class="img-fluid hero-img"
                                    alt="Speaker 2"
                                  /></a>
                                </div>
                    
                                <div class="carousel-item">
                                    <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker/pt-series/15-pt-1000-mb-3-0">
                                  <img
                                    src="{{ asset('public_assets/images/resources/mobile-3a.jpg') }}"
                                    class="img-fluid hero-img"
                                    alt="Speaker 3"
                                  /></a>
                                </div>
                    
                              </div>
                    
                              <!-- Left Arrow -->
                              <button
                                class="carousel-control-prev"
                                type="button"
                                data-bs-target="#speakerCarousel"
                                data-bs-slide="prev"
                              >
                                <span class="nav-arrow">&lt;</span>
                              </button>
                    
                              <!-- Right Arrow -->
                              <button
                                class="carousel-control-next"
                                type="button"
                                data-bs-target="#speakerCarousel"
                                data-bs-slide="next"
                              >
                                <span class="nav-arrow">&gt;</span>
                              </button>
                    
                            </div>
                    
                          </div>
                        </div>
                      </div>
                    </section>
        
        
                         <!-- =============================
                       CTA Buttons
                  ============================== -->
                  <section class="cta-section mobile-view">
                    <div class="container">
                      <a href="{{ route('category.list', 'pro-loudspeaker') }}"><button class="cta-btn">PRO LOUD SPEAKERS</button></a><br />
                      <a href="{{ route('category.list', 'home-loudspeaker') }}"><button class="cta-btn">HOME LOUD SPEAKERS</button></a><br />
                      <a href="{{ url('application-for-dealership') }}"><button class="cta-btn">APPLICATION FOR DEALERSHIP</button></a><br />
                      <a href="{{ url('attention-manufacturers') }}"><button class="cta-btn">ATTENTION MANUFACTURERS</button></a><br />
                      <a href="https://shop.swetonspeakers.com/"><button class="loop-button cta-btn buy-online">BUY ONLINE</button></a>
                    </div>
                  </section>
                  
                   <!-- =============================
                       Government Certificate Info
                  ============================== -->
                  <section class="info-section mobile-view">
                    <div class="container">
                      <a role="button" data-bs-toggle="modal" data-bs-target="#imageModall"><p>
                        OCTUNE ELECTRONICS LLP<br> HAS RECEIVED CERTIFICATE<br> OF APPRECIATION FROM<br>
                        THE GOVERNMENT OF INDIA<br> (MINISTRY OF FINANCE).
                      </p></a>
                      
                      <div class="row">
                           <div class="col-md-12 p-0">
                             <div class="shop-a-m2" style="background: #23442a; border: 1px solid #07974e;">
                                 <div class="row">
                                     <div class="col-2">
                                         <div class="img-pos"><img style="width:40px" src="{{ asset('public_assets/images/resources/wa-logo.png') }}"></div>
                                     </div>
                                     <div class="col-10 wp-chat">
                                         <h3>Now let's chat on WhatsApp!!!</h3>
                                         <p>Save <b><a style="color:red" href="https://wa.me/9073003001?text=Hi">9073003001</a></b> and send <b>Hi</b> to avail our service 24*7 on WhatsApp.</p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                      </div>
                    </div>
                    
                     <div class="modal fade" id="imageModall" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                  
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                          
                                            <!-- Modal Header -->
                                            <div class="modal-header" style="padding: 10px;">
                                              <h4 style="margin-bottom: 0; font-size: 15px; padding: 0px; margin: 0;" class="modal-title">Certificate of Appreciation</h4>
                                              <button class="cross11" type="button" data-bs-dismiss="modal" aria-label="Close">×</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                              <img class="input-check__icon" style="transform: inherit;position: inherit;" width="100%" height="auto" src="https://shop.swetonspeakers.com/image/certi.jpg">
                                            </div>
                                            
                                         
                                            
                                          </div>
                                        </div>
                    </div>
                  </section>
                  
                  <!-- =============================
                       Celebration Section
                  ============================== -->
                  <section class="celebration mobile-view">
                    <div class="container">
                      <h4>
                        <span style="font-size: 27px;">SWETON</span> IS CELEBRATING<br/>
                        43 YEARS OF SUCCESS,<br/> TRUST AND RELIABILITY.
                      </h4>
                    </div>
                  </section>
                
                  <!-- =============================
                       Download Buttons
                  ============================== -->
                  <section class="download-section mobile-view">
                    <div class="container">
                      <a href="{{ asset('public_assets/images/Sweton Transducer, Kolkata.pdf') }}" class="download-btn"><i class="fas fa-file-pdf"></i> Download Pro Series Brochure</a>
                      <a href="{{ asset('public_assets/images/Sweton_Home_Series_Catalogue1.pdf') }}" class="download-btn"><i class="fas fa-file-pdf"></i> Download Home Series Brochure</a>
                    </div>
                  </section>
        
        
        <section class="top-one1" style="background:#fff">
            <div style="margin-top:0px; margin-bottom: 0;">
                <div class="container">
                    <div class="row">
                         <div class="col-md-12">
                             <div class="shop-a-m1" style="background:#161616"><a href="#" data-bs-toggle="modal" data-bs-target="#imageModal">Octune Electronics LLP has received Certificate of Appreciation from The Government of India (Ministry of Finance).</a></div>
                         </div>
                          <div class="col-md-12">
                             <div class="bg-white1">
                <!-- Middle Stats Row -->
                <div>
                    <div class="row justify-content-center">
                        <div class="col-lg col-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="custom-stat-box">
                                <div class="custom-icon-circle yellow">43</div>
                                <div class="custom-stat-info">
                                    <h5>43+ Years</h5>
                                    <p>Manufacturing experience</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="custom-stat-box">
                                <div class="custom-icon-circle yellow">IN</div>
                                <div class="custom-stat-info">
                                    <h5>Made in India</h5>
                                    <p>Built for local conditions</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-6 wow fadeInUp" data-wow-delay="300ms">
                            <div class="custom-stat-box">
                                <div class="custom-icon-circle yellow">DJ</div>
                                <div class="custom-stat-info">
                                    <h5>Rental & DJ Fit</h5>
                                    <p>High-SPL reliability</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg col-6 wow fadeInUp" data-wow-delay="500ms">
                            <div class="custom-stat-box">
                                <div class="custom-icon-circle yellow">DL</div>
                                <div class="custom-stat-info">
                                    <h5>Dealer Network</h5>
                                    <p>Partner growth mindset</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="custom-stat-box" style="background: #b9e9b6;width: 270px;">
                                <div class="custom-icon-circle"><img style="width:40px" src="{{ asset('public_assets/images/resources/wa-logo.png') }}"></div>
                                <div class="custom-stat-info">
                                    <!--<h5>chat on WhatsApp!!!</h5>-->
                                    <p style="font-size: 13px; font-weight: 600;">Save <a style="color:green;font-weight: bolder;" href="https://wa.me/919073003001">9073003001</a> , Send <b style="color:black">Hi</b> on WhatsApp for 24×7 AI Help</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                         </div>
                         
                         <div class="col-md-12 mt-2" style="margin-top: 1em;">
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="shop-a-m1 w-100 mb11 custom-btn custom-btn-primary" style="background: #a90404;"><a href="{{ asset('public_assets/images/Sweton Transducer, Kolkata.pdf') }}"><i class="fas fa-file-download" style="margin-right: 8px;"></i> Download Pro Series Brochure</a></div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="shop-a-m1 mm1 w-100 custom-btn custom-btn-primary" style="background: #a90404;"><a href="{{ asset('public_assets/images/Sweton_Home_Series_Catalogue1.pdf') }}"><i class="fas fa-file-download" style="margin-right: 8px;"></i> Download Home Series Brochure</a></div>
                                 </div>
                             </div>
                             
                         </div>
                         
                         <!--<div class="col-md-12">-->
                         <!--            <div class="shop-a-m2" style="background: #23442a; border: 1px solid #07974e;">-->
                         <!--                <div class="row">-->
                         <!--                    <div class="col-2">-->
                         <!--                        <div class="img-pos"><img style="width:40px" src="{{ asset('public_assets/images/resources/wa-logo.png') }}"></div>-->
                         <!--                    </div>-->
                         <!--                    <div class="col-10 wp-chat">-->
                         <!--                        <h3>Now let's chat on WhatsApp!!!</h3>-->
                         <!--                        <p>Save <b><a style="color:yellow" href="https://wa.me/9073003001?text=Hi">9073003001</a></b> and send <b>Hi</b> to avail our service 24*7 on WhatsApp.</p>-->
                         <!--                    </div>-->
                         <!--                </div>-->
                         <!--            </div>-->
                         <!--        </div>-->
                         
                     </div>
                        <!-- The Modal -->
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                  
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                          
                                            <!-- Modal Header -->
                                            <div class="modal-header" style="padding: 10px;">
                                              <h4 style="margin-bottom: 0; font-size: 15px; padding: 0px; margin: 0;" class="modal-title">Certificate of Appreciation</h4>
                                              <button class="cross11" type="button" data-bs-dismiss="modal" aria-label="Close">×</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                              <img class="input-check__icon" style="transform: inherit;position: inherit;" width="100%" height="auto" src="https://shop.swetonspeakers.com/image/certi.jpg">
                                            </div>
                                            
                                         
                                            
                                          </div>
                                        </div>
                    </div>
                </div>
            </div>
        </section>
        
         <section class="custom-spec-section" style="background: linear-gradient(-45deg, #000000 0%, #4a0f0f 100%);">
            

            <div class="container">
                <!-- Bottom Cards Row -->
                <div class="row">
                    <!-- Bottom Left Card -->
                    <div class="col-lg-12 mb-md-4 mb-lg-0">
                        <div class="custom-spec-card fst-pbg" style="">
                            <span class="custom-text-gold">● Pro Audio Drivers</span>
                             <h3 class="card-bottom-title">Get the right driver recommendation</h3>
                            <p class="custom-desc">We offer professional loudspeaker drivers engineered for long hours, high power handling, and real-world reliability.</p>
                            <h3 class="card-bottom-title">Subwoofers • Mid-Bass • Midrange • PA. We’ll suggest the right model</h3>
                            <p class="custom-desc">Built for high SPL, durability, and repeatable performance in
                                demanding environments.</p>

                            {{--<div class="custom-pill-row" style="margin-top: 0; margin-bottom: 25px;">
                                <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker/pt-series" class="custom-pill">Roadshows</a>
                                <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker/it-series" class="custom-pill">Weddings</a>
                                <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker/pt-series" class="custom-pill">Outdoor</a>
                                <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker/pt-series/21-pt-2500-sub" class="custom-pill">Subwoofer</a>
                                <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker/pt-series/15-pt-1500-mb" class="custom-pill">Mid-bass</a>
                                <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker/pa-series" class="custom-pill">Midrange</a>
                                <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker" class="custom-btn-primary custom-pill" style="background-color: #cf1f1f;">View Pro Audio Range</a>
                            </div>--}}
                            
                            <x-home-tags :type-id="1" />

                            <div style="">
                                <p class="custom-desc" style="margin-bottom: 0;">Share your application, target output, and cabinet constraints. we’ll suggest the best model + enclosure direction.</p>
                                <br>
                                 <a href="https://www.swetonspeakers.com/product-enquiry" class="custom-btn custom-btn-outline"
                                    style="align-self: flex-start; margin-left: 0; margin-bottom: 0;">Send Product
                                    Enquiry
                                </a>
                            </div>
                            <!--<h3 class="card-bottom-title">We’ll suggest the right model</h3>-->
                            <!--<p class="custom-desc">Share your application, target output, and cabinet constraints. We’ll-->
                            <!--    recommend a model and direction.</p>-->

                            <!--<div class="custom-pill-row" style="margin-top: 0; margin-bottom: 25px;">-->
                            <!--    <span class="custom-pill">Subwoofer</span>-->
                            <!--    <span class="custom-pill">Mid-bass</span>-->
                            <!--    <span class="custom-pill">Midrange</span>-->
                            <!--</div>-->

                            <!--<div style="display: flex; gap: 10px; flex-wrap: wrap;">-->
                               

                            <!--</div>-->

                        </div>
                    </div>

                    <!-- Bottom Right Card -->
                    <!--<div class="col-lg-6">-->
                    <!--    <div class="custom-spec-card">-->
                    <!--        <span class="custom-text-gold">● Home Audio Drivers</span>-->
                    <!--        <h3 class="card-bottom-title">Hi-Fi • DIY • Installation</h3>-->
                    <!--        <p class="custom-desc">Balanced sound reproduction designed for controlled indoor listening-->
                    <!--            and custom builds.</p>-->

                    <!--        <div class="custom-pill-row" style="margin-top: 0; margin-bottom: 25px;">-->
                    <!--            <span class="custom-pill">Hi-Fi</span>-->
                    <!--            <span class="custom-pill">DIY</span>-->
                    <!--            <span class="custom-pill">Install</span>-->
                    <!--        </div>-->

                    <!--        <div style="display: flex; gap: 10px; flex-wrap: wrap;">-->
                    <!--            <a href="products.html" class="custom-btn custom-btn-outline"-->
                    <!--                style="align-self: flex-start; margin-left: 0; margin-bottom: 0;">View Home Audio-->
                    <!--                Range</a>-->
                               
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->


                </div>
            </div>
        </section>

        <!--Experience One Start-->
        <!--<section class="experience-one" id="aboutpage">-->
        <!--    <div class="experience-one-shape-1 shapeMover"-->
        <!--        style="background-image: url('{{ asset("public_assets/images/experience-one-shape-1.webp") }}')"></div>-->
        <!--    <div class="container">-->
        <!--        <div class="section-title text-center">-->
        <!--            <span class="section-title__tagline">About Experience</span>-->
        <!--            <h2 class="section-title__title desk-view" style="color:#fff">Celebrating <span class="color-red">43 years</span> of customar satisfaction and trust-->
        <!--            </h2>-->
        <!--        </div>-->
        <!--        <div class="row">-->
                    <!--Experience One Single Start-->
        <!--            <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="100ms">-->
        <!--                <div class="experience-one__single">-->
        <!--                    <div class="experience-one__icon">-->
        <!--                        <span class="icon-service"></span>-->
        <!--                    </div>-->
        <!--                    <div class="experience-one__content">-->
        <!--                        <h3 class="experience-one__title"><a href="#">Symbolises Elegance</a>-->
        <!--                        </h3>-->
        <!--                        <p class="experience-one__text">SWETON symbolises elegance, style and superior craftsmanship where each and every product is finest in technical superiority and aesthetic sophistication. </p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
                    <!--Experience One Single End-->
                    <!--Experience One Single Start-->
        <!--            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">-->
        <!--                <div class="experience-one__single">-->
        <!--                    <div class="experience-one__icon">-->
        <!--                        <span class="icon-management"></span>-->
        <!--                    </div>-->
        <!--                    <div class="experience-one__content">-->
        <!--                        <h3 class="experience-one__title"><a href="team.html">Regular Upgradation</a></h3>-->
        <!--                        <p class="experience-one__text">SWETON believes in regular upgradation and development and a dedicated R&D Team works continuously with most precision software and equipment.</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
                    <!--Experience One Single End-->
                    <!--Experience One Single Start-->
        <!--            <div class="col-xl-4 col-lg-4 wow fadeInRight" data-wow-delay="300ms">-->
        <!--                <div class="experience-one__single">-->
        <!--                    <div class="experience-one__icon">-->
        <!--                        <span class="icon-headphones"></span>-->
        <!--                    </div>-->
        <!--                    <div class="experience-one__content">-->
        <!--                        <h3 class="experience-one__title"><a href="contact.html">In-house Product Range</a></h3>-->
        <!--                        <p class="experience-one__text">SWETON – Among the very few Indian Brands having an in-house product range of more than forty varities of precision transducers for Professional sound industries.</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
                    <!--Experience One Single End-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
        <!--Experience One End-->
        
        <!--Product Showcase Section Start-->
        <section class="product-showcase-section">
            <div class="container">
                <div class="section-header-flex">
                    <div class="section-header-left">
                        <div class="section-tagline">Trusted by rental operators across India</div>
                        <h2 class="section-title-main">Featured models</h2>
                        <p class="section-description">High-Output Subwoofer • Compact Mid-Bass • World-Focused
                            Midrange</p>
                    </div>
                    <div class="section-header-right">
                        <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker" class="btn-download-brochure">
                            <i class="fas fa-arrow-right"></i>
                            View all products
                        </a>
                    </div>
                </div>
                
                
                 <!-- Featured Models Slider -->
                <div class="featured-models-slider-wrap">
                   

                    <div class="owl-carousel featured-models-carousel owl-theme">
                       

                            <!-- Slide 1 -->
                            <div class="item">
                                <div class="product-card">
                            <div class="product-image">
                                <!--<span class="product-badge">The ultimate Sub Woofer</span>-->
                                <img src="{{ asset('public_assets/images/pro/2500.webp') }}" alt="21 PT 2500 SUB">
                            </div>
                            <div class="product-content">
                                <div class="product-category">● High-Output Subwoofer</div>
                                <h3 class="product-title">21 PT 2500 SUB</h3>
                                <div class="product-specs">
                                    <div class="spec-item">
                                        <div class="spec-label">Power</div>
                                        <div class="spec-value">5000 W</div>
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-label">Response</div>
                                        <div class="spec-value">43-500 Hz</div>
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-label">Voice Coil</div>
                                        <div class="spec-value">152 mm</div>
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-label">Sensitivity 1W/1M</div>
                                        <div class="spec-value">95 dB</div>
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker/pt-series/21-pt-2500-sub" class="btn-details">View details</a>
                                    <a href="https://www.swetonspeakers.com/product-enquiry" class="btn-dealership">Enquiry</a>
                                </div>
                            </div>
                        </div>
                            </div>

                            <!-- Slide 2 -->
                        <!--    <div class="item">-->
                        <!--        <div class="product-card">-->
                        <!--    <div class="product-image">-->
                                <!--<span class="product-badge">Transducer for outdoor</span>-->
                        <!--        <img src="{{ asset('public_assets/images/pro/2000.webp') }}" alt="21 PT 2000 SUB">-->
                        <!--    </div>-->
                        <!--    <div class="product-content">-->
                        <!--        <div class="product-category">● Excellent transducer for outdoor</div>-->
                        <!--        <h3 class="product-title">21 PT 2000 SUB</h3>-->
                        <!--        <div class="product-specs">-->
                        <!--            <div class="spec-item">-->
                        <!--                <div class="spec-label">Power</div>-->
                        <!--                <div class="spec-value">4000 W</div>-->
                        <!--            </div>-->
                        <!--            <div class="spec-item">-->
                        <!--                <div class="spec-label">Response</div>-->
                        <!--                <div class="spec-value">35-500 Hz</div>-->
                        <!--            </div>-->
                        <!--            <div class="spec-item">-->
                        <!--                <div class="spec-label">Voice Coil</div>-->
                        <!--                <div class="spec-value">140 mm</div>-->
                        <!--            </div>-->
                        <!--            <div class="spec-item">-->
                        <!--                <div class="spec-label">Sensitivity 1W/1M</div>-->
                        <!--                <div class="spec-value">95 dB</div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="product-footer">-->
                        <!--            <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker/pt-series/21-pt-2000-sub" class="btn-details">View details</a>-->
                        <!--            <a href="https://www.swetonspeakers.com/product-enquiry" class="btn-dealership">Enquiry</a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--    </div>-->

                            <!-- Slide 3 -->
                             <div class="item">
                                <div class="product-card">
                            <div class="product-image">
                                <!--<span class="product-badge">Mid-bass loudspeaker</span>-->
                                <img src="{{ asset('public_assets/images/pro/1500.webp') }}" alt="15 PT 1500 MB">
                            </div>
                            <div class="product-content">
                                <div class="product-category">● Deliver impactful punch</div>
                                <h3 class="product-title">15 PT 1500 MB</h3>
                                <div class="product-specs">
                                    <div class="spec-item">
                                        <div class="spec-label">Power (AES)</div>
                                        <div class="spec-value">3000 W</div>
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-label">Response</div>
                                        <div class="spec-value">45-4500 Hz</div>
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-label">Voice Coil</div>
                                        <div class="spec-value">114 mm</div>
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-label">Sensitivity 1W/1M</div>
                                        <div class="spec-value">92 dB</div>
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker/pt-series/15-pt-1500-mb" class="btn-details">View details</a>
                                    <a href="https://www.swetonspeakers.com/product-enquiry" class="btn-dealership">Enquiry</a>
                                </div>
                            </div>
                        </div>
                            </div>

                            <!-- Slide 4 -->
                             <div class="item">
                                <div class="product-card">
                            <div class="product-image">
                                <!--<span class="product-badge">Massive power handling</span>-->
                                <img src="{{ asset('public_assets/images/pro/2160.webp') }}" alt="21 KL 2160 SUB">
                            </div>
                            <div class="product-content">
                                <div class="product-category">● The most powerful Sub Woofer</div>
                                <h3 class="product-title">21 KL 2160 SUB</h3>
                                <div class="product-specs">
                                    <div class="spec-item">
                                        <div class="spec-label">Power</div>
                                        <div class="spec-value">6000 W</div>
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-label">Response</div>
                                        <div class="spec-value">40-1000 Hz</div>
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-label">Voice Coil</div>
                                        <div class="spec-value">152 mm</div>
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-label">Sensitivity 1W/1M</div>
                                        <div class="spec-value">95 dB</div>
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker/kl-series/21-kl-2160-sub" class="btn-details">View details</a>
                                    <a href="https://www.swetonspeakers.com/product-enquiry" class="btn-dealership">Enquiry</a>
                                </div>
                            </div>
                        </div>
                            </div>

                            <!-- Slide 5 -->
                           <div class="item">
                                <div class="product-card">
                            <div class="product-image">
                                <!--<span class="product-badge">The ultimate 18” Subwoofer</span>-->
                                <img src="{{ asset('public_assets/images/pro/1860.webp') }}" alt="18 KL 1860 SUB">
                            </div>
                            <div class="product-content">
                                <div class="product-category">● Excellent transducer for outdoor</div>
                                <h3 class="product-title">18 KL 1860 SUB</h3>
                                <div class="product-specs">
                                    <div class="spec-item">
                                        <div class="spec-label">Power</div>
                                        <div class="spec-value">5000 W</div>
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-label">Response</div>
                                        <div class="spec-value">50-2000 Hz</div>
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-label">Voice Coil</div>
                                        <div class="spec-value">152 mm</div>
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-label">Sensitivity 1W/1M</div>
                                        <div class="spec-value">94 dB</div>
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker/kl-series/18-kl-1860-sub" class="btn-details">View details</a>
                                    <a href="https://www.swetonspeakers.com/product-enquiry" class="btn-dealership">Enquiry</a>
                                </div>
                            </div>
                        </div>
                            </div>

                            <!-- Slide 6 -->
                            <div class="item">
                                <div class="product-card">
                            <div class="product-image">
                                <!--<span class="product-badge">Powerful magnet motor system</span>-->
                                <img src="{{ asset('public_assets/images/pro/1845.webp') }}" alt="18 KL 1845 SUB">
                            </div>
                            <div class="product-content">
                                <div class="product-category">● Reproduce low frequency</div>
                                <h3 class="product-title">18 KL 1845 SUB</h3>
                                <div class="product-specs">
                                    <div class="spec-item">
                                        <div class="spec-label">Power</div>
                                        <div class="spec-value">3600 W</div>
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-label">Response</div>
                                        <div class="spec-value">35-1200 Hz</div>
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-label">Voice Coil</div>
                                        <div class="spec-value">94 mm</div>
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-label">Sensitivity 1W/1M</div>
                                        <div class="spec-value">94 dB</div>
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker/kl-series/18-kl-1845-sub" class="btn-details">View details</a>
                                    <a href="https://www.swetonspeakers.com/product-enquiry" class="btn-dealership">Enquiry</a>
                                </div>
                            </div>
                        </div>
                            </div>

                        
                        
                    </div><!-- /.swiper -->
                </div><!-- /.featured-models-slider-wrap -->
                
          

                
            </div>
        </section>
        <!--Product Showcase Section End-->

       
          <!--<x-featured-products></x-featured-products>-->

         <x-featured-category type="pro-loudspeaker"></x-featured-category>

        <!--Contact Two Start-->
        <!--<section class="contact-two">-->
        <!--    <div class="contact-two-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"-->
        <!--        style="background-image: url('{{ asset("public_assets/images/contact-one-bg.webp") }}')"></div>-->
        <!--    <div class="container">-->
        <!--        <div class="contact-two__inner">-->
        <!--            <div class="section-title section-title--two text-center">-->
        <!--                <span class="section-title__tagline"> <img style="width: 160px;" src="{{ asset('public_assets/images/resources/logonew.png') }}"></span>-->
        <!--                <h2 class="section-title__title">Inspire. Innovate. Entertain.</h2>-->
        <!--                <p class=" section-title__text">The horizon where four decades of experience meet futuristic ideas.</p>-->
        <!--                <p style="padding-top: 2px;" class=" section-title__text">Established in the year 1982. Sweton is one of the pioneer brand of India recognized as the market leader in India.</p>-->
        <!--            </div>-->
        <!--            <div class="contact-two__details-box">-->
        <!--                <ul class="list-unstyled contact-two__details">-->
        <!--                    <li>-->
        <!--                        <div class="icon">-->
        <!--                            <span class="fa fa-envelope"></span>-->
        <!--                        </div>-->
        <!--                        <div class="content">-->
        <!--                            <span>Send us an email</span>-->
        <!--                            <p><a href="mailto:sales@swetonspeakers.com">sales@swetonspeakers.com</a></p>-->
        <!--                        </div>-->
        <!--                    </li>-->
        <!--                    <li>-->
        <!--                        <div class="icon">-->
        <!--                            <span class="fab fa-whatsapp"></span>-->
                                   
        <!--                        </div>-->
        <!--                        <div class="content">-->
        <!--                            <span>Whatsapp</span>-->
        <!--                            <p><a href="https://api.whatsapp.com/send?phone=917044411800">+91 7044411800</a></p>-->
        <!--                        </div>-->
        <!--                    </li>-->
        <!--                </ul>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
        <!--Contact Two  End-->

        <section class="custom-spec-section" style="background: linear-gradient(-45deg, #000000 0%, #4a0f0f 100%);">
            

            <div class="container">
                <!-- Bottom Cards Row -->
                <div class="row">
                    <!-- Bottom Left Card -->
                    

                     
                    <div class="col-lg-12">
                        <div class="custom-spec-card fst-pbg1">
                            <span class="custom-text-gold">● Home Audio Drivers</span>
                            <h3 class="card-bottom-title">Woofer • Full Range • Subwoofer • Tweeter • Satellite</h3>
                            <p class="custom-desc">Balanced sound reproduction designed for controlled indoor listening
                                and custom builds.</p>

                            <div class="custom-pill-row" style="margin-top: 0; margin-bottom: 25px;">
                                <a href="https://shop.swetonspeakers.com/home-loudspeaker/woofer-series" class="custom-pill">Woofer Series</a>
                                <a href="https://shop.swetonspeakers.com/home-loudspeaker/full-range-speaker-series" class="custom-pill">Full Range Speakers</a>
                                <a href="https://shop.swetonspeakers.com/home-loudspeaker/subwoofer-series" class="custom-pill">Subwoofer Series</a>
                                <a href="https://shop.swetonspeakers.com/home-loudspeaker/tweeter-series" class="custom-pill">Tweeter Series</a>
                                <a href="https://www.swetonspeakers.com/speaker/home-loudspeaker/speaker-series" class="custom-pill">Speaker Series</a>
                                <a href="https://shop.swetonspeakers.com/home-loudspeaker/satellite-series" class="custom-pill">Satellite Series</a>
                                <a href="https://shop.swetonspeakers.com/home-loudspeaker/dividing-cross-over-network" class="custom-pill">Dividing Cross Over Network</a>
                                 <a href="https://www.swetonspeakers.com/speaker/home-loudspeaker/car-speaker-series" class="custom-pill">Car Speaker Series</a>
                                 <!--<a href="https://www.swetonspeakers.com/speaker/home-loudspeaker" class="custom-btn-primary custom-pill" style="background-color: #cf1f1f;">Home Audio Drivers</a>-->
                                <x-home-tags :type-id="2" />
                            </div>
                            
                            

                            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                                <a href="https://shop.swetonspeakers.com/" class="custom-btn custom-btn-outline"
                                    style="align-self: flex-start; margin-left: 0; margin-bottom: 0;">Buy Online
                                    </a>
                               
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

        <x-featured-category type="home-loudspeaker"></x-featured-category>




        <!--About One Start-->
        <section class="about-one">
            <div class="about-one__bg float-bob-y"
                style="background-image: url('{{ asset("public_assets/images/backgrounds/about-one-bg-img-1.jpg") }}')">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-one__left">
                            <div class="about-one__img wow slideInLeft" data-wow-delay="100ms"
                                data-wow-duration="2500ms">
                                <img src="{{ asset('public_assets/images/about-1-1.webp') }}" alt="">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-one__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">OUR INTRODUCTION</span>
                                <h2 style="font-size: 30px;" class="section-title__title">Welcome to the world of <img style="width: 160px;" src="{{ asset('public_assets/images/resources/logonew1.png') }}"></h2>
                            </div>
                            <h3>Among the very few Indian Brands</h3>
                            <p class="about-one__right-text-1">SWETON – Among the very few Indian Brands having an in-house product range of more than forty varieties of precision transducers for Professional sound industries. Also, more than forty varieties of transduces for Home Series. Probably, the only manufacturer in India cater to both Pro and Home series.</p>
                            <ul class="about-one__points list-unstyled">
                                <li>
                                    <div class="about-one__points-single">
                                        <div class="about-one__points-icon">
                                            <span class="icon-repair"></span>
                                        </div>
                                        <div class="about-one__points-text">
                                            <h3 class="about-one__points-title"><a href="{{ url('about-us') }}">About Us</a></h3>
                                            <p class="about-one__points-subtitle">Read more ...</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="about-one__points-single">
                                        <div class="about-one__points-icon">
                                            <span class="icon-phone"></span>
                                        </div>
                                        <div class="about-one__points-text">
                                            <h3 class="about-one__points-title"><a href="{{ route('public.blogs') }}">Our Blogs &amp; Events</a></h3>
                                            <p class="about-one__points-subtitle">Read more ...</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <a href="{{ url('contact-us') }}" class="thm-btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About One End-->




        <!--Counter One Start-->
        <section class="counter-one">
            <div class="counter-one__bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url('{{ asset("public_assets/images/contact-one-bg.webp") }}')"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="counter-one__list list-unstyled">
                            <li class="counter-one__single">
                                <h3 class="odometer" data-count="44">00</h3>
                                <span class="counter-one__plus">+</span>
                                <p class="counter-one__text">Glorious Years</p>
                            </li>
                            <li class="counter-one__single">
                                <h3 class="odometer" data-count="1">00</h3>
                                <span class="counter-one__plus">Cr+</span>
                                <p class="counter-one__text">Happy Customers</p>
                            </li>
                            <li class="counter-one__single">
                                <h3 class="odometer" data-count="80">00</h3>
                                <span class="counter-one__plus">+</span>
                                <p class="counter-one__text">Products</p>
                            </li>
                            <li class="counter-one__single">
                                <h3 class="odometer" data-count="100">00</h3>
                                <span class="counter-one__plus">%</span>
                                <p class="counter-one__text">Satisfactions</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Counter One End-->
        
       <!--Testimonial two Start-->
        <section class="testimonal-two">
            <div class="container">
                <div class="section-title section-title--two text-center">
                    <span class="section-title__tagline">TESTIMONIAL</span>
                    <h2 class="section-title__title">Our Customers Review</h2>
                    <!--<p class=" section-title__text">Duis aute irure dolor in repreh enderit in volup -->
                    <!--    tate velit esse-->
                    <!--    cillum dolore <br> eu fugiat nulla dolor atur with Lorem ipsum is simply </p>-->
                </div>
                <div class="testimonial-two__carousel owl-carousel owl-theme thm-owl__carousel" data-owl-options='{
                    "loop": true,
                    "autoplay": true,
                    "margin": 30,
                    "nav": false,
                    "dots": true,
                    "smartSpeed": 500,
                    "autoplayTimeout": 10000,
                    "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow1\"></span>"],
                    "responsive": {
                        "0": {
                            "items": 1
                        },
                        "768": {
                            "items": 2
                        },
                        "992": {
                            "items": 2
                        },
                        "1200": {
                            "items": 2
                        }
                    }
                }'>
                    <!--Testimonial two Single Start-->
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <div id="section" class="testimonial-two__text">
                                    <div class="article">
                                    <p class="testimonial-two__text">Yesterday I received the courier. As expected all the speakers were of good quality.well packed and all items are as same as I seen in your website.
                                </p>
                                 <p class="moretext">
                                      your effort in make in india must be appreciated.i will test my speakers accordingly to choose the proper drivers for my purpose. There after I willtake each one in large no. ths will happen  in a week.once again I thank you for making me take the first step for make in india.
                                    </p>
                                    </div>
                                <a class="moreless-button">Read more</a>
                                </div>
                                
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/testimonial/testimonial-2-1.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">Varun mohan, </h3>
                                        <p class="testimonial-two__client-title">Kerala</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial two Single End-->
                    <!--Testimonial two Single Start-->
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">As we are nearing our 40 years of Service to our nation, we decided to hear from our very old dealer partners about their experience of Sweton.
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">Subal Mallik</h3>
                                        <p class="testimonial-two__client-title">Dhanbad</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial two Single End-->
                    <!--Testimonial two Single Start-->
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">As we are nearing our 40 years of Service to our nation, we decided to hear from our very old dealer partners about their experience of Sweton.
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">Atish Singh</h3>
                                        <p class="testimonial-two__client-title">Odisha</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial two Single End-->
                    <!--Testimonial two Single Start-->
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">Great website built-up. Hassle free user experience. Really appreciated !!!
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/testimonial/testimonial-2-2.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">Asim Saha</h3>
                                        <p class="testimonial-two__client-title">Kolkata</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial two Single End-->
                     <!--Testimonial two Single Start-->
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">Nice build quality... Got in time, Sound quality is awosme n bass is insane... Thanks for the delivery sir.... I'll write review soon
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Sumit Nawani</h3>
                                        <p class="testimonial-two__client-title">Uttarakhand</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial two Single End-->
                    
                     <!--Testimonial two Single Start-->
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">Yesterday I received the courier. As expected all the speakers were of good quality.well packed and all items are as same as I seen in your website.your effort in make in india must be appreciated.i will test my speakers accordingly to choose the proper drivers for my purpose. There after I willtake each one in large no. ths will happen  in a week.once again I thank you for making me take the first step for make in india.
Mont eve audios
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Varun mohan</h3>
                                        <p class="testimonial-two__client-title">Kerala</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial two Single End-->

                   <!--Testimonial two Single Start-->
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">Good product. Value for money. Trustable indian brand
Mont eve audios
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Biju Ayroor</h3>
                                        <p class="testimonial-two__client-title">Thankappan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">Recd. The speakers. Thank you sir. Impressed with your service
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Krishnamurthy</h3>
                                        <p class="testimonial-two__client-title">Dwarka, New Delhi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">I have purchased the Home Series products from Sweton (100-watt tweeters, 12dB crossover, 150-watt dual-magnet woofers, and a 12-inch subwoofer). After using these products for many days, I truly feel that no other company can match Sweton in terms of quality and price. I experienced the sound myself, and I got exactly the clear and powerful sound I wanted.
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Shivam kumar prajapati</h3>
                                        <p class="testimonial-two__client-title">India</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">For last 2 yrs, i have been using Sweton's drivers like, Full range speakers, woofers and subwoofers.
So, according to me, sweton's products are amazing! really amazing! . 
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Partha Sarathi Manna</h3>
                                        <p class="testimonial-two__client-title">India</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">I know sweton for almost 20-25 years . Excellent quality and best price.. I have purchased multiple speakers all are very good quality 
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Vikash Kumar</h3>
                                        <p class="testimonial-two__client-title">India</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">I am fan of sweton speaker since my childhood almost for 25 year I know about the sweton speaker.. Currently I am in bangalore and I know there are more than thousands of speaker manufacture  company in india.. but I believe the quality of sweton speaker is best among in all these.  
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Bikash Kumar</h3>
                                        <p class="testimonial-two__client-title">India</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">mind blowing heavy bass punch 10''inch 100watt woofer.  
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Prince Raj</h3>
                                        <p class="testimonial-two__client-title">India</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">In this price range ...very very nice products. All speakers  quality is fabulous , awesome bass in subwoofer . A big thank to Sweton ❤️  
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Somnath Chatterjee</h3>
                                        <p class="testimonial-two__client-title">Kolkata</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">Very good woofers and tweeters i give 🌟🌟🌟🌟🌟 
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- PARTHO BHATTACHARYA</h3>
                                        <p class="testimonial-two__client-title">Kolkata</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">Excellent quality product and sound quality compair to same as other forigen brand  and resoblnable price
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Diptiman Mohanty</h3>
                                        <p class="testimonial-two__client-title">Kolkata</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">Good budget friendly price I am happy 15 inches speakers
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Somnath Mondal</h3>
                                        <p class="testimonial-two__client-title">Kolkata</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="item">
                        <div class="testimonial-two__sinlge">
                            <div class="testimonial-two__sinlge-inner">
                                <div class="testimonial-two__quote">
                                    <span class="icon-quote"></span>
                                </div>
                                <p class="testimonial-two__text">🔊Nice products 👍🏻 love SWETON products 🙃🙂 {KOLKATA _UX1_MUMBAI} …
                                </p>
                                <div class="testimonial-two__info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('public_assets/images/resources/user.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__content">
                                        <h3 class="testimonial-two__client-name">- Ujjwal Biswas</h3>
                                        <p class="testimonial-two__client-title">Kolkata</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!--Testimonial two End-->
 <!--Testimonial two Single Start-->
                   
                </div>
            </div>
        </section>
        <!--Testimonial two End-->

       


        <!--Blog Two Start-->
        <x-home-blog></x-home-blog>
        <!--Blog Two End-->	
        
        
       
        
        
        
        <!--Real World Use Section Start-->
        <section class="real-world-section">
            <div class="container">
                <div class="section-header-flex" style="margin-bottom: 30px;">
                    <div class="section-header-left">
                        <h2 class="section-title-main">Sweton in real-world use</h2>
                        <p class="section-description">See our speakers in action across different scenarios.</p>
                    </div>
                    <div class="section-header-right">
                        <a target="_blank" href="https://www.youtube.com/@SwetonSpeakers" class="btn-view-all">View all videos</a>
                    </div>
                </div>

                <!-- Custom Tabs -->
                <ul class="custom-video-tabs">
                    <li class="tab-item"><button class="tab-btn active" onclick="openVideoTab(event, 'demos')">Demos</button>
                    </li>
                    <li class="tab-item"><button class="tab-btn"
                            onclick="openVideoTab(event, 'knowledge')">Knowledge Sharing</button></li>
                    <li class="tab-item"><button class="tab-btn" onclick="openVideoTab(event, 'reviews')">Reviews</button>
                    </li>
                </ul>

                <!-- Testing Tab Content -->
                <div id="demos" class="video-tab-content" style="display: block; opacity: 1;">
                    <div class="row">
                        <!-- Card 1 -->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="100ms">
                            <div class="video-card">
                                <a target="_blank" href="https://www.youtube.com/watch?v=wenGozQ7lCE" target="_blank"
                                    class="video-thumbnail">
                                    <img src="{{ asset('public_assets/images/resources/screen.jpg') }}" alt="Roadshow Power Test" style="width: 100%;">
                                    <div class="play-button">
                                        <i class="fas fa-play"></i>
                                    </div>
                                </a>
                                <div class="video-content">
                                    <h3 class="video-title">DJ Line Array Setup India</h3>
                                    <p class="video-description">Sweton 12 PT 400 LA & CD 240 NEO Hindi Review</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="200ms">
                            <div class="video-card">
                                <a target="_blank" href="https://www.youtube.com/watch?v=3_laYbqnzlA" target="_blank"
                                    class="video-thumbnail">
                                    <img src="{{ asset('public_assets/images/resources/screen1.jpg') }}" alt="Dual Bass Impact" style="width: 100%;">
                                    <div class="play-button">
                                        <i class="fas fa-play"></i>
                                    </div>
                                </a>
                                <div class="video-content">
                                    <h3 class="video-title">18 KL 1860 SUB Review</h3>
                                    <p class="video-description">Kya 6-Inch Coil Wala Yeh Bass Monster Hai? | HPF vs
                                        Flat
                                        AUX Test</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="300ms">
                            <div class="video-card">
                                <a target="_blank" href="https://www.youtube.com/watch?v=2Ye2mJov3Ts" target="_blank"
                                    class="video-thumbnail">
                                    <img src="{{ asset('public_assets/images/resources/screen2.jpg') }}" alt="Live Event Setup" style="width: 100%;">
                                    <div class="play-button">
                                        <i class="fas fa-play"></i>
                                    </div>
                                </a>
                                <div class="video-content">
                                    <h3 class="video-title">2000W ka Beast! SWETON 18KL1851 SUB</h3>
                                    <p class="video-description"> Punch Aur Vibration Ka King</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Demos Tab Content -->
                <div id="knowledge" class="video-tab-content" style="display: none; opacity: 0;">
                    <div class="row">
                        <!-- Card 1 -->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="100ms">
                            <div class="video-card">
                                <a target="_blank" href="https://www.youtube.com/watch?v=dwSgE7tgvd4&list=PL3P3HufuqiYRdNFHw8fiDW-kg9Iggy02S&index=9" target="_blank" class="video-thumbnail">
                                    <img src="{{ asset('public_assets/images/screen11a.jpg') }}" alt="Mid Bass Demo" style="width: 100%;">
                                    <div class="play-button">
                                        <i class="fas fa-play"></i>
                                    </div>
                                </a>
                                <div class="video-content">
                                    <h3 class="video-title">PA/HOME LOUDSPEAKER MEIN AES/RMS POWER</h3>
                                    <p class="video-description">BHAI BHAI- PART II</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="200ms">
                            <div class="video-card">
                                <a target="_blank" href="https://www.youtube.com/watch?v=PdeIRPRIt80&list=PL3P3HufuqiYRdNFHw8fiDW-kg9Iggy02S&index=11" target="_blank" class="video-thumbnail">
                                    <img src="{{ asset('public_assets/images/screen33a.jpg') }}" alt="Line Array Demo" style="width: 100%;">
                                    <div class="play-button">
                                        <i class="fas fa-play"></i>
                                    </div>
                                </a>
                                <div class="video-content">
                                    <h3 class="video-title">Ferrite vs Neodymium Magnet</h3>
                                    <p class="video-description">DJ Loudspeaker Ke Liye kya hai better?</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="300ms">
                            <div class="video-card">
                                <a target="_blank" href="https://www.youtube.com/watch?v=XGQKRhaojDk&list=PL3P3HufuqiYRdNFHw8fiDW-kg9Iggy02S&index=16" target="_blank" class="video-thumbnail">
                                    <img src="{{ asset('public_assets/images/screen22a.jpg') }}" alt="Amplifier Matching Demo"
                                        style="width: 100%;">
                                    <div class="play-button">
                                        <i class="fas fa-play"></i>
                                    </div>
                                </a>
                                <div class="video-content">
                                    <h3 class="video-title">DJ Loudspeaker Cabinet</h3>
                                    <p class="video-description">Sealed or Vented/Ported Cabinet- PART-1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Events Tab Content -->
                <div id="reviews" class="video-tab-content" style="display: none; opacity: 0;">
                    <div class="row">
                        <!-- Card 1 -->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="100ms">
                            <div class="video-card">
                                <a target="_blank" href="https://www.youtube.com/watch?v=vNDbe0W1q7o&list=PL3P3HufuqiYTu9bPWph6OaDZNv7soaeZ6&index=9" target="_blank" class="video-thumbnail">
                                    <img src="{{ asset('public_assets/images/screen11b.jpg') }}" alt="Kolkata Festival" style="width: 100%;">
                                    <div class="play-button">
                                        <i class="fas fa-play"></i>
                                    </div>
                                </a>
                                <div class="video-content">
                                    <h3 class="video-title">@SwetonSpeakers 1500 SUB-TESTING in TWO DJ CABINETS</h3>
                                    <p class="video-description">What Happens Next is CRAZY
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="200ms">
                            <div class="video-card">
                                <a target="_blank" href="https://www.youtube.com/watch?v=appt8fMueYo&list=PL3P3HufuqiYTu9bPWph6OaDZNv7soaeZ6&index=10" target="_blank" class="video-thumbnail">
                                    <img src="{{ asset('public_assets/images/screen22b.jpg') }}" alt="Wedding Setup" style="width: 100%;">
                                    <div class="play-button">
                                        <i class="fas fa-play"></i>
                                    </div>
                                </a>
                                <div class="video-content">
                                    <h3 class="video-title">18KL1850 SUB ka dhamakedar review</h3>
                                    <p class="video-description">DJ, Sound Hirers ke liye best hai?
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="300ms">
                            <div class="video-card">
                                <a target="_blank" href="https://www.youtube.com/watch?v=7Ejnae4zxkA&list=PL3P3HufuqiYTu9bPWph6OaDZNv7soaeZ6&index=13" target="_blank" class="video-thumbnail">
                                    <img src="{{ asset('public_assets/images/screen33b.jpg') }}" alt="Dealer Convention" style="width: 100%;">
                                    <div class="play-button">
                                        <i class="fas fa-play"></i>
                                    </div>
                                </a>
                                <div class="video-content">
                                    <h3 class="video-title">Sweton 10” 120WT Woofer Full Test</h3>
                                    <p class="video-description">Pure Woofer, 6dB & 12dB Network Sound Demo ‪@SwetonSpeakers‬</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function openVideoTab(evt, tabName) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("video-tab-content");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                            tabcontent[i].style.opacity = "0";
                        }
                        tablinks = document.getElementsByClassName("tab-btn");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                        }
                        document.getElementById(tabName).style.display = "block";
                        setTimeout(() => { document.getElementById(tabName).style.opacity = "1"; }, 10);
                        evt.currentTarget.className += " active";
                    }
                </script>
            </div>
        </section>
        <!--Real World Use Section End-->
        
        <section class="dealer-banner-section">
            <div class="container">
                <div class="dealer-banner">
                    <div class="dealer-content">
                        <h2 class="dealer-title">Become a Sweton dealer</h2>
                        <p class="dealer-text">Join a growing network supplying reliable sound solutions across India.
                            We review applications within 24–48 hours.</p>
                    </div>
                    <div class="dealer-actions">
                        <a href="https://www.swetonspeakers.com/application-for-dealership" class="btn-apply">Apply for Dealership</a>
                        <a href="https://www.swetonspeakers.com/contact-us" class="btn-sales">Talk to Sales</a>
                    </div>
                </div>
            </div>
        </section>
        
        <a href="https://wa.me/917044411800" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp whatsapp-icon"></i>
    </a>
</x-frontend_layout>
