
<!doctype html>
<html class="no-js" lang="ar" dir="rtl">

 @include('website.layouts.head')

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
        @include('website.layouts.header')
    
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
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our_volunteer_area_end -->

    <!-- footer_start -->
        @include('website.layouts.footer')
    <!-- footer_end -->



    <!-- JS here -->
    


    @include('website.layouts.script')


</body>

</html>
