@extends('layouts.site')
@section('content')
<?php

$sliders = !empty($settings['page_data']) ? json_decode($settings['page_data']->page_sliders) : [];

?>
<style>
    .product-image {
        max-height: 400px;
        object-fit: cover;
    }

    .swiper-navigation {
        text-align: center;
        margin-top: 20px;
    }

    .previ,
    .nex {
        background: #333;
        color: #fff;
        border: none;
        padding: 10px 15px;
        font-size: 18px;
        cursor: pointer;
        border-radius: 5px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
    }

    .swiper-button-prev {
        left: -5px;
        /* Move left button outside */
    }

    .swiper-button-next {
        right: -5px;
        /* Move right button outside */
    }

    @media screen and (orientation: landscape) {
        .carousel img {
            height: 100vh;
        }
    }
</style>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        @foreach ($sliders as $slider)
        <?php $sliderUrl = asset('storage') . "/" . $slider; ?>
        <div class="carousel-item active">
            <img src="{{$sliderUrl}}" class="d-block w-100" alt="...">
        </div>
        @endforeach


    </div>

</div>


<!-- About -->
<section class="section-xl">
    <div class="container">
        <div class="row g-0">
            <div class="col-md-12 col-xl-6">
                <div class="about-one-leftbox">
                    <div class="ihbox-style-area">
                        <div class="pbmit-ihbox-style-12">
                            <div class="pbmit-ihbox-headingicon">
                                <div class="pbmit-ihbox-icon">
                                    <div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
                                        <i class="pbmit-xinterio-icon pbmit-xinterio-icon-award"></i>
                                    </div>
                                </div>
                                <div class="pbmit-ihbox-contents">
                                    <h2 class="pbmit-element-title">Best Awarded <br>Company </h2>
                                </div>
                                <div class="pbmit-sticky-corner  pbmit-bottom-left-corner">
                                    <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M30 30V0C30 16 16 30 0 30H30Z"></path>
                                    </svg>
                                </div>
                                <div class="pbmit-sticky-corner pbmit-top-right-corner">
                                    <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M30 30V0C30 16 16 30 0 30H30Z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-6">
                <div class="about-one-rightbox">
                    <div class="pbmit-heading-subheading animation-style2">
                        <h4 class="pbmit-subtitle">since 2009</h4>
                        <h2 class="pbmit-title">Building Excellence, Together.</h2>
                        <div class="pbmit-heading-desc">
                            Brahmani Enterprises is a leading provider of high-quality construction materials, serving
                            the Indian market for over 16 years. We specialize in a wide range of products, including
                            PVC panels, louvers, gypsum boards, and more. Our commitment to quality, customer
                            satisfaction, and innovation has made us a trusted partner for builders, contractors, and
                            homeowners across the country.
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <article class="pbmit-miconheading-style-9">
                                <div class="pbmit-ihbox-style-9">
                                    <div class="pbmit-ihbox-box d-flex align-items-center">
                                        <div class="pbmit-ihbox-icon">
                                            <div class="pbmit-ihbox-icon-wrapper">
                                                <div class="pbmit-icon-wrapper pbmit-icon-type-icon">
                                                    <i class="pbmit-xinterio-icon pbmit-xinterio-icon-tools"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pbmit-ihbox-contents">
                                            <h2 class="pbmit-element-title">
                                                Commercial
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <article class="pbmit-miconheading-style-9">
                                <div class="pbmit-ihbox-style-9">
                                    <div class="pbmit-ihbox-box d-flex align-items-center">
                                        <div class="pbmit-ihbox-icon">
                                            <div class="pbmit-ihbox-icon-wrapper">
                                                <div class="pbmit-icon-wrapper pbmit-icon-type-icon">
                                                    <i class="pbmit-xinterio-icon pbmit-xinterio-icon-hard-hat"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pbmit-ihbox-contents">
                                            <h2 class="pbmit-element-title">
                                                industrial
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <article class="pbmit-miconheading-style-9">
                                <div class="pbmit-ihbox-style-9">
                                    <div class="pbmit-ihbox-box d-flex align-items-center">
                                        <div class="pbmit-ihbox-icon">
                                            <div class="pbmit-ihbox-icon-wrapper">
                                                <div class="pbmit-icon-wrapper pbmit-icon-type-icon">
                                                    <i class="pbmit-xinterio-icon pbmit-xinterio-icon-offer"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pbmit-ihbox-contents">
                                            <h2 class="pbmit-element-title">
                                                Residential
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <article class="pbmit-miconheading-style-9">
                                <div class="pbmit-ihbox-style-9">
                                    <div class="pbmit-ihbox-box d-flex align-items-center">
                                        <div class="pbmit-ihbox-icon">
                                            <div class="pbmit-ihbox-icon-wrapper">
                                                <div class="pbmit-icon-wrapper pbmit-icon-type-icon">
                                                    <i class="pbmit-xinterio-icon pbmit-xinterio-icon-house-design"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pbmit-ihbox-contents">
                                            <h2 class="pbmit-element-title">
                                                Corporate
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <!-- <div class="pbmit-ihbox pbmit-ihbox-style-5 pt-5">
									<div class="pbmit-ihbox-box d-flex align-items-center">
										<div class="pbmit-content-wrapper">
											<h2 class="pbmit-element-title">Jemilin E william</h2>
											<div class="pbmit-heading-desc">Founder</div>
										</div>
										<div class="pbmit-icon-wrapper">
											<div class="pbmit-ihbox-icon">
												<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
													<img src="images/homepage-1/sign.png" alt="Jemilin E william">
												</div>
											</div>
										</div>
									</div>
								</div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fid Start -->
<section class="section-lgb">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-6 col-xl-4">
                <div class="pbminfotech-ele-fid-style-2">
                    <div class="pbmit-fld-contents">
                        <div class="pbmit-fld-wrap">
                            <div class="pbmit-fid-icon-title justify-content-center text-center">
                                <div class="pbmit-sbox-icon-wrapper pbmit-icon-type-icon">
                                    <i class="pbmit-xinterio-icon pbmit-xinterio-icon-offer"></i>
                                </div>
                                <span class="pbmit-fid-title">Years of Experience</span>
                            </div>
                            <h4 class="pbmit-fid-inner">
                                <span class="pbmit-fid-before"></span>
                                <span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits"
                                    data-from="0" data-to="16" data-interval="1" data-before="" data-before-style=""
                                    data-after="" data-after-style="">16</span>
                                <span class="pbmit-fid"><sup>+</sup></span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="pbminfotech-ele-fid-style-2">
                    <div class="pbmit-fld-contents">
                        <div class="pbmit-fld-wrap">
                            <div class="pbmit-fid-icon-title justify-content-center text-center">
                                <div class="pbmit-sbox-icon-wrapper pbmit-icon-type-icon">
                                    <i class="pbmit-xinterio-icon pbmit-xinterio-icon-engineer"></i>
                                </div>
                                <span class="pbmit-fid-title">Satisfied Customers</span>
                            </div>
                            <h4 class="pbmit-fid-inner">
                                <span class="pbmit-fid-before"></span>
                                <span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits"
                                    data-from="0" data-to="150000" data-interval="5000" data-before=""
                                    data-before-style="" data-after="" data-after-style="">150000</span>
                                <span class="pbmit-fid"><sup>+</sup></span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="pbminfotech-ele-fid-style-2">
                    <div class="pbmit-fld-contents">
                        <div class="pbmit-fld-wrap">
                            <div class="pbmit-fid-icon-title justify-content-center text-center">
                                <div class="pbmit-sbox-icon-wrapper pbmit-icon-type-icon">
                                    <i class="pbmit-xinterio-icon pbmit-xinterio-icon-client"></i>
                                </div>
                                <span class="pbmit-fid-title">Product Range</span>
                            </div>
                            <h4 class="pbmit-fid-inner">
                                <span class="pbmit-fid-before"></span>
                                <span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits"
                                    data-from="0" data-to="600" data-interval="50" data-before="" data-before-style=""
                                    data-after="" data-after-style="">600</span>
                                <span class="pbmit-fid"><span>+</span></span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Fid End -->

<!-- Service Start -->
<section class="pbmit-extend-animation service-one pbmit-bg-color-secondary">
    <div class="container">
        <div class="text-center position-relative">
            <div class="pbmit-heading-subheading text-center animation-style2">
                <h4 class="pbmit-subtitle">Explore</h4>
                <h2 class="pbmit-title">What we offer for you</h2>
            </div>
            <div class="pbmit-service-highlight">
                <h2>Our Products</h2>
            </div>
        </div>

        <!-- Swiper Navigation Buttons -->
        <div class="swiper-navigation">
            <button class="swiper-button-prev previ">‹</button>
            <button class="swiper-button-next nex">›</button>
        </div>

        <div class="swiper-slider slider2" data-autoplay="false" data-loop="true" data-dots="false" data-arrows="false"
            data-columns="3" data-margin="30" data-effect="slide">
            <div class="swiper-wrapper">
                @if (!empty($latest_categories) && count($latest_categories) > 0)
                @foreach ($latest_categories as $categories)
                <!-- Slide -->
                <article class="pbmit-ele-service pbmit-service-style-2 swiper-slide">
                    <div class="pbminfotech-post-item">
                        <div class="pbminfotech-box-content">
                            <div class="pbmit-service-image-wrapper">
                                <div class="pbmit-featured-img-wrapper">
                                    <div class="pbmit-featured-wrapper">
                                        <img src="{{asset('storage')}}/{{$categories->pro_cat_image}}"
                                            alt="{{$categories->pro_cat_name ?? ''}}" class="img-fluid product-image">
                                    </div>
                                </div>
                            </div>
                            <div class="pbmit-content-box">
                                <div class="pbmit-serv-cat">
                                    <a href="#" rel="tag">Kitchen</a>
                                </div>
                                <h3 class="pbmit-service-title">
                                    <a href="/product_category/{{$categories->pro_cat_slug}}">
                                        {{$categories->pro_cat_name ?? ''}}
                                    </a>
                                </h3>
                                <div class="pbmit-service-description">
                                    <p>{{$categories->pro_cat_description ?? "Add description by editing 'product category description' "}}.</p>
                                </div>
                            </div>
                        </div>
                        <a class="pbmit-service-btn" href="/product_category/{{$categories->pro_cat_slug}}"
                            title="Transforming Rooms">
                            <span class="pbmit-button-icon">
                                <i class="pbmit-base-icon-pbmit-up-arrow"></i>
                            </span>
                        </a>
                    </div>
                </article>
                @endforeach
                @endif
            </div>
        </div>

        <div class="text-center">
            <div class="pbmit-service-text">
                <p>Have a specific need? We can help! <a href="/contact_us"><span class="pbmit-globalcolor">Contact us</span></a></p>
            </div>
        </div>
    </div>
</section>
<!-- Ihbox Start -->
<section class="section-md">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-4">
                <div class="pbmit-heading-subheading animation-style2">
                    <h4 class="pbmit-subtitle">since 2009</h4>
                    <h2 class="pbmit-title">Why choose us</h2>
                </div>
            </div>
            <div class="col-md-12 col-xl-6">
                <div class="pbmit-heading-desc">
                    At Brahmani Enterprises, we are more than just a supplier of construction materials. <br>We are your
                    trusted partners, dedicated to providing exceptional service and ensuring your project's success.
                </div>
            </div>
            <div class="col-md-12 col-xl-2">
                <a class="pbmit-btn pbmit-btn-outline" href="/contact_us">
                    <span class="pbmit-button-content-wrapper">
                        <span class="pbmit-button-text">Contact Us Today</span>
                    </span>
                </a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-3 ihbox-one-left-col">
                <div class="row">
                    <article class="pbmit-miconheading-style-8 col-md-12">
                        <div class="pbmit-ihbox-style-8">
                            <div class="pbmit-ihbox-box d-flex">
                                <div class="pbmit-ihbox-icon">
                                    <div class="pbmit-ihbox-icon-wrapper">
                                        <div class="pbmit-icon-wrapper pbmit-icon-type-icon">
                                            <i class="pbmit-xinterio-icon pbmit-xinterio-icon-stairs"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="pbmit-ihbox-contents">
                                    <h2 class="pbmit-element-title">
                                        Quality Assurance
                                    </h2>
                                    <div class="pbmit-heading-desc">We prioritize the highest quality standards in all
                                        our products.</div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="pbmit-miconheading-style-8 col-md-12">
                        <div class="pbmit-ihbox-style-8">
                            <div class="pbmit-ihbox-box d-flex">
                                <div class="pbmit-ihbox-icon">
                                    <div class="pbmit-ihbox-icon-wrapper">
                                        <div class="pbmit-icon-wrapper pbmit-icon-type-icon">
                                            <i class="pbmit-xinterio-icon pbmit-xinterio-icon-3d"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="pbmit-ihbox-contents">
                                    <h2 class="pbmit-element-title">
                                        Extensive Experience
                                    </h2>
                                    <div class="pbmit-heading-desc">With over 16 years in the industry, we possess
                                        in-depth knowledge and expertise.</div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="pbmit-miconheading-style-8 col-md-12">
                        <div class="pbmit-ihbox-style-8">
                            <div class="pbmit-ihbox-box d-flex">
                                <div class="pbmit-ihbox-icon">
                                    <div class="pbmit-ihbox-icon-wrapper">
                                        <div class="pbmit-icon-wrapper pbmit-icon-type-icon">
                                            <i class="pbmit-xinterio-icon pbmit-xinterio-icon-kitchen"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="pbmit-ihbox-contents">
                                    <h2 class="pbmit-element-title">
                                        Wide Selection
                                    </h2>
                                    <div class="pbmit-heading-desc">Explore a comprehensive range of construction
                                        materials to suit your every need.</div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-md-6 ihbox-one-img-col">
                <div class="ihbox-imgbox">
                    <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/ih-single-img-01.png"
                        class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-md-3 ihbox-one-right-col">
                <div class="row">
                    <article class="pbmit-miconheading-style-8 col-md-12">
                        <div class="pbmit-ihbox-style-8">
                            <div class="pbmit-ihbox-box d-flex">
                                <div class="pbmit-ihbox-icon">
                                    <div class="pbmit-ihbox-icon-wrapper">
                                        <div class="pbmit-icon-wrapper pbmit-icon-type-icon">
                                            <i class="pbmit-xinterio-icon pbmit-xinterio-icon-axis"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="pbmit-ihbox-contents">
                                    <h2 class="pbmit-element-title">
                                        Customer Focus
                                    </h2>
                                    <div class="pbmit-heading-desc">We are dedicated to providing personalized service
                                        and exceeding your expectations.</div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="pbmit-miconheading-style-8 col-md-12">
                        <div class="pbmit-ihbox-style-8">
                            <div class="pbmit-ihbox-box d-flex">
                                <div class="pbmit-ihbox-icon">
                                    <div class="pbmit-ihbox-icon-wrapper">
                                        <div class="pbmit-icon-wrapper pbmit-icon-type-icon">
                                            <i class="pbmit-xinterio-icon pbmit-xinterio-icon-brickwall-1"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="pbmit-ihbox-contents">
                                    <h2 class="pbmit-element-title">
                                        Competitive Pricing
                                    </h2>
                                    <div class="pbmit-heading-desc">Enjoy competitive prices and attractive deals on a
                                        wide range of products.</div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="pbmit-miconheading-style-8 col-md-12">
                        <div class="pbmit-ihbox-style-8">
                            <div class="pbmit-ihbox-box d-flex">
                                <div class="pbmit-ihbox-icon">
                                    <div class="pbmit-ihbox-icon-wrapper">
                                        <div class="pbmit-icon-wrapper pbmit-icon-type-icon">
                                            <i class="pbmit-xinterio-icon pbmit-xinterio-icon-pantone"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="pbmit-ihbox-contents">
                                    <h2 class="pbmit-element-title">
                                        Reliable Delivery
                                    </h2>
                                    <div class="pbmit-heading-desc">We ensure timely and reliable delivery of your
                                        orders.</div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial Start -->
<section class="pbmit-bg-color-light testimonial-one">
    <div class="container pbmit-col-stretched-yes pbmit-col-right">
        <div class="pbmit-col-stretched-right">
            <div class="row g-0">
                <div class="col-md-12 col-lg-3">
                    <div class="pbmit-testimonialbox-left">
                        <div class="pbmit-heading-subheading animation-style2">
                            <h4 class="pbmit-subtitle">Client feedback</h4>
                            <h2 class="pbmit-title">Hear from clients.</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-9 pbmit-testimonialbox-right">
                    <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="false"
                        data-arrows="true" data-columns="2.6" data-margin="30" data-effect="slide">
                        <div class="swiper-wrapper">
                            <!-- Slide1 -->
                            <article class="pbmit-testimonial-style-1 swiper-slide">
                                <div class="pbminfotech-post-item">
                                    <div class="pbmit-box-content-wrap">
                                        <div class="pbminfotech-box-star-ratings">
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                        </div>
                                        <div class="pbminfotech-box-desc">
                                            <blockquote class="pbminfotech-testimonial-text">
                                                <p>We used Brahmani Enterprises' PVC panels for our new office in
                                                    Mumbai. The quality is excellent, and the installation was seamless.
                                                    The team was very professional and helpful throughout the process.
                                                </p>
                                            </blockquote>
                                        </div>
                                        <div class="pbminfotech-box-author">
                                            <div class="pbmit-auther-content">
                                                <h3 class="pbminfotech-box-title">Mr. Rajesh Sharma</h3>
                                                <div class="pbminfotech-testimonial-detail">Mumbai</div>
                                            </div>
                                        </div>
                                        <div class="pbminfotech-box-img">
                                            <div class="pbmit-featured-img-wrapper">
                                                <div class="pbmit-featured-wrapper">
                                                    <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/reviewer/reviewer-01.jpg"
                                                        class="img-fluid" alt="reviewer-04">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- Slide2 -->
                            <article class="pbmit-testimonial-style-1 swiper-slide">
                                <div class="pbminfotech-post-item">
                                    <div class="pbmit-box-content-wrap">
                                        <div class="pbminfotech-box-star-ratings">
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                        </div>
                                        <div class="pbminfotech-box-desc">
                                            <blockquote class="pbminfotech-testimonial-text">
                                                <p>We were extremely impressed with the quality of the gypsum boards
                                                    from Brahmani Enterprises. We used them for our restaurant
                                                    renovation in Vadodara, and they have significantly improved the
                                                    overall look and feel of the space.</p>
                                            </blockquote>
                                        </div>
                                        <div class="pbminfotech-box-author">
                                            <div class="pbmit-auther-content">
                                                <h3 class="pbminfotech-box-title">Ms. Priya Singh</h3>
                                                <div class="pbminfotech-testimonial-detail">Vadodara</div>
                                            </div>
                                        </div>
                                        <div class="pbminfotech-box-img">
                                            <div class="pbmit-featured-img-wrapper">
                                                <div class="pbmit-featured-wrapper">
                                                    <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/reviewer/reviewer-02.jpg"
                                                        class="img-fluid" alt="reviewer-04">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- Slide3 -->
                            <article class="pbmit-testimonial-style-1 swiper-slide">
                                <div class="pbminfotech-post-item">
                                    <div class="pbmit-box-content-wrap">
                                        <div class="pbminfotech-box-star-ratings">
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                        </div>
                                        <div class="pbminfotech-box-desc">
                                            <blockquote class="pbminfotech-testimonial-text">
                                                <p>Brahmani Enterprises provided us with excellent service and a wide
                                                    range of high-quality construction materials for our residential
                                                    project in Channi We are very satisfied with their products and
                                                    would highly recommend them.</p>
                                            </blockquote>
                                        </div>
                                        <div class="pbminfotech-box-author">
                                            <div class="pbmit-auther-content">
                                                <h3 class="pbminfotech-box-title">Mr. Vijay Kumar</h3>
                                                <div class="pbminfotech-testimonial-detail">Channi, Vadodara</div>
                                            </div>
                                        </div>
                                        <div class="pbminfotech-box-img">
                                            <div class="pbmit-featured-img-wrapper">
                                                <div class="pbmit-featured-wrapper">
                                                    <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/reviewer/reviewer-03.jpg"
                                                        class="img-fluid" alt="reviewer-04">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- Slide4 -->
                            <article class="pbmit-testimonial-style-1 swiper-slide">
                                <div class="pbminfotech-post-item">
                                    <div class="pbmit-box-content-wrap">
                                        <div class="pbminfotech-box-star-ratings">
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                            <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                        </div>
                                        <div class="pbminfotech-box-desc">
                                            <blockquote class="pbminfotech-testimonial-text">
                                                <p>We used Brahmani Enterprises' PVC panels for our new showroom in
                                                    Meerut. The panels are durable, easy to clean, and give our showroom
                                                    a modern and professional look.</p>
                                            </blockquote>
                                        </div>
                                        <div class="pbminfotech-box-author">
                                            <div class="pbmit-auther-content">
                                                <h3 class="pbminfotech-box-title">Mr. Arun Kumar</h3>
                                                <div class="pbminfotech-testimonial-detail">Meerut</div>
                                            </div>
                                        </div>
                                        <div class="pbminfotech-box-img">
                                            <div class="pbmit-featured-img-wrapper">
                                                <div class="pbmit-featured-wrapper">
                                                    <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/reviewer/reviewer-04.jpg"
                                                        class="img-fluid" alt="reviewer-04">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ihbox-style-area">
            <div class="pbmit-ihbox-style-2">
                <div class="pbmit-ihbox-headingicon">
                    <div class="pbmit-ihbox-contents d-flex align-items-center">
                        <div class="pbmit-title-wrap">
                            <h2 class="pbmit-element-title">4.9</h2>
                        </div>
                        <div class="pbmit-icon-wrap">
                            <div class="pbmit-ihbox-svg">
                                <div class="pbmit-ihbox-svg-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="90.51"
                                        viewBox="0 0 512 90.51">
                                        <path
                                            d="M89.26,29.43l-24.9-3.62L53.23,3.33c-2.2-4.44-9.48-4.44-11.68,0L30.42,25.81,5.58,29.43A6.52,6.52,0,0,0,2,40.55L20,58.11,15.74,82.88a6.51,6.51,0,0,0,9.46,6.87l22.19-11.7,22.25,11.7a6.5,6.5,0,0,0,3,.75,6.51,6.51,0,0,0,6.43-7.62L74.86,58.11l18-17.56a6.52,6.52,0,0,0-3.62-11.12Z">
                                        </path>
                                        <path
                                            d="M193.55,29.43l-24.9-3.62L157.52,3.33c-2.2-4.44-9.48-4.44-11.68,0L134.71,25.81l-24.84,3.62a6.52,6.52,0,0,0-3.61,11.12l18,17.56L120,82.88a6.52,6.52,0,0,0,9.47,6.87l22.19-11.7,22.25,11.7a6.5,6.5,0,0,0,3,.75,6.51,6.51,0,0,0,6.43-7.62l-4.24-24.77,18-17.56a6.52,6.52,0,0,0-3.62-11.12Z">
                                        </path>
                                        <path
                                            d="M297.84,29.43l-24.9-3.62L261.81,3.33c-2.2-4.44-9.48-4.44-11.68,0L239,25.81l-24.84,3.62a6.52,6.52,0,0,0-3.61,11.12l18,17.56-4.25,24.77a6.52,6.52,0,0,0,9.47,6.87L256,78.05l22.25,11.7a6.5,6.5,0,0,0,3,.75,6.51,6.51,0,0,0,6.43-7.62l-4.24-24.77,18-17.56a6.52,6.52,0,0,0-3.62-11.12Z">
                                        </path>
                                        <path
                                            d="M402.13,29.43l-24.9-3.62L366.1,3.33c-2.2-4.44-9.48-4.44-11.69,0L343.29,25.81l-24.84,3.62a6.52,6.52,0,0,0-3.61,11.12l18,17.56L328.6,82.88a6.52,6.52,0,0,0,9.47,6.87l22.18-11.7,22.26,11.7a6.5,6.5,0,0,0,3,.75A6.51,6.51,0,0,0,392,82.88l-4.24-24.77,18-17.56a6.52,6.52,0,0,0-3.61-11.12Z">
                                        </path>
                                        <path
                                            d="M511.68,33.86a6.54,6.54,0,0,0-5.26-4.43l-24.9-3.62L470.39,3.33c-2.2-4.44-9.48-4.44-11.69,0L447.58,25.81l-24.84,3.62a6.52,6.52,0,0,0-3.61,11.12l18,17.56-4.25,24.77a6.52,6.52,0,0,0,6.42,7.62,6.61,6.61,0,0,0,3.05-.75l22.19-11.7,22.26,11.7a6.46,6.46,0,0,0,6.86-.5,6.53,6.53,0,0,0,2.59-6.37L492,58.11l18-17.56A6.54,6.54,0,0,0,511.68,33.86Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <h4 class="pbmit-element-heading">
                                1000+ Rating
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial End -->
<!-- Client Start -->
<section class="section-lgb pbmit-bg-color-light">
    <div class="container">
        <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="false" data-arrows="false"
            data-columns="6" data-margin="0" data-effect="slide">
            <div class="swiper-wrapper">
                <!-- Slide1 -->
                <article class="pbmit-client-style-1 swiper-slide">
                    <div class="pbmit-border-wrapper">
                        <div class="pbmit-client-wrapper pbmit-client-with-hover-img">
                            <h4 class="pbmit-hide">Client 12</h4>
                            <div class="pbmit-client-hover-img">
                                <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-global-01.png"
                                    class="img-fluid" alt="">

                            </div>
                            <div class="pbmit-featured-img-wrapper">
                                <div class="pbmit-featured-wrapper">
                                    <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-grey-01.png"
                                        class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- Slide2 -->
                <article class="pbmit-client-style-1 swiper-slide">
                    <div class="pbmit-border-wrapper">
                        <div class="pbmit-client-wrapper pbmit-client-with-hover-img">
                            <h4 class="pbmit-hide">Client 12</h4>
                            <div class="pbmit-client-hover-img">
                                <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-global-02.png"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="pbmit-featured-img-wrapper">
                                <div class="pbmit-featured-wrapper">
                                    <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-grey-02.png"
                                        class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Slide4 -->
                <article class="pbmit-client-style-1 swiper-slide">
                    <div class="pbmit-border-wrapper">
                        <div class="pbmit-client-wrapper pbmit-client-with-hover-img">
                            <h4 class="pbmit-hide">Client 12</h4>
                            <div class="pbmit-client-hover-img">
                                <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-global-04.png"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="pbmit-featured-img-wrapper">
                                <div class="pbmit-featured-wrapper">
                                    <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-grey-04.png"
                                        class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- Slide5 -->
                <article class="pbmit-client-style-1 swiper-slide">
                    <div class="pbmit-border-wrapper">
                        <div class="pbmit-client-wrapper pbmit-client-with-hover-img">
                            <h4 class="pbmit-hide">Client 12</h4>
                            <div class="pbmit-client-hover-img">
                                <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-global-05.png"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="pbmit-featured-img-wrapper">
                                <div class="pbmit-featured-wrapper">
                                    <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-grey-05.png"
                                        class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- Slide6 -->
                <article class="pbmit-client-style-1 swiper-slide">
                    <div class="pbmit-border-wrapper">
                        <div class="pbmit-client-wrapper pbmit-client-with-hover-img">
                            <h4 class="pbmit-hide">Client 12</h4>
                            <div class="pbmit-client-hover-img">
                                <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-global-06.png"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="pbmit-featured-img-wrapper">
                                <div class="pbmit-featured-wrapper">
                                    <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-grey-06.png"
                                        class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- Slide7 -->
                <article class="pbmit-client-style-1 swiper-slide">
                    <div class="pbmit-border-wrapper">
                        <div class="pbmit-client-wrapper pbmit-client-with-hover-img">
                            <h4 class="pbmit-hide">Client 12</h4>
                            <div class="pbmit-client-hover-img">
                                <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-global-07.png"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="pbmit-featured-img-wrapper">
                                <div class="pbmit-featured-wrapper">
                                    <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-grey-07.png"
                                        class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- Slide8 -->
                <article class="pbmit-client-style-1 swiper-slide">
                    <div class="pbmit-border-wrapper">
                        <div class="pbmit-client-wrapper pbmit-client-with-hover-img">
                            <h4 class="pbmit-hide">Client 12</h4>
                            <div class="pbmit-client-hover-img">
                                <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-global-08.png"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="pbmit-featured-img-wrapper">
                                <div class="pbmit-featured-wrapper">
                                    <img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-grey-08.png"
                                        class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<!-- Client End -->

<!-- Video Start -->
<section class="pbmit-bg-color-secondary video-section-one fadeIn animated animated-slow">
    <div class="pbmit-bg-overlay"></div>
    <div class="container">
        <div class="text-center">
            <div class="pbmit-heading-subheading-style-1 animation-style4">
                <h4 class="pbmit-subtitle">Brahmani Enterprise</h4>
                <h2 class="pbmit-title">Experience the luxury of elegant interiors. Explore our products and elevate
                    your <br><span id="js-rotating">Houses, Apratemnts, Villas, Offices, Restaurants, Shopping
                        Malls</span> spaces.</h2>
            </div>
            <div class="play-button">
                <a class="pbmit-icon pbmin-lightbox-video" href="{{$settings['youtube_link_homepage'] ?? ''}}">
                    <i class="fa fa-play"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Video Start -->

<!-- Blog Start -->
<section class="section-md">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="pbmit-heading-subheading animation-style4">
                    <h4 class="pbmit-subtitle">What we do</h4>
                    <h2 class="pbmit-title">Latest posts & articles</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="blog-btn">
                    <a class="pbmit-btn pbmit-btn-outline" href="/blog">
                        <span class="pbmit-button-content-wrapper">
                            <span class="pbmit-button-text">See all blogs</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row g-0 align-items-center">
            <div class="col-md-12 col-xl-4 col-12">
                <div class="row">
                    <div class="blog-one-left-col">
                        @foreach ($blogPosts as $post)
                        <article class="pbmit-ele-blog pbmit-blog-style-2 col-md-12">
                            <div class="post-item">
                                <div class="pbminfotech-box-content">
                                    <div class="pbminfotech-content-inner">
                                        <div class="pbmit-featured-img-wrapper">
                                            <div class="pbmit-featured-wrapper">
                                                <img src="{{ url('/storage/' . $post->featured_image) }}"
                                                    class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="pbmit-meta-wraper">
                                            <div class="pbmit-meta-date-wrapper pbmit-meta-line">
                                                <div class="pbmit-meta-date">
                                                    <span class="pbmit-post-date">
                                                        <i class="pbmit-base-icon-calendar-3"></i>{{date("M d, Y", strtotime($post->published_at))}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="pbmit-meta-author pbmit-meta-line">
                                                <span class="pbmit-post-author">
                                                    <i class="pbmit-base-icon-user-3"></i>
                                                    <span>By</span>admin
                                                </span>
                                            </div>
                                            <div class="pbmit-content-wrapper">
                                                <h3 class="pbmit-post-title">
                                                    <a href="/blog_detail/{{$post->id}}">{{$post->title??""}}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach


                    </div>
                </div>
            </div>
            @if (!empty($largePost->id))
            <div class="col-md-12 col-xl-8 col">
                <div class="blog-one-right-col">
                    <article class="pbmit-ele-blog pbmit-blog-style-3">
                        <div class="post-item d-flex">
                            <div class="pbmit-featured-container">
                                <div class="pbmit-bg-image"
                                    style="background-image:url('{{ url('/storage/' . $largeBlog->featured_image) }}')">
                                    <div class="pbmit-featured-img-wrapper">
                                        <div class="pbmit-featured-wrapper">
                                            <img src="{{ url('/storage/' . $largeBlog->featured_image) }}"
                                                class="img-fluid" alt="blog-01">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pbminfotech-box-wrap">
                                <div class="pbminfotech-box-content">
                                    <div class="pbmit-date-admin-wraper d-flex align-items-center">
                                        <div class="pbmit-meta-date pbmit-meta-line">
                                            <span class="pbmit-post-date">
                                                <i class="pbmit-base-icon-calendar-3"></i>{{date("M d, Y", strtotime($largeBlog->published_at))}}
                                            </span>
                                        </div>
                                        <div class="pbmit-meta-author pbmit-meta-line">
                                            <span class="pbmit-post-author">
                                                <i class="pbmit-base-icon-user-3"></i>
                                                <span>By</span>admin
                                            </span>
                                        </div>
                                    </div>
                                    <h3 class="pbmit-post-title">
                                        <a href="/blog_detail/{{$largeBlog->id}}">{!! $largeBlog->title??"" !!}</a>
                                    </h3>
                                    <div class="pbminfotech-box-desc">
                                        {!! !  !!$largeBlog->content??"" !!}
                                    </div>
                                </div>
                                <a class="pbmit-blog-btn" href="/blog_detail/{{$largeBlog->id}}">
                                    <span class="pbmit-button-icon">
                                        <i class="pbmit-base-icon-pbmit-up-arrow"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
<!-- Blog End -->
<!-- Contact Form -->
<section class="pbmit-sticky-section">
    <div class="container">
        <div class="contact-us-bg">
            <div class="row">
                <div class="col-md-12 col-xl-5">
                    <div class="pbmit-sticky-col">
                        <div class="contact-us-left-area">
                            <div class="pbmit-heading-subheading animation-style2">
                                <h4 class="pbmit-subtitle">Contact Us</h4>
                                <h2 class="pbmit-title">Happy to answer all your questions</h2>
                                <div class="pbmit-heading-desc">
                                    <p>Whether you're a homeowner, contractor, or architect, we're here to help. Get in
                                        touch with Brahmani Enterprises for inquiries, quotes, and expert consultations
                                        on all your construction material needs and project solutions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-7">
                    <div class="contact-form-area">
                        <div class="pbmit-heading animation-style2">
                            <h2 class="pbmit-title">Send a Message</h2>

                        </div>
                        <?php
                        if (!empty(Session::get('errors'))) {
                            $er = get_object_vars(json_decode(Session::get("errors")));
                            foreach ($er as $key => $value) {
                                echo '<div class="alert alert-danger">' . $value[0] . '</div>';
                            }
                        }
                        ?>
                        <form class="contact-form" method="post" action="/storeQuery">
                            @csrf
                            <div style="display: none;">
                                <input type="text" name="address" value="">
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Name *" name="name"
                                        value="{{old('name') ?? ''}}" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Email *" name="email"
                                        value="{{old('email') ?? ''}}" required>
                                </div>

                                <div class="col-md-6">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" name="phone"
                                        value="{{old('phone') ?? ''}}" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" class="form-control" placeholder="Your Location *" name="location"
                                        value="{{old('location') ?? ''}}" required>
                                </div>
                                <div class="col-md-12">
                                    <textarea name="message" cols="40" rows="10" class="form-control" id="message"
                                        placeholder="message" required>{{old('message') ?? ""}}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="pbmit-btn pbmit-btn-outline">
                                        <i
                                            class="form-btn-loader fa fa-circle-o-notch fa-spin fa-fw margin-bottom d-none"></i>
                                        <span class="pbmit-button-content-wrapper">
                                            <span class="pbmit-button-text">Submit Now</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="col-md-12 col-lg-12 message-status"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Form -->


<!-- Iframe -->
<section class="section-xl">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="iframe-area">
                    <?php
                    echo $settings['vadodara_location'];
                    ?>
                </div>
                <div class="text-center">
                    <h6>Vadodara</h6>
                </div>
            </div>
            <div class="col">
                <div class="iframe-area">
                    <?php
                    echo $settings['meerut_location'];
                    ?>
                </div>
                <div class="text-center">
                    <h6>Meerut</h6>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Iframe -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var swiper = new Swiper('.slider2', {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: '.nex',
                prevEl: '.previ',
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var swiper = new Swiper(".slider2", {
            slidesPerView: window.innerWidth < 768 ? 1 : 3, // 1 for mobile, 3 for desktop
            spaceBetween: 30,
            loop: true,
            autoplay: false,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        // Update on window resize
        window.addEventListener("resize", function() {
            swiper.params.slidesPerView = window.innerWidth < 768 ? 1 : 3;
            swiper.update();
        });
    });
</script>
@endsection