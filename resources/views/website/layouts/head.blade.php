<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>VolunteerLink</title>
    <meta name="description" content="منصة التطوع الرائدة لدعم المجتمعات">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website/img/favicon.png') }}">

    <!-- CSS here -->
    <link href="{{ asset('website/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/magnific-popup.css') }}" rel="stylesheet">
    <!-- Replace old Font Awesome with the latest CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('website/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/gijgo.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/slicknav.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet">

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