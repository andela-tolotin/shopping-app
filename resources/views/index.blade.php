@section('title', 'Online Market Place')
@include('partial.header')
<body>
	@include('partial.menu')
	<!-- BANNER -->
	<div class="banner-wrap">
		<section class="banner">
			<h5>Welcome to</h5>
			<h1>Play To <span>The Sky</span></h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
			<img src="{{ asset('images/top_items.png') }}" alt="banner-img">
			
		</section>
	</div>
	<!-- /BANNER -->
	<div class="clearfix"></div>
	<!-- PRODUCT SIDESHOW -->
	<div id="product-sideshow-wrap">
		<div id="product-sideshow">
			<!-- PRODUCT SHOWCASE -->
			<div class="product-showcase">
				<!-- HEADLINE -->
				<div class="headline primary">
					<h4>Latest Online Products</h4>
					<!-- SLIDE CONTROLS -->
					<div class="slide-control-wrap">
						<div class="slide-control left">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</div>
						<div class="slide-control right">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</div>
					</div>
					<!-- /SLIDE CONTROLS -->
				</div>
				<!-- /HEADLINE -->
				<!-- PRODUCT LIST -->
				<div id="pl-1" class="product-list grid column4-wrap owl-carousel">
					@if ($products->count() > 0)
					@foreach($products as $product)
					<!-- PRODUCT ITEM -->
					<div class="product-item column">
						<!-- PRODUCT PREVIEW ACTIONS -->
						<div class="product-preview-actions">
							<!-- PRODUCT PREVIEW IMAGE -->
							<figure class="product-preview-image">
								<?php $productImages = json_decode($product->product_img_url); ?>
								@if (count($productImages) > 0)
								<img src="{{ $productImages[0] }}" alt="product-image" style="width: 258px; height: 150px;">
								@else
								<img src="{{ asset('images/items/westeros_m.jpg') }}" alt="product-image">
								@endif
							</figure>
							<!-- /PRODUCT PREVIEW IMAGE -->
						</div>
						<!-- /PRODUCT PREVIEW ACTIONS -->
						<!-- PRODUCT INFO -->
						<div class="product-info">
							<a href="{{ route('product-details', ['id' => $product->id])}}">
								<p class="text-header">{{ $product->name }}</p>
							</a>
							<a href="#">
								<p class="category primary">{{ $product->category->name }}</p>
							</a>
							<p class="price"><span>P</span>{{ $product->price }}</p>
						</div>
					</div>
					<!-- /PRODUCT ITEM -->
					@endforeach
					@endif
				</div>
				<!-- /PRODUCT LIST -->
			</div>
			<!-- /PRODUCT SHOWCASE -->
		</div>
	</div>
	<!-- /PRODUCTS SIDESHOW -->
	<!-- FOOTER -->
	@include('partial.footer')
</body>
</html>
