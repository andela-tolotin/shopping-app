<?php $__env->startSection('title', 'User Registration'); ?>
<?php $__env->startSection('breadcrumb'); ?>
<!-- SECTION HEADLINE -->
<div class="section-headline-wrap">
    <div class="section-headline">
        <h2>User Registration</h2>
        <p>Home<span class="separator">/</span><span class="current-section">register</span></p>
    </div>
</div>
<!-- /SECTION HEADLINE -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<!-- FORM POPUP -->
<div class="fix-align">
    <div class="form-popup">
        <!-- FORM POPUP HEADLINE -->
        <div class="form-popup-headline primary">
            <h2>Register Account</h2>
        </div>
        <!-- FORM POPUP CONTENT -->
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
            <form id="register-form4" method="post" action="/register">
                <?php echo e(csrf_field()); ?>

                <label for="name" class="rl-label required">Name</label>
                <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" placeholder="Enter your name here..." required="required">
                <label for="gender" class="rl-label required">Gender</label>
                <label for="gender" class="select-block">
                    <select name="gender" id="gender" required="required">
                        <option value="">Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>
                <label for="phone" class="rl-label required">Phone</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone here..."  value="<?php echo e(old('phone')); ?>" required="required">
                <label for="email_address6" class="rl-label required">Email Address</label>
                <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Enter your email address here..." required="required">
                <label for="password" class="rl-label required">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password here..." required="required">
                <label for="password_confirmation" class="rl-label required">Repeat Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repeat your password here..." required="required">
                <label for="address" class="rl-label required">Address</label>
                <textarea name="address" placeholder="Write your address here..."></textarea>
                <br><br>
                <p> <?php echo captcha_img(); ?> </p>
                <br>
                <p><input type="text" name="captcha" required="required" placeholder="Enter your captcha here..."></p>
                <button class="button mid dark">Register <span class="primary">Now!</span></button>
            </form>
        </div>
        <!-- /FORM POPUP CONTENT -->
    </div>
</div>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>