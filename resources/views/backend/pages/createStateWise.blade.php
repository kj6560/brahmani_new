@extends('layouts.dashboard')
@section('content')
<style>
    .exp_text {
        width: 100%;
        max-width: 100%;
        min-width: 100%;
        min-height: 50px;
        resize: both;
        overflow: auto;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-11 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{!empty($page) && $page->id ? "Edit" : "Create"}} State Wise Page
                        {{!empty($page->page_name) ? " : " . $page->page_name : ""}}
                    </h4>
                    @include('backend.errors.formErrors')
                    <form method="POST" action="/admin/categories/storeBulkPages/state" enctype="multipart/form-data"
                        class="forms-sample">

                        @if (!empty($page->id))
                            <input type="text" name="id" value="{{!empty($page) && $page->id ? $page->id : null}}"
                                class="form-control" id="exampleInputUsername1" hidden>
                        @endif

                        @csrf

                        <div class="col" style="margin: 20px;">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Page Name</label>
                                <input type="text" name="page_name"
                                    value="{{!empty($page) && $page->page_name ? $page->page_name : old('page_name')}}"
                                    {{ !empty($page) && !empty($page->id) ? 'disabled' : '' }}
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            
                            <div class="form-group">
                                <label>Page Banner</label>
                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control file-upload-info" name="page_banner"
                                        placeholder="Page Banner">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Page Sliders</label>
                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control file-upload-info" name="pageSliders[]"
                                        multiple placeholder="Multiple Page Sliders">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputUsername1">Seo Title</label>
                                <textarea class="exp_text" name="seo_title" rows="5"
                                    id="seo_title">{{!empty($page) && $page->seo_title ? $page->seo_title : old('page_name')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Seo Description</label>
                                <textarea class="exp_text" name="seo_desc" rows="5"
                                    id="seo_desc">{{!empty($page) && $page->seo_desc ? $page->seo_desc : old('seo_desc')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Seo Keywords</label>
                                <textarea class="exp_text" name="seo_keywords" rows="5"
                                    id="seo_keywords">{{!empty($page) && $page->seo_keywords ? $page->seo_keywords : old('seo_keywords')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Page Headings</label>
                                <textarea class="exp_text" name="page_headings" rows="5"
                                    id="page_headings">{{!empty($page) && $page->page_headings ? $page->page_headings : old('page_headings')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Page Description</label>
                                <textarea class="exp_text" name="page_desc" rows="5"
                                    id="page_desc">{{!empty($page) && $page->page_desc ? $page->page_desc : old('page_desc')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Page Schema</label>
                                <textarea class="exp_text" name="page_schema" rows="10"
                                    id="page_schema">{{!empty($page) && $page->page_schema ? $page->page_schema : old('page_schema')}}</textarea>
                            </div>

                            <div class="form-group">

                                <label for="exampleSelectGender">Page Parent</label>
                                <select name="page_parent" class="form-select" id="exampleSelectGender">
                                    <option value="0">This is a Parent Page</option>
                                    @foreach ($parents as $parent)
                                        <option value="{{$parent->id}}" @if(isset($page) && $page->page_parent == $parent->id)
                                        selected @endif>{{$parent->page_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Page Display Order</label>
                                <input type="text" name="page_display_order"
                                    value="{{!empty($page) ? $page->page_display_order : old('page_display_order')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>

                            <div class="form-group">

                                <label for="exampleSelectGender">Page Active</label>
                                <select name="page_status" class="form-select" id="exampleSelectGender">
                                    <option selected>Select Active</option>
                                    <option value="1" @if(isset($page) && $page->page_status == 1) selected @endif>Yes
                                    </option>
                                    <option value="0" @if(isset($page) && $page->page_status == 0) selected @endif>No
                                    </option>
                                </select>
                            </div>
                            <!-- Meta Tags Section -->
                            <div class="form-group">
                                <label>Meta Tags</label>
                                <?php 
                                    $metaTags = [];
                                    if($page !=null){
                                        $metaTags = json_decode($page->page_meta);
                                    }
                                ?>
                                <div id="meta-tags-container">
                                    @if (!empty($metaTags))
                                        @foreach ($metaTags as $tag)
                                            <div class="meta-tag-pair" style="margin-bottom: 10px;">
                                                <input type="text" name="meta_tags[][name]" placeholder="Tag Name"
                                                    class="form-control" style="margin-right: 10px;" value="{{ $tag->name }}">
                                                <input type="text" name="meta_tags[][value]" placeholder="Tag Value"
                                                    class="form-control" value="{{ $tag->value }}">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button id="add-more-meta-tags" class="btn btn-secondary btn-sm mt-2">Add Meta
                                    Tags</button>
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