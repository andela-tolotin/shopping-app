<?php $__env->startSection('title', 'Buy Point'); ?>
<?php $__env->startSection('page', 'Specify Point'); ?>
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
        <form action="<?php echo e(route('buy_point')); ?>" method="GET">
        <p>
            <?php if(!empty(session('status'))): ?>
            <?php if(session('status')): ?>
            <div class="alert alert-success">
                Your Payment was successful!
            </div>
            <?php else: ?>
            <div class="alert alert-danger">
                Your Payment was not successful!
            </div>
            <?php endif; ?>
            <?php endif; ?>
             <?php if(session('message')): ?>
             <div class="alert alert-danger">
                <?php echo e(session('message')); ?>!
            </div>
            <?php endif; ?>
        </p>
            <div class="input-container">
                <label for="name" class="rl-label required">Point</label>
                <input type="text" id="point" name="point" placeholder="Enter points to buy here" required="required">
            </div>
            <button class="button mid dark">Proceed</button>
        </form>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
<!-- /FORM BOX ITEMS -->
<style type="text/css">
    .alert-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>