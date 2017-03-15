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
<div class="form-popup">
    <div class="form-popup-headline secondary">
        <h2>Login to your Account</h2>
        <p>Enter now to your account and start buying and selling!</p>
    </div>
    <div class="form-popup-content">
        <form id="login-form2">
            <label for="email" class="rl-label">Username</label>
            <input type="email" id="email" name="email" placeholder="Enter your email here...">
            <label for="password" class="rl-label">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password here...">
            <!-- CHECKBOX -->
            <input type="checkbox" id="remember2" name="remember2" checked>
            <label for="remember2" class="label-check">
                <span class="checkbox primary primary"><span></span></span>
                Remember username and password
            </label>
            <!-- /CHECKBOX -->
            <p>Forgot your password? <a href="#" class="primary">Click here!</a></p>
            <button class="button mid dark">Login <span class="primary">Now!</span></button>
        </form>
    </div>
</div>
@endsection