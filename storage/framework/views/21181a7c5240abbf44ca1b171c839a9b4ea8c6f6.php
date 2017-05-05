<?php $__env->startSection('title', 'Edit ' . $paymentGateway->name); ?>
<?php $__env->startSection('page', 'Edit ' . $paymentGateway->name); ?>
<?php $__env->startSection('body'); ?>
<!-- FORM BOX ITEMS -->
<div class="form-box-items">
    <!-- FORM BOX ITEM -->
    <div class="form-box-item">
        <h4>Edit Payment</h4>
        <hr class="line-separator">
        <!-- PROFILE IMAGE UPLOAD -->
        <!-- PROFILE IMAGE UPLOAD -->
        <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
        <form id="profile-info-form" method="post" action="<?php echo e(route('update_payment', ['id' => $paymentGateway->id])); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="profile-image">
                <div class="profile-image-data">
                    <figure class="user-avatar medium">
                        <?php if($paymentGateway->logo == ''): ?>
                        <img src="<?php echo e(asset('images/dashboard/profile-default-image.png')); ?>" alt="profile-default-image">
                        <?php else: ?>
                        <img src="<?php echo e($paymentGateway->logo); ?>" alt="<?php echo e($paymentGateway->name); ?>">
                        <?php endif; ?>
                    </figure>
                    <p class="text-header">Profile Photo</p><br>
                    <p class="upload-details"><input type="file" class="" name="photo"></p>
                </div>
            </div>
            <!-- INPUT CONTAINER -->
            <div class="input-container">
                <label for="name" class="rl-label required">Name</label>
                <input type="text" id="name" name="name" value="<?php echo e($paymentGateway->name); ?>" placeholder="Enter your payment name here..." required="required">
            </div>
            <!-- /INPUT CONTAINER -->
            <!-- /INPUT CONTAINER -->
            <div class="input-container half">
                <label for="client_id" class="rl-label">Client ID</label>
                <input type="text" id="client_id" name="client_id" placeholder="Enter your client_id here..." value="<?php echo e($paymentGateway->client_id); ?>" required="required">
            </div>
            <!-- INPUT CONTAINER -->
            <!-- /INPUT CONTAINER -->
            <div class="input-container half">
                <label for="client_secret" class="rl-label">Client Secret</label>
                <input type="text" id="client_secret" name="client_secret" placeholder="Enter your client_secret here..." value="<?php echo e($paymentGateway->client_secret); ?>" required="required">
            </div>
            <!-- INPUT CONTAINER -->
            <!-- INPUT CONTAINER -->
            <div class="input-container">
                <label for="callback_url" class="rl-label required">Callback Url</label>
                <input type="text" id="callback_url" name="callback_url" value="<?php echo e($paymentGateway->callback_url); ?>" placeholder="Enter your callback_url here..." >
            </div>
            <!-- /INPUT CONTAINER -->
            <div class="clearfix"></div>
            <hr class="line-separator">
            <button class="button big dark">Save <span class="primary">Changes</span></button>
            <!-- /INPUT CONTAINER -->
        </form>
    </div>
    <!-- /FORM BOX ITEM -->
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>