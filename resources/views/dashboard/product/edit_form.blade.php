@extends('dashboard.base')
@section('title', 'Edit product')
@section('page', 'Edit product')
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
            <form id="register-form4" method="post" action="/product/{{ $product->id }}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="profile-image">
                    @if ($product->product_img_url == '')
                        <img src="{{ asset('images/dashboard/profile-default-image.png') }}" alt="profile-default-image">
                    @else
                        @foreach($productImage as $image)
                            <img src="{{ $image }}" style="width: 20%; height: auto;">
                        @endforeach
                    @endif
                    <p class="text-header">Product Photo</p><br>
                            <p class="upload-details"><input type="file" name="images[]" multiple="multiple" accept="image/*"></p>
                </div>
                <div class="input-container">
                    <label for="name" class="rl-label required">Name</label>
                    <input type="text" id="name" name="name" value="{{ $product->name }}" required="required">
                </div>
                <div class="input-container">
                    <label for="category">Product Category</label>
                    <select class = "form-control" name="category">
                        <option value="" > Product category</option>
                        @foreach($categories as $category)
                            @if ($category->id == $product->category_id)
                                <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>

                </div>
                <div class="input-container half">
                    <label for="price" class="rl-label required">Price</label>
                    <input type="number" id="price" name="price" value="{{ $product->price }}" required="required">
                </div>
                <div class="input-container half">
                    <label for="discount" class="rl-label required">Discount</label>
                    <input type="number" id="discount" name="discount" value="{{ $product->discount }}">
                </div>
                <div class="input-container">
                    <label for="tax" class="rl-label required">Tax</label>
                    <input type="number" id="tax" name="tax" value="{{ $product->tax }}">
                </div>

                <div class="input-container">
                    <label for="description" class="rl-label required">Description</label>
                    <textarea name="description" required="required">{{ $product->description }}</textarea>
                </div>
                <button type="submit" class="button mid dark">Update Product</button>
            </form>
        </div>
        <!-- /FORM POPUP CONTENT -->
    </div>
    </div>
@endsection
@section('pageScripts')
@include('partial.dashboard.tinymce')
@endsection