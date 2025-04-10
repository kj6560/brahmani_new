@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="card shadow text-white bg-success mb-3" id="general" style="margin:10px;width: 300px;cursor:pointer;">
        <div class="card-body">
            <div class="row">
                <div class="col" style="margin-top:15px;">
                    <h2>General Settings</h2>
                </div>
                <div class="col">
                    <i class="fa fa-5x fa-cogs"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow text-white bg-success mb-3" id="page" style="margin:10px;width: 300px;cursor:pointer;">
        <div class="card-body">
            <div class="row">
                <div class="col" style="margin-top:15px;">
                    <h2>Page Settings</h2>
                </div>
                <div class="col">
                    <i class="fa fa-5x fa-cogs"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow text-white bg-success mb-3" id="product" style="margin:10px;width: 300px;cursor:pointer;">
        <div class="card-body">
            <div class="row">
                <div class="col" style="margin-top:15px;">
                    <h2>Product Settings</h2>
                </div>
                <div class="col">
                    <i class="fa fa-5x fa-cogs"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow text-white bg-success mb-3" id="enquiries" style="margin:10px;width: 300px;cursor:pointer;">
        <div class="card-body">
            <div class="row">
                <div class="col" style="margin-top:15px;">
                    <h3>Enquiries Settings</h3>
                </div>
                <div class="col">
                    <i class="fa fa-4x fa-cogs"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow text-white bg-success mb-3" id="emails" style="margin:10px;width: 300px;cursor:pointer;">
        <div class="card-body">
            <div class="row">
                <div class="col" style="margin-top:15px;">
                    <h3>Email Settings</h3>
                </div>
                <div class="col">
                    <i class="fa fa-4x fa-cogs"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow text-white bg-success mb-3" id="account" style="margin:10px;width: 300px;cursor:pointer;">
        <div class="card-body">
            <div class="row">
                <div class="col" style="margin-top:15px;">
                    <h2>Account Settings</h2>
                </div>
                <div class="col">
                    <i class="fa fa-5x fa-cogs"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow text-white bg-success mb-3" id="blog" style="margin:10px;width: 300px;cursor:pointer;">
        <div class="card-body">
            <div class="row">
                <div class="col" style="margin-top:15px;">
                    <h2>Blog Settings</h2>
                </div>
                <div class="col">
                    <i class="fa fa-5x fa-cogs"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow text-white bg-success mb-3" id="visitors" style="margin:10px;width: 300px;cursor:pointer;">
        <div class="card-body">
            <div class="row">
                <div class="col" style="margin-top:15px;">
                    <h2>Visitor Trace</h2>
                </div>
                <div class="col">
                    <i class="fa fa-5x fa-cogs"></i>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection

@section('custom_javascript')
<script>
    document.getElementById('general').onclick = function() {
        window.location.href = "/admin/createSiteSettings";
    }
    document.getElementById('page').onclick = function() {
        window.location.href = "/admin/categories";
    }
    document.getElementById('product').onclick = function() {
        window.location.href = "/admin/products";
    }
    document.getElementById('enquiries').onclick = function() {
        window.location.href = "/admin/enquiries";
    }
    document.getElementById('emails').onclick = function() {
        window.location.href = "/admin/emailSettings";
    }
    document.getElementById('account').onclick = function() {
        window.location.href = "/admin/accountSettings";
    }
    document.getElementById('blog').onclick = function() {
        window.location.href = "/admin/blogSettings";
    }
    document.getElementById('visitors').onclick = function() {
        window.location.href = "/admin/visitorTrace";
    }
</script>
@endsection