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
		.r_text{
			color: #fff;
			font-size: 16px;
		}
	</style>
	<!-- Title Bar -->
	<div class="banner_new">
		<img src="{{ $banner }}" alt="Banner">
		<div class="banner_new-text">
		<h1 class="pbmit-tbar-title"> Blog</h1>
			<span>
				<a title="" href="/" class="home"><span class="r_text">Home</span></a>
			</span>
			<span class="sep">
				<i class="pbmit-base-icon-angle-right"></i>
			</span>
			<span><span class="r_text"> Blog</span></span>
		</div>
	</div>
	<!-- Title Bar End-->

<!-- Title Bar End-->
<div class="page-content blog">
	<!-- Blog Grid Col 4 -->
	<section class="section-md">
		<div class="container-fluid px-4">
			<div class="row pbmit-element-posts-wrapper">
				@foreach ($blogs as $blog)

				<article class="pbmit-ele-blog pbmit-blog-style-1 col-md-6 col-lg-3">
					<div class="post-item">
						<div class="pbminfotech-box-content">
							<div class="pbmit-featured-container">
								<div class="pbmit-featured-img-wrapper">
									<div class="pbmit-featured-wrapper">
										<img src="{{ url('/storage/'.$blog->featured_image) }}"
											class="img-fluid" alt="">
									</div>
								</div>
								<a class="pbmit-blog-btn" href="/blog_detail/{{$blog->id}}"
									title="How To Choose The Right  Furniture Of Your Home">
									<span class="pbmit-button-icon">
										<i class="pbmit-base-icon-pbmit-up-arrow"></i>
									</span>
								</a>
								<a class="pbmit-link" href="/blog_detail/{{$blog->id}}"></a>
							</div>
							<div class="pbmit-content-wrapper">
								<div class="pbmit-date-wraper d-flex align-items-center">
									<div class="pbmit-meta-date-wrapper pbmit-meta-line">
										<div class="pbmit-meta-date">
											<span class="pbmit-post-date">
												<i class="pbmit-base-icon-calendar-3"></i>{{date("M d, Y", strtotime($blog->published_at))}}
											</span>
										</div>
									</div>
									<div class="pbmit-meta-author pbmit-meta-line">
										<span class="pbmit-post-author">
											<i class="pbmit-base-icon-user-3"></i>{{$blog->user_name??""}}
										</span>
									</div>
								</div>
								<h3 class="pbmit-post-title">
									<a href="/blog_detail/{{$blog->id}}">{{$blog->title}}</a>
								</h3>
								<div class="pbminfotech-box-desc">
									{{$blog->small_desc}}…
								</div>
							</div>
						</div>
					</div>
				</article>
				@endforeach


			</div>
		</div>
	</section>
</div>
<!-- Blog Grid Col 4 End -->

@endsection