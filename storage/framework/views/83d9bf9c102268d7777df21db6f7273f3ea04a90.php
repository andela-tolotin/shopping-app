<?php $__env->startSection('title', 'Add a category'); ?>
<?php $__env->startSection('page', 'Add a category'); ?>
<?php $__env->startSection('body'); ?>
<!-- FORM POPUP -->
<div class="form-box-items">
    <!-- FORM BOX ITEM -->
    <div class="form-box-item">
        <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li style="color: red;"><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
        <form id="register-form4" method="post" action=<?php echo e(route('post_category', ['locale' => App::getLocale()])); ?>>
            <?php echo e(csrf_field()); ?>

            <div class="input-container">
                <label for="name" class="rl-label required">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter name of category here..." required="required">
            </div>
            <div class="input-container">
                <label for="description" class="rl-label required">Description</label>
                <input type="text" id="description" name="description" placeholder="Enter description of category here...">
            </div>
            <button class="button mid dark">Add Category</button>
        </form>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>