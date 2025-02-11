@extends('layouts.site')
@section('content')
@php
$page_data = $settings['page_data'] ?? null;
$banner = !empty($page_data->page_banner)
? asset("storage/".$page_data->page_banner)
: asset("brahmani_frontend_assets/images/bg/titlebar-img.jpg");

@endphp
<style>
    /* Centering container */
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    /* Enhancing the table */
    table {
        border-radius: 10px;
        overflow: hidden;
        margin-top: 50px;
    }

    th,
    td {
        padding: 15px;
        font-size: 18px;
    }
</style>
<!-- Title Bar -->
<div class="pbmit-title-bar-wrapper">
    <div class="container">
        <div class="pbmit-title-bar-content">
            <div class="pbmit-title-bar-content-inner">
                <div class="pbmit-tbar">
                    <div class="pbmit-tbar-inner container">
                        <h1 class="pbmit-tbar-title"> Panel Calculator</h1>
                    </div>
                </div>
                <div class="pbmit-breadcrumb">
                    <div class="pbmit-breadcrumb-inner">
                        <span>
                            <a title="" href="/" class="home"><span>Home</span></a>
                        </span>
                        <span class="sep">
                            <i class="pbmit-base-icon-angle-right"></i>
                        </span>
                        <span><span class="post-root post post-post current-item"> Panel Calculator:</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Title Bar End-->
<!-- Page Content -->
<div class="page-content about-us">
    <div class="container">


        <div class="container d-flex justify-content-center align-items-center min-vh-100">

            <div class="col-lg-8">
                <form action="/calculate" class="contact-form" method="post">
                    @csrf

                    <div class="row" style="margin: 20px;">
                        <div class="card">
                            <div class="row">
                                <div class="col">
                                    <label for="">
                                        select unit:
                                    </label>
                                    <div class="card-body">

                                        <div class="form-input">
                                            <select name="unit" class="form-select text-light" id="unit" style="background-color: grey;">
                                                <option value="0">Select Unit</option>
                                                <option value="1">mm</option>
                                                <option value="2">cm</option>
                                                <option value="3">m</option>
                                                <option value="4">ft</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin: 20px;">
                        <div class="card">
                            <div class="row">
                                <div class="col">
                                    <label for="">
                                        Enter wall Height:
                                    </label>
                                    <div class="card-body">
                                        <div class="form-input">
                                            <input type="text" class="form-control text-light" name="wall_height" value="{{$wall_height??''}}" id="" style="background-color: grey;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">
                                        Enter wall width:
                                    </label>
                                    <div class="card-body">
                                        <div class="form-input">
                                            <input type="text" class="form-control text-light" style="background-color: grey;" name="wall_width" value="{{$wall_width??''}}" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin: 20px;">
                        <div class="card">
                            <div class="row">
                                <div class="col">
                                    <label for="">
                                        select panel dimensions:
                                    </label>
                                    <div class="card-body">

                                        <div class="form-input">
                                            <select name="panel_dim" class="form-select text-light" style="background-color: grey;" id="panel_dim">
                                                <option value="0">Select Panel Dimension</option>
                                                <option value="1">2600mm x 250mm</option>
                                                <option value="2">2420mm x 600mm</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row" id="panel_dim_row" style="margin:20px;display: none;">
                        <div class="card">
                            <div class="row">
                                <div class="col">
                                    <label for="">
                                        Panel Height:
                                    </label>
                                    <div class="card-body">
                                        <div class="form-input">
                                            <input type="text" name="panel_height" class="form-control text-light" style="background-color: grey;" value="{{$panel_height??''}}" id="panel_height">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">
                                        Panel width:
                                    </label>
                                    <div class="card-body">
                                        <div class="form-input">
                                            <input type="text" name="panel_width" class="form-control text-light" style="background-color: grey;" value="{{$panel_width??''}}" id="panel_width">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin: 20px;">
                        <div class="form-input">
                            <input type="submit" class="btn btn-secondary" value="Submit">
                        </div>
                    </div>
                </form>
                <table class="table table-bordered table-striped text-center shadow-lg">
                    <thead class="table-dark">
                        <tr>
                            <th>Panel Area (㎡)</th>
                            <th>Wall Area (㎡)</th>
                            <th>Panels Required</th>
                            <th>Excess Area (㎡)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$panel_area ?? 0}}</td>
                            <td>{{$wall_area ?? 0}}</td>
                            <td>{{$total_panel_required ?? 0}}</td>
                            <td>{{$excess_area ?? 0}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('panel_dim').addEventListener("change", function() {
        var div = document.getElementById("panel_dim_row");
        var val = parseInt(this.value); // Convert string to number
        var _unit = "{{$unit??0}}";
        console.log(_unit);
        if (val !== 0) {
            switch (val) {
                case 1:
                    document.getElementById('panel_height').value = 2600;
                    document.getElementById('panel_width').value = 250;
                    break;
                case 2:
                    document.getElementById('panel_height').value = 2420;
                    document.getElementById('panel_width').value = 600;
                    break;
                default:
                    document.getElementById('panel_height').value = "";
                    document.getElementById('panel_width').value = "";
                    break;
            }
            div.style.display = "block";
        } else {
            div.style.display = "none";
            document.getElementById('panel_height').value = "";
            document.getElementById('panel_width').value = "";
        }
    });
</script>
@endsection