@extends('dashboard.base')
@section('title', 'Add a new advert')
@section('page', 'Upload Advert')
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
        <form id="register-form4" method="post" action={{ route('upload_advert', ['locale' => App::getLocale()]) }} enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="profile-image">
                <div class="profile-image-data">
                    <figure class="user-avatar medium">
                        <img src="images/dashboard/profile-default-image.png" alt="profile-default-image">
                    </figure>
                    <p class="text-header">Advert Photo</p><br>
                    <p class="upload-details"><input type="file" name="images[]" multiple="multiple" accept="image/*" required="required"></p>
                </div>
            </div>
            <div class="input-container">
                <label for="product" class = "rl-label require">Product</label>
                <label for="product" class="select-block">
                    <select name="product" required="required">
                        <option value="" >Select Product you want advert to be associated with</option>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->name }}
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
            <button type="submit" class="button mid dark">Add Advert</button>
        </form>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
</div>
@endsection