@extends('app')
@section('title', 'Add a product')
@section('breadcrumb')
    <!-- SECTION HEADLINE -->
    <div class="section-headline-wrap">
        <div class="section-headline">
            <h2>Add a product</h2>
            <p>Home<span class="separator">/</span><span class="current-section">product</span></p>
        </div>
    </div>
    <!-- /SECTION HEADLINE -->
@endsection
@section('body')
    <!-- FORM POPUP -->
    <div class="fix-align" style="width: 50%; margin:auto;">
        <div class="form-popup">
            <!-- FORM POPUP HEADLINE -->
            <div class="form-popup-headline primary">
                <h2>Add Product</h2>
            </div>
            <!-- FORM POPUP CONTENT -->
            <div class="form-popup-content">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="register-form4" method="post" action={{ route('post_product') }} enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <label for="name" class="rl-label required">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter name of product here..." required="required">
                        <label for="description" class="rl-label required">Description</label>
                        <input type="text" id="description" name="description" placeholder="Enter description of product here..." required="required">

                        <fieldset>

                            <label for="category" class = "rl-label require">Product Category</label>

                            <select name="category">
                                <option value="" >Product Category</option>
                                @foreach($categories as $category)

                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                        </fieldset>
                        <label for="price" class="rl-label required">Price</label>
                        <input type="number" id="price" name="price" placeholder="Enter price of product here..." required="required">
                        <label for="discount" class="rl-label required">Discount</label>
                        <input type="number" id="discount" name="discount" placeholder="Enter discount here...">
                        <label for="tax" class="rl-label required">Tax</label>
                        <input type="number" id="tax" name="tax" placeholder="Enter tax here...">
                        {{--<div class="profile-image">--}}
                            <div class="profile-image-data">
                                <figure class="user-avatar medium">
                                    <img src="images/dashboard/profile-default-image.png" alt="profile-default-image">
                                </figure>
                                <p class="text-header">Product Photo</p>
                                <p class="upload-details">Minimum size 70x70px</p>
                            </div>

                            <input type="file" id="file" class="button mid-short" name="photo">
                             {{--<a href="#" class="button mid-short dark-light">Upload Image...</a>--}}
                        {{--</div>--}}
                    <button type="submit" class="button mid dark">Add Product</button>
                </form>
            </div>
            <!-- /FORM POPUP CONTENT -->
        </div>
    </div>
@endsection