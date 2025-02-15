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

    .header-style-1 {
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
                        <h1 class="pbmit-tbar-title"> Sitemap</h1>
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
                        <span><span class="post-root post post-post current-item"> Sitemap</span></span>
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
        @foreach($allUrls as $file=>$urls)
        <h5>{{$file}}</h5>
        @foreach($urls as $url)
        <h6>{{$url}}</h6>
        @endforeach
        @endforeach

    </div>

</div>
<!-- Page Content End -->
@endsection