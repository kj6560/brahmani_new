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
                    <h4 class="card-title">{{!empty($product) && $product->id ? "Edit" : "Create"}} Product
                        {{!empty($product->product_name) ? " : " . $product->product_name : ""}}
                    </h4>
                    @include('backend.errors.formErrors')
                    <form method="POST" action="/admin/products/categories/store" enctype="multipart/form-data"
                        class="forms-sample">

                        @if (!empty($product->id))
                            <input type="text" name="id" value="{{!empty($product) && $product->id ? $product->id : null}}"
                                class="form-control" id="exampleInputUsername1" hidden>
                        @endif

                        @csrf

                        <div class="col" style="margin: 20px;">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Name</label>
                                <input type="text" name="pro_cat_name"
                                    value="{{!empty($product) && $product->pro_cat_name ? $product->pro_cat_name : old('pro_cat_name')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Category Description</label>
                                <textarea class="exp_text" name="pro_cat_description" rows="5"
                                    id="pro_cat_description">{{!empty($product) && $product->pro_cat_description ? $product->pro_cat_description : old('pro_cat_description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Product Category Image</label>
                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control file-upload-info" name="pro_cat_image"
                                        placeholder="Product Category images">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Category Order</label>
                                <input type="text" name="product_category_order"
                                    value="{{!empty($product) && $product->product_category_order ? $product->product_category_order : $nextOrder}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Show On Home Page</label>
                                <select name="show_on_home_page" class="form-select" id="exampleSelectGender">
                                    <option selected>Select Show On Home Page</option>
                                    <option value="1" @if(isset($product) && $product->show_on_home_page == 1) selected
                                    @endif>Yes
                                    </option>
                                    <option value="0" @if(isset($product) && $product->show_on_home_page == 0) selected
                                    @endif>No
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Product Status</label>
                                <select name="pro_cat_status" class="form-select" id="exampleSelectGender">
                                    <option selected>Select Active</option>
                                    <option value="1" @if(isset($product) && $product->pro_cat_active == 1) selected
                                    @endif>Yes
                                    </option>
                                    <option value="0" @if(isset($product) && $product->pro_cat_active == 0) selected
                                    @endif>No
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Category Meta Title</label>
                                <input type="text" name="pro_cat_meta_title"
                                    value="{{$product && !empty($product) && $product->pro_cat_meta_title ? $product->pro_cat_meta_title : old('pro_cat_meta_title')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Category Meta Description</label>
                                <input type="text" name="pro_cat_meta_description"
                                    value="{{$product && !empty($product) && $product->pro_cat_meta_description ? $product->pro_cat_meta_description : old('pro_cat_meta_description')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Category Meta Keywords</label>
                                <input type="text" name="pro_cat_meta_keywords"
                                    value="{{$product && !empty($product) && $product->pro_cat_meta_keywords ? $product->pro_cat_meta_keywords : old('pro_cat_meta_keywords')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    // JavaScript for Adding Dynamic Inputs
    document.getElementById('add-more-meta-tags').addEventListener('click', function (e) {
        e.preventDefault();

        // Create a new div for the meta-tag pair
        const metaTagPair = document.createElement('div');
        metaTagPair.classList.add('meta-tag-pair');
        metaTagPair.style.marginBottom = '10px';

        // Create the 'name' input
        const nameInput = document.createElement('input');
        nameInput.type = 'text';
        nameInput.name = 'meta_tags[][name]';
        nameInput.placeholder = 'Tag Name';
        nameInput.classList.add('form-control');
        nameInput.style.marginRight = '10px';

        // Create the 'value' input
        const valueInput = document.createElement('input');
        valueInput.type = 'text';
        valueInput.name = 'meta_tags[][value]';
        valueInput.placeholder = 'Tag Value';
        valueInput.classList.add('form-control');

        // Append inputs to the metaTagPair div
        metaTagPair.appendChild(nameInput);
        metaTagPair.appendChild(valueInput);

        // Append the metaTagPair div to the container
        document.getElementById('meta-tags-container').appendChild(metaTagPair);
    });
</script>

@endsection