<?php $__env->startSection('title', 'Add a new advert'); ?>
<?php $__env->startSection('page', 'Upload Advert'); ?>
<?php $__env->startSection('body'); ?>
<!-- FORM POPUP -->
<div class="form-box-items">
    <!-- FORM BOX ITEM -->
    <div class="form-box-item">
        <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
        <form id="register-form4" method="post" action=<?php echo e(route('upload_advert')); ?> enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

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
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($product->id); ?>">
                            <?php echo e($product->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>