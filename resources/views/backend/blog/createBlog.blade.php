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
$pTags = $post->tags;
$allPostTags = [];
foreach($pTags as $tag){
    $allPostTags[] = $tag->tag_id;
}
?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-11 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{!empty($post) && $post->id ? "Edit" : "Create"}} Post
                        {{!empty($post->title) ? " : " . $post->title : ""}}
                    </h4>
                    @include('backend.errors.formErrors')
                    <form method="POST" action="/admin/blogSettings/blogs/store" enctype="multipart/form-data"
                        class="forms-sample">

                        @if (!empty($post->id))
                            <input type="text" name="id" value="{{!empty($post) && $post->id ? $post->id : null}}"
                                class="form-control" id="exampleInputUsername1" hidden>
                        @endif

                        @csrf

                        <div class="col" style="margin: 20px;">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Title</label>
                                <input type="text" name="title"
                                    value="{{!empty($post) && $post->title ? $post->title : old('title')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Post Small Description</label>
                                <textarea class="exp_text" name="small_desc" rows="5"
                                    id="content">{{!empty($post) && $post->small_desc ? $post->small_desc : old('small_desc')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Post Content</label>
                                <textarea class="exp_text" name="content" rows="20"
                                    id="content">{{!empty($post) && $post->content ? $post->content : old('content')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelectGender">Post Category</label>
                                <select name="category_id" class="form-select" id="exampleSelectGender">
                                    <option selected>Select Post Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @if(isset($post) && $post->category_id == $category->id) selected @endif>
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="exampleSelectTags">Post Tags</label>
                            <select style="height: 200px;" name="tags[]" class="form-select" id="exampleSelectTags" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}" @if(isset($selectedTags) && in_array($tag->id, $selectedTags)) selected @endif>
                                        {{$tag->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                            <div class="form-group">
                                <label>Post Featured Image</label>
                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control file-upload-info" name="featured_image"
                                        placeholder="featured_image">
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="exampleSelectGender">Post Status</label>
                                <select name="active" class="form-select" id="exampleSelectGender">
                                    <option selected>Select Active</option>
                                    <option value="1" @if(isset($post) && $post->active == 1) selected @endif>Yes
                                    </option>
                                    <option value="0" @if(isset($post) && $post->active == 0) selected @endif>No
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