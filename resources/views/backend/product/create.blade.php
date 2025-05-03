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
                    <form method="POST" action="/admin/products/store" enctype="multipart/form-data"
                        class="forms-sample">

                        @if ($product && !empty($product->id))
                            <input type="text" name="id" value="{{!empty($product) && $product->id ? $product->id : null}}"
                                class="form-control" id="exampleInputUsername1" hidden>
                        @endif

                        @csrf

                        <div class="col" style="margin: 20px;">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Name</label>
                                <input type="text" name="product_name"
                                    value="{{$product && !empty($product) && $product->product_name ? $product->product_name : old('product_name')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Sku</label>
                                <input type="text" name="product_sku"
                                    value="{{$product && !empty($product) && $product->product_sku ? $product->product_sku : old('product_sku')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Price</label>
                                <input type="text" name="product_price"
                                    value="{{$product && !empty($product) && $product->product_price ? $product->product_price : old('product_price')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Short Description</label>
                                <input type="text" name="product_short_description"
                                    value="{{$product && !empty($product) && $product->product_short_description ? $product->product_short_description : old('product_short_description')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">

                                <label for="exampleSelectGender">Product Category</label>
                                <select name="product_category" class="form-select" id="exampleSelectGender">
                                    <option selected>Select Product Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @if($product && isset($product) && $product->product_category == $category->id) selected @endif>
                                            {{$category->pro_cat_name}}
                                        </option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Banner Image</label>
                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control file-upload-info" name="product_banner"
                                        placeholder="Product Banner">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Description</label>
                                <textarea class="exp_text" name="product_description" rows="5"
                                    id="product_description">{{$product && !empty($product) && $product->product_description ? $product->product_description : old('product_description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Length</label>
                                <input type="text" name="length"
                                    value="{{$product && !empty($product) && $product->length ? $product->length : old('length')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Width</label>
                                <input type="text" name="width"
                                    value="{{$product && !empty($product) && $product->width ? $product->width : old('width')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Thickness</label>
                                <input type="text" name="thickness"
                                    value="{{$product && !empty($product) && $product->thickness ? $product->thickness : old('thickness')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Color</label>
                                <input type="text" name="color"
                                    value="{{$product && !empty($product) && $product->color ? $product->color : old('color')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Product Usage Of Panels</label>
                                <select name="usage_of_panels" class="form-select" id="exampleSelectGender">
                                    <option selected>Select Usage Of Panels</option>
                                    <option value="1" @if($product && isset($product->usage_of_panel) && $product->usage_of_panel == 1) selected
                                    @endif>Wall
                                    </option>
                                    <option value="0" @if($product && isset($product->usage_of_panel) && $product->usage_of_panel == 0) selected
                                    @endif>Ceiling
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Product Stock Status</label>
                                <select name="instock" class="form-select" id="exampleSelectGender">
                                    <option selected>Select Stock Status</option>
                                    <option value="1" @if($product && isset($product->instock) && $product->instock == 1) selected
                                    @endif>In Stock
                                    </option>
                                    <option value="0" @if($product && isset($product->instock) && $product->instock == 0) selected
                                    @endif>Out Of Stock
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Product Panel Included</label>
                                <select name="panel_included" class="form-select" id="exampleSelectGender">
                                    <option selected>Select Panel Included</option>
                                    <option value="1" @if($product && isset($product->panel_included) && $product->panel_included == 1) selected
                                    @endif>With Panelling
                                    </option>
                                    <option value="0" @if($product && isset($product->panel_included) && $product->panel_included == 0) selected
                                    @endif>Without Panelling
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Product Status</label>
                                <select name="product_status" class="form-select" id="exampleSelectGender">
                                    <option selected>Select Active</option>
                                    <option value="1" @if($product && isset($product->product_status) && $product->product_status == 1) selected
                                    @endif>Yes
                                    </option>
                                    <option value="0" @if($product && isset($product->product_status) && $product->product_status == 0) selected
                                    @endif>No
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                            <?php 
                                    $pro_params = [];
                                    if($product !=null){
                                        $pro_params = json_decode($product->pro_params);
                                    }
                                    
                                ?>
                            <label for="exampleSelectGender">Product Parameters</label>
                                <div id="meta-tags-container">
                                    @if (!empty($pro_params))
                                        @foreach ($pro_params as $param)
                                            <div class="meta-tag-pair" style="margin-bottom: 10px;">
                                                <input type="text" name="pro_params[][name]" placeholder="Param Name"
                                                    class="form-control" style="margin-right: 10px;" value="{{ $param->name }}">
                                                <input type="text" name="pro_params[][value]" placeholder="Param Value"
                                                    class="form-control" value="{{ $param->value }}">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                
                                <button id="add-more-meta-tags" class="btn btn-secondary btn-sm mt-2">Add Product Parameters</button>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Meta Title</label>
                                <input type="text" name="product_meta_title"
                                    value="{{$product && !empty($product) && $product->product_meta_title ? $product->product_meta_title : old('product_meta_title')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Meta Description</label>
                                <input type="text" name="product_meta_discription"
                                    value="{{$product && !empty($product) && $product->product_meta_discription ? $product->product_meta_discription : old('product_meta_discription')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Meta Keywords</label>
                                <input type="text" name="product_meta_keywords"
                                    value="{{$product && !empty($product) && $product->product_meta_keywords ? $product->product_meta_keywords : old('product_meta_keywords')}}"
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
        nameInput.name = 'pro_params[][name]';
        nameInput.placeholder = 'Param Name';
        nameInput.classList.add('form-control');
        nameInput.style.marginRight = '10px';

        // Create the 'value' input
        const valueInput = document.createElement('input');
        valueInput.type = 'text';
        valueInput.name = 'pro_params[][value]';
        valueInput.placeholder = 'Param Value';
        valueInput.classList.add('form-control');

        // Append inputs to the metaTagPair div
        metaTagPair.appendChild(nameInput);
        metaTagPair.appendChild(valueInput);

        // Append the metaTagPair div to the container
        document.getElementById('meta-tags-container').appendChild(metaTagPair);
    });
</script>

@endsection