@extends('layouts.site')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .img-fluid {
        width: 392px !important;
        min-height: 435px;
        padding: 0px !important;
        object-fit: contain;
    }
    .h2{
        margin: 0px !important;
    }
    .pagination-nav {
        display: flex;
        justify-content: space-between;
        padding: 20px 0;
    }

    .pagination {
        list-style: none;
        display: flex;
    }

    .pagination .page-item {
        margin: 0 5px;
    }

    .filter-form {
        margin-bottom: 5px;
        padding: 5px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .filter-section {
        margin-bottom: 5px;
    }

    .filter-section h3 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .filter-section label {
        display: block;
        margin: 5px 0;
        font-size: 14px;
    }

    .filter-section input[type="checkbox"],
    .filter-section input[type="radio"] {
        margin-right: 5px;
    }

    .filter-section select {
        width: 100%;
        padding: 5px;
        margin-top: 5px;
    }

    .apply-filters {
        margin-top: 5px;
    }

    .apply-filters button {
        width: 100%;
        padding: 5px;
        background-color: rgb(47, 78, 24);
        color: #fff;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    .apply-filters button:hover {
        background-color: #0056b3;
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
		<h1 class="pbmit-tbar-title">{{$category->pro_cat_name ??"Categories"}}</h1>
			<span>
				<a title="" href="/" class="home"><span class="r_text">Home</span></a>
			</span>
			<span class="sep">
				<i class="pbmit-base-icon-angle-right"></i>
			</span>
			<span><span class="r_text"> Categories</span></span>
		</div>
	</div>
	<!-- Title Bar End-->





<!-- Filters End -->
<!-- Page Content -->
<div class="page-content">

    <!-- Service Details -->
    <section class="site-content service-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 service-right-col">
                    <div class="container-fluid px-4">
                        <div class="row pbmit-element-posts-wrapper">
                            @foreach ($category_products as $category_product)
                                <article class="pbmit-ele-portfolio pbmit-portfolio-style-2 col-md-6 col-lg-4">
                                    <div class="pbminfotech-post-content">
                                        <div class="pbmit-featured-img-wrapper">
                                            <div class="pbmit-featured-wrapper">
                                            <a href="/products/{{$category_product->product_slug}}"
                                            rel="tag"><img src="{{asset('storage')}}/{{$category_product->product_banner}}"
                                                    class="img-fluid" alt="{{$category_product->product_name ?? ''}}"></a>
                                            </div>
                                        </div>
                                        <div class="pbminfotech-titlebox">
                                                <div class="pbmit-port-cat text-center">
                                                    <h2><a href="/products/{{$category_product->product_slug}}"
                                                            rel="tag">{{$category_product->product_name ?? ""}}</a></h2>
                                                </div>

                                            </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        <!-- Render pagination links -->
                        <div class="pagination-wrapper">
                            @php
                            if($category_products instanceof Illuminate\Pagination\LengthAwarePaginator){
                            @endphp
                            {!! $category_products->links('pagination::bootstrap-4') !!}
                            @php } 
                            @endphp
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 service-left-col sidebar">
                    <label for="filt">Filters</label>
                    <form action="/product_category/{{$category->id ?? 0}}" method="get" id="filt">
                        <aside class="service-sidebar" style="border: 1px solid black;margin:15px;padding:15px;">
                            <div class="filter-section">
                                <h3>Usage Of Panels</h3>
                                <select name="Usage_Of_Panels">
                                    <option value="" @if(!isset($filters['Usage_Of_Panels'])) selected @endif>Select Panel Usage</option>
                                    <option value="1" @if (isset($filters['Usage_Of_Panels']) && $filters['Usage_Of_Panels'] == 1) selected @endif>Wall</option>
                                    <option value="0" @if (isset($filters['Usage_Of_Panels']) && $filters['Usage_Of_Panels'] == 0) selected @endif>Ceiling</option>
                                </select>
                            </div>
                            <div class="filter-section">
                                <h3>Stock Status</h3>
                                <select name="Instock">
                                    <option value="" selected>Select Stock Status</option>
                                    <option value="1" @if (isset($filters['Instock']) && $filters['Instock'] == 1) selected @endif>InStock</option>
                                    <option value="0" @if (isset($filters['Instock']) && $filters['Instock'] == 0) selected @endif>Out Of Stock</option>
                                </select>
                            </div>
                            <div class="filter-section">
                                <h3>Panel Included</h3>
                                <select name="Panel_Included">
                                    <option value="">Select Panel Included</option>
                                    <option value="1" @if (isset($filters['Panel_Included']) && $filters['Panel_Included'] == 1) selected @endif>With Panelling</option>
                                    <option value="0"@if (isset($filters['Panel_Included']) && $filters['Panel_Included'] == 0) selected @endif>Without Panelling</option>
                                </select>
                            </div>
                            <div class="filter-section">
                                <h3>Length</h3>
                                <select name="Length">
                                    <option value="">Select a length</option>
                                    <option value="8" @if (isset($filters['Length']) && $filters['Length'] == 8) selected @endif>8 ft</option>
                                    <option value="9.5" @if (isset($filters['Length']) && $filters['Length'] == 9.5) selected @endif>9.5 ft</option>
                                    <option value="10.0" @if (isset($filters['Length']) && $filters['Length'] == 10.0) selected @endif>10.0 ft</option>
                                </select>
                            </div>
                            <div class="filter-section">
                                <h3>Width</h3>
                                <select name="Width">
                                    <option value="">Select a width</option>
                                    <option value="5.0" @if (isset($filters['Width']) && $filters['Width'] == 5.0) selected @endif>5.0 inches</option>
                                    <option value="6.0" @if (isset($filters['Width']) && $filters['Width'] == 6.0) selected @endif>6.0 inches</option>
                                    <option value="6.25" @if (isset($filters['Width']) && $filters['Width'] == 6.25) selected @endif>6.25 inches</option>
                                    <option value="6.50" @if (isset($filters['Width']) && $filters['Width'] == 6.50) selected @endif>6.5 inches</option>
                                    <option value="8.0" @if (isset($filters['Width']) && $filters['Width'] == 8.0) selected @endif>8.0 inches</option>
                                    <option value="10.0" @if (isset($filters['Width']) && $filters['Width'] == 10.0) selected @endif>10.0 inches</option>
                                    <option value="12.0" @if (isset($filters['Width']) && $filters['Width'] == 12.0) selected @endif>12.0 inches</option>
                                    <option value="16.0" @if (isset($filters['Width']) && $filters['Width'] == 16.0) selected @endif>16.0 inches</option>
                                    <option value="48.0" @if (isset($filters['Width']) && $filters['Width'] == 48.0) selected @endif>48 inches</option>
                                </select>
                            </div>
                            <div class="filter-section">
                                <h3>Thickness</h3>
                                <select name="Thickness">
                                    <option value="">Select a thickness</option>
                                    <option value="1.2" @if (isset($filters['Thickness']) && $filters['Thickness'] == 1.2) selected @endif>1.2 mm</option>
                                    <option value="3.0" @if (isset($filters['Thickness']) && $filters['Thickness'] == 3.0) selected @endif>3.0 mm</option>
                                    <option value="5.5" @if (isset($filters['Thickness']) && $filters['Thickness'] == 5.5) selected @endif>5.5 mm</option>
                                    <option value="6.0" @if (isset($filters['Thickness']) && $filters['Thickness'] == 6.0) selected @endif>6.0 mm</option>
                                    <option value="6.5" @if (isset($filters['Thickness']) && $filters['Thickness'] == 6.5) selected @endif>6.5 mm</option>
                                    <option value="7.0" @if (isset($filters['Thickness']) && $filters['Thickness'] == 7.0) selected @endif>7.0 mm</option>
                                    <option value="7.5" @if (isset($filters['Thickness']) && $filters['Thickness'] == 7.5) selected @endif>7.5 mm</option>
                                    <option value="8.5" @if (isset($filters['Thickness']) && $filters['Thickness'] == 8.5) selected @endif>8.5 mm</option>
                                    <option value="9.5" @if (isset($filters['Thickness']) && $filters['Thickness'] == 9.5) selected @endif>9.5 mm</option>
                                    <option value="10.0" @if (isset($filters['Thickness']) && $filters['Thickness'] == 10.0) selected @endif>10.0 mm</option>
                                    <option value="11.0" @if (isset($filters['Thickness']) && $filters['Thickness'] == 11.0) selected @endif>11.0 mm</option>
                                    <option value="12.0" @if (isset($filters['Thickness']) && $filters['Thickness'] == 12.0) selected @endif>12.0 mm</option>
                                    <option value="17.0" @if (isset($filters['Thickness']) && $filters['Thickness'] == 17.0) selected @endif>17.0 mm</option>
                                    <option value="23.0" @if (isset($filters['Thickness']) && $filters['Thickness'] == 23.0) selected @endif>23.0 mm</option>
                                    <option value="24.0" @if (isset($filters['Thickness']) && $filters['Thickness'] == 24.0) selected @endif>24.0 mm</option>
                                </select>
                            </div>
                            <div class="filter-section">
                                <h3>Color</h3>
                                <select name="Color">
                                    <option value="">Select a Color</option>
                                    <option value="Black" @if (isset($filters['Color']) && $filters['Color'] == 'Black') selected @endif>Black</option>
                                    <option value="White" @if (isset($filters['Color']) && $filters['Color'] == 'White') selected @endif>White</option>
                                    <option value="Red" @if (isset($filters['Color']) && $filters['Color'] == 'Red') selected @endif>Red</option>
                                    <option value="Green" @if (isset($filters['Color']) && $filters['Color'] == 'Green') selected @endif>Green</option>
                                    <option value="Yellow" @if (isset($filters['Color']) && $filters['Color'] == 'Yellow') selected @endif>Yellow</option>
                                    <option value="Blue" @if (isset($filters['Color']) && $filters['Color'] == 'Blue') selected @endif>Blue</option>
                                    <option value="Brown" @if (isset($filters['Color']) && $filters['Color'] == 'Brown') selected @endif>Brown</option>
                                    <option value="Orange" @if (isset($filters['Color']) && $filters['Color'] == 'Orange') selected @endif>Orange</option>
                                    <option value="Pink" @if (isset($filters['Color']) && $filters['Color'] == 'Pink') selected @endif>Pink</option>
                                    <option value="Purple" @if (isset($filters['Color']) && $filters['Color'] == 'Purple') selected @endif>Purple</option>
                                    <option value="Grey" @if (isset($filters['Color']) && $filters['Color'] == 'Grey') selected @endif>Grey</option>
                                </select>
                            </div>
                            <div class="filter-section">
                                <h3>Select Min Price</h3>
                                <label for="customRange1" class="form-label"><span id="sliderValue1">0</span></label>
                                <input type="range" name="Min_Price" class="form-range"
                                    oninput="updateSliderValue(this.value)" id="slider1" min="0" max="7000">
                            </div>
                            <div class="filter-section">
                                <h3>Select Max Price</h3>
                                <label for="customRange1" class="form-label"><span id="sliderValue2">0</span></label>
                                <input type="range" name="Max_Price" class="form-range"
                                    oninput="updateSliderValue(this.value)" id="slider2" min="0" max="7000">
                            </div>
                            <div class="apply-filters">
                                <button>Apply Filters</button>
                            </div>
                        </aside>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- Service Details End -->
</div>
<!-- Page Content End -->

@endsection
@section('custom_javascript')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var min_price = "{{$filters['min_price'] ?? 0}}";
        var max_price = "{{$filters['max_price'] ?? 0}}";
        // Set initial slider value to 0
        const slider1 = document.getElementById('slider1');
        const sliderValueDisplay1 = document.getElementById('sliderValue1');
        slider1.value = min_price;
        sliderValueDisplay1.textContent = min_price;

        // Update slider value display when the slider value changes
        slider1.addEventListener('input', function () {
            updateSliderValue1(slider1.value);
        });

        const slider2 = document.getElementById('slider2');
        const sliderValueDisplay2 = document.getElementById('sliderValue2');
        slider2.value = max_price;
        sliderValueDisplay2.textContent = max_price;

        // Update slider value display when the slider value changes
        slider2.addEventListener('input', function () {
            updateSliderValue2(slider2.value);
        });
    });

    function updateSliderValue2(value) {
        document.getElementById('sliderValue2').textContent = value;
    }
    function updateSliderValue1(value) {
        document.getElementById('sliderValue1').textContent = value;
    }

    function handleFilterChange(select) {
        document.getElementById('price-filter').style.display = 'none';
        document.getElementById('category-filter').style.display = 'none';

        if (select.value === 'price') {
            document.getElementById('price-filter').style.display = 'block';
        } else if (select.value === 'category') {
            document.getElementById('category-filter').style.display = 'block';
        } else {
            document.getElementById('filter-form').submit();
        }
    }
</script>
@endsection