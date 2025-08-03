<header>
    <div class="header-area">
        <!-- Header Top Area -->
        <div class="header-top_area bg-light py-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-md-6 col-lg-6 order-1 order-md-2">
                        <div class="short_contact_list d-flex justify-content-start gap-4">
                            <ul class="list-unstyled d-flex align-items-center mb-0">
                                <li class="ms-3"><a href="tel:+9668001234567" class="text-muted text-decoration-none d-flex align-items-center" style="transition: color 0.3s ease;"><i class="fa fa-phone ms-2"></i> +966-800-123-4567</a></li>
                                <li><a href="mailto:info@volunteerlink.org" class="text-muted text-decoration-none d-flex align-items-center" style="transition: color 0.3s ease;"><i class="fa fa-envelope ms-2"></i> info@volunteerlink.org</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header Area -->
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3 order-3">
                        <div class="logo text-right">
                            <a href="{{ route('main_home') }}">
                                <img src="{{ asset('website/img/logo.png') }}" alt="VolunteerLink Logo" style="max-height: 70px; transition: transform 0.3s ease;">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 order-2">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg navbar-dark" style="background:#0053c0;">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('main_home') }}">الرئيسية</a></li>
                                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('web_volunteers') }}">متطوعنا</a></li>
                                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('web_organizations') }}">منظماتنا</a></li>
                                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('web_events') }}">فعالياتنا</a></li>
                                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('about') }}">من نحن</a></li>
                                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('contact') }}">اتصل بنا</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 order-1">
                        <div class="auth-actions d-flex justify-content-start align-items-center gap-2">
                            @if (Route::has('login'))
                                @auth
                                    <div class="book_btn ms-2">
                                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-light btn-sm" style="transition: background-color 0.3s ease; border-color: #fff;">لوحة التحكم</a>
                                    </div>
                                    <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm" style="transition: background-color 0.3s ease; border-color: #fff;"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل خروج') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                                @else
                                    <div class="book_btn ms-2">
                                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm" style="transition: background-color 0.3s ease; border-color: #fff;">تسجيل دخول</a>
                                    </div>
                                    @if (Route::has('register'))
                                        <div class="book_btn">
                                            <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm" style="transition: background-color 0.3s ease; border-color: #fff;">إنشاء حساب</a>
                                        </div>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>