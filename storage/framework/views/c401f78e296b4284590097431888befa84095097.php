
<?php $__env->startSection('title', 'User Login'); ?>
<?php $__env->startSection('breadcrumb'); ?>
<!-- SECTION HEADLINE -->
<div class="section-headline-wrap">
    <div class="section-headline">
        <h2>User login</h2>
        <p>Home<span class="separator">/</span><span class="current-section">login</span></p>
    </div>
</div>
<!-- /SECTION HEADLINE -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="fix-align">
    <div class="form-popup">
        <div class="form-popup-headline secondary">
            <h2>Login to your Account</h2>
        </div>
        <div class="form-popup-content">
            <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php if($error == 'validation.captcha'): ?>
                    <li> Invalid Captcha </li>
                    <?php else: ?>
                    <li><?php echo e($error); ?></li>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            <form id="login-form" method="post" action="<?php echo e(route('login')); ?>">
                <?php echo e(csrf_field()); ?>

                <label for="email" class="rl-label">Username</label>
                <input type="email" id="email" name="email" placeholder="Enter your email here...">
                <label for="password" class="rl-label">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password here...">
                <p> <?php echo captcha_img(); ?> </p>
                <br>
                <p><input type="text" name="captcha" required="required" placeholder="Enter your captcha here..."></p>
                <button class="button mid dark">Login <span class="primary">Now!</span></button>
            </form>
            <br>
            <h5><u>Or Login with</u></h5>
            <div class="col-md-4">
              <a href="auth/google" class="btn google btn-lg btn-block text-danger">Google+</a>
            </div>
            <div class="col-md-4">
              <a href="auth/facebook" class="btn facebook btn-lg btn-block text-primary">Facebook</a>
            </div>
            <div class="col-md-4">
              <a href="auth/kakao" class="btn kakao btn-lg btn-block text-primary">Kakao</a>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>