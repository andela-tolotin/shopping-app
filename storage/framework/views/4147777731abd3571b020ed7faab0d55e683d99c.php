<?php $__env->startSection('title', 'Add a product'); ?>
<?php $__env->startSection('page', 'Add a product'); ?>
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
        <form id="register-form4" method="post" action=<?php echo e(route('post_product')); ?> enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

             <div class="profile-image">
                <div class="profile-image-data">
                    <figure class="user-avatar medium">
                        <img src="images/dashboard/profile-default-image.png" alt="profile-default-image">
                    </figure>
                    <p class="text-header">Product Photo</p><br>
                    <p class="upload-details"><input type="file" name="images[]" multiple="multiple" accept="image/*" required="required"></p>
                </div>
            </div>
            <div class="input-container">
                <label for="name" class="rl-label required">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter name of product here..." required="required">
            </div>
            <div class="input-container half">
                <label for="price" class="rl-label required">Price</label>
                <input type="number" id="price" name="price" placeholder="Enter price of product here..." required="required">
            </div>
            <div class="input-container half">
                <label for="discount" class="rl-label required">Discount</label>
                <input type="number" id="discount" name="discount" placeholder="Enter discount here...">
            </div>
            <div class="input-container">
                <label for="category" class = "rl-label require">Product Category</label>
                <label for="gender" class="select-block">
                    <select name="category" required="required">
                        <option value="" >Product Category</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($category->id); ?>">
                            <?php echo e($category->name); ?>

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
            <div class="input-container half">
                <label for="tax" class="rl-label required">Tax</label>
                <input type="number" id="tax" name="tax" placeholder="Enter tax here...">
            </div>

            <div class="input-container">
                <label for="description" class="rl-label required">Description</label>
                <textarea id="description" name="description" placeholder="Enter description of product here..."></textarea>
            </div>
            <button type="submit" class="button mid dark">Add Product</button>
        </form>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageScripts'); ?>
<?php echo $__env->make('partial.dashboard.tinymce', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>