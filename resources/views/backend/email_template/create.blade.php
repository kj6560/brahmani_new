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
<?php 
// $pTags = $template->tags;
// $allPostTags = [];
// foreach($pTags as $tag){
//     $allPostTags[] = $tag->tag_id;
// }
?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-11 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{!empty($template) && $template->id ? "Edit" : "Create"}} Email Template
                        {{!empty($template->template_name) ? " : " . $template->template_name : ""}}
                    </h4>
                    @include('backend.errors.formErrors')
                    <form method="POST" action="/admin/emailSettings/template/store" enctype="multipart/form-data"
                        class="forms-sample">

                        @if (!empty($template->id))
                            <input type="text" name="id" value="{{!empty($template) && $template->id ? $template->id : null}}"
                                class="form-control" id="exampleInputUsername1" hidden>
                        @endif

                        @csrf

                        <div class="col" style="margin: 20px;">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Template Name</label>
                                <input type="text" name="template_name"
                                    value="{{!empty($template) && $template->template_name ? $template->template_name : old('template_name')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputUsername1">Template Content</label>
                                <textarea class="exp_text" name="template_content" rows="20"
                                    id="content">{{!empty($template) && $template->template_content ? $template->template_content : old('template_content')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Template Status</label>
                                <select name="status" class="form-select" id="exampleSelectGender">
                                    <option selected>Select Active</option>
                                    <option value="1" @if(isset($template) && $template->status == 1) selected @endif>Yes
                                    </option>
                                    <option value="0" @if(isset($template) && $template->status == 0) selected @endif>No
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