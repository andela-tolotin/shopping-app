@extends('dashboard.base')
@section('title', 'Edit user')
@section('page', 'Edit '.$user->name)
@section('body')
<!-- FORM BOX ITEMS -->
<div class="form-box-items">
    <!-- FORM BOX ITEM -->
    <div class="form-box-item">
        <h4>Edit User</h4>
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
                <label for="name" class="rl-label required">Account Name</label>
                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" placeholder="Enter your account name here...">
            </div>
            <!-- /INPUT CONTAINER -->
            <!-- INPUT CONTAINER -->
            <div class="input-container half">
                <label for="gender" class="rl-label required">Role</label>
                <label for="gender" class="select-block">
                    <select name="gender" id="gender">
                        <option value="">Select user Role...</option>
                        @if ($userRoles->count() > 0)
                        @foreach($userRoles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                        @endif
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>
            </div>
            <!-- /INPUT CONTAINER -->
            <!-- INPUT CONTAINER -->
            <div class="input-container half">
                <label for="status" class="rl-label required">Status</label>
                <label for="status" class="select-block">
                    <select name="status" id="status">
                        <option value="">Select user status...</option>
                        <option value="0">De-Activate</option>
                        <option value="1">Activate</option>
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>
            </div>
            <!-- /INPUT CONTAINER -->
            <!-- INPUT CONTAINER -->
            <div class="input-container">
                <label for="email" class="rl-label">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address here..." value="{{ Auth::user()->email }}" readonly="readonly">
            </div>
            <div class="input-container half">
                <label for="gender" class="rl-label required">Gender</label>
                <label for="gender" class="select-block">
                    <select name="gender" id="gender">
                        <option value="">Select your Gender...</option>
                        @if (Auth::user()->gender == 'Male')
                        <option value="Male" selected="selected">Male</option>
                        @else
                        <option value="Male">Male</option>
                        @endif
                        @if (Auth::user()->gender == 'Female')
                        <option value="Female" selected="selected">Female</option>
                        @else
                        <option value="Female">Female</option>
                        @endif
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>
            </div>
            <!-- /INPUT CONTAINER -->
            <div class="input-container half">
                <label for="phone" class="rl-label">Phone</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone here..." value="{{ Auth::user()->phone }}">
            </div>
            <!-- INPUT CONTAINER -->
            <div class="clearfix"></div>
            <hr class="line-separator">
            <button class="button big dark">Save <span class="primary">Changes</span></button>
            <!-- /INPUT CONTAINER -->
        </form>
    </div>
    <!-- /FORM BOX ITEM -->
@endsection