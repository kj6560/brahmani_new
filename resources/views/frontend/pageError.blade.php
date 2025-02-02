<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Error</title>

    <!-- Stylesheets -->
    <link href="{{asset('assets')}}/css/bootstrap.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/slick.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/responsive.css" rel="stylesheet">
    <!--Color Switcher Mockup-->
    <link href="{{asset('assets')}}/css/color-switcher-design.css" rel="stylesheet">
    <!--Color Themes-->
    <link id="theme-color-file" href="{{asset('assets')}}/css/color-themes/default-theme.css" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('assets')}}/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="{{asset('assets')}}/images/favicon.png" type="image/x-icon">

</head>

<body class="hidden-bar-wrapper">
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Main Header-->
        <header class="main-header">

            <!--Header Top-->
            <div class="header-top">
                <div class="auto-container">
                    <div class="clearfix">
                        <!--Top Left-->
                        <div class="top-left">
                            <ul>
                                <li><span class="icon fa fa-map-marker"></span>

                                </li>
                            </ul>
                        </div>
                        <!--Top Right-->
                        <div class="top-right">
                            <div class="timing">
                                <h5>{{$settings['Company_Name'] ?? 'Not Set'}}</h5>
                            </div>
                            <!--Social Box-->
                            <ul class="social-box">

                                <li><a href="{{$settings['Facebook_Link'] ?? '#'}}"><span
                                            class="fa fa-facebook"></span></a></li>
                                <li><a href="{{$settings['Twitter_Link'] ?? '#'}}"><span
                                            class="fa fa-twitter"></span></a>
                                </li>
                                <li><a href="{{$settings['Instagram_Link'] ?? '#'}}"><span
                                            class="fa fa-instagram"></span></a></li>
                                <li><a href="{{$settings['Pinterest_Link'] ?? '#'}}"><span
                                            class="fa fa-pinterest-square"></span></a></li>
                                <li><a href="{{$settings['Linkedin_Link'] ?? '#'}}"><span
                                            class="fa fa-linkedin"></span></a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

            <!--Header-Upper-->
            <div class="header-upper">
                <div class="auto-container">
                    <div class="clearfix">

                        @if (!empty($settings['logo']))
                        <div class="pull-left logo-box">
                            <div class="logo"><a href="/"><img src="{{asset('')}}storage/{{$settings['logo']}}" alt=""
                                        title=""></a></div>
                        </div>
                        @endif

                        <div class="pull-right upper-right">
                            <div class="info-outer clearfix">
                                <!--Info Box-->
                                <div class="upper-column info-box">
                                    <div class="icon-box"><span class="flaticon-contact-1"></span></div>
                                    <ul>
                                        <li><span>Free Call</span> <br> {{$settings['Official_Number'] ?? 'Not Set'}}
                                        </li>
                                    </ul>
                                </div>

                                <!--Info Box-->
                                <div class="upper-column info-box">
                                    <div class="icon-box"><span class="flaticon-email-2"></span></div>
                                    <ul>
                                        <li><span>Mail Us</span> <br> {{$settings['Official_Email'] ?? 'Not Set'}}</li>
                                    </ul>
                                </div>

                                <!--Info Box-->
                                <div class="upper-column info-box">
                                    <a href="/contactUs" class="theme-btn btn-style-two">Get A Quoter</a>
                                </div>
                            </div>

                            <!--Header Lower-->
                            <div class="header-lower">

                                <div class="nav-outer clearfix">
                                    <!-- Main Menu -->
                                    <nav class="main-menu navbar-expand-md">
                                        <div class="navbar-header">
                                            <!-- Toggle Button -->
                                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                                data-target="#navbarSupportedContent"
                                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                                aria-label="Toggle navigation">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>

                                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                            <ul class="navigation clearfix">
                                                <li><a href="/">Home</a></li>
                                                @if (Auth::check())
                                                    <li><a href="/admin">Dashboard</a></li>
                                                @endif
                                                <li><a href="/companyProfile">Company Profile</a></li>
                                                <li class="dropdown"><a href="#">Our Products</a>
                                                    <ul>
                                                        <li><a href="about.html">About Us</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="/sitemap">Sitemap</a></li>
                                                <li><a href="/contactUs">Contact us</a></li>


                                            </ul>
                                        </div>
                                    </nav>

                                    <!-- Main Menu End-->

                                    <div class="side-curve"></div>
                                </div>

                            </div>
                            <!--End Header Lower-->

                        </div>

                    </div>

                </div>
            </div>
            <!--End Header Upper-->

            <!--Sticky Header-->
            <div class="sticky-header">
                <div class="auto-container clearfix">
                    <!--Logo-->
                    @if (!empty($settings['logo']))
                    <div class="logo pull-left">
                        <a href="/" class="img-responsive"><img src="{{asset('')}}/storage/{{$settings['logo']}}" alt=""
                                title=""></a>
                    </div>
                    @endif

                    <!--Right Col-->
                    <div class="right-col pull-right">
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                                <ul class="navigation clearfix">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/companyProfile">Company Profile</a></li>
                                    <li class="dropdown"><a href="#">Our Products</a>
                                        <ul>
                                            <li><a href="about.html">About Us</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/sitemap">Sitemap</a></li>
                                    <li><a href="/contactUs">Contact us</a></li>
                                </ul>
                            </div>
                        </nav><!-- Main Menu End-->
                    </div>
                </div>
            </div>
            <!--End Sticky Header-->

        </header>
        <!--End Main Header -->

        <!--Page Title-->
        <section class="page-title" style="background-image:url(images/background/9.jpg);margin-top:250px;">
            <div class="auto-container">
                <h2>Not Found</h2>
                <ul class="page-breadcrumb">
                    <li><a href="/">home</a></li>
                </ul>
            </div>
        </section>
        <!--End Page Title-->

        <!--Error Section-->
        <section class="error-section">
            <div class="auto-container">
                <div class="inner-section">
                    <div class="error-image">
                        <img src="images/resource/error-image.png" alt="" />
                    </div>
                    <h2>OOPPS! THE PAGE YOU WERE LOOKING FOR, COULDN'T BE FOUND.</h2>
                    <div class="text">Try the search below to find matching pages:</div>

                    
                    <a href="/" class="go-back">Back to Home Page</a>

                </div>
            </div>
        </section>

        <!--Main Footer-->
        <footer class="main-footer" style="background-image:url({{asset('assets')}}/images/background/10.jpg)">

            <div class="auto-container">

                <!--Widgets Section-->
                <div class="widgets-section">
                    <div class="row clearfix">

                        <!--Footer Column-->
                        <div class="footer-column col-lg-4 col-md-6 col-sm-12">
                            <div class="footer-widget logo-widget">
                                @if (!empty($settings['logo']))
                                <div class="logo">
                                    <a href="index-2.html"><img src="{{asset('')}}/storage/{{$settings['logo']}}"
                                            alt="" /></a>
                                </div>
                                @endif
                                <div class="text">We are dedicated to making sure that our products serve the purpose
                                    that it meant for – removing dirt from water, process liquids, atmospheric air and
                                    compressed air and gases – all towards effective and efficient operations in the
                                    industry. ... <a href="#">Read More.</a></div>
                                <ul class="list-style-one">
                                    <li><span class="icon flaticon-map-1"></span>{{$settings['Office_Address'] ?? "Not
										Set"}}</li>
                                </ul>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-lg-4 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">

                                <div class="row clearfix">
                                    <div class="column col-lg-6 col-md-6 col-sm-12">
                                        <h2>Quick Links</h2>
                                        <ul class="list">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="/products">Our Products</a></li>
                                            <li><a href="/companyProfile">Company Profile</a></li>
                                            <li><a href="/sitemap">Sitemap</a></li>
                                            <li><a href="/ourPresence">Our Presence</a></li>
                                            <li><a href="/contactUs">Contact Us</a></li>
                                        </ul>
                                    </div>

                                    <div class="column col-lg-6 col-md-6 col-sm-12">
                                        <h2>Our Products</h2>
                                        <ul class="list">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="/products">Our Products</a></li>
                                            <li><a href="/companyProfile">Company Profile</a></li>
                                            <li><a href="/sitemap">Sitemap</a></li>
                                            <li><a href="/ourPresence">Our Presence</a></li>
                                            <li><a href="/contactUs">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-lg-4 col-md-6 col-sm-12">
                            <div class="footer-widget news-widget">
                                <div class="col">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.880062650001!2d73.141502014955!3d22.3203752853132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc9c757e5ab65%3A0x48bb386d94087c8e!2sGTS%20FILTERS%20AND%20SYSTEMS%20(INDIA)%20PRIVATE%20LIMITED!5e0!3m2!1sen!2sin!4v1638377411351!5m2!1sen!2sin"
                                        style="border:0;height:350px;" allowfullscreen="" loading="lazy" width="100%"
                                        height="470px"></iframe>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="row clearfix">

                        <!-- Copyright Column -->
                        <div class="copyright-column col-lg-6 col-md-12 col-sm-12">
                            <div class="copyright">Designed by<a href="https://www.digitalvyapaar.com/" target="_blank">
                                    Digital Vyapaar</a></div>
                        </div>

                        <!-- Social Column -->
                        <div class="social-column col-lg-6 col-md-12 col-sm-12">
                            <ul class="footer-nav">
                                <li><a href="{{$settings['Facebook_Link'] ?? '#'}}"><span
                                            class="fa fa-facebook"></span></a></li>
                                <li><a href="{{$settings['Twitter_Link'] ?? '#'}}"><span
                                            class="fa fa-twitter"></span></a>
                                </li>
                                <li><a href="{{$settings['Instagram_Link'] ?? '#'}}"><span
                                            class="fa fa-instagram"></span></a></li>
                                <li><a href="{{$settings['Pinterest_Link'] ?? '#'}}"><span
                                            class="fa fa-pinterest-square"></span></a></li>
                                <li><a href="{{$settings['Linkedin_Link'] ?? '#'}}"><span
                                            class="fa fa-linkedin"></span></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </footer>

    </div>
    <!--End pagewrapper-->

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>

    <!-- Color Palate / Color Switcher -->

    <div class="color-palate">
        <div class="color-trigger">
            <i class="fa fa-paint-brush"></i>
        </div>
        <div class="color-palate-head">
            <h6>Choose Your Color</h6>
        </div>
        <div class="various-color clearfix">
            <div class="colors-list">
                <span class="palate default-color active"
                    data-theme-file="{{asset('assets')}}/css/color-themes/default-theme.css"></span>
                <span class="palate green-color"
                    data-theme-file="{{asset('assets')}}/css/color-themes/green-theme.css"></span>
                <span class="palate blue-color"
                    data-theme-file="{{asset('assets')}}/css/color-themes/blue-theme.css"></span>
                <span class="palate orange-color"
                    data-theme-file="{{asset('assets')}}/css/color-themes/orange-theme.css"></span>
                <span class="palate purple-color"
                    data-theme-file="{{asset('assets')}}/css/color-themes/purple-theme.css"></span>
                <span class="palate teal-color"
                    data-theme-file="{{asset('assets')}}/css/color-themes/teal-theme.css"></span>
                <span class="palate brown-color"
                    data-theme-file="{{asset('assets')}}/css/color-themes/brown-theme.css"></span>
                <span class="palate redd-color"
                    data-theme-file="{{asset('assets')}}/css/color-themes/redd-color.css"></span>
                <span class="palate olive-color"
                    data-theme-file="{{asset('assets')}}/css/color-themes/olive-theme.css"></span>
                <span class="palate lightblue-color"
                    data-theme-file="{{asset('assets')}}/css/color-themes/lightblue-color.css"></span>
                <span class="palate pink-color"
                    data-theme-file="{{asset('assets')}}/css/color-themes/pink-theme.css"></span>
                <span class="palate hotpink-color"
                    data-theme-file="{{asset('assets')}}/css/color-themes/hotpink-color.css"></span>
            </div>
        </div>

        <ul class="box-version option-box">
            <li class="box">Boxed</li>
            <li>Full width</li>
        </ul>
        <ul class="rtl-version option-box">
            <li class="rtl">RTL Version</li>
            <li>LTR Version</li>
        </ul>

        <a href="#" class="purchase-btn">Purchase now $17</a>

        <div class="palate-foo">
            <span>You will find much more options for colors and styling in admin panel. This color picker is used only
                for demonstation purposes.</span>
        </div>

    </div>

    <script src="{{asset('assets')}}/js/jquery.js"></script>
    <script src="{{asset('assets')}}/js/popper.min.js"></script>
    <script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery.fancybox.js"></script>
    <script src="{{asset('assets')}}/js/appear.js"></script>
    <script src="{{asset('assets')}}/js/owl.js"></script>
    <script src="{{asset('assets')}}/js/wow.js"></script>
    <script src="{{asset('assets')}}/js/slick.js"></script>
    <script src="{{asset('assets')}}/js/jquery-ui.js"></script>
    <script src="{{asset('assets')}}/js/script.js"></script>
    <script src="{{asset('assets')}}/js/validate.js"></script>
    <script src="{{asset('assets')}}/js/color-settings.js"></script>

</body>

</html>