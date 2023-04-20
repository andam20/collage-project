<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <meta name="description" content="">
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="assets/css/slick.css">

    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="assets/css/animate.css">

    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="assets/css/default.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


    <!--====== PRELOADER PART START ======-->
    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navbar-area headroom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <p style="color: black; font-size: 150%;">Employee <b
                                        style="color: orangered;">Expense</b></p>
                            </a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            </div>

                            <div class="navbar-btn d-none d-sm-inline-block">
                                @if (Route::has('login'))
                                    @auth
                                        <a href="{{ url('/dashboard') }}"
                                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                    @else
                                        <a class="main-btn" href="{{ route('login') }}">Login</a>
                                    @endauth
                                @endif
                            </div>
                            <div class="m-2">
                                <a class="main-btn" href="{{ route('acc') }}">Login As Accountant</a>
                            </div>
                            {{-- <div class="navbar-btn m-3 d-none d-sm-inline-block">
                                <a class="main-btn" href="{{ route('login-company') }}">Company</a>
                            </div> --}}
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->

        <div id="home" class="header-hero bg_cover d-lg-flex align-items-center"
            style="background-image: url(assets/images/header-hero.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="header-hero-content">

                            <h1 class="hero-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"><b>Simplify
                                    Your</b> <span>Expenses</span> Empower Your <b>Team.</b></h1>
                            <p class="text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"
                                style="text-align: justify;">Expense management is the practice of controlling and
                                tracking expenses through budgeting, approval, and analysis, with the aim of reducing
                                costs, improving financial planning, and increasing profitability.</p>
                            <div class="header-singup wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
                                <input type="text" disabled placeholder="Let's Started">
                                <button class="main-btn">
                                    @if (Route::has('login'))
                                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                            @auth
                                                <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
                                            @else
                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}" style="color: white;">SignUp</a>
                                                @endif
                                            @endauth
                                        </div>
                                    @endif
                                </button>
                            </div>
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-hero-image d-flex align-items-center wow fadeInRightBig" data-wow-duration="1s"
                data-wow-delay="1.1s">
                <div class="image">
                    <img src="assets/images/expense-management.png" alt="Hero Image">
                </div>
            </div> <!-- header hero image -->
        </div> <!-- header hero -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about" class="about-area pt-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="about-title text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h3 class="welcome">WELCOME</h3>

                        <h3 class="title"><span>Welcome to our new employee expense management system </span>
                            <p style="font-size: 60%;"> designed to simplify and streamline the process of managing
                                expenses for both employees and managers.</p>
                        </h3>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-image mt-60 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="assets/images/welcome.jpg" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="about-content pt-45">
                        <p class="text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s"
                            style="text-align: justify;">Our employee expense management system simplifies and
                            automates expense management for businesses. It enables employees to easily submit reports
                            and upload receipts, while allowing managers to quickly review and approve expenses. The
                            system provides real-time expense tracking, helps prevent fraud, and ensures compliance with
                            policies and regulations.</p>

                        <div class="about-counter pt-60">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="single-counter counter-color-1 mt-30 d-flex wow fadeInUp"
                                        data-wow-duration="1s" data-wow-delay="0.3s">
                                        <div class="counter-shape">
                                            <span class="shape-1"></span>
                                            <span class="shape-2"></span>
                                        </div>
                                        <div class="counter-content media-body">
                                            <span class="counter-count"><span class="counter">{{$employeeCount}}</span></span>
                                            <p class="text">All Employees</p>
                                        </div>
                                    </div> <!-- single counter -->
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-counter counter-color-2 mt-30 d-flex wow fadeInUp"
                                        data-wow-duration="1s" data-wow-delay="0.6s">
                                        <div class="counter-shape">
                                            <span class="shape-1"></span>
                                            <span class="shape-2"></span>
                                        </div>
                                        <div class="counter-content media-body">
                                            <span class="counter-count"><span class="counter">{{$userCount}}</span></span>
                                            <p class="text">All Companies</p>
                                        </div>
                                    </div> <!-- single counter -->
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-counter counter-color-3 mt-30 d-flex wow fadeInUp"
                                        data-wow-duration="1s" data-wow-delay="0.9s">
                                        <div class="counter-shape">
                                            <span class="shape-1"></span>
                                            <span class="shape-2"></span>
                                        </div>
                                        <div class="counter-content media-body">
                                            <span class="counter-count"><span class="counter">{{$accountantCount}}</span></span>
                                            <p class="text">Number of Accountant</p>
                                        </div>
                                    </div> <!-- single counter -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- about counter -->
                    </div> <!-- about content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== OUR SERVICE PART START ======-->

    <section id="services" class="our-services-area pt-115">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="our-services-tab pt-30">

                        <div class="tab-content" id="myTabContent">


                            <div class="tab-pane fade" id="digital" role="tabpanel" aria-labelledby="digital-tab">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="our-services-image mt-50">
                                            <img src="assets/images/our-service-1.jpg" alt="service">
                                        </div> <!-- our services image -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="our-services-content mt-45">
                                            <h3 class="services-title">Digital Marketing <span>for Your Business
                                                    Growth.</span></h3>
                                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Nam nec est arcu. Maecenas semper tortor. <br> <br> In elementum in
                                                risus sed commodo. Phasellus nisi ligula, luctus at tempor vitae,
                                                placerat at ante. Cras sed consequat justo. Curabitur laoreet eu est vel
                                                convallis. </p>

                                            <div class="our-services-progress d-flex align-items-center mt-55">
                                                <div class="circle" id="circles-2"></div>
                                                <div class="progress-content">
                                                    <h4 class="progress-title">Digital Marketing <br> Skill.</h4>
                                                </div>
                                            </div>
                                        </div> <!-- our services content -->
                                    </div>
                                </div> <!-- row -->
                            </div>

                            <div class="tab-pane fade" id="market" role="tabpanel" aria-labelledby="market-tab">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="our-services-image mt-50">
                                            <img src="assets/images/our-service-1.jpg" alt="service">
                                        </div> <!-- our services image -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="our-services-content mt-45">
                                            <h3 class="services-title">Market Analysis <span>for Your Business
                                                    Growth.</span></h3>
                                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Nam nec est arcu. Maecenas semper tortor. <br> <br> In elementum in
                                                risus sed commodo. Phasellus nisi ligula, luctus at tempor vitae,
                                                placerat at ante. Cras sed consequat justo. Curabitur laoreet eu est vel
                                                convallis. </p>

                                            <div class="our-services-progress d-flex align-items-center mt-55">
                                                <div class="circle" id="circles-3"></div>
                                                <div class="progress-content">
                                                    <h4 class="progress-title">Market Analysis <br> Agency Skill.</h4>
                                                </div>
                                            </div>
                                        </div> <!-- our services content -->
                                    </div>
                                </div> <!-- row -->
                            </div>
                        </div> <!-- tab content -->
                    </div> <!-- our services tab -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== OUR SERVICE PART ENDS ======-->

    <!--====== SERVICE PART START ======-->

    <section id="service" class="service-area pt-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="section-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h6 class="sub-title">Why Us</h6>
                        <h4 class="title">The reasons to choose us <span>as your business partner</span></h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="service-wrapper mt-60 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                <div class="row no-gutters justify-content-center">
                    <div class="col-lg-4 col-md-7">
                        <div class="single-service d-flex">
                            <div class="service-icon">
                                <img src="assets/images/service-1.png" alt="Icon">
                            </div>
                            <div class="service-content media-body">
                                <h4 class="service-title">Highly Experienced</h4>
                                <p class="text" style="text-align: justify;">Highly Experienced: Our experienced
                                    team has a deep understanding of the unique challenges that businesses face when
                                    managing employee expenses. We can provide valuable insights and solutions that can
                                    help you save time and money.</p>
                            </div>
                            <div class="shape shape-1">
                                <img src="assets/images/shape/shape-1.svg" alt="shape">
                            </div>
                            <div class="shape shape-2">
                                <img src="assets/images/shape/shape-2.svg" alt="shape">
                            </div>
                        </div> <!-- single service -->
                    </div>
                    <div class="col-lg-4 col-md-7">
                        <div class="single-service service-border d-flex">
                            <div class="service-icon">
                                <img src="assets/images/service-2.png" alt="Icon">
                            </div>
                            <div class="service-content media-body">
                                <h4 class="service-title">Bunch of Services</h4>
                                <p class="text" style="text-align: justify;">Our system streamlines expense
                                    tracking, reporting, and reimbursement, making it easy for employees and managers.
                                    We also offer customized reporting and analytics to help you make informed budget
                                    decisions.</p>
                            </div>
                            <div class="shape shape-3">
                                <img src="assets/images/shape/shape-3.svg" alt="shape">
                            </div>
                        </div> <!-- single service -->
                    </div>
                    <div class="col-lg-4 col-md-7">
                        <div class="single-service d-flex">
                            <div class="service-icon">
                                <img src="assets/images/service-3.png" alt="Icon">
                            </div>
                            <div class="service-content media-body">
                                <h4 class="service-title">Quality Support</h4>
                                <p class="text" style="text-align: justify;">We offer exceptional customer support,
                                    with a team available to assist you whenever you need it. We understand that
                                    managing employee expenses can be complex and time-consuming, so we're committed to
                                    making the process as easy and seamless as possible.</p>
                            </div>
                            <div class="shape shape-4">
                                <img src="assets/images/shape/shape-4.svg" alt="shape">
                            </div>
                            <div class="shape shape-5">
                                <img src="assets/images/shape/shape-5.svg" alt="shape">
                            </div>
                        </div> <!-- single service -->
                    </div>
                </div> <!-- row -->

            </div> <!-- service wrapper -->
        </div> <!-- container -->
    </section>

    <!--====== SERVICE PART ENDS ======-->



    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="section-title text-center pb-20 wow fadeInUp" data-wow-duration="1s"
                        data-wow-delay="0.3s">
                        <h6 class="sub-title">Our Contact</h6>
                        <h4 class="title">Get In <span>Touch.</span></h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="contact-info pt-30">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-1 mt-30 d-flex  wow fadeInUp"
                            data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="contact-info-icon">
                                <i class="lni-map-marker"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">Iraq - Erbil<br>
                                    Kasnazan - lawan.</p>
                                </p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-2 mt-30 d-flex  wow fadeInUp"
                            data-wow-duration="1s" data-wow-delay="0.6s">
                            <div class="contact-info-icon">
                                <i class="lni-envelope"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">employeeexpense3@gmail.com</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-3 mt-30 d-flex  wow fadeInUp"
                            data-wow-duration="1s" data-wow-delay="0.9s">
                            <div class="contact-info-icon">
                                <i class="lni-phone"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">750 130 0022</p>
                                <p class="text">751 119 6343</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                </div> <!-- row -->
            </div> <!-- contact info -->

        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area bg_cover" style="background-image: url(assets/images/footer-bg.jpg)">
        <div class="container">
            <div class="footer-widget pt-30 pb-70">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 order-sm-1 order-lg-1">
                        <div class="footer-about pt-40">
                            <a href="#">
                                <p style="color: black; font-size: 150%;">Employee <b
                                        style="color: orangered;">Expense</b></p>
                            </a>
                            <p class="text" style="text-align: justify;">Expense management is the practice of
                                controlling and tracking expenses through budgeting, approval, and analysis, with the
                                aim of reducing costs, improving financial planning, and increasing profitability.</p>
                        </div> <!-- footer about -->
                    </div>

                    <div class="col-lg-3 col-sm-6 order-sm-4 order-lg-3 ml-150" style="text-align: center;">
                        <div class="footer-link pt-40">
                            <div class="footer-title">
                                <h5 class="title">About Us</h5>
                            </div>
                            <ul>


                                <li><a href="{{ url('overview') }}"> Overview</a></li>
                                <li><a href="{{ url('team') }}">Team</a></li>

                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6 order-sm-2 order-lg-4 ml-150">
                        <div class="footer-contact pt-40">
                            <div class="footer-title">
                                <h5 class="title">Contact Info</h5>
                            </div>
                            <div class="contact pt-10">
                                <p class="text">Iraq - Erbil<br>
                                    Kasnazan - lawan.</p>
                                </p>
                                <p class="text">employeeexpense3@gmail.com</p>
                                <p class="text">783 087 2898</p>

                               
                            </div> <!-- contact -->
                        </div> <!-- footer contact -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer widget -->
            <div class="footer-copyright text-center">
                <p class="text">© 2023 All Rights Reserved.</p>
            </div>
        </div> <!-- container -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->




    <!--====== Jquery js ======-->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--====== Slick js ======-->
    <script src="assets/js/slick.min.js"></script>

    <!--====== Isotope js ======-->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>

    <!--====== Counter Up js ======-->
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>

    <!--====== Circles js ======-->
    <script src="assets/js/circles.min.js"></script>

    <!--====== Appear js ======-->
    <script src="assets/js/jquery.appear.min.js"></script>

    <!--====== WOW js ======-->
    <script src="assets/js/wow.min.js"></script>

    <!--====== Headroom js ======-->
    <script src="assets/js/headroom.min.js"></script>

    <!--====== Jquery Nav js ======-->
    <script src="assets/js/jquery.nav.js"></script>

    <!--====== Scroll It js ======-->
    <script src="assets/js/scrollIt.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>

</body>

</html>
