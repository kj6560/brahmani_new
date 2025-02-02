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
</style>
<!-- Contact Us Content -->
<div class="pbmit-title-bar-wrapper">
    <div class="container">
        <div class="pbmit-title-bar-content">
            <div class="pbmit-title-bar-content-inner">
                <div class="pbmit-tbar">
                    <div class="pbmit-tbar-inner container">
                        <h1 class="pbmit-tbar-title"> Wishlist</h1>
                    </div>
                </div>
                <div class="pbmit-breadcrumb">
					<div class="pbmit-breadcrumb-inner">
						<span>
							<a title="home" href="/" class="home"><span>Home</span></a>
						</span>
						<span class="sep">
							<i class="pbmit-base-icon-angle-right"></i>
						</span>
						<span><span class="post-root post post-post current-item"> Wishlist</span></span>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <section class="section-md">

        <div class="container mt-5">
            
            @if (count($products) > 0)
            <div class="row">

                @foreach ($products as $product)
                    <!-- Example Product Card -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{asset('storage')}}/{{$product['product_banner'] ?? ""}}" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title">{{$product['product_name'] ?? ""}}</h5>
                                <p class="card-text">₹ {{$product['product_price'] ?? ""}}</p>
                                <p class="card-text text-muted">{{$product['product_short_description'] ?? ""}}</p>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn btn-danger" onclick="removeProduct({{$product['id']}})">Remove from
                                    Wishlist</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn btn-primary" onclick="raiseQuery()">Raise Query</button>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-md-12 text-center">
                    <h6>No Products Found</h6>
                </div>
            </div>
            @endif
            
        </div>
    </section>
</div>
@endsection
@section('custom_javascript')
<script>
    function removeProduct(productId) {
        $.ajax({
            type: 'GET',
            url: "/removeFromWishlist?id=" + productId,

            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Done',
                        text: "Product Removed From Wishlist",
                        icon: 'success',
                        confirmButtonText: 'Okay',

                    }).then((result) => {
                        if (result.isConfirmed) {
                            //window.location.reload();
                        }
                    })
                    location.reload();
                } else {
                    console.log(response);
                    alert('Failed to remove product from wishlist.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                alert('An error occurred while removing the product from wishlist.');
            }
        });
    }
    
    function raiseQuery() {
        Swal.fire({
            title: 'Raise Query',
            html: `
        <input type="text" id="name" class="swal2-input" placeholder="Enter your name">
        <input type="text" id="number" class="swal2-input" placeholder="Enter your number">
    `,
            showCancelButton: true,
            confirmButtonText: 'Submit',
            focusConfirm: false,
            preConfirm: () => {
                const name = document.getElementById('name').value.trim();
                const number = document.getElementById('number').value.trim();
                // Return the collected data
                return { name, number};
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                const { name, number, query } = result.value;

                // Make the API call
                fetch(`/raiseQuery?name=${encodeURIComponent(name)}&number=${encodeURIComponent(number)}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        Swal.fire({
                            title: 'Done',
                            text: "We have noted your request. Someone from our team will contact you soon",
                            icon: 'success',
                            confirmButtonText: 'Okay',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    })
                    .catch(error => {
                        Swal.fire({
                            title: 'Error',
                            text: `Request failed: ${error}`,
                            icon: 'error',
                            confirmButtonText: 'Retry'
                        });
                    });
            }
        });

    }
</script>
@endsection