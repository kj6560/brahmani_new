@extends("layouts.dashboard")
@section('content')
<?php
$product_ids = get_object_vars(json_decode($enquiry->product_ids));
?>
<div class="col-11 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <h4 class="card-title">Enquiries</h4>
        
      </div>
        <div class="card-body">
            <!-- Basic Enquiry Information -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <p><strong>ID:</strong> {{$enquiry->id??""}}</p>
                    <p><strong>Name:</strong> {{$enquiry->name??""}}</p>
                    <p><strong>Email:</strong> {{$enquiry->email??""}}</p>
                    <p><strong>Phone Number:</strong> {{$enquiry->number??""}}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Location:</strong> {{$enquiry->location??""}}</p>
                    <p><strong>Message:</strong> {{$enquiry->message??""}}</p>
                    <p><strong>Created At:</strong> {{$enquiry->created_at??""}}</p>
                </div>
            </div>

            <!-- Product Information -->
            <div class="mb-4">
                <h6 class="text-primary">Products Enquired</h6>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>SKU</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enquiry->products as $product )
                            <tr>
                                <td>{{$product->id??""}}</td>
                                <td>{{$product->product_name??""}}</td>
                                <td>{{$product_ids[$product->id]??0}}</td>
                                <td>{{$product->product_sku ?? ""}}</td>
                                <td>{{$product->product_category??""}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection