@extends('layouts.site')
@section('content')
@php
$page_data = $settings['page_data'] ?? null;
$banner = !empty($page_data->page_banner)
? asset("storage/".$page_data->page_banner)
: asset("brahmani_frontend_assets/images/bg/titlebar-img.jpg");
@endphp

<style>
	.pbmit-title-bar-wrapper {
		background-image: url('{{ $banner }}');
		max-height: 600px !important;
		padding-top: 100px;
	}
</style>
<!-- Title Bar -->
<div class="pbmit-title-bar-wrapper">
	<div class="container">
		<div class="pbmit-title-bar-content">
			<div class="pbmit-title-bar-content-inner">
				<div class="pbmit-tbar">
					<div class="pbmit-tbar-inner container">
						<h1 class="pbmit-tbar-title"> About Us</h1>
					</div>
				</div>
				<div class="pbmit-breadcrumb">
					<div class="pbmit-breadcrumb-inner">
						<span>
							<a title="" href="/" class="home"><span>Home</span></a>
						</span>
						<span class="sep">
							<i class="pbmit-base-icon-angle-right"></i>
						</span>
						<span><span class="post-root post post-post current-item"> About Us</span></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Title Bar End-->

<!-- Page Content -->
<div class="page-content about-us">

	<!-- About Us Start -->
	<section class="about-us-three-sec section-xl">
		<div class="container">
			<div class="row g-0">
				<div class="col-md-12 col-xl-4">
					<div class="about-us-three-content">
						<div class="pbmit-heading-subheading animation-style2">
							<h2 class="pbmit-title">Building Excellence, Together</h2>
							<div class="pbmit-heading-desc">
								At Brahmani Enterprises, we're more than just a supplier of construction materials. We're your partners in building. For over 16 years, we've been dedicated to providing the highest quality PVC panels, louvers, gypsum boards, and a wide range of other construction materials to builders, contractors, and homeowners across India. Our commitment to quality, customer satisfaction, and innovation drives everything we do. We believe in building strong, lasting relationships with our clients, and we strive to exceed expectations with every project.
							</div>
						</div>
						<!-- <div class="pbmit-animation-style1">
									<img src="images/homepage-3/sign2.png" alt="">
								</div>
								<div class="pbmit-text-editor">@ Founder</div> -->
					</div>
				</div>
				<div class="col-md-12 col-xl-4">
					<div class="pbmit-animation-style7 single-img">
						<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-3/single-img.png" alt="">
					</div>
				</div>
				<div class="col-md-12 col-xl-4">
					<div class="fid-style-area">
						<div class="pbminfotech-ele-fid-style-2">
							<div class="pbmit-fld-contents">
								<div class="pbmit-fld-wrap">
									<div class="pbmit-fid-icon-title">
										<div class="pbmit-sbox-icon-wrapper pbmit-icon-type-icon">
											<i class="pbmit-xinterio-icon pbmit-xinterio-icon-offer"></i>
										</div>
										<span class="pbmit-fid-title">Years of Experience</span>
									</div>
									<h4 class="pbmit-fid-inner">
										<span class="pbmit-fid-before"></span>
										<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="16" data-interval="1" data-before="" data-before-style="" data-after="" data-after-style="">16</span>
										<span class="pbmit-fid"><sup>+</sup></span>
									</h4>
								</div>
							</div>
						</div>
						<div class="pbminfotech-ele-fid-style-2 py-3">
							<div class="pbmit-fld-contents">
								<div class="pbmit-fld-wrap">
									<div class="pbmit-fid-icon-title">
										<div class="pbmit-sbox-icon-wrapper pbmit-icon-type-icon">
											<i class="pbmit-xinterio-icon pbmit-xinterio-icon-engineer"></i>
										</div>
										<span class="pbmit-fid-title">Satisfied Customers</span>
									</div>
									<h4 class="pbmit-fid-inner">
										<span class="pbmit-fid-before"></span>
										<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="150000" data-interval="5000" data-before="" data-before-style="" data-after="" data-after-style="">150000</span>
										<span class="pbmit-fid"><sup>+</sup></span>
									</h4>
								</div>
							</div>
						</div>
						<div class="pbminfotech-ele-fid-style-2">
							<div class="pbmit-fld-contents">
								<div class="pbmit-fld-wrap">
									<div class="pbmit-fid-icon-title">
										<div class="pbmit-sbox-icon-wrapper pbmit-icon-type-icon">
											<i class="pbmit-xinterio-icon pbmit-xinterio-icon-client"></i>
										</div>
										<span class="pbmit-fid-title">Product Range</span>
									</div>
									<h4 class="pbmit-fid-inner">
										<span class="pbmit-fid-before"></span>
										<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="600" data-interval="50" data-before="" data-before-style="" data-after="" data-after-style="">600</span>
										<span class="pbmit-fid"><span>+</span></span>
									</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- About Us End -->

	<!-- Before After Start -->
	<section>
		<div class="container-fluid p-0">
			<div class="row g-2">
				<div class="col-md-12 col-xl-6">
					<div class="before-after-left-area pbmit-bg-color-blackish">
						<div class="pbmit-heading-subheading animation-style4">
							<h4 class="pbmit-subtitle">since 2009</h4>
							<h2 class="pbmit-title">Transforming Spaces, Elevating Experiences.</h2>
							<div class="pbmit-heading-desc">We believe that exceptional spaces begin with exceptional materials. We offer a comprehensive range of high-quality construction products, from durable PVC panels to elegant gypsum boards, designed to transform your vision into reality. Whether you're building a home, designing an office, or creating a stunning restaurant, we have the materials to bring your unique style to life.
							</div>
						</div>
						<div class="row pbmit-fid-style-one">
							<div class="col-md-6">
								<div class="pbminfotech-ele-fid-style-1">
									<div class="pbmit-fld-contents d-flex align-items-center">
										<div class="pbmit-circle-outer" data-digit="95" data-fill="#bb9a65" data-emptyfill="" data-before="" data-after="<span>%</span>" data-thickness="1" data-size="127">
											<div class="pbmit-circle">
												<div class="pbmit-fid-inner">
													<span class="pbmit-fid-before"></span>
													<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="95" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style="">95</span>
													<span class="pbmit-fid"><span>%</span></span>
												</div>
											</div>
										</div>
										<div class="pbmit-fid-sub">
											<h3 class="pbmit-fid-title">Clients <br> Satisfactions</h3>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="pbminfotech-ele-fid-style-1">
									<div class="pbmit-fld-contents d-flex align-items-center">
										<div class="pbmit-circle-outer" data-digit="99" data-fill="#bb9a65" data-emptyfill="" data-before="" data-after="<span>%</span>" data-thickness="1" data-size="127">
											<div class="pbmit-circle">
												<div class="pbmit-fid-inner">
													<span class="pbmit-fid-before"></span>
													<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="99" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style="">99</span>
													<span class="pbmit-fid"><span>%</span></span>
												</div>
											</div>
										</div>
										<div class="pbmit-fid-sub">
											<h3 class="pbmit-fid-title">Products <br>Quality</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-xl-6">
					<div class="twentytwenty-container">
						<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-3/after.png" alt="Before">
						<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-3/before.png" alt="After">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Before After End -->

	<!-- Ihbox Start -->
	<section class="ihbox-section-three section-lgt">
		<div class="container">
			<div class="heading-area">
				<div class="pbmit-heading">
					<h2><span class="pbmit-award">Award &amp; achievement</span></h2>
				</div>
			</div>
			<div class="row g-0 pt-3">
				<div class="pbmit-col-20">
					<div class="pbmit-ihbox-style-10">
						<div class="pbmit-ihbox-headingicon">
							<div class="pbmit-ihbox-icon">
								<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
									<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-3/ihbox/ih-award01.png" alt="">
								</div>
							</div>
							<div class="pbmit-ihbox-contents">
								<h2 class="pbmit-element-title">Top 5 Interior Design Inspiration 2023</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="pbmit-col-20">
					<div class="pbmit-ihbox-style-10">
						<div class="pbmit-ihbox-headingicon">
							<div class="pbmit-ihbox-icon">
								<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
									<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-3/ihbox/ih-award02.png" alt="">
								</div>
							</div>
							<div class="pbmit-ihbox-contents">
								<h2 class="pbmit-element-title">Top 5 Interior Design Inspiration 2023</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="pbmit-col-20">
					<div class="pbmit-ihbox-style-10">
						<div class="pbmit-ihbox-headingicon">
							<div class="pbmit-ihbox-icon">
								<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
									<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-3/ihbox/ih-award03.png" alt="">
								</div>
							</div>
							<div class="pbmit-ihbox-contents">
								<h2 class="pbmit-element-title">Top 5 Interior Design Inspiration 2023</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="pbmit-col-20">
					<div class="pbmit-ihbox-style-10">
						<div class="pbmit-ihbox-headingicon">
							<div class="pbmit-ihbox-icon">
								<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
									<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-3/ihbox/ih-award04.png" alt="">
								</div>
							</div>
							<div class="pbmit-ihbox-contents">
								<h2 class="pbmit-element-title">Top 5 Interior Design Inspiration 2023</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="pbmit-col-20">
					<div class="pbmit-ihbox-style-10">
						<div class="pbmit-ihbox-headingicon">
							<div class="pbmit-ihbox-icon">
								<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
									<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-3/ihbox/ih-award05.png" alt="">
								</div>
							</div>
							<div class="pbmit-ihbox-contents">
								<h2 class="pbmit-element-title">Top 5 Interior Design Inspiration 2023</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Ihbox End -->

	<!-- Process Start -->
	<section class="process-section-two">
		<div class="container">
			<div class="position-relative text-center">
				<div class="pbmit-heading-subheading animation-style3">
					<h4 class="pbmit-subtitle">Steps</h4>
					<h2 class="pbmit-title">How organization works</h2>
				</div>
				<div class="pbmit-ih-highlight">
					<h2>Process</h2>
				</div>
			</div>
			<div class="row pbmit-element-column-four">
				<article class="pbmit-miconheading-style-4 col-md-6 col-lg-3">
					<div class="pbmit-ihbox-style-4">
						<div class="pbmit-ihbox-headingicon">
							<div class="pbmit-ihbox-icon">
								<div class="pbmit-ihbox-icon-wrapper">
									<div class="pbmit-icon-wrapper pbmit-icon-type-icon">
										<i class="pbmit-xinterio-icon pbmit-xinterio-icon-engineer"></i>
									</div>
								</div>
							</div>
							<h2 class="pbmit-element-title">
								Expert Consultation
							</h2>
							<div class="pbmit-heading-desc">Our experienced team provides personalized consultation to help you select the right materials for your specific project needs.</div>
						</div>
					</div>
				</article>
				<article class="pbmit-miconheading-style-4 col-md-6 col-lg-3">
					<div class="pbmit-ihbox-style-4">
						<div class="pbmit-ihbox-headingicon">
							<div class="pbmit-ihbox-icon">
								<div class="pbmit-ihbox-icon-wrapper">
									<div class="pbmit-icon-wrapper pbmit-icon-type-icon">
										<i class="pbmit-xinterio-icon pbmit-xinterio-icon-compass"></i>
									</div>
								</div>
							</div>
							<h2 class="pbmit-element-title">
								Quality Assurance
							</h2>
							<div class="pbmit-heading-desc">We source and supply only the highest quality materials from trusted manufacturers to ensure durability and longevity.</div>
						</div>
					</div>
				</article>
				<article class="pbmit-miconheading-style-4 col-md-6 col-lg-3">
					<div class="pbmit-ihbox-style-4">
						<div class="pbmit-ihbox-headingicon">
							<div class="pbmit-ihbox-icon">
								<div class="pbmit-ihbox-icon-wrapper">
									<div class="pbmit-icon-wrapper pbmit-icon-type-icon">
										<i class="pbmit-xinterio-icon pbmit-xinterio-icon-tools"></i>
									</div>
								</div>
							</div>
							<h2 class="pbmit-element-title">
								On-Time Delivery
							</h2>
							<div class="pbmit-heading-desc">We prioritize timely delivery to ensure your project stays on schedule and minimizes disruptions.</div>
						</div>
					</div>
				</article>
				<article class="pbmit-miconheading-style-4 col-md-6 col-lg-3">
					<div class="pbmit-ihbox-style-4">
						<div class="pbmit-ihbox-headingicon">
							<div class="pbmit-ihbox-icon">
								<div class="pbmit-ihbox-icon-wrapper">
									<div class="pbmit-icon-wrapper pbmit-icon-type-icon">
										<i class="pbmit-xinterio-icon pbmit-xinterio-icon-axis"></i>
									</div>
								</div>
							</div>
							<h2 class="pbmit-element-title">
								Sustainable Solutions
							</h2>
							<div class="pbmit-heading-desc">We are committed to providing eco-friendly and sustainable construction solutions that minimize environmental impact.</div>
						</div>
					</div>
				</article>
			</div>
			<div class="pbmit-text-editor">
				<span class="pbmit-text-design">Hurry</span> Let’s make something great work together. Got a project in mind? <span class="pbmit-globalcolor"><u><a href="/contact_us">Contact us now</a></u></span>
			</div>
		</div>
	</section>
	<!-- Process End -->

	<section class="section-lgb">
		<div class="container">
			<div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="false" data-arrows="false" data-columns="6" data-margin="0" data-effect="slide">
				<div class="swiper-wrapper">
					<!-- Slide1 -->
					<article class="pbmit-client-style-1 swiper-slide">
						<div class="pbmit-border-wrapper">
							<div class="pbmit-client-wrapper pbmit-client-with-hover-img">
								<h4 class="pbmit-hide">Client 12</h4>
								<div class="pbmit-client-hover-img">
									<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-global-01.png" class="img-fluid" alt="">

								</div>
								<div class="pbmit-featured-img-wrapper">
									<div class="pbmit-featured-wrapper">
										<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-grey-01.png" class="img-fluid" alt="">
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
									<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-global-02.png" class="img-fluid" alt="">
								</div>
								<div class="pbmit-featured-img-wrapper">
									<div class="pbmit-featured-wrapper">
										<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-grey-02.png" class="img-fluid" alt="">
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
									<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-global-04.png" class="img-fluid" alt="">
								</div>
								<div class="pbmit-featured-img-wrapper">
									<div class="pbmit-featured-wrapper">
										<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-grey-04.png" class="img-fluid" alt="">
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
									<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-global-05.png" class="img-fluid" alt="">
								</div>
								<div class="pbmit-featured-img-wrapper">
									<div class="pbmit-featured-wrapper">
										<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-grey-05.png" class="img-fluid" alt="">
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
									<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-global-06.png" class="img-fluid" alt="">
								</div>
								<div class="pbmit-featured-img-wrapper">
									<div class="pbmit-featured-wrapper">
										<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-grey-06.png" class="img-fluid" alt="">
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
									<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-global-07.png" class="img-fluid" alt="">
								</div>
								<div class="pbmit-featured-img-wrapper">
									<div class="pbmit-featured-wrapper">
										<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-grey-07.png" class="img-fluid" alt="">
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
									<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-global-08.png" class="img-fluid" alt="">
								</div>
								<div class="pbmit-featured-img-wrapper">
									<div class="pbmit-featured-wrapper">
										<img src="{{asset('brahmani_frontend_assets')}}/images/homepage-1/client/client-grey-08.png" class="img-fluid" alt="">
									</div>
								</div>
							</div>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>

</div>
<!-- Page Content End -->
@endsection