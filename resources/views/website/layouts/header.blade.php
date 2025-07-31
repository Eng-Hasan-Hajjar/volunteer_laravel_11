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
                                            <a class="nav-link" href="{{ route('web_volunteers') }}">متطوعنا</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('web_organizations') }}"> منظماتنا</a>
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