@extends('app')
@section('title', 'User Login')
@section('breadcrumb')
<!-- SECTION HEADLINE -->
<div class="section-headline-wrap">
    <div class="section-headline">
        <h2>User login</h2>
        <p>Home<span class="separator">/</span><span class="current-section">login</span></p>
    </div>
</div>
<!-- /SECTION HEADLINE -->
@endsection
@section('body')
<div class="fix-align">
    <div class="form-popup">
        <div class="form-popup-headline secondary">
            <h2>Login to your Account</h2>
        </div>
        <div class="form-popup-content">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    @if ($error == 'validation.captcha')
                    <li> Invalid Captcha </li>
                    @else
                    <li>{{ $error }}</li>
                    @endif
                    @endforeach
                </ul>
            </div>
            @endif
            <form id="login-form" method="post" action="{{ route('login') }}">
                {{ csrf_field() }}
                <label for="email" class="rl-label">Username</label>
                <input type="email" id="email" name="email" placeholder="Enter your email here...">
                <label for="password" class="rl-label">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password here...">
                <p> {!! captcha_img() !!} </p>
                <br>
                <p><input type="text" name="captcha" required="required" placeholder="Enter your captcha here..."></p>
                <button class="button mid dark">Login <span class="primary">Now!</span></button>
            </form>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection