@extends('layouts.site')
@section('content')
@php
    $page_data = $settings['page_data'] ?? null;
    $banner = !empty($page_data->page_banner)
        ? asset("storage/" . $page_data->page_banner)
        : asset("brahmani_frontend_assets/images/bg/titlebar-img.jpg");
@endphp
	<style>
		.pbmit-title-bar-wrapper {
			background-image: url('{{ $banner }}');
			max-height: 600px !important;
			padding-top: 100px;
		}

		.header-style-1 {
			position: relative;
			margin: 0px 0px 0;
		}
	</style>
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
        <h1 class="pbmit-tbar-title"> Sitemap</h1>
        <span>
            <a href="/" class="home"><span class="r_text">Home</span></a>
        </span>
        <span class="sep">
            <i class="pbmit-base-icon-angle-right"></i>
        </span>
        <span><span class="r_text"> Sitemap</span></span>
    </div>
</div>
<!-- Title Bar End-->

<!-- Page Content -->
<div class="page-content about-us">
    <div class="container">
        <h5 class="mb-4">Sitemap URLs</h5>

        <div class="row">
            <div class="col-md-3">
                <?php renderLink('🛒 Product Categories', $productCategories); ?>
            </div>
            <div class="col-md-3">
                <?php renderLink('📦 Products', $products); ?>
            </div>
            <div class="col-md-3">
                <?php renderLink('📝 Blog Details', $blogDetails); ?>
            </div>
            <div class="col-md-3">
                <?php if (!empty($others)) renderLink('🔗 Other Links', $others); ?>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End -->
@endsection
