<?php $__env->startSection('title', $product->name); ?>
<?php $__env->startSection('breadcrumb'); ?>
<!-- SECTION HEADLINE -->
<div class="section-headline-wrap v2">
    <div class="section-headline">
        <h2><?php echo e($product->name); ?></h2>
        <p>Home<span class="separator">/</span>Products<span class="separator">/</span><span class="current-section"><?php echo e($product->name); ?></span></p>
    </div>
</div>
<!-- /SECTION HEADLINE -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<!-- SECTION -->
<!-- SIDEBAR -->
<?php $productImages = json_decode($product->product_img_url); ?>
<div class="sidebar right">
    <!-- SIDEBAR ITEM -->
    <div class="sidebar-item void buttons">
        <a href="<?php echo e(route('purchase_product', ['locale' => App::getLocale(), 'id' => $product->id ])); ?>" class="button big dark purchase" data-item-name="<?php echo e($product->name); ?>" data-item-price="<?php echo e($product->price); ?>" data-item-category="<?php echo e($product->category->name); ?>" data-item-id="<?php echo e($product->id); ?>" data-item-image="<?php echo e(@$productImages[0]); ?>">
            <span class="currency"><?php echo e((int) $product->price); ?></span>
            <span> <?php echo app('translator')->get('app.purchase_now'); ?> </span>
        </a>
        <?php if($productAdvert->count() > 0): ?>
        <?php $photos =  json_decode($productAdvert->advert_photos); ?>
           <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
             <img src="<?php echo e($photo); ?>" class="img-responsive" alt="" style="width: 270px; height: auto; float: left; clear: both; margin-bottom: 20px;">
           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endif; ?>
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
            <?php if(count($productImages) > 0): ?>
            <figure class="product-preview-image large liquid">
                <img src="<?php echo e($productImages[0]); ?>" alt="">
            </figure>
            <?php else: ?>
            <figure class="product-preview-image large liquid">
                <img src="<?php echo e(asset('images/items/funtendo_b01.jpg')); ?>" alt="">
            </figure>
            <?php endif; ?>
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
                <?php if(count($productImages) > 0): ?>
                <?php $__currentLoopData = $productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImage): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div class="gallery-items">
                    <span data-mfp-src="<?php echo e($productImage); ?>"></span>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php else: ?>
                <!-- GALLERY ITEMS -->
                <div class="gallery-items">
                    <span data-mfp-src="<?php echo e(asset('images/items/funtendo_b01.jpg')); ?>"></span>
                </div>
                <!-- /GALLERY ITEMS -->
                <?php endif; ?>
            </div>
            <!-- /IMAGE OVERLAY -->
        </div>
        <!-- /POST IMAGE -->
        <!-- POST CONTENT -->
        <div class="post-content">
            <!-- POST PARAGRAPH -->
            <div class="post-paragraph">
                <h3 class="post-title">Product Description</h3>
                <p><?php echo $product->description; ?></p>
            </div>
            <!-- /POST PARAGRAPH -->
        </div>
        <!-- /POST CONTENT -->
        <hr class="line-separator">
    </article>
    <!-- /POST -->
</div>
<!-- CONTENT -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>