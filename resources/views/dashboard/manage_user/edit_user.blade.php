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
        <form id="profile-info-form" method="post" action="{{ route('update_user', ['id' => $user->id])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="profile-image">
                <div class="profile-image-data">
                    <figure class="user-avatar medium">
                        @if (Auth::user()->profile_picture == '')
                        <img src="images/dashboard/profile-default-image.png" alt="profile-default-image">
                        @else
                        <img src="{{ Auth::user()->profile_picture }}">
                        @endif
                    </figure>
                    <p class="text-header">Profile Photo</p><br>
                    <p class="upload-details"><input type="file" class="" name="photo"></p>
                </div>
            </div>
            <!-- INPUT CONTAINER -->
            <div class="input-container">
                <label for="name" class="rl-label required">Account Name</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" placeholder="Enter your account name here..." required="required">
            </div>
            <!-- /INPUT CONTAINER -->
            <!-- INPUT CONTAINER -->
            <div class="input-container half">
                <label for="role" class="rl-label required">Role</label>
                <label for="role" class="select-block">
                    <select name="role" id="role" required="required">
                        <option value="">Select user Role...</option>
                        @if ($userRoles->count() > 0)
                        @foreach($userRoles as $role)
                        @if ($user->role_id == $role->id)
                        <option value="{{ $role->id }}" selected="selected">{{ $role->name }}</option>
                        @else
                        <option value="{{ $role->id }}" >{{ $role->name }}</option>
                        @endif
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
                    <select name="status" id="status" required="required">
                        <option value="">Select user status...</option>
                        @if ($user->status == 0)
                        <option value="0" selected="selected">De-Activate</option>
                        @else
                        <option value="0">De-Activate</option>
                        @endif
                        @if ($user->status == 1)
                        <option value="1" selected="selected">Activate</option>
                        @else
                        <option value="1">Activate</option>
                        @endif
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>
            </div>

            <div class="input-container">
                <label for="email" class="rl-label">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address here..." value="{{ $user->email }}" readonly="readonly">
            </div>

            <div class="input-container half">
                <label for="gender" class="rl-label required">Gender</label>
                <label for="gender" class="select-block">
                    <select name="gender" id="gender" required="required">
                        <option value="">Select your Gender...</option>
                        @if ($user->gender == 'Male')
                        <option value="Male" selected="selected">Male</option>
                        @else
                        <option value="Male">Male</option>
                        @endif
                        @if ($user->gender == 'Female')
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

            <div class="input-container half">
                <label for="product" class="rl-label required">Product</label>
                <label for="gender" class="select-block">
               <?php $serviceManager = $user->serviceManager; ?>
                    <select name="product">
                        <option value="">Product</option>
                        @foreach($products as $product)
                            @if (!is_null($serviceManager))
                                @if ($serviceManager->product_id == $product->id)
                                    <option value="{{ $product->id }}" selected="selected">{{ $product->name }}</option>
                                @endif
                            @endif
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>
            </div>
            <!-- /INPUT CONTAINER -->
            <div class="input-container">
                <label for="phone" class="rl-label">Phone</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone here..." value="{{ $user->phone }}" required="required">
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