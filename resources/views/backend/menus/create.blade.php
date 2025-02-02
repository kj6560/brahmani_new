@extends('layouts.dashboard')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-11 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{!empty($menu) && $menu->id ? "Edit" : "Create"}} Menus</h4>
                    @include('backend.errors.formErrors')
                    <form method="POST" action="/admin/menus/store" class="forms-sample">

                        @if (!empty($menu->id))
                            <input type="text" name="id" value="{{!empty($menu) && $menu->id ? $menu->id : null}}"
                                class="form-control" id="exampleInputUsername1" hidden>
                        @endif
                        @csrf
                        
                        <div class="col" style="margin: 20px;">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Menu Title</label>
                                <input type="text" name="menu_title"
                                    value="{{!empty($menu) && $menu->menu_title ? $menu->menu_title : old('menu_title')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Menu Group</label>
                                <input type="text" name="menu_group"
                                    value="{{!empty($menu) && $menu->menu_group ? $menu->menu_group : old('menu_group')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Menu Url</label>
                                <input type="text" name="menu_url"
                                    value="{{!empty($menu) && $menu->menu_url ? $menu->menu_url : old('menu_url')}}"
                                    class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">

                            <label for="exampleSelectGender">Is Active</label>
                            <select name="is_active" class="form-select" id="exampleSelectGender">
                                <option selected>Select Active</option>
                                <option value="1" @if(isset($menu) && $menu->is_active == 1) selected @endif>Yes
                                </option>
                                <option value="0" @if(isset($menu) && $menu->is_active == 0) selected @endif>No
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