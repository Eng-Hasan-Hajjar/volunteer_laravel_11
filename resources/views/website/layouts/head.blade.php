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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   
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




  /* Custom Divider Styling */
.custom-divider {
    height: 150px; /* Adjusted height to better showcase the wave */
    background: linear-gradient(90deg, #1e90ff, #28a745, #dc3545); /* Gradient matching section colors */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Enhanced shadow for depth */
    margin: 40px 0;
    border: none;
    position: relative;
    overflow: hidden; /* Ensure wave stays within bounds */
}

/* Wave shape using clip-path with a more defined wave pattern */
.custom-divider::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: inherit; /* Inherit the gradient */
    clip-path: polygon(
        0 20%, 10% 40%, 20% 10%, 30% 50%, 40% 20%, 
        50% 60%, 60% 30%, 70% 70%, 80% 40%, 90% 80%, 
        100% 50%, 100% 100%, 0 100%
    ); /* Enhanced wave pattern */
    transition: transform 0.3s ease; /* Smooth transition for hover effect */
}

/* Optional hover effect to enhance wave visibility */
.custom-divider:hover::after {
    transform: scaleY(1.1); /* Slight stretch on hover for dynamic effect */
}

/* Responsive Adjustments for Divider */
@media (max-width: 768px) {
    .custom-divider {
        height: 80px; /* Reduced height for mobile */
        margin: 30px 0;
    }

    .custom-divider::after {
        clip-path: polygon(
            0 30%, 20% 50%, 40% 20%, 60% 60%, 80% 30%, 
            100% 70%, 100% 100%, 0 100%
        ); /* Simplified wave for mobile */
    }
}






/* Header Styling */
.header-area {
    position: relative;
    z-index: 1000;
}

.header-top_area {
    border-bottom: 1px solid #e9ecef;
}

.short_contact_list a {
    font-size: 0.9rem;
    color: #666 !important;
}

.short_contact_list a:hover {
    color: #1e90ff !important;
}

.main-header-area {
    background: rgba(255, 255, 255, 0.9);
    padding: 10px 0;
    transition: background 0.3s ease, box-shadow 0.3s ease;
}

#sticky-header.sticky {
    background: #ffffff;
    box-shadow: 0 2px 10px rgba(175, 0, 0, 0.1);
    padding: 5px 0;
}

.logo img:hover {
    transform: scale(1.05);
}

.main-menu nav .navbar-nav .nav-item .nav-link {
    color: #1e90ff;
    font-weight: 500;
    padding: 10px 15px;
    transition: color 0.3s ease;
}

.main-menu nav .navbar-nav .nav-item .nav-link:hover,
.main-menu nav .navbar-nav .nav-item .nav-link.active {
    color: #1e90ff;
}

.auth-actions .btn {
    border-radius: 20px;
    padding: 5px 15px;
    font-size: 0.9rem;
}

.auth-actions .btn:hover {
    background-color: #1e90ff;
    color: #ffffff !important;
    border-color: #1e90ff;
}

.auth-actions .btn-outline-danger:hover {
    background-color: #dc3545;
    border-color: #dc3545;
}

.auth-actions .btn-outline-success:hover {
    background-color: #28a745;
    border-color: #28a745;
}

/* Responsive Adjustments */
@media (max-width: 991px) {
    .main-header-area .col-xl-6 {
        flex: 0 0 100%;
        max-width: 100%;
    }

    .main-menu nav .navbar-nav {
        padding: 15px;
        background: #ffffff;
        border-radius: 5px;
        box-shadow: 0 2px 10px #007bff7a;
    }

    .auth-actions {
        justify-content: center;
        margin-top: 10px;
    }

    .logo {
        text-align: center;
        margin-bottom: 10px;
    }
}

@media (max-width: 768px) {
    .short_contact_list ul {
        flex-direction: column;
        align-items: flex-end;
    }

    .short_contact_list li {
        margin-bottom: 5px;
    }
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