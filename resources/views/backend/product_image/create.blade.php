@extends('layouts.dashboard')
@section('content')
    <style>
        .exp_text {
            width: 100%;
            /* Full width of the parent container */
            max-width: 100%;
            /* Prevent exceeding the container */
            min-width: 100%;
            /* Prevent shrinking smaller than the container */
            min-height: 50px;
            /* Ensure a reasonable minimum height */
            resize: both;
            /* Allow manual resizing */
            overflow: auto;
            /* Ensure scrollbar if content exceeds height */
        }
    </style>

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-11 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Product Create Image
                        </h4>
                        @include('backend.errors.formErrors')
                        <form method="POST" action="/admin/products/images/store" enctype="multipart/form-data"
                            class="forms-sample">

                            @csrf

                            <div class="col" style="margin: 5px;">

                                <div class="form-group">
                                    <label for="exampleSelectGender">Products</label>
                                    <select name="product_id" class="form-select" >
                                        <option>Select Product</option> <!-- Empty option for placeholder -->
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Product Images</label>
                                    <div class="input-group col-xs-12">
                                        <input type="file" class="form-control file-upload-info" name="images[]" multiple
                                            placeholder="Multiple Product images">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername1">Product Alias</label>
                                    <textarea class="exp_text" name="image_alias" rows="5" id="image_alias"></textarea>
                                </div>
                                <div class="form-group">

                                    <label for="exampleSelectGender">Page Active</label>
                                    <select name="image_status" class="form-select" id="exampleSelectGender">
                                        <option selected>Select Active</option>
                                        <option value="1">Yes
                                        </option>
                                        <option value="0">No
                                        </option>
                                    </select>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('custom_javascript')
    <script>
        $('#searchable-dropdown').select2({
            placeholder: "Select Products", // shown as grey placeholder
            allowClear: true,
            width: '100%'
        });
    </script>
@endsection