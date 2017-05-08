<?php $__env->startSection('title', 'Edit category'); ?>
<?php $__env->startSection('page', 'Edit category'); ?>
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
            <form id="register-form4" method="post" action="<?php echo e(route('update_category', ['id' => $category->id, 'locale' => App::getLocale()])); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="input-container">
                    <label for="name" class="rl-label required">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo e($category->name); ?>" required="required">
                </div>
                <div class="input-container">
                    <label for="description" class="rl-label required">Description</label>
                    <input type="text" id="description" name="description" value="<?php echo e($category->description); ?>">
                </div>
                <button type="submit" class="button mid dark">Update Category</button>
            </form>
        </div>
        <!-- /FORM POPUP CONTENT -->
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>