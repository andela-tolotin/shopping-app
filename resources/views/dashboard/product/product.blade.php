@extends('app')
@section('title', 'Online Market Place')
@section('breadcrumb')
<!-- SECTION HEADLINE -->
<div class="section-headline-wrap">
	<div class="section-headline">
		<h2>Products</h2>
		<p>Home<span class="separator">/</span><span class="current-section">Products</span></p>
	</div>
</div>
<!-- /SECTION HEADLINE -->
@endsection
@section('body')
<!-- CONTENT -->
			<div class="content">
				<!-- HEADLINE -->
				<div class="headline tertiary">
					<h4>12.580 Products Found</h4>
					<!-- VIEW SELECTORS -->
					<div class="view-selectors">
						<a href="products.html" class="view-selector grid active"></a>
						<a href="products-listview.html" class="view-selector list"></a>
					</div>
					<!-- /VIEW SELECTORS -->
					<form id="shop_filter_form" name="shop_filter_form">
						<label for="price_filter" class="select-block">
							<select name="price_filter" id="price_filter">
								<option value="0">Price (High to Low)</option>
								<option value="1">Price (Low to High)</option>
							</select>
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</label>
						<label for="itemspp_filter" class="select-block">
							<select name="itemspp_filter" id="itemspp_filter">
								<option value="0">12 Items Per Page</option>
								<option value="1">6 Items Per Page</option>
							</select>
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</label>
					</form>
					<div class="clearfix"></div>
				</div>
				<!-- /HEADLINE -->

				<!-- PRODUCT SHOWCASE -->
				<div class="product-showcase">
					<!-- PRODUCT LIST -->
					<div class="product-list grid column3-4-wrap">
						<!-- PRODUCT ITEM -->
						<div class="product-item column">
							<!-- PRODUCT PREVIEW ACTIONS -->
							<div class="product-preview-actions">
								<!-- PRODUCT PREVIEW IMAGE -->
								<figure class="product-preview-image">
									<img src="images/items/joystick_m.jpg" alt="product-image">
								</figure>
								<!-- /PRODUCT PREVIEW IMAGE -->

								<!-- PREVIEW ACTIONS -->
								<div class="preview-actions">
									<!-- PREVIEW ACTION -->
									<div class="preview-action">
										<a href="product-page.html">
											<div class="circle tiny primary">
												<span class="icon-tag"></span>
											</div>
										</a>
										<a href="product-page.html">
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
								<a href="product-page.html">
									<p class="text-header">PX4 Crimson Joystick (Used)</p>
								</a>
								<p class="product-description">Lorem ipsum dolor sit urarde...</p>
								<a href="products.html">
									<p class="category tertiary">Accesories</p>
								</a>
								<p class="price"><span>$</span>24</p>
							</div>
							<!-- /PRODUCT INFO -->
							<hr class="line-separator">

							<!-- USER RATING -->
							<div class="user-rating">
								<a href="author-profile.html">
									<figure class="user-avatar small">
										<img src="images/avatars/avatar_17.jpg" alt="user-avatar">
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

						<!-- PRODUCT ITEM -->
						<div class="product-item column">
							<!-- PRODUCT PREVIEW ACTIONS -->
							<div class="product-preview-actions">
								<!-- PRODUCT PREVIEW IMAGE -->
								<figure class="product-preview-image">
									<img src="images/items/tablet_m.jpg" alt="product-image">
								</figure>
								<!-- /PRODUCT PREVIEW IMAGE -->

								<!-- PREVIEW ACTIONS -->
								<div class="preview-actions">
									<!-- PREVIEW ACTION -->
									<div class="preview-action">
										<a href="product-page.html">
											<div class="circle tiny primary">
												<span class="icon-tag"></span>
											</div>
										</a>
										<a href="product-page.html">
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
								<a href="product-page.html">
									<p class="text-header">Axcom Drawing Tablet (New)</p>
								</a>
								<p class="product-description">Lorem ipsum dolor sit urarde...</p>
								<a href="products.html">
									<p class="category tertiary">Tablets</p>
								</a>
								<p class="price"><span>$</span>380</p>
							</div>
							<!-- /PRODUCT INFO -->
							<hr class="line-separator">

							<!-- USER RATING -->
							<div class="user-rating">
								<a href="author-profile.html">
									<figure class="user-avatar small">
										<img src="images/avatars/avatar_16.jpg" alt="user-avatar">
									</figure>
								</a>
								<a href="author-profile.html">
									<p class="text-header tiny">Erika Thompson</p>
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
								</ul>
							</div>
							<!-- /USER RATING -->
						</div>
						<!-- /PRODUCT ITEM -->
					</div>
					<!-- /PRODUCT LIST -->
				</div>
				<!-- /PRODUCT SHOWCASE -->

				<div class="clearfix"></div>

				<!-- PAGER -->
				<div class="pager tertiary">
					<div class="pager-item"><p>1</p></div>
					<div class="pager-item active"><p>2</p></div>
					<div class="pager-item"><p>3</p></div>
					<div class="pager-item"><p>...</p></div>
					<div class="pager-item"><p>17</p></div>
				</div>
				<!-- /PAGER -->
			</div>
			<!-- CONTENT -->

			<!-- SIDEBAR -->
			@include('product.sidebar')
			<!-- /SIDEBAR -->
		</div>
	</div>
	<!-- /SECTION -->
@endsection