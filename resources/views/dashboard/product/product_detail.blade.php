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
    
    <!-- SIDEBAR ITEM -->
    <div class="sidebar-item author-items">
        <h4>More Seller's Items</h4>
        <!-- PRODUCT LIST -->
        <div class="product-list grid column4-wrap">
            <!-- PRODUCT ITEM -->
            <div class="product-item column">
                <!-- PRODUCT PREVIEW ACTIONS -->
                <div class="product-preview-actions">
                    <!-- PRODUCT PREVIEW IMAGE -->
                    <figure class="product-preview-image">
                        <img src="{{ asset('images/items/joystick_m.jpg') }}" alt="product-image">
                    </figure>
                    <!-- /PRODUCT PREVIEW IMAGE -->
                    <!-- PREVIEW ACTIONS -->
                    <div class="preview-actions">
                        <!-- PREVIEW ACTION -->
                        <div class="preview-action">
                            <a href="item-v1.html">
                                <div class="circle tiny primary">
                                    <span class="icon-tag"></span>
                                </div>
                            </a>
                            <a href="item-v1.html">
                                <p>Go to Item</p>
                            </a>
                        </div>
                        <!-- /PREVIEW ACTION -->
                        <!-- PREVIEW ACTION -->
                        <div class="preview-action">
                            <a href="#">
                                <div class="circle tiny secondary">
                                    <span class="icon-heart"></span>
                                </div>
                            </a>
                            <a href="#">
                                <p>Favourites +</p>
                            </a>
                        </div>
                        <!-- /PREVIEW ACTION -->
                    </div>
                    <!-- /PREVIEW ACTIONS -->
                </div>
                <!-- /PRODUCT PREVIEW ACTIONS -->
                <!-- PRODUCT INFO -->
                <div class="product-info">
                    <a href="item-v1.html">
                        <p class="text-header">PX4 Crimson Joystick (Used)</p>
                    </a>
                    <p class="product-description">Lorem ipsum dolor sit urarde...</p>
                    <a href="shop-gridview-v1.html">
                        <p class="category tertiary">Accesories</p>
                    </a>
                    <p class="price"><span>$</span>80</p>
                </div>
                <!-- /PRODUCT INFO -->
                <hr class="line-separator">
                <!-- USER RATING -->
                <div class="user-rating">
                    <a href="author-profile.html">
                        <figure class="user-avatar small">
                            <img src="{{ asset('images/avatars/avatar_17.jpg') }}" alt="user-avatar">
                        </figure>
                    </a>
                    <a href="author-profile.html">
                        <p class="text-header tiny">Kratos Cave</p>
                    </a>
                    <ul class="rating tooltip" title="Author's Reputation">
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item empty">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item empty">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                    </ul>
                </div>
                <!-- /USER RATING -->
            </div>
            <!-- /PRODUCT ITEM -->
        </div>
        <!-- /PRODUCT LIST -->
        <div class="clearfix"></div>
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