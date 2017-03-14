@extends('app')
@section('title', 'User Registration')
@section('breadcrumb')
<!-- SECTION HEADLINE -->
<div class="section-headline-wrap">
    <div class="section-headline">
        <h2>User Registration</h2>
        <p>Home<span class="separator">/</span><span class="current-section">register</span></p>
    </div>
</div>
<!-- /SECTION HEADLINE -->
@endsection
@section('body')
<!-- FORM POPUP -->
<div class="form-popup">
    <!-- FORM POPUP HEADLINE -->
    <div class="form-popup-headline primary">
        <h2>Register Account</h2>
        <p>Register now and start making money from home!</p>
    </div>
    <!-- /FORM POPUP HEADLINE -->
    <!-- FORM POPUP CONTENT -->
    <div class="form-popup-content">
        <form id="register-form4">
            <label for="email_address6" class="rl-label required">Email Address</label>
            <input type="email" id="email_address6" name="email_address6" placeholder="Enter your email address here...">
            <label for="username6" class="rl-label">Username</label>
            <input type="text" id="username6" name="username6" placeholder="Enter your username here...">
            <label for="password6" class="rl-label required">Password</label>
            <input type="password" id="password6" name="password6" placeholder="Enter your password here...">
            <label for="repeat_password6" class="rl-label required">Repeat Password</label>
            <input type="password" id="repeat_password6" name="repeat_password6" placeholder="Repeat your password here...">
            <button class="button mid dark">Register <span class="primary">Now!</span></button>
        </form>
    </div>
    <!-- /FORM POPUP CONTENT -->
@endsection