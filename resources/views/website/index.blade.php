
<!doctype html>
<html class="no-js" lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>VolunteerLink</title>
    <meta name="description" content="منصة التطوع الرائدة لدعم المجتمعات">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href={{asset('website/img/favicon.png')}}>

    <!-- CSS here -->
    <link href="{{asset('website/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/nice-select.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/gijgo.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/slicknav.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/style.css')}}" rel="stylesheet">

    <!-- Custom RTL & Professional CSS -->
    <style>
        body {
            font-family: 'Tajawal', sans-serif; /* خط عربي احترافي */
            direction: rtl;
        }
        .header-area, .main-header-area, .slider_text, .reson_area, .latest_activites_area, .popular_causes_area, 
        .counter_area, .our_volunteer_area, .news__area, .make_donation_area, .footer {
            direction: rtl;
        }
        .row {
            flex-direction: row-reverse;
        }
        .d-flex {
            flex-direction: row-reverse;
        }
        .short_contact_list ul, .social_media_links ul, .main-menu nav ul, .submenu, .links ul, .news_links ul {
            padding-right: 0;
            list-style: none;
        }
        .balance {
            flex-direction: row-reverse;
        }

        /* تحسين الهيدر */
        .main-header-area {
            padding: 10px 0;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .logo {
            text-align: right;
        }
        .main-menu {
            text-align: left;
        }
        .main-menu nav ul li {
            margin-right: 20px;
        }
        .main-menu nav ul li a {
            color: #333;
            font-weight: 500;
        }
        .book_btn a {
            background: #ff4d4d;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
        }

        /* تحسين السلايدر */
        .slider_text {
            text-align: right;
            padding: 50px 0;
        }
        .slider_text h3 {
            font-size: 2.5em;
            color: #fff;
        }
        .boxed-btn3 {
            background: #ff4d4d;
            color: #fff;
            padding: 10px 25px;
            border-radius: 5px;
        }

        /* تحسين الأقسام */
        .section_title h3 {
            font-size: 2em;
            color: #333;
        }
        .single_reson, .single_cause, .single_volenteer, .single__blog {
            border: 1px solid #eee;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .single_reson:hover, .single_cause:hover, .single_volenteer:hover, .single__blog:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .read_more {
            color: #ff4d4d;
            text-decoration: none;
        }

        /* تحسين التذييل */
        .footer {
            background: #1a1a1a;
            color: #fff;
            padding: 40px 0;
        }
        .footer_title {
            color: #ff4d4d;
        }
        .footer a {
            color: #ccc;
        }
        .footer a:hover {
            color: #fff;
        }



/* Define a CSS variable for the text background color */
:root {
    --text-bg-color: #007bff7a; /* Vibrant blue, can be changed */
}

.slider_area {
    position: relative;
    overflow: hidden;
    height: 100vh;
    width: 100%;
}

.single_slider {
    position: relative;
    height: 100%;
    width: 100%;
}

.video-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
}

.text-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(0, 0, 0, 0.4);
    z-index: 1;
}

.slider_text {
    background: var(--text-bg-color);
    opacity: 0.85;
    padding: 40px 60px;
    text-align: center;
    color: #fff;
    width: 100%;
    max-width: 1200px;
    box-sizing: border-box;
    border-radius: 10px;
    display: none; /* Hidden by default */
}

.slider_text.active {
    display: block; /* Show active slide */
    animation: fadeIn 1s ease-in-out; /* Fade animation */
}

.slider_text span {
    font-size: 1.5rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    display: block;
    margin-bottom: 10px;
}

.slider_text h3 {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 20px;
    line-height: 1.2;
}

.slider_text p {
    font-size: 1.2rem;
    margin-bottom: 30px;
    line-height: 1.6;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.boxed-btn3 {
    display: inline-block;
    padding: 15px 30px;
    background: #fff;
    color: var(--text-bg-color);
    font-weight: 600;
    text-transform: uppercase;
    border-radius: 5px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.boxed-btn3:hover {
    background: var(--text-bg-color);
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

/* Fade animation for text slides */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 0.85; /* Match the slider_text opacity */
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .slider_text {
        padding: 20px 30px;
    }
    .slider_text h3 {
        font-size: 2rem;
    }
    .slider_text p {
        font-size: 1rem;
    }
    .boxed-btn3 {
        padding: 10px 20px;
        font-size: 0.9rem;
    }
}

@media (max-width: 576px) {
    .slider_text {
        padding: 15px 20px;
    }
    .slider_text h3 {
        font-size: 1.5rem;
    }
    .slider_text p {
        font-size: 0.9rem;
    }
}



    </style>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-md-6 col-lg-6 order-2 order-md-1">
                            <div class="short_contact_list">
                                <ul class="d-flex justify-content-end">
                                    <li><a href="tel:+9668001234567"><i class="fa fa-phone"></i> +966-800-123-4567</a></li>
                                    <li><a href="mailto:info@volunteerlink.org"><i class="fa fa-envelope"></i> info@volunteerlink.org</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-lg-6 order-1 order-md-2">
                            <div class="social_media_links d-flex justify-content-start">
                                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-pinterest-p"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.html">الرئيسية</a></li>
                                         <li class="nav-item">
                                            <a class="nav-link" href="{{ route('volunteers.index') }}">متطوعنا</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('organizations.index') }}"> منظماتنا</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('events.index') }}"> فعالياتنا</a>
                                        </li>
                                        <li><a href="About.html">من نحن</a></li>
                                     
                                        <li><a href="contact.html">اتصل بنا</a></li>
                                    </ul>
                                </nav>

                                @if (Route::has('login'))
                                <nav class="-mx-3 flex flex-1 justify-end">
                                    @auth
                                         <div class="Appointment">
                                            <div class="book_btn d-none d-lg-block">
                                                <a data-scroll-nav='1' href="{{ url('/dashboard') }}">     لوحة التحكم </a>
                                            </div>
                                        </div>
                                  
                                        <a href="{{ route('logout') }}" 
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                            onclick="event.preventDefault(); 
                                            document.getElementById('logout-form').submit();">
                                            {{ __('تسجيل خروج ') }} 
                                        </a>
                                            <form id="logout-form" action="{{ route('logout') }}" 
                                            method="POST" class="d-none">@csrf
                                        </form>
                                    @else

                                            <div class="ms-auto d-flex gap-2">
    <div class="book_btn d-none d-lg-block">
        <a class="btn btn-outline-primary" href="{{ route('login') }}">تسجيل دخول</a>
    </div>

    @if (Route::has('register'))
        <div class="book_btn d-none d-lg-block">
            <a class="btn btn-outline-success" href="{{ route('register') }}">إنشاء حساب</a>
        </div>
    @endif
</div>

                                            @endauth
                                        </nav>
                                    @endif


                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo text-left">
                                <a href="index.html">
                                    <img src={{asset('website/img/logo.png')}} alt="VolunteerLink Logo" style="max-height: 60px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->




    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider d-flex align-items-center">
            <video class="video-bg" autoplay loop muted playsinline>
                <source src="{{asset('website/img/video.mp4')}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="text-overlay">
                <div class="slider_text active">
                    <span class="text-white ">انضم إلينا</span>
                    <h3 class="text-white">دعم التعليم للجميع</h3>
                    <p class="text-white">التعليم هو مفتاح المستقبل، ساهم في بناء غد أفضل للأطفال</p>
                    <a href="Join.html" class="boxed-btn3">اكتشف كيف</a>
                </div>
                <div class="slider_text ">
                    <span class="text-white">ابدأ الآن</span>
                    <h3 class="text-white">ساعد الأطفال عندما يحتاجون</h3>
                    <p class="text-white">مع الكثير للاستهلاك وقلة الوقت، من الضروري ابتكار أفكار عنوان ذات صلة</p>
                    <a href="About.html" class="boxed-btn3">تعرف على المزيد</a>
                </div>
            
                <div class="slider_text">
                    <span class="text-white">تبرع اليوم</span>
                    <h3 class="text-white">غيّر حياة طفل</h3>
                    <p class="text-white">تبرعك يمكن أن يوفر الطعام والمأوى لمن هم في أمس الحاجة</p>
                    <a href="Donate.html" class="boxed-btn3">تبرع الآن</a>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->




    <!-- reson_area_start -->
    <div class="reson_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>لماذا نساعد</span></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single_reson">
                        <div class="thum">
                            <img src={{asset('website/img/1.jpg')}} alt="جمع التبرعات" class="img-fluid img-thumbnail" style="max-width: 300px; max-height: 350px;">
                        </div>
                        <div class="help_content text-center">
                            <h4>جمع التبرعات</h4>
                            <p>نص وهمي يُستخدم في تخطيط الطباعة لملء الفراغات.</p>
                            <a href="#" class="read_more">اقرأ المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_reson">
                        <div class="thum">
                            <img src={{asset('website/img/2.jpg')}} alt="حملة التبرع بالدم"class="img-fluid img-thumbnail" style="max-width: 300px; max-height: 350px;">
                        </div>
                        <div class="help_content text-center">
                            <h4>حملة التبرع بالدم</h4>
                            <p>نص وهمي يُستخدم في تخطيط الطباعة لملء الفراغات.</p>
                            <a href="#" class="read_more">اقرأ المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_reson">
                        <div class="thum">
                            <img src={{asset('website/img/3.jpg')}} alt="متطوعون ودودون" class="img-fluid img-thumbnail" style="max-width: 300px; max-height: 350px;">
                        </div>
                        <div class="help_content text-center">
                            <h4>متطوعون ودودون</h4>
                            <p>نص وهمي يُستخدم في تخطيط الطباعة لملء الفراغات.</p>
                            <a href="#" class="read_more">اقرأ المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- reson_area_end -->

    <!-- latest_activites_area_start -->
    <div class="latest_activites_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="activites_info">
                        <div class="section_title">
                            <h3><span>شاهد أحدث أنشطتنا</span></h3>
                        </div>
                        <p class="para_1">لوريم إيبسوم نص وهمي يُستخدم في صناعة الطباعة والتنضيد.</p>
                        <p class="para_2">لوريم إيبسوم نص وهمي يُستخدم في صناعة الطباعة والتنضيد.</p>
                        <a href="#" data-scroll-nav='1' class="boxed-btn4">تبرع الآن</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="  d-flex align-items-center justify-content-center">
                       <img src={{asset('website/img/1.jpg')}} alt="جمع التبرعات" class="img-fluid img-thumbnail" style="max-width: 300px; max-height: 350px;">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- latest_activites_area_end -->

    <!-- popular_causes_area_start -->
    <div class="popular_causes_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>الأسباب الشعبية</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="causes_active owl-carousel">
                        <div class="single_cause">
                            <div class="thumb">
                                <img src={{asset('website/img/causes/1.png')}} alt="توزيع الطعام">
                            </div>
                            <div class="causes_content">
                                <div class="custom_progress_bar">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progres_count">30%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="balance d-flex justify-content-between align-items-center">
                                    <span>تم جمع: 5000 ريال</span>
                                    <span>الهدف: 9000 ريال</span>
                                </div>
                                <h4>ساعدنا في توزيع الطعام</h4>
                                <p>النص يُنسب إلى طابع مجهول في القرن.</p>
                                <a class="read_more" href="cause_details.html">اقرأ المزيد</a>
                            </div>
                        </div>
                        <div class="single_cause">
                            <div class="thumb">
                                <img src={{asset('website/img/causes/2.png')}} alt="ملابس للجميع">
                            </div>
                            <div class="causes_content">
                                <div class="custom_progress_bar">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progres_count">30%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="balance d-flex justify-content-between align-items-center">
                                    <span>تم جمع: 5000 ريال</span>
                                    <span>الهدف: 9000 ريال</span>
                                </div>
                                <h4>ملابس للجميع</h4>
                                <p>النص يُنسب إلى طابع مجهول في القرن.</p>
                                <a class="read_more" href="cause_details.html">اقرأ المزيد</a>
                            </div>
                        </div>
                        <div class="single_cause">
                            <div class="thumb">
                                <img src={{asset('website/img/causes/3.png')}} alt="مياه للأطفال">
                            </div>
                            <div class="causes_content">
                                <div class="custom_progress_bar">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progres_count">30%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="balance d-flex justify-content-between align-items-center">
                                    <span>تم جمع: 5000 ريال</span>
                                    <span>الهدف: 9000 ريال</span>
                                </div>
                                <h4>مياه لجميع الأطفال</h4>
                                <p>النص يُنسب إلى طابع مجهول في القرن.</p>
                                <a class="read_more" href="cause_details.html">اقرأ المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_causes_area_end -->

    <!-- counter_area_start -->
    <div class="counter_area">
        <div class="container">
            <div class="counter_bg overlay">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="single_counter d-flex align-items-center justify-content-center">
                            <div class="icon">
                                <i class="flaticon-calendar"></i>
                            </div>
                            <div class="events text-center">
                                <h3 class="counter">120</h3>
                                <p>فعالية مكتملة</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_counter d-flex align-items-center justify-content-center">
                            <div class="icon">
                                <i class="flaticon-heart-beat"></i>
                            </div>
                            <div class="events text-center">
                                <h3 class="counter">120</h3>
                                <p>فعالية مكتملة</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_counter d-flex align-items-center justify-content-center">
                            <div class="icon">
                                <i class="flaticon-in-love"></i>
                            </div>
                            <div class="events text-center">
                                <h3 class="counter">120</h3>
                                <p>فعالية مكتملة</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_counter d-flex align-items-center justify-content-center">
                            <div class="icon">
                                <i class="flaticon-hug"></i>
                            </div>
                            <div class="events text-center">
                                <h3 class="counter">120</h3>
                                <p>فعالية مكتملة</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter_area_end -->

    <!-- our_volunteer_area_start -->
    <div class="our_volunteer_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>متطوعونا</span></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single_volenteer">
                        <div class="volenteer_thumb">
                            <img src={{asset('website/img/volenteer/1.png')}} alt="سكيل خان">
                        </div>
                        <div class="voolenteer_info d-flex align-items-end justify-content-between">
                            <div class="info_inner">
                                <h4>سكيل خان</h4>
                                <p>داعم</p>
                            </div>
                            <div class="social_links">
                                <ul class="d-flex">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_volenteer">
                        <div class="volenteer_thumb">
                            <img src={{asset('website/img/volenteer/2.png')}} alt="عمران أحمد">
                        </div>
                        <div class="voolenteer_info d-flex align-items-end justify-content-between">
                            <div class="info_inner">
                                <h4>عمران أحمد</h4>
                                <p>متطوع</p>
                            </div>
                            <div class="social_links">
                                <ul class="d-flex">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_volenteer">
                        <div class="volenteer_thumb">
                            <img src={{asset('website/img/volenteer/3.png')}} alt="صبير أحمد">
                        </div>
                        <div class="voolenteer_info d-flex align-items-end justify-content-between">
                            <div class="info_inner">
                                <h4>صبير أحمد</h4>
                                <p>متطوع</p>
                            </div>
                            <div class="social_links">
                                <ul class="d-flex">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our_volunteer_area_end -->

    <!-- news__area_start -->
    <div class="news__area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>الأخبار والتحديثات</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="news_active owl-carousel">
                        <div class="single__blog d-flex align-items-center">
                            <div class="thum">
                                <img src={{asset('website/img/news/1.png')}} alt="المياه النقية">
                            </div>
                            <div class="newsinfo">
                                <span>03 يوليو 2025</span>
                                <a href="single-blog.html">
                                    <h3>المياه النقية أكثر أهمية</h3>
                                </a>
                                <p>شهد النص زيادة في الشعبية خلال الستينيات.</p>
                                <a class="read_more" href="single-blog.html">اقرأ المزيد</a>
                            </div>
                        </div>
                        <div class="single__blog d-flex align-items-center">
                            <div class="thum">
                                <img src={{asset('website/img/news/2.png')}} alt="نجاح جمع الطعام">
                            </div>
                            <div class="newsinfo">
                                <span>28 يونيو 2025</span>
                                <a href="single-blog.html">
                                    <h3>نجاح جمع الطعام</h3>
                                </a>
                                <p>شهد النص زيادة في الشعبية خلال الستينيات.</p>
                                <a class="read_more" href="single-blog.html">اقرأ المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- news__area_end -->

    <div data-scroll-index='1' class="make_donation_area section_padding bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>قم بالتبرع</span></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="#" class="donation_form p-4 bg-white rounded shadow-sm">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="single_amount">
                                    <div class="input_field">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">ر.س</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="40,200" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="single_amount">
                                    <div class="fixed_donat d-flex align-items-center justify-content-between">
                                        <div class="select_prise">
                                            <h4>اختر المبلغ:</h4>
                                        </div>
                                        <div class="single_doonate">
                                            <input type="radio" id="blns_1" name="radio-group" checked>
                                            <label for="blns_1">10</label>
                                        </div>
                                        <div class="single_doonate">
                                            <input type="radio" id="blns_2" name="radio-group">
                                            <label for="blns_2">30</label>
                                        </div>
                                        <div class="single_doonate">
                                            <input type="radio" id="Other" name="radio-group">
                                            <label for="Other">أخرى</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="donate_now_btn text-center mt-4">
                        <a href="#" class="boxed-btn4">تبرع الآن</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer_start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src={{asset('website/img/footer_logo.png')}} alt="VolunteerLink Footer Logo" style="max-height: 50px;">
                                </a>
                            </div>
                            <p class="address_text">لوريم إيبسوم نص وهمي، يُستخدم في صناعة الطباعة.</p>
                            <div class="socail_links">
                                <ul class="d-flex">
                                    <li><a href="#" target="_blank"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">الخدمات</h3>
                            <ul class="links">
                                <li><a href="#">التبرع</a></li>
                                <li><a href="#">الرعاية</a></li>
                                <li><a href="#">جمع التبرعات</a></li>
                                <li><a href="#">التطوع</a></li>
                                <li><a href="#">الشراكة</a></li>
                                <li><a href="#">الوظائف</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">جهات الاتصال</h3>
                            <div class="contacts">
                                <p>+966-800-123-4567 <br> info@volunteerlink.org <br> 123 شارع الخير، الرياض</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">أحدث الأخبار</h3>
                            <ul class="news_links">
                                <li>
                                    <div class="thumb">
                                        <a href="#"><img src={{asset('website/img/news/news_1.png')}} alt="مدارس إفريقيا"></a>
                                    </div>
                                    <div class="info">
                                        <a href="#"><h4>مدارس لأطفال إفريقيا</h4></a>
                                        <span>12 يونيو 2025</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="thumb">
                                        <a href="#"><img src={{asset('website/img/news/news_2.png')}} alt="مدارس إفريقيا"></a>
                                    </div>
                                    <div class="info">
                                        <a href="#"><h4>مدارس لأطفال إفريقيا</h4></a>
                                        <span>12 يونيو 2025</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text bg-dark py-3">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <p class="copy_right text-white">
                            حقوق النشر ©<script>document.write(new Date().getFullYear());</script> جميع الحقوق محفوظة | تم إنشاء هذا القالب بـ <i class="ti-heart text-danger" aria-hidden="true"></i> بواسطة <a href="https://colorlib.com" target="_blank" class="text-white">Colorlib</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_end -->



    <!-- JS here -->
    <script src="{{asset('website/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('website/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('website/js/popper.min.js')}}"></script>
    <script src="{{asset('website/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('website/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('website/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('website/js/ajax-form.js')}}"></script>
    <script src="{{asset('website/js/waypoints.min.js')}}"></script>
    <script src="{{asset('website/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('website/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('website/js/scrollIt.js')}}"></script>
    <script src="{{asset('website/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('website/js/wow.min.js')}}"></script>
    <script src="{{asset('website/js/nice-select.min.js')}}"></script>
    <script src="{{asset('website/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('website/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('website/js/plugins.js')}}"></script>
    <script src="{{asset('website/js/gijgo.min.js')}}"></script>
    <script src="{{asset('website/js/contact.js')}}"></script>
    <script src="{{asset('website/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('website/js/jquery.form.js')}}"></script>
    <script src="{{asset('website/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('website/js/mail-script.js')}}"></script>
    <script src="{{asset('website/js/main.js')}}"></script>


    @include('website.layouts.script')


</body>

</html>
