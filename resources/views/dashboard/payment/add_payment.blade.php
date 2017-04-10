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
        <form id="profile-info-form" method="post" action="{{ route('create_payment', ['locale' => App::getLocale()]) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="profile-image">
                <div class="profile-image-data">
                    <figure class="user-avatar medium">
                        <img src="{{ asset('images/dashboard/profile-default-image.png') }}" alt="profile-default-image">
                    </figure>
                    <p class="text-header">Profile Photo</p><br>
                    <p class="upload-details"><input type="file" class="" name="photo" required="required"></p>
                </div>
            </div>
            <!-- INPUT CONTAINER -->
            <div class="input-container">
                <label for="name" class="rl-label required">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your payment name here..." required="required">
            </div>
            <!-- /INPUT CONTAINER -->
            <!-- /INPUT CONTAINER -->
            <div class="input-container half">
                <label for="client_id" class="rl-label">Client ID</label>
                <input type="text" id="client_id" name="client_id" placeholder="Enter your client_id here..." value="{{ old('client_id') }}" required="required">
            </div>
            <!-- INPUT CONTAINER -->
            <!-- /INPUT CONTAINER -->
            <div class="input-container half">
                <label for="client_secret" class="rl-label">Client Secret</label>
                <input type="text" id="client_secret" name="client_secret" placeholder="Enter your client_secret here..." value="{{ old('client_secret') }}" required="required">
            </div>
            <!-- INPUT CONTAINER -->
            <!-- INPUT CONTAINER -->
            <div class="input-container">
                <label for="callback_url" class="rl-label required">Callback Url</label>
                <input type="text" id="callback_url" name="callback_url" value="{{ old('callback_url') }}" placeholder="Enter your callback_url here...">
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