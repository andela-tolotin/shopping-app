<?php $__env->startSection('title', 'Online Market Place'); ?>
<?php echo $__env->make('partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
	<?php echo $__env->make('partial.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- BANNER -->
	<div class="banner-wrap">
		<section class="banner">
			<h5>Welcome to</h5>
			<h1>The Biggest <span>Marketplace</span></h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
			<img src="<?php echo e(asset('images/top_items.png')); ?>" alt="banner-img">
			
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
					<?php if($products->count() > 0): ?>
					<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<!-- PRODUCT ITEM -->
					<div class="product-item column">
						<!-- PRODUCT PREVIEW ACTIONS -->
						<div class="product-preview-actions">
							<!-- PRODUCT PREVIEW IMAGE -->
							<figure class="product-preview-image">
								<?php $productImages = json_decode($product->product_img_url); ?>
								<?php if(count($productImages) > 0): ?>
								<img src="<?php echo e($productImages[0]); ?>" alt="product-image" style="width: 258px; height: 150px;">
								<?php else: ?>
								<img src="<?php echo e(asset('images/items/westeros_m.jpg')); ?>" alt="product-image">
								<?php endif; ?>
							</figure>
							<!-- /PRODUCT PREVIEW IMAGE -->
						</div>
						<!-- /PRODUCT PREVIEW ACTIONS -->
						<!-- PRODUCT INFO -->
						<div class="product-info">
							<a href="<?php echo e(route('product-details', ['id' => $product->id])); ?>">
								<p class="text-header"><?php echo e($product->name); ?></p>
							</a>
							<a href="#">
								<p class="category primary"><?php echo e($product->category->name); ?></p>
							</a>
							<p class="price"><span>P</span><?php echo e($product->price); ?></p>
						</div>
					</div>
					<!-- /PRODUCT ITEM -->
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					<?php endif; ?>
				</div>
				<!-- /PRODUCT LIST -->
			</div>
			<!-- /PRODUCT SHOWCASE -->
		</div>
	</div>
	<!-- /PRODUCTS SIDESHOW -->
	<!-- FOOTER -->
	<?php echo $__env->make('partial.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
</body>
</html>
