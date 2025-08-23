<!doctype html>
<html class="no-js" lang="en">
<?php

$page_data = !empty($settings['page_data']) ? $settings['page_data'] : [];
$og_tags = !empty($page_data["og_tags"]) ? $page_data["og_tags"] : [];
if (!empty($page_data['page_meta'])) {
    $metas = json_decode($page_data['page_meta']);
}


?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$page_data['seo_title'] ?? ""}}</title>
    <meta name="title" content="{{$page_data['seo_title'] ?? ""}}">
    <meta name="description" content="{{$page_data['seo_desc'] ?? ''}}">
    <meta name="keywords" content="{{$page_data['seo_keywords'] ?? ''}}">
    <meta name="robots" content="noindex, follow">
    <meta name="Robots" content="all">
    <meta name="language" content="en-gb">
    <meta name="rating" content="General">
    <meta name="audience" content="All">
    <meta name="Revisit-After" content="7 days">
    @if(!empty($og_tags))
        @foreach ($og_tags as $tag)
            <meta name="og:{{ $tag["key"] }}" content="{{ $tag['value'] }}">
        @endforeach

    @endif
    @if (!empty($metas))
        @foreach ($metas as $meta)
            <meta name="{{$meta->name}}" content="{{$meta->value}}">
        @endforeach
    @endif
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('brahmani_frontend_assets')}}/images/favicon.ico">
    <!-- CSS
         ============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('brahmani_frontend_assets')}}/css/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{asset('brahmani_frontend_assets')}}/css/fontawesome.css">
    <!-- Flaticon -->
    <link rel="stylesheet" href="{{asset('brahmani_frontend_assets')}}/css/flaticon.css">
    <!-- Base Icons -->
    <link rel="stylesheet" href="{{asset('brahmani_frontend_assets')}}/css/pbminfotech-base-icons.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{asset('brahmani_frontend_assets')}}/css/themify-icons.css">
    <!-- Slick -->
    <link rel="stylesheet" href="{{asset('brahmani_frontend_assets')}}/css/swiper.min.css">
    <!-- Magnific -->
    <link rel="stylesheet" href="{{asset('brahmani_frontend_assets')}}/css/magnific-popup.css">
    <!-- AOS -->
    <link rel="stylesheet" href="{{asset('brahmani_frontend_assets')}}/css/aos.css">
    <!-- Shortcode CSS -->
    <link rel="stylesheet" href="{{asset('brahmani_frontend_assets')}}/css/shortcode.css">
    <!-- Base CSS -->
    <link rel="stylesheet" href="{{asset('brahmani_frontend_assets')}}/css/base.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('brahmani_frontend_assets')}}/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('brahmani_frontend_assets')}}/css/responsive.css">
    <!-- Twentytwenty CSS -->
    <link rel="stylesheet" href="{{asset('brahmani_frontend_assets')}}/css/twentytwenty.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
echo $settings['gtag'] ?? "";
if (!empty($page_data['page_schema'])) {
    echo prepareSchema($settings, $page_data['page_schema']);
}
    ?>
    <?php
if (!empty($page_data['product_schema'])) {
    echo prepareSchema($settings, $page_data['product_schema']);
}
    ?>
    <?php
if (!empty($page_data['product_category_schema'])) {
    echo prepareSchema($settings, $page_data['product_category_schema']);
}
    ?>
    <style>
        .whatsapp-button {
            position: fixed;
            bottom: 160px;
            right: 50px;
            width: 50px;
            height: 50px;
            z-index: 1000;

        }

        .whatsapp-button img {
            width: 100%;
            height: auto;
            border-radius: 50%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
        }

        .whatsapp-button img:hover {
            transform: scale(1.1);
        }

        .mail-button {
            position: fixed;
            bottom: 160px;
            left: 50px;
            width: 50px;
            height: 50px;
            z-index: 1;
        }

        .mail-button img {
            width: 100%;
            height: auto;
            border-radius: 50%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
        }

        .mail-button img:hover {
            transform: scale(1.1);
        }

        .dropdown-menu {
            max-height: 200px;
            /* Set a fixed height for the dropdown */
            overflow-y: auto;
            /* Add scroll functionality if content exceeds the height */
            list-style: none;
            /* Remove default bullet points */
            padding: 0;
            /* Remove padding */
            margin: 0;
            /* Remove margin */
            border: 1px solid #ccc;
            /* Optional: Add a border */
            background-color: #fff;
            /* Optional: Set background color */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Optional: Add a subtle shadow */
        }

        .modal-lg {
            max-width: 90%;
            /* Adjust the percentage as needed */
        }

        .phone_whatsapp {
            height: 73px;
            width: 40px;
            border-radius: 50%;
            /*background-color: green;*/
            position: fixed;
            bottom: 55px;
            right: 40px;
            z-index: 5;
            border: none !important;
        }

        .navigation a {
            color: #000;
            /* Set link color to contrast with background */
            text-decoration: none;
            /* Remove underline */
            padding: 5px 10px;
            /* Optional: link padding */
            display: inline-block;
        }
    </style>
</head>
@php
    use App\Http\Controllers\Controller;
    $success = Session::get('success');
    $error = Session::get('error');

    $errorText = "";
    if (!empty(Session::get("errors"))) {
        $er = get_object_vars(json_decode(Session::get("errors")));
        foreach ($er as $key => $value) {
            $errorText .= $value[0] . '\n';
        }
    }


@endphp

<body>

    <!-- page wrapper -->
    <div class="page-wrapper">

        <!-- Header Main Area -->
        <header class="site-header header-style-1">
            <div class="pbmit-header-overlay">
                <div class="pbmit-main-header-area">
                    <div class="container-fluid">
                        <div class="pbmit-header-content d-flex justify-content-between align-items-center">
                            <div class="pbmit-logo-button-area d-flex justify-content-between align-items-center">
                                <div class="site-branding">
                                    <h6 class="site-title">
                                        <a href="/">
                                            @if (!empty($settings['logo']))
                                                <img src="{{asset('storage')}}/{{$settings['logo']}}" class="Logo"
                                                    alt="{{$settings['Company_Name'] ?? ''}}">
                                            @endif
                                        </a>
                                    </h6>
                                    <div class="pbmit-sticky-corner  pbmit-top-right-corner">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill=""
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20 20V0C20 16 16 20 0 20H20Z" fill="red"></path>
                                        </svg>
                                    </div>
                                    <div class="pbmit-sticky-corner pbmit-bottom-left-corner">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20 20V0C20 12 12 20 0 20H20Z" fill="red"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="pbmit-button-box">
                                    <div class="pbmit-header-button">
                                        <a
                                            href="tel:{{htmlspecialchars(!empty($settings['Official_Number']) ? $settings['Official_Number'] : '')}}">
                                            <span
                                                class="pbmit-header-button-text-1">{{$settings['Official_Number'] ?? ''}}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="site-navigation">
                                <nav class="main-menu navbar-expand-xl navbar-light">
                                    <div class="navbar-header">
                                        <!-- Toggle Button -->
                                        <button class="navbar-toggler" type="button">
                                            <i class="pbmit-base-icon-menu-1"></i>
                                        </button>
                                    </div>
                                    <div class="pbmit-mobile-menu-bg"></div>
                                    <div class="collapse navbar-collapse clearfix show" id="pbmit-menu">
                                        <div class="pbmit-menu-wrap">
                                            <span class="closepanel">
                                                <svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg"
                                                    width="20.163" height="20.163" viewBox="0 0 26.163 26.163">
                                                    <rect width="36" height="1" transform="translate(0.707) rotate(45)">
                                                    </rect>
                                                    <rect width="36" height="1"
                                                        transform="translate(0 25.456) rotate(-45)"></rect>
                                                </svg>
                                            </span>
                                            <ul class="navigation clearfix">
                                                <li>
                                                    <a href="/">Home</a>

                                                </li>

                                                <li>
                                                    <a href="/about_us">About Us</a>

                                                </li>

                                                <li class="dropdown">
                                                    <a href="/product_category_all">Products & Services</a>
                                                    <ul>
                                                        @foreach ($settings['product_categories'] as $category)
                                                            <li><a
                                                                    href="/product_category/{{$category->pro_cat_slug}}">{{$category->pro_cat_name ?? ""}}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="/blog">Blog</a>

                                                </li>
                                                <li>
                                                    <a href="/contact_us">Contact Us</a>

                                                </li>
                                                <li>
                                                    <?php $product_ids = Session::get('wishlist', []); ?>
                                                    <a href="/showWishlist">Wishlist<?php
if (count($product_ids) > 0) {
    echo "<h6 style='color:green'>" . count($product_ids) . "</h6>";
}
                                                                                    ?></a>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                            <div class="pbmit-right-box d-flex align-items-center">
                                <div class="pbmit-header-search-btn">
                                    <a href="/headerSearch" title="Search">
                                        <i class="pbmit-base-icon-search-1"></i>
                                    </a>
                                </div>
                                <div class="pbmit-button-box-second">
                                    <a class="pbmit-btn" href="/contact_us">
                                        <span class="pbmit-button-content-wrapper">
                                            <span class="pbmit-button-text">Consult Us</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <!-- Header Main Area End Here -->

        <!-- Page Content -->
        <div class="page-content">

            @yield('content')

        </div>
        <!-- Page Content End -->
        <a href="https://wa.me/{{ preg_replace('/\D/', '', $settings['Official_Number']) }}" class="whatsapp-button"
            target="_blank">
            <img src="{{asset('brahmani_frontend_assets')}}/images/whatsapp.png" alt="WhatsApp">
        </a>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var productDetailModal = new bootstrap.Modal(document.getElementById('citySelectModal'));
                var callModel = new bootstrap.Modal(document.getElementById('citySelectModalForCall'));
                document.querySelector(".whatsapp-button").addEventListener("click", function (event) {
                    event.preventDefault();
                    productDetailModal.show();
                });
                document.querySelector(".call_button").addEventListener("click", function (event) {
                    event.preventDefault();
                    callModel.show();
                });
            });
        </script>

        <a href="tel:{{htmlspecialchars(!empty($settings['Official_Number']) ? $settings['Official_Number'] : '')}}"
            class="mail-button call_button" id="call_button" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="call">
        </a>

        <!-- footer -->
        <footer class="site-footer footer-style-1 pbmit-bg-color-secondary">
            <div class="footer-wrap pbmit-footer-widget-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <aside class="widget pbmit-two-column-menu">
                                <ul>
                                    <li><a href="/about_us">About Us</a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="/contact_us">Contact Us</a></li>

                                    <li><a href="#"></a></li>

                                    <li><a href="/blog">Blogs</a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="/showWishlist">Wishlist</a></li>
                                    <li><a href="#"></a></li>
                                    <!-- <li><a href="portfolio-detail-style-1.html">Project</a></li> -->
                                </ul>
                            </aside>
                        </div>
                        <div class="col-md-4">
                            <aside class="widget">
                                <div class="textwidget">
                                    <div class="pbmit-footer-logo">
                                        @if (!empty($settings['logo']) && !empty($settings['Company_Name']))
                                            <img src="{{asset('storage')}}/{{$settings['logo']}}"
                                                alt="{{$settings['Company_Name'] ?? ''}}">
                                        @endif
                                        <h3 style="color: white;">{{$settings['Company_Name'] ?? ''}}</h3>
                                        <p style="color: white;">{{$settings['Office_Address'] ?? ''}}</p>
                                        <p style="color: white;">Total Visitors: {{ getVisitorCount() ?? ''}}</p>
                                    </div>
                                </div>
                            </aside>

                        </div>
                        <div class="col-md-4">
                            <aside class="widget pbmit-two-column-menu">
                                <ul>
                                    <li><a href="#"></a></li>
                                    <li><a href="/product_category/0">Our Products</a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="/faq">FAQ</a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="/sitemap">Sitemap</a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="/privacy_policy">Privacy Policy</a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="/calculator">Panel Calculator</a></li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pbmit-footer-big-area-wrapper">
                <div class="footer-wrap pbmit-footer-big-area">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-4 pbmit-footer-left">
                                <span class="pbmit-email-text"> <a href="mailto:{{$settings['Official_Email'] ?? ""}}"
                                        class="__cf_email__"
                                        data-cfemail="2c44494040436c49544d415c4049024f4341">{{$settings['Official_Email'] ?? ""}}</a></span>
                                <span class="pbmit-phone-number"> {{$settings['Official_Number'] ?? ''}}</span>
                            </div>
                            <div class="col-md-4 pbmit-footer-right">
                                <span class="pbmit-address"> </span>
                            </div>
                            <div class="col-md-4 pbmit-footer-right-social">
                                <ul class="pbmit-social-links">
                                    <li class="pbmit-social-li pbmit-social-facebook">
                                        <a title="Facebook" href="{{$settings['Facebook_Link'] ?? '#'}}"
                                            target="_blank">
                                            <span><i class="pbmit-base-icon-facebook-f"></i></span>
                                        </a>
                                    </li>
                                    <li class="pbmit-social-li pbmit-social-twitter">
                                        <a title="Twitter" href="{{$settings['Twitter_Link'] ?? '#'}}" target="_blank">
                                            <span><i class="pbmit-base-icon-twitter-2"></i></span>
                                        </a>
                                    </li>
                                    <li class="pbmit-social-li pbmit-social-linkedin">
                                        <a title="LinkedIn" href="{{$settings['Linkedin_Link'] ?? '#'}}"
                                            target="_blank">
                                            <span><i class="pbmit-base-icon-linkedin-in"></i></span>
                                        </a>
                                    </li>
                                    <li class="pbmit-social-li pbmit-social-instagram">
                                        <a title="Instagram" href="{{$settings['Instagram_Link'] ?? '#'}}"
                                            target="_blank">
                                            <span><i class="pbmit-base-icon-instagram"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pbmit-footer-text-area">
                <div class="pbmit-footer-text-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="pbmit-footer-copyright-text-area"> Copyright © {{date('Y')}}
                                {{$settings['Company_Name'] ?? ""}}, All Rights Reserved.
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="pbmit-footer-copyright-text-area"> Designed By <a
                                    href="https://digitalvyapaar.com" target="_blank">Digital Vyapaar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer End -->

    </div>
    <!-- page wrapper End -->

    <!-- Search Box Start Here -->
    <div class="pbmit-search-overlay">
        <div class="pbmit-icon-close">
            <svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="28.163" height="28.163"
                viewBox="0 0 26.163 26.163">
                <rect width="36" height="1" transform="translate(0.707) rotate(45)"></rect>
                <rect width="36" height="1" transform="translate(0 25.456) rotate(-45)"></rect>
            </svg>
        </div>
        <div class="pbmit-search-outer">
            <form class="pbmit-site-searchform">
                <input type="search" class="form-control field searchform-s" name="s" placeholder="Search …">
                <button type="submit"></button>
            </form>
        </div>
    </div>
    <!-- Search Box End Here -->

    <!-- Scroll To Top -->
    <div class="pbmit-progress-wrap">
        <svg class="pbmit-progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
        </svg>
    </div>
    <!-- Scroll To Top End -->
    <div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="productDetailModalLabel">Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                @include('frontend.search')
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="citySelectModal" tabindex="-1" aria-labelledby="cityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="productDetailModalLabel">Select City</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body (added this!) -->
                <div class="modal-body">
                    <label>
                        <button class="btn btn-success" id="vadodara">Vadodara</button>

                    </label>
                    <br /><br />
                    <label>
                        <button class="btn btn-success" id="merut">Meerut</button>

                    </label>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="citySelectModalForCall" tabindex="-1" aria-labelledby="cityModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="productDetailModalLabel">Select City</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body (added this!) -->
                <div class="modal-body">
                    <label>
                        <button class="btn btn-success" id="vadodaraCall">Vadodara</button>

                    </label>
                    <br /><br />
                    <label>
                        <button class="btn btn-success" id="merutCall">Meerut</button>

                    </label>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- JS
		============================================ -->
    <!-- jQuery JS -->
    <script src="{{asset('brahmani_frontend_assets')}}/js/jquery.min.js"></script>
    <!-- Twentytwenty JS -->
    <script src="{{asset('brahmani_frontend_assets')}}/js/jquery.event.move.js"></script>
    <script src="{{asset('brahmani_frontend_assets')}}/js/jquery.twentytwenty.js"></script>
    <!-- Popper JS -->
    <script src="{{asset('brahmani_frontend_assets')}}/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('brahmani_frontend_assets')}}/js/bootstrap.min.js"></script>
    <!-- jquery Waypoints JS -->
    <script src="{{asset('brahmani_frontend_assets')}}/js/jquery.waypoints.min.js"></script>
    <!-- jquery Appear JS -->
    <script src="{{asset('brahmani_frontend_assets')}}/js/jquery.appear.js"></script>
    <!-- Numinate JS -->
    <script src="{{asset('brahmani_frontend_assets')}}/js/numinate.min.js"></script>
    <!-- Slick JS -->
    <script src="{{asset('brahmani_frontend_assets')}}/js/swiper.min.js"></script>
    <!-- Magnific JS -->
    <script src="{{asset('brahmani_frontend_assets')}}/js/jquery.magnific-popup.min.js"></script>
    <!-- Circle Progress JS -->
    <script src="{{asset('brahmani_frontend_assets')}}/js/circle-progress.js"></script>
    <!-- countdown JS -->
    <script src="{{asset('brahmani_frontend_assets')}}/js/jquery.countdown.min.js"></script>
    <!-- AOS -->
    <script src="{{asset('brahmani_frontend_assets')}}/js/aos.js"></script>
    <!-- GSAP -->
    <script src='{{asset('brahmani_frontend_assets')}}/js/gsap.js'></script>
    <!-- Scroll Trigger -->
    <script src='{{asset('brahmani_frontend_assets')}}/js/ScrollTrigger.js'></script>
    <!-- Split Text -->
    <script src='{{asset('brahmani_frontend_assets')}}/js/SplitText.js'></script>
    <!-- Magnetic -->
    <script src='{{asset('brahmani_frontend_assets')}}/js/magnetic.js'></script>
    <!-- Morphext JS -->
    <script src="{{asset('brahmani_frontend_assets')}}/js/morphext.min.js"></script>
    <script src="{{asset('brahmani_frontend_assets')}}/js/popper.min.js"></script>
    <!-- GSAP Animation -->
    <script src='{{asset('brahmani_frontend_assets')}}/js/gsap-animation.js'></script>
    <!-- Isotope JS -->
    <script src="{{asset('brahmani_frontend_assets')}}/js/isotope.pkgd.min.js"></script>
    <!-- Scripts JS -->
    <script src="{{asset('brahmani_frontend_assets')}}/js/scripts.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var search = "<?php echo isset($settings['search']) ? addslashes($settings['search']) : ''; ?>";
            console.log(search);
            if (search !== "") {
                var productDetailModal = new bootstrap.Modal(document.getElementById('productDetailModal'));
                productDetailModal.show();
            }
        });
        document.getElementById('productDetailModal').addEventListener('hide.bs.modal', function () {
            // Remove query string
            const url = new URL(window.location.href);
            url.search = ""; // Clear the query string
            window.history.replaceState({}, document.title, url.toString());

            // Reload the page
            location.reload();
        });

        function processWishlist(id, quantity) {
            console.log("processing: ", id);
            $.ajax({
                url: '/wishlist/' + id + '/' + 1,
                type: 'GET',
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        Swal.fire({
                            title: 'Done',
                            text: "Product Added To Wishlist.Please go to whishlist section to raise a query",
                            icon: 'success',
                            confirmButtonText: 'Okay',

                        }).then((result) => {
                            if (result.isConfirmed) {
                                //window.location.reload();
                            }
                        })
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
        var success = "{{!empty($success) ? $success : 'NA'}}";
        var error = "{{!empty($error) ? $error : 'NA'}}";
        var errorText = "{{!empty($errorText) ? $errorText : 'NA'}}";
        console.log(success, error, errorText);
        if (success != 'NA') {
            Swal.fire({
                title: 'Done',
                text: success,
                icon: 'success',
                confirmButtonText: 'Okay',

            }).then((result) => {
                if (result.isConfirmed) {
                    //window.location.reload();
                }
            })
        }
        if (error != 'NA') {
            Swal.fire({
                title: 'Failed!',
                text: error,
                icon: 'error',
                confirmButtonText: 'Okay',

            });
        }
        if (errorText != 'NA') {
            Swal.fire({
                title: 'Failed!',
                text: errorText,
                icon: 'error',
                confirmButtonText: 'Okay',

            });
        }
        var vadodara = document.getElementById('vadodara');
        var merut = document.getElementById('merut');
        var vadodaraCall = document.getElementById('vadodaraCall');
        var merutCall = document.getElementById('merutCall');
        var city = "vadodara";
        vadodara.addEventListener('click', function () {
            triggerWhatsapp("{{ preg_replace('/\D/', '', $settings['Official_Number_Vadodara']) }}");
        });
        merut.addEventListener('click', function () {
            triggerWhatsapp("{{ preg_replace('/\D/', '', $settings['Official_Number_Merut']) }}");
        });
        vadodaraCall.addEventListener('click', function () {
            triggerCall("{{ preg_replace('/\D/', '', $settings['Official_Number_Vadodara']) }}");
        });
        merutCall.addEventListener('click', function () {
            triggerCall("{{ preg_replace('/\D/', '', $settings['Official_Number_Merut']) }}");
        });
        function triggerCall(number) {
            var url = "tel:" + number;
            let newTab = window.open(url);
            if (!newTab || newTab.closed || typeof newTab.closed === "undefined") {
                alert("Popup blocked! Please allow popups for this site.");
            }
        }
        function triggerWhatsapp(number) {
            let url = window.innerWidth > 768 ? "https://web.whatsapp.com/send?phone=" + number : "https://wa.me/" + number;
            console.log("Opening WhatsApp URL: ", url);
            let newTab = window.open(url);
            if (!newTab || newTab.closed || typeof newTab.closed === "undefined") {
                alert("Popup blocked! Please allow popups for this site.");
            }
        }
    </script>
</body>
@yield('custom_javascript')

</html>