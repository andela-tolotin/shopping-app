@extends('app')
@section('title', $product->name)
@section('breadcrumb')
<!-- SECTION HEADLINE -->
<div class="section-headline-wrap v2">
    <div class="section-headline">
        <h2>{{ $product->name }}</h2>
        <p>Home<span class="separator">/</span>Products<span class="separator">/</span><span class="current-section">{{ $product->name }}</span></p>
    </div>
</div>
<!-- /SECTION HEADLINE -->
@endsection
@section('body')
<!-- SECTION -->
<!-- SIDEBAR -->
<div class="sidebar right">
    <!-- SIDEBAR ITEM -->
    <div class="sidebar-item void buttons">
        <a href="#" class="button big dark purchase">
            <span class="currency">{{ (int) $product->price }}</span>
            <span>Purchase Now!</span>
        </a>
        <a href="#" class="button big tertiary wcart">
            <span class="icon-present"></span>
            Add to the Cart
        </a>
    </div>
    <!-- /SIDEBAR ITEM -->
</div>
<!-- /SIDEBAR -->
<!-- CONTENT -->
<div class="content left">
    <!-- POST -->
    <article class="post">
        <!-- POST IMAGE -->
        <div class="post-image">
            <figure class="product-preview-image large liquid">
                <img src="{{ asset('images/items/funtendo_b01.jpg') }}" alt="">
            </figure>
            <!-- IMAGE OVERLAY -->
            <div class="image-overlay img-gallery">
                <div class="clickable-icon tertiary">
                    <!-- SVG PLUS -->
                    <svg class="svg-plus">
                        <use xlink:href="#svg-plus"></use>
                    </svg>
                    <!-- /SVG PLUS -->
                </div>
                <!-- GALLERY ITEMS -->
                <div class="gallery-items">
                    <span data-mfp-src="{{ asset('images/items/funtendo_b01.jpg') }}"></span>
                </div>
                <!-- /GALLERY ITEMS -->
            </div>
            <!-- /IMAGE OVERLAY -->
        </div>
        <!-- /POST IMAGE -->
        <!-- POST CONTENT -->
        <div class="post-content">
            <!-- POST PARAGRAPH -->
            <div class="post-paragraph">
                <h3 class="post-title">Discover the New Funtendo!</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <!-- /POST PARAGRAPH -->
            <!-- POST PARAGRAPH -->
            <div class="post-paragraph">
                <h3 class="post-title small">Colors Available:</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
            </div>
            <!-- /POST PARAGRAPH -->
            <a href="#">
                <figure class="post-banner liquid">
                    <img src="{{ asset('images/items/shop_ad.jpg') }}" alt="">
                </figure>
            </a>
        </div>
        <!-- /POST CONTENT -->
        <hr class="line-separator">
    </article>
    <!-- /POST -->
</div>
<!-- CONTENT -->
@endsection