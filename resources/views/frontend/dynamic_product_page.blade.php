@extends('layouts.site')
@section('content')
<style>
    .product-image {
        max-height: 400px;
        object-fit: cover;
    }

    .thumbnail {
        width: 80px;
        height: 80px;
        object-fit: cover;
        cursor: pointer;
        opacity: 0.6;
        transition: opacity 0.3s ease;
    }

    .thumbnail:hover,
    .thumbnail.active {
        opacity: 1;
    }
</style>
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
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<div class="pbmit-title-bar-wrapper">
    <div class="container">
        <div class="pbmit-title-bar-content">
            <div class="pbmit-title-bar-content-inner">
                <div class="pbmit-tbar">
                    <div class="pbmit-tbar-inner container">
                        <h1 class="pbmit-tbar-title"> {{$product->product_name ?? ""}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

if (!empty($product->all_images)) {
    $all_images = $product->all_images;
    $allImagesArr = explode(',', $all_images);
    $image_alias = $product->image_aliases;
    $image_aliasArr = explode(',', $image_alias);
} else {
    $allImagesArr = [];
    $image_aliasArr = [];
}


$params = !empty($product->pro_params) ? json_decode($product->pro_params) : [];
//print_r($params);die;
?>
<div class="page-content">
    <section class="section-md">
        <div class="container mt-5">
            <div class="row">
                <!-- Product Images -->
                <div class="col-md-6 mb-4">
                    <img src="{{asset('storage')}}/{{$product->product_banner}}" alt="Product"
                        class="img-fluid rounded mb-3 product-image" id="mainImage">
                    <div class="d-flex justify-content-between">
                        @for ($i = 0; $i < count($allImagesArr); $i++)
                            <img src="{{asset('storage')}}/{{$allImagesArr[$i]}}" alt="{{$image_aliasArr[$i] ?? ''}}"
                                class="thumbnail rounded {{$i == 0 ? 'active' : ''}}"
                                onclick="changeImage(event, this.src)">
                        @endfor
                    </div>
                </div>
                <!-- Product Details -->
                <div class="col-md-6">
                    <h2 class="mb-3">{{$product->product_name ?? ""}}</h2>
                    <p class="text-muted mb-4">SKU: {{$product->product_sku ?? ""}}</p>
                    <div class="mb-3">
                        <span class="h4 me-2">₹ {{$product->product_price ?? "Not Available"}}</span>
                    </div>
                    <!-- <div class="mb-3">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                        <span class="ms-2">4.5 (120 reviews)</span>
                    </div> -->
                    <p class="mb-4">{{$product->product_description ?? ""}}</p>

                    <div class="mb-4">
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" value="1" min="1" style="width: 80px;">
                    </div>
                    <button class="btn btn-primary btn-lg mb-3 me-2" id="wishlist"
                        onclick="processWishlist({{$product->id}})">
                        <i class="bi bi-cart-plus"></i> Add to Wishlist
                    </button>
                    <div class="mt-4">
                        <h5>Key Features:</h5>
                        <ul>
                            <li>Length: {{$product->length ?? "Not Available"}} Ft.</li>
                            <li>Width: {{$product->width ?? "Not Available"}} Inches</li>
                            <li>Thickness: {{$product->thickness ?? "Not Available"}} mm</li>
                            <li>Color: {{!empty($product->color) ?ucwords($product->color): "Not Available"}}</li>
                            @if (isset($product->usage_of_panel))
                                <li>Usage Of Panels: {{$product->usage_of_panel == 1 ? "Wall" : "Ceiling"}}</li>
                            @else
                                <li>Usage Of Panels: Not Available</li>
                            @endif

                            @if (isset($product->panel_included))
                                <li>Panel Status: {{$product->panel_included == 1 ? "With Panelling" : "Without Panelling"}}
                                </li>
                            @else
                                <li>Panel Status: Not Available</li>
                            @endif

                            @if (isset($product->instock))
                                <li>Instock: {{$product->instock == 1 ? "Yes" : "No"}}</li>
                            @else
                                <li>Instock: Not Available</li>
                            @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function changeImage(event, src) {
        document.getElementById('mainImage').src = src;
        document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
        event.target.classList.add('active');
    }

</script>

@endsection