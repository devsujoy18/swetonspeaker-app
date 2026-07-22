<x-frontend_layout>
    <style>
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
        .blog-sidebar__img {
    margin-bottom: 0.5em;
}
.vd-h{
   font-size: 15px;
    color: #fff;
    padding: 5px;
    text-align: center;
}
.conlist, .video-blk .blog-sidebar__img-box {
    margin-bottom: 1em;
}
.vd-mr{
   margin-bottom: 20px;
    background: #000;
    border-radius: 10px;
    padding-bottom: 14px;
}
    </style>
       <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url({{ asset('public_assets/images/backgrounds/page-header-bg.jpg') }})">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Videos</h2>
                   
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><span>//</span></li>
                        <li>Videos</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

       <!--About Two Start-->
        <section class="about-two about-page video-blk">
            <div class="container">
                <!-- Custom Tabs -->
                <ul class="custom-video-tabs">
                    <li class="tab-item"><button class="tab-btn active"
                            onclick="openVideoTab(event, 'knowledge-sharing')">Knowledge Sharing</button></li>
                    <li class="tab-item"><button class="tab-btn" onclick="openVideoTab(event, 'demo')">Demo</button>
                    </li>
                    <li class="tab-item"><button class="tab-btn"
                            onclick="openVideoTab(event, 'testimonials')">Testimonials</button>
                    </li>
                    <li class="tab-item"><button class="tab-btn"
                            onclick="openVideoTab(event, 'reviews')">Reviews</button>
                    </li>
                     <li class="tab-item"><button class="tab-btn"
                            onclick="openVideoTab(event, 'shorts')">Shorts</button>
                    </li>
                    <li class="tab-item"><button class="tab-btn"
                            onclick="openVideoTab(event, 'reels')">Reels</button>
                    </li>
                   
                </ul>

                <!-- Knowledge Sharing Tab Content -->
                <div id="knowledge-sharing" class="video-tab-content" style="display: block; opacity: 1;">
                    <div class="row">
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/dmDreJ7HcKI/hqdefault.jpg"
                                            alt="स्पीकर ख़रीदा 8 ओहम्स का पर निकला सिर्फ़ 5.2 ओहम्स…कैसे????">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=dmDreJ7HcKI" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">स्पीकर ख़रीदा 8 ओहम्स का पर निकला सिर्फ़ 5.2 ओहम्स…कैसे????</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/tQzIiheE46A/hqdefault.jpg"
                                            alt="What is Loudspeaker Break In?">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=tQzIiheE46A" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                    
                                </div>
                                <h2 class="vd-h">What is Loudspeaker Break In?</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/Kxm0TFRz9bg/hqdefault.jpg"
                                            alt="Speaker ki duniya mein Jitna Positive utna hi Negative">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=Kxm0TFRz9bg" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Speaker ki duniya mein Jitna Positive utna hi Negative</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/L27QNsRg2lc/hqdefault.jpg"
                                            alt="Speaker ki duniya mein Jitna Positive utna hi Negative #speaker #speakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=L27QNsRg2lc" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Speaker ki duniya mein Jitna Positive utna hi Negative</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/WP9dbuD7EF0/hqdefault.jpg"
                                            alt="Now buying a speaker has become easy..Know how??">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=WP9dbuD7EF0" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Now buying a speaker has become easy..Know how??</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/6G517k8tZEU/hqdefault.jpg"
                                            alt="AES /RMS bhai bhai…PART - I">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=6G517k8tZEU" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">AES /RMS bhai bhai…PART - I</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/TgVwoAiZb74/hqdefault.jpg"
                                            alt="AES /RMS bhai bhai…PART - I">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=TgVwoAiZb74" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">AES /RMS bhai bhai…PART - I</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/dwSgE7tgvd4/hqdefault.jpg"
                                            alt="PA/HOME LOUDSPEAKER MEIN AES/RMS POWER BHAI BHAI- PART II.">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=dwSgE7tgvd4" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">PA/HOME LOUDSPEAKER MEIN AES/RMS POWER BHAI BHAI- PART II</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/3b4CEsEFKIQ/hqdefault.jpg"
                                            alt="PA Loudspeaker Break In  #shorts #speaker #loudspeaker #bassspeaker">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=3b4CEsEFKIQ" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">PA Loudspeaker Break In  #shorts</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/1C7nHwQLVqw/hqdefault.jpg"
                                            alt="BREAK IN LOUDSPEAKER Part - II #shorts #speaker #loudspeaker #bassspeaker #subwoofer">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=1C7nHwQLVqw" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">BREAK IN LOUDSPEAKER Part - II  #shorts</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/PdeIRPRIt80/hqdefault.jpg"
                                            alt="Ferrite vs Neodymium Magnet , DJ Loudspeaker Ke Liye kya hai better? @Sweton Speakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=PdeIRPRIt80" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Ferrite vs Neodymium Magnet , DJ Loudspeaker Ke Liye kya hai better?</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/aQU0zZzG5qo/hqdefault.jpg"
                                            alt="Neodymium vs Ferrite @Sweton Speakers#loudspeaker  #speaker  #shorts">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=aQU0zZzG5qo" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Neodymium vs Ferrite</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/Oc4qeQ5yN-s/hqdefault.jpg"
                                            alt="Speaker Mein Ferrite|Neodymium Magnet Grade Ka Raaz">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=Oc4qeQ5yN-s" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Speaker Mein Ferrite|Neodymium Magnet Grade Ka Raaz</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/hf62UcYD_aY/hqdefault.jpg"
                                            alt="Loudspeaker Fs-Resonant Frequency Explained|@SwetonSpeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=hf62UcYD_aY" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Loudspeaker Fs-Resonant Frequency Explained</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/N8BnxBrQnWI/hqdefault.jpg"
                                            alt="AES vs RMS in loudspeaker #speaker #loudspeaker #shorts">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=N8BnxBrQnWI" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">AES vs RMS in loudspeaker</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/XGQKRhaojDk/hqdefault.jpg"
                                            alt="DJ Loudspeaker Cabinet|Sealed or Vented/Ported Cabinet- PART-1 @SwetonSpeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=XGQKRhaojDk" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">DJ Loudspeaker Cabinet|Sealed or Vented/Ported Cabinet- PART-1</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/Lxxgt1o5msg/hqdefault.jpg"
                                            alt="Fs - Resonant Frequency of PA Loudspeaker #djspeaker #loudspeaker Loud #speaker #shorts">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=Lxxgt1o5msg" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Fs - Resonant Frequency of PA Loudspeaker</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/exGRsMCD614/hqdefault.jpg"
                                            alt="DJ Loudspeaker Cabinet PART-II |Effects On Loudspeaker on Using Wrong Cabinet or DJ">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=exGRsMCD614" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">DJ Loudspeaker Cabinet PART-II |Effects On Loudspeaker on Using Wrong Cabinet or DJ</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/A3OIPrZ3-ZA/hqdefault.jpg"
                                            alt="Loudspeaker Vas Simplified|Vas importance in Speaker Selection">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=A3OIPrZ3-ZA" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Loudspeaker Vas Simplified|Vas importance in Speaker Selection</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/5qDTuf1Neeg/hqdefault.jpg"
                                            alt="ये Secret Formula से check करें Loudspeaker BL की Value| @SwetonSpeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=5qDTuf1Neeg" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">ये Secret Formula से check करें Loudspeaker BL की Value</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/iLnkM0lM3IM/hqdefault.jpg"
                                            alt="Loudspeaker X-Max Explained | @SwetonSpeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=iLnkM0lM3IM" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Loudspeaker X-Max Explained</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/jeZ30hxcq90/hqdefault.jpg"
                                            alt="Loudspeaker BL kya hota hai #loudspeaker #swetonspeakers #thinkdesithinksweton #shorts #shortsvideo">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=jeZ30hxcq90" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Loudspeaker BL kya hota hai</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/ISiENVCyjlw/hqdefault.jpg"
                                            alt="Loudspeaker Efficiency Explained| Speaker ki Efficiency Kya Hoti Hai?">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=ISiENVCyjlw" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Loudspeaker Efficiency Explained| Speaker ki Efficiency Kya Hoti Hai?</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/3MCmMtlGxXs/hqdefault.jpg"
                                            alt="Loudspeaker को Amplifier से match करते समय इस parameter को ज़रूर check करें।।">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=3MCmMtlGxXs" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Loudspeaker को Amplifier से match करते समय इस parameter को ज़रूर check करें</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/8DhPgWYV-do/hqdefault.jpg"
                                            alt="Why TS Parameters in Loudspeakers?">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=8DhPgWYV-do" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Why TS Parameters in Loudspeakers?</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/vpeHFLM7_ZY/hqdefault.jpg"
                                            alt="@SwetonSpeakers  at Palm Expo 2024, Mumbai #palmexpo #loudspeaker  #makeinindia #swetonspeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=vpeHFLM7_ZY" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">@SwetonSpeakers  at Palm Expo 2024, Mumbai</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/20JOUeD9PZU/hqdefault.jpg"
                                            alt="@SwetonSpeakers at Palm Expo 2024, Mumbai #palmexpo #loudspeaker  #makeinindia #swetonspeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=20JOUeD9PZU" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">@SwetonSpeakers at Palm Expo 2024, Mumbai</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/j77aQlLnYJk/hqdefault.jpg"
                                            alt="@SwetonSpeakers at Palm Expo 2024, Mumbai #palmexpo #loudspeaker  #makeinindia #swetonspeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=j77aQlLnYJk" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">@SwetonSpeakers at Palm Expo 2024, Mumbai</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/_GfuI4J-mFk/hqdefault.jpg"
                                            alt="Aisa Catalouge Nahi Dekha Hoga.SWETON home speaker catalouge. @SwetonSpeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=_GfuI4J-mFk" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                 <h2 class="vd-h">Aisa Catalouge Nahi Dekha Hoga.SWETON home speaker catalouge.</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/PdKhsWz8mw4/hqdefault.jpg"
                                            alt="@SwetonSpeakers  at Palm Expo 2024, Mumbai #palmexpo #loudspeaker  #makeinindia #swetonspeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=PdKhsWz8mw4" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">@SwetonSpeakers  at Palm Expo 2024, Mumbai</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/0AT7dsSgOpI/hqdefault.jpg"
                                            alt="@SwetonSpeakers  at Palm Expo 2024, Mumbai #palmexpo #loudspeaker  #makeinindia #swetonspeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=0AT7dsSgOpI" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">@SwetonSpeakers  at Palm Expo 2024, Mumbai</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/yo61EozhOX4/hqdefault.jpg"
                                            alt="@SwetonSpeakers Amplifier Damping Factor ka Real Matlab !!!">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=yo61EozhOX4" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">@SwetonSpeakers Amplifier Damping Factor ka Real Matlab !!!</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/P0cYvVYBZYc/hqdefault.jpg"
                                            alt="@SwetonSpeakersat Palm Expo 2024, Mumbai #palmexpo #loudspeaker #makeinindia #swetonspeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=P0cYvVYBZYc" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">@SwetonSpeakersat Palm Expo 2024, Mumbai</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/DEFiJOzPgRc/hqdefault.jpg"
                                            alt="@SwetonSpeakers Sealed Cabinet Ki Volume Nikalne Ka Tarika">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=DEFiJOzPgRc" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">@SwetonSpeakers Sealed Cabinet Ki Volume Nikalne Ka Tarika</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/uk1xXYBIX9Q/hqdefault.jpg"
                                            alt="@Swetonspeakers Acche Sound System Chaiye? Dhyan Rakhe yeh 3 cheez!!">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=uk1xXYBIX9Q" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">@Swetonspeakers Acche Sound System Chaiye? Dhyan Rakhe yeh 3 cheez!!</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/7pnuqo6vq2k/hqdefault.jpg"
                                            alt="@Sweton Speakers ASLI MID 10 IT 400 MID! LIVE TESTING! Important Message!!">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=7pnuqo6vq2k" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">@Sweton Speakers ASLI MID 10 IT 400 MID! LIVE TESTING! Important Message!!</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/FScJ-6grmHM/hqdefault.jpg"
                                            alt="@Sweton Speakers Loudspeaker Aur Amplifier Ka Subhaarambh. GANPATI BAPPA MORYA!!!">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=FScJ-6grmHM" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">@Sweton Speakers Loudspeaker Aur Amplifier Ka Subhaarambh. GANPATI BAPPA MORYA!!!</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/czZnxhSQWdo/hqdefault.jpg"
                                            alt="@SwetonSpeakers BAAS KA BAAP SERIES-YT Pe PEHLI BAAR-4.5 Inch Voice Coil wala Zabardast Sub Woofer">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=czZnxhSQWdo" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">@SwetonSpeakers BAAS KA BAAP SERIES-YT Pe PEHLI BAAR-4.5 Inch Voice Coil wala Zabardast Sub Woofer</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/2_tkEUQPEiQ/hqdefault.jpg"
                                            alt="“Difference between AES Power and RMS Power | Understand easy Amp Matching” @SwetonSpeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=2_tkEUQPEiQ" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">“Difference between AES Power and RMS Power | Understand easy Amp Matching” @SwetonSpeakers</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/7Ejnae4zxkA/hqdefault.jpg"
                                            alt="Sweton 10” 120WT Woofer Full Test | Pure Woofer, 6dB & 12dB Network Sound Demo @SwetonSpeakers ">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=7Ejnae4zxkA" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Sweton 10” 120WT Woofer Full Test | Pure Woofer, 6dB & 12dB Network Sound Demo @SwetonSpeakers</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/Z6j3uKsZRDk/hqdefault.jpg"
                                            alt="Low Fs Zaroori Nahi! Indian PA Systems Ke Liye Higher Fs Kyu Better Hai? @SwetonSpeakers ">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=Z6j3uKsZRDk" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Low Fs Zaroori Nahi! Indian PA Systems Ke Liye Higher Fs Kyu Better Hai? @SwetonSpeakers</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/veISh6wdfUU/hqdefault.jpg"
                                            alt="Amplifier Full Power Kaise Deta Hai? Sensitivity Test 0.775V / 1V / 1.4V Explained@Sweton Speakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=veISh6wdfUU" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Amplifier Full Power Kaise Deta Hai? Sensitivity Test 0.775V / 1V / 1.4V Explained</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Demo Tab Content -->
                <div id="demo" class="video-tab-content" style="display: none; opacity: 0;">
                    <div class="row">
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/RRFXxAiEil4/hqdefault.jpg"
                                            alt="Sweton 15 PT 1000 MB demo in Ara, Bihar.">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=RRFXxAiEil4" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                 <h2 class="vd-h">Sweton 15 PT 1000 MB demo in Ara, Bihar.</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/H3Y_CPsL2uc/hqdefault.jpg"
                                            alt="Testing of 15 PA 500 MB in U.P.">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=H3Y_CPsL2uc" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Testing of 15 PA 500 MB in U.P.</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/-RHTf9TNyZY/hqdefault.jpg"
                                            alt="Sweton Speaker demo in W.B. Model 15 PT 1200 MB & 18 PT 1800 SUB">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=-RHTf9TNyZY" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Sweton Speaker demo in W.B. Model 15 PT 1200 MB & 18 PT 1800 SUB</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/Z91RW5QhLso/hqdefault.jpg"
                                            alt="Sweton 12 PT 400 LA MB demo">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=Z91RW5QhLso" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Sweton 12 PT 400 LA MB demo</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/D73RNkj_BwM/hqdefault.jpg"
                                            alt="SWETON 10 IT 350 MID demo">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=D73RNkj_BwM" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">SWETON 10 IT 350 MID demo</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/wR9hqki_y9M/hqdefault.jpg"
                                            alt="15 PT 500 MB Demo">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=wR9hqki_y9M" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">15 PT 500 MB Demo</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/mt5-4MXuSgY/hqdefault.jpg"
                                            alt="October 27, 2021">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=mt5-4MXuSgY" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">October 27, 2021</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/VfhMYZXClco/hqdefault.jpg"
                                            alt="8&quot; 80 WT WOOFER Testing">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=VfhMYZXClco" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">80 WT WOOFER Testing</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/G-LIGpXvpOI/hqdefault.jpg"
                                            alt="15&quot; 400 Watt Challenger Mid-Bass Speaker Testing - 15 PA 400 C MB">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=G-LIGpXvpOI" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">400 Watt Challenger Mid-Bass Speaker Testing - 15 PA 400 C MB</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/k1oLZG4qsxs/hqdefault.jpg"
                                            alt="Dhamakedar Testing SWETON HF/Compression Driver Loudspeaker||@SwetonSpeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=k1oLZG4qsxs" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Dhamakedar Testing SWETON HF/Compression Driver Loudspeaker</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/sCkOuZc0PM4/hqdefault.jpg"
                                            alt="SWETON HOME SPEAKERS-SURPRISE SURPRISE!!!">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=sCkOuZc0PM4" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">SWETON HOME SPEAKERS-SURPRISE SURPRISE!!!</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/FScJ-6grmHM/hqdefault.jpg"
                                            alt="@Sweton Speakers Loudspeaker Aur Amplifier Ka Subhaarambh. GANPATI BAPPA MORYA!!!">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=FScJ-6grmHM" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">@Sweton Speakers Loudspeaker Aur Amplifier Ka Subhaarambh. GANPATI BAPPA MORYA!!!</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/InotUKViitk/hqdefault.jpg"
                                            alt="@SwetonSpeakers GOLD STANDARD MID BASS LOUDSPEAKER- LIVE DEMO">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=InotUKViitk" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">GOLD STANDARD MID BASS LOUDSPEAKER- LIVE DEMO</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/czZnxhSQWdo/hqdefault.jpg"
                                            alt="@SwetonSpeakers BAAS KA BAAP SERIES-YT Pe PEHLI BAAR-4.5 Inch Voice Coil wala Zabardast Sub Woofer">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=czZnxhSQWdo" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">BAAS KA BAAP SERIES-YT Pe PEHLI BAAR-4.5 Inch Voice Coil wala Zabardast Sub Woofer</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/S5mmHw0pv1Y/hqdefault.jpg"
                                            alt="@Swetonspeakers Dhamka MID BASS Loudspeaker Ka!!">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=S5mmHw0pv1Y" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Dhamka MID BASS Loudspeaker Ka!!</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/vNDbe0W1q7o/hqdefault.jpg"
                                            alt="@SwetonSpeakers 1500 SUB-TESTING in TWO DJ CABINETS What Happens Next is CRAZY">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=vNDbe0W1q7o" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">1500 SUB-TESTING in TWO DJ CABINETS What Happens Next is CRAZY</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/9oNQ_Nu3FSE/hqdefault.jpg"
                                            alt="@SwetonSpeakers BASS KA BAAP SERIES- PART III-ASLI BASS KA BAAP">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=9oNQ_Nu3FSE" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">BASS KA BAAP SERIES- PART III-ASLI BASS KA BAAP</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/au1hOTSSPc8/hqdefault.jpg"
                                            alt="@Sweton Speakers BASS KE BAAP KA BAAP-KL SERIES">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=au1hOTSSPc8" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Speakers BASS KE BAAP KA BAAP-KL SERIES</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/appt8fMueYo/hqdefault.jpg"
                                            alt="18KL1850 SUB ka dhamakedar review | DJ, Sound Hirers ke liye best hai? @Sweton Speakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=appt8fMueYo" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">18KL1850 SUB ka dhamakedar review | DJ, Sound Hirers ke liye best hai?</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/huQneNZNTok/hqdefault.jpg"
                                            alt="POWER OF 18KL1851SUB| FEEL THE VIBRATION">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=huQneNZNTok" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">POWER OF 18KL1851SUB| FEEL THE VIBRATION</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/2Ye2mJov3Ts/hqdefault.jpg"
                                            alt="2000W ka Beast! SWETON 18KL1851 SUB – Punch Aur Vibration Ka King @SwetonSpeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=2Ye2mJov3Ts" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">2000W ka Beast! SWETON 18KL1851 SUB – Punch Aur Vibration Ka King</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/wenGozQ7lCE/hqdefault.jpg"
                                            alt="DJ Line Array Setup India 🇮🇳 | Sweton 12 PT 400 LA & CD 240 NEO Hindi Review@Sweton Speakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=wenGozQ7lCE" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">DJ Line Array Setup India 🇮🇳 | Sweton 12 PT 400 LA & CD 240 NEO Hindi</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/xBkzburcREM/hqdefault.jpg"
                                            alt="Power of Sweton Speakers at CG 05 EXPO- Chhattisgarh #makeinindia #audioequipment #dj #bass">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=xBkzburcREM" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Power of Sweton Speakers at CG 05 EXPO- Chhattisgarh</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/7Ejnae4zxkA/hqdefault.jpg"
                                            alt="Sweton 10” 120WT Woofer Full Test | Pure Woofer, 6dB & 12dB Network Sound Demo @SwetonSpeakers ">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=7Ejnae4zxkA" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Sweton 10” 120WT Woofer Full Test | Pure Woofer, 6dB & 12dB Network Sound Demo</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonials Tab Content -->
                <div id="testimonials" class="video-tab-content" style="display: none; opacity: 0;">
                    <div class="row">
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/QiUHKP-c0WU/hqdefault.jpg"
                                            alt="Sk. Lokman Ali owner of Model Cabinet, Kolkata, sharing his experience with Sweton Speakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=QiUHKP-c0WU" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Sk. Lokman Ali owner of Model Cabinet, Kolkata, sharing his experience with Sweton Speakers</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/to0WJw58kig/hqdefault.jpg"
                                            alt="Puneet Minocha owner of S.P. Electronics, Kolkata, sharing his experience with Sweton Speakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=to0WJw58kig" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Puneet Minocha owner of S.P. Electronics, Kolkata, sharing his experience with Sweton Speakers</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/mwVWxJ8X1Y0/hqdefault.jpg"
                                            alt="Anil Electronics, Chandini Chowk, Kolkata, sharing his experience with Sweton Speakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=mwVWxJ8X1Y0" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Anil Electronics, Chandini Chowk, Kolkata, sharing his experience with Sweton Speakers</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/v7yQUQHX-us/hqdefault.jpg"
                                            alt="Aspa Radio Corp, Chandini Chowk, Kolkata, sharing his experience with Sweton Speakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=v7yQUQHX-us" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Aspa Radio Corp, Chandini Chowk, Kolkata, sharing his experience with Sweton Speakers</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/5IU-cPdS6RM/hqdefault.jpg"
                                            alt="2018 Rath Yatra Animated video...">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=5IU-cPdS6RM" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">2018 Rath Yatra Animated video...</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/6eAFkqodxfc/hqdefault.jpg"
                                            alt="15&quot; 300 Watt Mid-Bass Speaker Testing - 15 PA 300 XP MB">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=6eAFkqodxfc" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">300 Watt Mid-Bass Speaker Testing - 15 PA 300 XP MB</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/vpeHFLM7_ZY/hqdefault.jpg"
                                            alt="@SwetonSpeakers  at Palm Expo 2024, Mumbai #palmexpo #loudspeaker  #makeinindia #swetonspeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=vpeHFLM7_ZY" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Palm Expo 2024, Mumbai</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/20JOUeD9PZU/hqdefault.jpg"
                                            alt="@SwetonSpeakers at Palm Expo 2024, Mumbai #palmexpo #loudspeaker  #makeinindia #swetonspeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=20JOUeD9PZU" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Palm Expo 2024, Mumbai</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/j77aQlLnYJk/hqdefault.jpg"
                                            alt="@SwetonSpeakers at Palm Expo 2024, Mumbai #palmexpo #loudspeaker  #makeinindia #swetonspeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=j77aQlLnYJk" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Palm Expo 2024, Mumbai</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/PdKhsWz8mw4/hqdefault.jpg"
                                            alt="@SwetonSpeakers  at Palm Expo 2024, Mumbai #palmexpo #loudspeaker  #makeinindia #swetonspeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=PdKhsWz8mw4" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Palm Expo 2024, Mumbai</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/0AT7dsSgOpI/hqdefault.jpg"
                                            alt="@SwetonSpeakers  at Palm Expo 2024, Mumbai #palmexpo #loudspeaker  #makeinindia #swetonspeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=0AT7dsSgOpI" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Palm Expo 2024, Mumbai</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/P0cYvVYBZYc/hqdefault.jpg"
                                            alt="@SwetonSpeakersat Palm Expo 2024, Mumbai #palmexpo #loudspeaker #makeinindia #swetonspeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=P0cYvVYBZYc" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Palm Expo 2024, Mumbai</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reviews Tab Content -->
                <div id="reviews" class="video-tab-content" style="display: none; opacity: 0;">
                    <div class="row">
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/JZsvOFUHPG4/hqdefault.jpg"
                                            alt="Sweton Speakers - Make in India">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=JZsvOFUHPG4" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Sweton Speakers - Make in India</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/q17KJ3v1HHc/hqdefault.jpg"
                                            alt="Short Review of Sweton 18PT2000SUB with Testing">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=q17KJ3v1HHc" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Short Review of Sweton 18PT2000SUB with Testing</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/3mTpdv-7K8w/hqdefault.jpg"
                                            alt="Sweton Multimedia Satellite Speaker Review">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=3mTpdv-7K8w" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Sweton Multimedia Satellite Speaker Review</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/jo9UUGhoYXw/hqdefault.jpg"
                                            alt="Review of Sweton Speaker 15PA500MB">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=jo9UUGhoYXw" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Review of Sweton Speaker 15 PA 500MB</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/0mnPl54Dnhc/hqdefault.jpg"
                                            alt="Sweton 15PT500MB Speaker Short Review and Testing">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=0mnPl54Dnhc" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                               <h2 class="vd-h">Sweton 15PT500MB Speaker Short Review and Testing</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/6bvyxpgCJY4/hqdefault.jpg"
                                            alt="Sweton 15PA 400MB Review With Price   15inch 400watt Speaker Testing   Dj Rock">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=6bvyxpgCJY4" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Sweton 15PA 400MB Review With Price   15inch 400watt Speaker Testing   Dj Rock</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/G-LIGpXvpOI/hqdefault.jpg"
                                            alt="15&quot; 400 Watt Challenger Mid-Bass Speaker Testing - 15 PA 400 C MB">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=G-LIGpXvpOI" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">400 Watt Challenger Mid-Bass Speaker Testing - 15 PA 400 C MB</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/6eAFkqodxfc/hqdefault.jpg"
                                            alt="15&quot; 300 Watt Mid-Bass Speaker Testing - 15 PA 300 XP MB">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=6eAFkqodxfc" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">300 Watt Mid-Bass Speaker Testing - 15 PA 300 XP MB</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/vNDbe0W1q7o/hqdefault.jpg"
                                            alt="@SwetonSpeakers 1500 SUB-TESTING in TWO DJ CABINETS What Happens Next is CRAZY">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=vNDbe0W1q7o" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">1500 SUB-TESTING in TWO DJ CABINETS What Happens Next is CRAZY</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/appt8fMueYo/hqdefault.jpg"
                                            alt="18KL1850 SUB ka dhamakedar review | DJ, Sound Hirers ke liye best hai? @Sweton Speakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=appt8fMueYo" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">18KL1850 SUB ka dhamakedar review | DJ, Sound Hirers ke liye best hai?</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/2Ye2mJov3Ts/hqdefault.jpg"
                                            alt="2000W ka Beast! SWETON 18KL1851 SUB – Punch Aur Vibration Ka King @SwetonSpeakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=2Ye2mJov3Ts" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">2000W ka Beast! SWETON 18KL1851 SUB – Punch Aur Vibration Ka King</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/wenGozQ7lCE/hqdefault.jpg"
                                            alt="DJ Line Array Setup India 🇮🇳 | Sweton 12 PT 400 LA & CD 240 NEO Hindi Review@Sweton Speakers">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=wenGozQ7lCE" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">DJ Line Array Setup India 🇮🇳 | Sweton 12 PT 400 LA & CD 240 NEO Hindi</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3 col-lg-3">
                            <div class="vd-mr">
                                <div class="blog-sidebar__img-box">
                                    <div class="blog-sidebar__img">
                                        <img src="https://img.youtube.com/vi/7Ejnae4zxkA/hqdefault.jpg"
                                            alt="Sweton 10” 120WT Woofer Full Test | Pure Woofer, 6dB & 12dB Network Sound Demo @SwetonSpeakers ">
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=7Ejnae4zxkA" class="video-popup">
                                            <div class="blog-sidebar__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="vd-h">Sweton 10” 120WT Woofer Full Test | Pure Woofer, 6dB & 12dB Network Sound Demo</h2>
                            </div>
                        </div>
                    </div>
                </div>
                
                 <!-- Shorts Tab Content -->
                <div id="shorts" class="video-tab-content" style="display: none; opacity: 0;">
                    <div class="row">
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/s5oOnjV8B1Y/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/s5oOnjV8B1Y" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/p-jtxcPWvEE/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/p-jtxcPWvEE" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/fWVJGZ2a1ZU/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/fWVJGZ2a1ZU" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/271EFGOTalo/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/271EFGOTalo" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/8emS1QPwyp0/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/8emS1QPwyp0" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/oDd0yAh_fZs/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/oDd0yAh_fZs" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/57VF-IA53R0/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/57VF-IA53R0" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/zesSjGJBxCI/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/zesSjGJBxCI" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/PBv5pmLWIcM/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/PBv5pmLWIcM" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/MWuika1vYrY/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/MWuika1vYrY" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/LgpUgYpgG5o/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/LgpUgYpgG5o" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/-y2xbxaf3ss/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/-y2xbxaf3ss" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/nb7eiIlrohU/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/nb7eiIlrohU" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/_Li176g2QhU/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/_Li176g2QhU" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/ngs2X-kpE9o/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/ngs2X-kpE9o" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/kuMGNmucKco/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/kuMGNmucKco" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/0tU3C_6IQUE/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/0tU3C_6IQUE" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/bmxmdq0pq5g/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/bmxmdq0pq5g" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/JBbYYy0GcxQ/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/JBbYYy0GcxQ" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/vPz6kSDMsKo/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/vPz6kSDMsKo" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/_8d1OrO4umE/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/_8d1OrO4umE" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/xsqd3kf5g2k/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/xsqd3kf5g2k" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/9ie825ZaaVk/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/9ie825ZaaVk" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/YpArHhLnQvM/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/YpArHhLnQvM" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/dnbpmkYgfJ4/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/dnbpmkYgfJ4" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/X4Gvygn3aWg/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/X4Gvygn3aWg" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/hxlPWaphUG8/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/hxlPWaphUG8" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/q_e7uyafpEU/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/q_e7uyafpEU" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/OyTLQFFk8OQ/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/OyTLQFFk8OQ" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/JDFdSMLJuf8/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/JDFdSMLJuf8" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/9aW-4zV1MQU/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/9aW-4zV1MQU" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/WoHT7K5PVjw/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/WoHT7K5PVjw" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/USyD9g8IbSw/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/USyD9g8IbSw" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/CLOb9F1BfwQ/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/CLOb9F1BfwQ" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/9D8YW7dTtyI/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/9D8YW7dTtyI" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/79Fp2eWsapE/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/79Fp2eWsapE" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/vOSxqeq0o28/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/vOSxqeq0o28" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/251gt6lD71Q/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/251gt6lD71Q" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/qXYT-hAO-7c/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/qXYT-hAO-7c" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/M8-g4CCDBCM/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/M8-g4CCDBCM" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/noPqajhnFy4/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/noPqajhnFy4" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/M4DsbLAgAZw/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/M4DsbLAgAZw" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/vkl_utDDUx0/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/vkl_utDDUx0" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/4kER6RL08uw/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/4kER6RL08uw" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/0VX6Kx6pc5A/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/0VX6Kx6pc5A" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/PdKhsWz8mw4/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/PdKhsWz8mw4" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/OHJzocerdBU/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/OHJzocerdBU" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/vpeHFLM7_ZY/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/vpeHFLM7_ZY" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/20JOUeD9PZU/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/20JOUeD9PZU" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/j77aQlLnYJk/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/j77aQlLnYJk" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/vUsxoUSgArc/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/vUsxoUSgArc" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/Y6HzPxHB4Q4/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/Y6HzPxHB4Q4" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/MdaRyee8GOo/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/MdaRyee8GOo" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/B3da2oVkP9M/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/B3da2oVkP9M" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/jeZ30hxcq90/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/jeZ30hxcq90" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/Lxxgt1o5msg/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/Lxxgt1o5msg" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/N8BnxBrQnWI/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/N8BnxBrQnWI" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/aQU0zZzG5qo/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/aQU0zZzG5qo" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/1C7nHwQLVqw/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/1C7nHwQLVqw" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/3b4CEsEFKIQ/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/3b4CEsEFKIQ" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/34xMvouO0M8/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/34xMvouO0M8" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/Hd_mS4SyCtc/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/Hd_mS4SyCtc" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/TgVwoAiZb74/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/TgVwoAiZb74" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="https://img.youtube.com/vi/L27QNsRg2lc/hqdefault.jpg" alt="Sweton Short"></div><div class="about-two__video-link"><a href="https://www.youtube.com/embed/L27QNsRg2lc" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                    </div>
                </div>
                
                <div id="reels" class="video-tab-content" style="display: none; opacity: 0;">
                    <div class="row">
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="{{ asset('public_assets/images/reels/DXN6G7kkiwL.jpg') }}" alt="Sweton Reel"></div><div class="about-two__video-link"><a href="https://www.instagram.com/reel/DXN6G7kkiwL/embed" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="{{ asset('public_assets/images/reels/DXMNRbyk2j5.jpg') }}" alt="Sweton Reel"></div><div class="about-two__video-link"><a href="https://www.instagram.com/reel/DXMNRbyk2j5/embed" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="{{ asset('public_assets/images/reels/DXLr0XDku0p.jpg') }}" alt="Sweton Reel"></div><div class="about-two__video-link"><a href="https://www.instagram.com/reel/DXLr0XDku0p/embed" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="{{ asset('public_assets/images/reels/DW8BP6VySHS.jpg') }}" alt="Sweton Reel"></div><div class="about-two__video-link"><a href="https://www.instagram.com/reel/DW8BP6VySHS/embed" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="{{ asset('public_assets/images/reels/DWbiR_mkuA0.jpg') }}" alt="Sweton Reel"></div><div class="about-two__video-link"><a href="https://www.instagram.com/reel/DWbiR_mkuA0/embed" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="{{ asset('public_assets/images/reels/DWY_Cy2EiFP.jpg') }}" alt="Sweton Reel"></div><div class="about-two__video-link"><a href="https://www.instagram.com/reel/DWY_Cy2EiFP/embed" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="{{ asset('public_assets/images/reels/DWV9qPjEln7.jpg') }}" alt="Sweton Reel"></div><div class="about-two__video-link"><a href="https://www.instagram.com/reel/DWV9qPjEln7/embed" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="{{ asset('public_assets/images/reels/DWTIliukuyc.jpg') }}" alt="Sweton Reel"></div><div class="about-two__video-link"><a href="https://www.instagram.com/reel/DWTIliukuyc/embed" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="{{ asset('public_assets/images/reels/DVU9-p0Eizz.jpg') }}" alt="Sweton Reel"></div><div class="about-two__video-link"><a href="https://www.instagram.com/reel/DVU9-p0Eizz/embed" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="{{ asset('public_assets/images/reels/DVSZKeHku-R.jpg') }}" alt="Sweton Reel"></div><div class="about-two__video-link"><a href="https://www.instagram.com/reel/DVSZKeHku-R/embed" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="{{ asset('public_assets/images/reels/DVQQoeAkoqH.jpg') }}" alt="Sweton Reel"></div><div class="about-two__video-link"><a href="https://www.instagram.com/reel/DVQQoeAkoqH/embed" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
                        <div class="col-md-4 col-xl-3 col-lg-3"><div class=""><div class="blog-sidebar__img-box"><div class="blog-sidebar__img"><img src="{{ asset('public_assets/images/reels/DU92R81kh0H.jpg') }}" alt="Sweton Reel"></div><div class="about-two__video-link"><a href="https://www.instagram.com/reel/DU92R81kh0H/embed" class="video-popup"><div class="blog-sidebar__video-icon"><span class="fa fa-play"></span><i class="ripple"></i></div></a></div></div></div></div>
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
                        setTimeout(function () {
                            document.getElementById(tabName).style.opacity = "1";
                        }, 10);
                        evt.currentTarget.className += " active";
                    }

                    // Use event delegation to handle video popup clicks across all tabs
                    $(document).ready(function () {
                        $(document).on('click', '.video-popup', function (e) {
                            e.preventDefault();
                            var videoUrl = $(this).attr('href');
                            $.magnificPopup.open({
                                items: {
                                    src: videoUrl
                                },
                                type: 'iframe',
                                mainClass: 'mfp-fade',
                                removalDelay: 160,
                                preloader: true,
                                fixedContentPos: false
                            });
                        });
                    });
                </script>
            </div>
        </section>
        <!--About Two End-->
    
</x-frontend_layout>