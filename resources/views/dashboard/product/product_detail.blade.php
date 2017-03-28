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
<?php $productImages = json_decode($product->product_img_url); ?>
<div class="sidebar right">
    <!-- SIDEBAR ITEM -->
    <div class="sidebar-item void buttons">
        <a href="#" class="button big dark purchase" data-item-name="{{ $product->name }}" data-item-price="{{ $product->price }}" data-item-category="{{ $product->category->name }}" data-item-id="{{ $product->id }}" data-item-image="{{ @$productImages[0] }}">
            <span class="currency">{{ (int) $product->price }}</span>
            <span>Purchase Now!</span>
        </a>
        <a href="#" class="button big tertiary wcart" data-item-name="{{ $product->name }}" data-item-price="{{ $product->price }}" data-item-category="{{ $product->category->name }}" data-item-id="{{ $product->id }}" data-item-image="{{ @$productImages[0] }}">
            <span class="icon-present"></span>
            Checkout
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
            @if (count($productImages) > 0)
            <figure class="product-preview-image large liquid">
                <img src="{{ $productImages[0] }}" alt="">
            </figure>
            @else
            <figure class="product-preview-image large liquid">
                <img src="{{ asset('images/items/funtendo_b01.jpg') }}" alt="">
            </figure>
            @endif
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
                <?php $productImages = json_decode($product->product_img_url); ?>
                @if (count($productImages) > 0)
                @foreach($productImages as $productImage)
                <div class="gallery-items">
                    <span data-mfp-src="{{ $productImage }}"></span>
                </div>
                @endforeach
                @else
                <!-- GALLERY ITEMS -->
                <div class="gallery-items">
                    <span data-mfp-src="{{ asset('images/items/funtendo_b01.jpg') }}"></span>
                </div>
                <!-- /GALLERY ITEMS -->
                @endif
            </div>
            <!-- /IMAGE OVERLAY -->
        </div>
        <!-- /POST IMAGE -->
        <!-- POST CONTENT -->
        <div class="post-content">
            <!-- POST PARAGRAPH -->
            <div class="post-paragraph">
                <h3 class="post-title">Product Description</h3>
                <p>{{ $product->description }}.</p>
            </div>
            <!-- /POST PARAGRAPH -->
        </div>
        <!-- /POST CONTENT -->
        <hr class="line-separator">
    </article>
    <!-- /POST -->
</div>
<!-- CONTENT -->
@endsection