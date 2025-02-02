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
    }
    .header-style-1{
		position: relative;
        margin: 0px 0px 0;
	}
</style>
<!-- Title Bar -->
<div class="pbmit-title-bar-wrapper">
			<div class="container">
				<div class="pbmit-title-bar-content">
					<div class="pbmit-title-bar-content-inner">
						<div class="pbmit-tbar">
							<div class="pbmit-tbar-inner container">
								<h1 class="pbmit-tbar-title"> Privacy Policy</h1>
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
						<span><span class="post-root post post-post current-item"> Privacy Policy</span></span>
					</div>
				</div>
					</div>
				</div> 
			</div> 
		</div>
		<!-- Title Bar End-->

		<!-- Page Content -->
		<div class="page-content about-us">

			<div class="container my-5">
        <h1 class="text-center mb-4">Privacy Policy</h1>
        <p>At Brahmani Enterprise, we are committed to protecting the privacy and security of our customers, suppliers, and website visitors. This Privacy Policy explains how we collect, use, and protect personal data.</p>
        
        <h2>What Personal Data Do We Collect?</h2>
        <p>We may collect personal data from you when you:</p>
        <ul>
            <li>Visit our website</li>
            <li>Contact us via phone, email, or online forms</li>
            <li>Place an order or make a purchase</li>
            <li>Provide feedback or participate in surveys</li>
        </ul>
        <p>The personal data we collect may include:</p>
        <ul>
            <li>Your name and contact details (address, phone number, email)</li>
            <li>Your order history and purchase details</li>
            <li>Your payment details (if applicable)</li>
            <li>Your IP address and browser type (for website analytics)</li>
        </ul>

        <h2>How Do We Use Your Personal Data?</h2>
        <p>We use your personal data for the following purposes:</p>
        <ul>
            <li>To process and fulfill your orders</li>
            <li>To provide customer support and respond to your queries</li>
            <li>To improve our website and services</li>
            <li>To send you newsletters, updates, and promotional offers (if you opt-in)</li>
            <li>To comply with legal and regulatory requirements</li>
        </ul>

        <h2>How Do We Protect Your Personal Data?</h2>
        <p>We take reasonable measures to protect your personal data from unauthorized access, disclosure, alteration, or destruction. These measures include:</p>
        <ul>
            <li>Encrypting sensitive data</li>
            <li>Implementing access controls and authentication</li>
            <li>Regularly updating and patching our systems</li>
            <li>Limiting data access to authorized personnel</li>
        </ul>

        <h2>Sharing Your Personal Data</h2>
        <p>We may share your personal data with:</p>
        <ul>
            <li>Our suppliers and service providers (for order fulfillment and customer support)</li>
            <li>Our payment processors (for payment processing)</li>
            <li>Our marketing and analytics partners (for website analytics and promotional activities)</li>
        </ul>
        <p>We will only share your personal data with third parties that have agreed to maintain the confidentiality and security of your data.</p>

        <h2>Your Rights</h2>
        <p>You have the right to:</p>
        <ul>
            <li>Access and correct your personal data</li>
            <li>Request deletion of your personal data</li>
            <li>Opt-out of marketing communications</li>
            <li>Lodge a complaint with the relevant authorities</li>
        </ul>

        <h2>Changes to This Policy</h2>
        <p>We may update this Privacy Policy from time to time. We will notify you of any significant changes by posting a notice on our website.</p>

        <h2>Contact Us</h2>
        <p>If you have any questions or concerns about this Privacy Policy or our handling of your personal data, please contact us:</p>
        <address>
            <strong>Brahmani Enterprise</strong><br>
            141/8 Baroda Mosaic & Marble Compound Dharamsinh,<br>
            Dharamsingh Desai Marg, opp. Water Tank,<br>
            Chhani, Vadodara, Gujarat 390002<br>
            Phone: <a href="tel:09276869295">092768 69295</a><br>
            Email: <a href="mailto:alkesh@b-ent.in">alkesh@b-ent.in</a>
        </address>
    </div>
			 
		</div>
		<!-- Page Content End -->
@endsection