@extends('dashboard.base')
@section('title', 'Configure Payment')
@section('page', 'Configure Payment')
@section('body')
<!-- FORM BOX ITEMS -->
<div class="form-box-items">
    <!-- FORM BOX ITEM -->
    <div class="form-box-item">
        <h4>Add Payment</h4>
        <hr class="line-separator">
        <!-- PROFILE IMAGE UPLOAD -->
        <!-- PROFILE IMAGE UPLOAD -->
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form id="profile-info-form" method="post" action="" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- INPUT CONTAINER -->
            <div class="input-container">
                <label for="name" class="rl-label required">Name</label>
                <input type="text" id="name" name="name" value="" placeholder="Enter your account name here..." required="required">
            </div>
            <!-- /INPUT CONTAINER -->
            <!-- /INPUT CONTAINER -->
            <div class="input-container half">
                <label for="client_id" class="rl-label">Client ID</label>
                <input type="text" id="client_id" name="client_id" placeholder="Enter your client_id here..." value="" required="required">
            </div>
            <!-- INPUT CONTAINER -->
            <!-- /INPUT CONTAINER -->
            <div class="input-container half">
                <label for="client_secret" class="rl-label">Client Secret</label>
                <input type="text" id="client_secret" name="client_secret" placeholder="Enter your client_secret here..." value="" required="required">
            </div>
            <!-- INPUT CONTAINER -->
            <!-- INPUT CONTAINER -->
            <div class="input-container">
                <label for="callback_url" class="rl-label required">Callback Url</label>
                <input type="text" id="callback_url" name="callback_url" value="" placeholder="Enter your callback_url here..." required="required">
            </div>
            <!-- /INPUT CONTAINER -->
            <div class="clearfix"></div>
            <hr class="line-separator">
            <button class="button big dark">Save <span class="primary">Changes</span></button>
            <!-- /INPUT CONTAINER -->
        </form>
    </div>
    <!-- /FORM BOX ITEM -->
    @endsection