<?php $__env->startSection('title', 'Edit product'); ?>
<?php $__env->startSection('page', 'Edit product'); ?>
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
            <form id="register-form4" method="post" action="/product/<?php echo e($product->id); ?>/update" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="profile-image">
                    <?php if($product->product_img_url == ''): ?>
                        <img src="<?php echo e(asset('images/dashboard/profile-default-image.png')); ?>" alt="profile-default-image">
                    <?php else: ?>
                        <?php $__currentLoopData = $productImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <img src="<?php echo e($image); ?>" style="width: 20%; height: auto;">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php endif; ?>
                    <p class="text-header">Product Photo</p><br>
                            <p class="upload-details"><input type="file" name="images[]" multiple="multiple" accept="image/*"></p>
                </div>
                <div class="input-container">
                    <label for="name" class="rl-label required">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo e($product->name); ?>" required="required">
                </div>
                <div class="input-container">
                    <label for="category">Product Category</label>
                    <select class = "form-control" name="category">
                        <option value="" > Product category</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php if($category->id == $product->category_id): ?>
                                <option selected value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </select>

                </div>
                <div class="input-container half">
                    <label for="price" class="rl-label required">Price</label>
                    <input type="number" id="price" name="price" value="<?php echo e($product->price); ?>" required="required">
                </div>
                <div class="input-container half">
                    <label for="discount" class="rl-label required">Discount</label>
                    <input type="number" id="discount" name="discount" value="<?php echo e($product->discount); ?>">
                </div>
                <div class="input-container">
                    <label for="tax" class="rl-label required">Tax</label>
                    <input type="number" id="tax" name="tax" value="<?php echo e($product->tax); ?>">
                </div>

                <div class="input-container half">
                    <label for="assignee" class="rl-label required">Assignee</label>
                    <label for="gender" class="select-block">
                        <select name="assignee">
                            <option value="<?php echo e(Auth::user()->id); ?>">Assignee</option>
                            <?php $__currentLoopData = $assignees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignee): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <option value="<?php echo e($assignee->id); ?>"><?php echo e($assignee->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                    </label>
                </div>

                <div class="input-container">
                    <label for="description" class="rl-label required">Description</label>
                    <textarea name="description" required="required"><?php echo e($product->description); ?></textarea>
                </div>
                <button type="submit" class="button mid dark">Update Product</button>
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