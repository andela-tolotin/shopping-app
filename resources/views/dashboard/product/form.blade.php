@extends('dashboard.base')
@section('title', 'Add a product')
@section('page', 'Add a product')
@section('body')
<!-- FORM POPUP -->
<div class="form-box-items">
    <!-- FORM BOX ITEM -->
    <div class="form-box-item">
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
             <div class="profile-image">
                <div class="profile-image-data">
                    <figure class="user-avatar medium">
                        <img src="images/dashboard/profile-default-image.png" alt="profile-default-image">
                    </figure>
                    <p class="text-header">Product Photo</p><br>
                    <p class="upload-details"><input type="file" name="images[]" multiple="multiple" accept="image/*" required="required"></p>
                </div>
            </div>
            <div class="input-container">
                <label for="name" class="rl-label required">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter name of product here..." required="required">
            </div>
            <div class="input-container">
                <label for="category" class = "rl-label require">Product Category</label>
                <label for="gender" class="select-block">
                    <select name="category" required="required">
                        <option value="" >Product Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>
            </div>
            <div class="input-container half">
                <label for="price" class="rl-label required">Price</label>
                <input type="number" id="price" name="price" placeholder="Enter price of product here..." required="required">
            </div>
            <div class="input-container half">
                <label for="discount" class="rl-label required">Discount</label>
                <input type="number" id="discount" name="discount" placeholder="Enter discount here...">
            </div>
            <div class="input-container half">
                <label for="tax" class="rl-label required">Tax</label>
                <input type="number" id="tax" name="tax" placeholder="Enter tax here...">
            </div>
            <div class="input-container half">
                <label for="assignee" class="rl-label required">Assignee</label>
                <label for="gender" class="select-block">
                    <select name="assignee" required="required">
                        <option value="" >Assignee</option>
                        @foreach($assignees as $assignee)
                        <option value="{{ $assignee->id }}">
                            {{ $assignee->name }}
                        </option>
                        @endforeach
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>
            </div>
            <div class="input-container">
                <label for="description" class="rl-label required">Description</label>
                <textarea id="description" name="description" placeholder="Enter description of product here..."></textarea>
            </div>
            <button type="submit" class="button mid dark">Add Product</button>
        </form>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
</div>
@endsection
@section('pageScripts')
@include('partial.dashboard.tinymce')
@endsection