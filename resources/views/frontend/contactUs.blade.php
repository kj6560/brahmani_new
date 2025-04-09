@extends('layouts.site')
@section('content')
@php
$page_data = $settings['page_data'] ?? null;
$banner = !empty($page_data->page_banner)
? asset("storage/".$page_data->page_banner)
: asset("brahmani_frontend_assets/images/bg/titlebar-img.jpg");
@endphp

<style>
	.banner_new {
		position: relative;
		width: 100%;
		margin: auto;
	}

	.banner_new img {
		width: 100%;
		display: block;
	}

	.banner_new-text {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		color: white;
		font-size: 24px;
		font-weight: bold;
		text-align: center;
		background: rgba(0, 0, 0, 0.5);
		/* Optional: Background for better readability */
		padding: 10px 20px;
		border-radius: 5px;
	}

	.r_text {
		color: #fff;
		font-size: 16px;
	}
</style>
<!-- Title Bar -->
<div class="banner_new">
	<img src="{{ $banner }}" alt="Banner">
	<div class="banner_new-text">
		<h1 class="pbmit-tbar-title"> Contact Us</h1>
		<span>
			<a title="" href="/" class="home"><span class="r_text">Home</span></a>
		</span>
		<span class="sep">
			<i class="pbmit-base-icon-angle-right"></i>
		</span>
		<span><span class="r_text"> Contact Us</span></span>
	</div>
</div>
<!-- Title Bar End-->


<!-- Contact Us Content -->
<div class="page-content">



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
										<p>
											Whether you're a homeowner, contractor, or architect, we're here to help. 
											Get in touch with Brahmani Enterprises for inquiries, quotes, and expert 
											consultations on all your construction material needs and project solutions.
											<br><br>

											<b>Vadodara Office:</b><br>
											{{ $settings['vadodara_address'] ?? '' }}

											<br><b>Contact:</b><br>
											{{ $settings['Official_Number_Vadodara'] ?? '' }}

											<b>Meerut Branch Office:</b><br>
											{{ $settings['meerut_address'] ?? '' }}

											<br><b>Contact:</b><br>
											{{ $settings['Official_Number_Merut'] ?? '' }}

											<br>
										</p>
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

</div>
<!-- Contact Us Content End -->

@endsection