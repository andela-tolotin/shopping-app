@extends('app')
@section('title', $product->name)
@section('breadcrumb')
<!-- SECTION HEADLINE -->
<div class="section-headline-wrap v2">
	<div class="section-headline">
		<h2>Shopping Cart</h2>
		<p>Home<span class="separator">/</span>Products<span class="separator">/</span><span class="current-section">Shopping Cart</span></p>
	</div>
</div>
<!-- /SECTION HEADLINE -->
@endsection
@section('body')
<div class="section-wrap">
	<div class="section">
		<!-- /SIDEBAR -->
		<!-- CONTENT -->
		<div class="content right">
			<!-- CART -->
			<div class="cart">
				<!-- CART HEADER -->
				<div class="cart-header">
					<div class="cart-header-product">
						<p class="text-header small">Product Details</p>
					</div>
					<div class="cart-header-category">
						<p class="text-header small">Category</p>
					</div>
					<div class="cart-header-price">
						<p class="text-header small">Price</p>
					</div>
					<div class="cart-header-actions">
						<p class="text-header small">Remove</p>
					</div>
				</div>
				<!-- /CART HEADER -->
				<!-- CART ITEM -->
				<div class="cart-item">
					<!-- CART ITEM PRODUCT -->
					<div class="cart-item-product">
						<!-- ITEM PREVIEW -->
						<div class="item-preview">
							<a href="item-v1.html">
								<figure class="product-preview-image small liquid">
									<img src="images/items/westeros_s.jpg" alt="">
								</figure>
							</a>
							<a href="item-v1.html"><p class="text-header small">Westeros Custom Clothing</p></a>
							<p class="description">Lorem ipsum dolor sit urarde adipisicing elit dem...</p>
						</div>
						<!-- /ITEM PREVIEW -->
					</div>
					<!-- /CART ITEM PRODUCT -->
					<!-- CART ITEM CATEGORY -->
					<div class="cart-item-category">
						<a href="shop-gridview-v1.html" class="category primary">PSD Templates</a>
					</div>
					<!-- /CART ITEM CATEGORY -->
					<!-- CART ITEM PRICE -->
					<div class="cart-item-price">
						<p class="price"><span>$</span>14</p>
					</div>
					<!-- /CART ITEM PRICE -->
					<!-- CART ITEM ACTIONS -->
					<div class="cart-item-actions">
						<a href="#" class="button dark-light rmv">
							<!-- SVG PLUS -->
							<svg class="svg-plus">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-plus"></use>
							</svg>
							<!-- /SVG PLUS -->
						</a>
					</div>
					<!-- /CART ITEM ACTIONS -->
				</div>
				<!-- /CART ITEM -->
				<!-- CART ITEM -->
				<div class="cart-item">
					<!-- CART ITEM PRODUCT -->
					<div class="cart-item-product">
						<!-- ITEM PREVIEW -->
						<div class="item-preview">
							<a href="item-v1.html">
								<figure class="product-preview-image small liquid">
									<img src="images/items/miniverse_s.jpg" alt="">
								</figure>
							</a>
							<a href="item-v1.html"><p class="text-header small">Miniverse - Hero Image Composer</p></a>
							<p class="description">Lorem ipsum dolor sit urarde adipisicing elit dem...</p>
						</div>
						<!-- /ITEM PREVIEW -->
					</div>
					<!-- /CART ITEM PRODUCT -->
					<!-- CART ITEM CATEGORY -->
					<div class="cart-item-category">
						<a href="shop-gridview-v1.html" class="category primary">Hero Images</a>
					</div>
					<!-- /CART ITEM CATEGORY -->
					<!-- CART ITEM PRICE -->
					<div class="cart-item-price">
						<p class="price"><span>$</span>12</p>
					</div>
					<!-- /CART ITEM PRICE -->
					<!-- CART ITEM ACTIONS -->
					<div class="cart-item-actions">
						<a href="#" class="button dark-light rmv">
							<!-- SVG PLUS -->
							<svg class="svg-plus">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-plus"></use>
							</svg>
							<!-- /SVG PLUS -->
						</a>
					</div>
					<!-- /CART ITEM ACTIONS -->
				</div>
				<!-- /CART ITEM -->
				<!-- CART ITEM -->
				<div class="cart-item">
					<!-- CART ITEM PRODUCT -->
					<div class="cart-item-product">
						<!-- ITEM PREVIEW -->
						<div class="item-preview">
							<a href="item-v1.html">
								<figure class="product-preview-image small liquid">
									<img src="images/items/pixel_s.jpg" alt="">
								</figure>
							</a>
							<a href="item-v1.html"><p class="text-header small">Pixel Diamond Gaming Shop</p></a>
							<p class="description">Lorem ipsum dolor sit urarde adipisicing elit dem...</p>
						</div>
						<!-- /ITEM PREVIEW -->
					</div>
					<!-- /CART ITEM PRODUCT -->
					<!-- CART ITEM CATEGORY -->
					<div class="cart-item-category">
						<a href="shop-gridview-v1.html" class="category primary">Shopify</a>
					</div>
					<!-- /CART ITEM CATEGORY -->
					<!-- CART ITEM PRICE -->
					<div class="cart-item-price">
						<p class="price"><span>$</span>86</p>
					</div>
					<!-- /CART ITEM PRICE -->
					<!-- CART ITEM ACTIONS -->
					<div class="cart-item-actions">
						<a href="#" class="button dark-light rmv">
							<!-- SVG PLUS -->
							<svg class="svg-plus">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-plus"></use>
							</svg>
							<!-- /SVG PLUS -->
						</a>
					</div>
					<!-- /CART ITEM ACTIONS -->
				</div>
				<!-- /CART ITEM -->
				<!-- CART TOTAL -->
				<div class="cart-total">
					<p class="price"><span>$</span>112</p>
					<p class="text-header subtotal">Cart Subtotal</p>
				</div>
				<!-- /CART TOTAL -->
				<!-- CART TOTAL -->
				<div class="cart-total">
					<p class="price"><span>$</span>25</p>
					<p class="text-header subtotal">Shipping</p>
				</div>
				<!-- /CART TOTAL -->
				<!-- CART TOTAL -->
				<div class="cart-total">
					<p class="price medium"><span>$</span>127</p>
					<p class="text-header total">Cart Total</p>
				</div>
				<!-- /CART TOTAL -->
				<!-- CART ACTIONS -->
				<div class="cart-actions">
					<a href="checkout.html" class="button mid primary">Proceed to Checkout</a>
					<a href="shop-gridview-v1.html" class="button mid dark-light spaced">Continue Browsing</a>
				</div>
				<!-- /CART ACTIONS -->
			</div>
			<!-- /CART -->
		</div>
		<!-- CONTENT -->
	</div>
</div>
@endsection