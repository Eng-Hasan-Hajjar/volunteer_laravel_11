<head>
    @include('website.layouts.head')
</head>

<body>
    <div class="container-xxl bg-white p-0">


        <!-- Navbar Start -->
        @include('website.layouts.nav-bar')
        <!-- Navbar End -->


        <!-- Header Start -->
        @include('website.layouts.header')
        <!-- Header End -->



   
        <!-- Footer Start -->
        @include('website.layouts.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
  @include('website.layouts.script')
</body>

