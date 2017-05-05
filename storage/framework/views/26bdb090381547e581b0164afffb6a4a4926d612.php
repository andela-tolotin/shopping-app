<!-- FORM BOX ITEMS -->
<div class="form-box-items">
    <!-- FORM BOX ITEM -->
    <div class="form-box-item">
        <h4>Profile Information</h4>
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
        <form id="profile-info-form" method="post" action="<?php echo e(route('profile_update', ['locale' => App::getLocale()])); ?>" enctype="multipart/form-data">
            <div class="profile-image">
                <div class="profile-image-data">
                    <figure class="user-avatar medium">
                        <?php if(Auth::user()->profile_picture == ''): ?>
                        <img src="<?php echo e(asset('images/dashboard/profile-default-image.png')); ?>" alt="profile-default-image">
                        <?php else: ?>
                        <img src="<?php echo e(Auth::user()->profile_picture); ?>">
                        <?php endif; ?>
                    </figure>
                    <p class="text-header">Profile Photo</p><br>
                    <p class="upload-details"><input type="file" class="" name="photo"></p>
                </div>
            </div>
            
            <?php echo e(csrf_field()); ?>

            <!-- INPUT CONTAINER -->
            <div class="input-container">
                <label for="name" class="rl-label required">Account Name</label>
                <input type="text" id="name" name="name" value="<?php echo e(Auth::user()->name); ?>" placeholder="Enter your account name here...">
            </div>
            <!-- /INPUT CONTAINER -->
            <!-- INPUT CONTAINER -->
            <div class="input-container half">
                <label for="password" class="rl-label">New Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password here...">
            </div>
            <!-- /INPUT CONTAINER -->
            <!-- INPUT CONTAINER -->
            <div class="input-container half">
                <label for="confirm_password" class="rl-label">Repeat Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Repeat your password here...">
            </div>
            <!-- /INPUT CONTAINER -->
            <!-- INPUT CONTAINER -->
            <div class="input-container">
                <label for="email" class="rl-label">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address here..." value="<?php echo e(Auth::user()->email); ?>" readonly="readonly">
            </div>
            <div class="input-container half">
                <label for="gender" class="rl-label required">Gender</label>
                <label for="gender" class="select-block">
                    <select name="gender" id="gender">
                        <option value="">Select your Gender...</option>
                        <?php if(Auth::user()->gender == 'Male'): ?>
                        <option value="Male" selected="selected">Male</option>
                        <?php else: ?>
                        <option value="Male">Male</option>
                        <?php endif; ?>
                        <?php if(Auth::user()->gender == 'Female'): ?>
                        <option value="Female" selected="selected">Female</option>
                        <?php else: ?>
                        <option value="Female">Female</option>
                        <?php endif; ?>
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>
            </div>
            <!-- /INPUT CONTAINER -->
            <div class="input-container half">
                <label for="phone" class="rl-label">Phone</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone here..." value="<?php echo e(Auth::user()->phone); ?>">
            </div>
            <!-- INPUT CONTAINER -->
            <div class="clearfix"></div>
            <hr class="line-separator">
            <button class="button big dark">Save <span class="primary">Changes</span></button>
            <!-- /INPUT CONTAINER -->
        </form>
    </div>
    <!-- /FORM BOX ITEM -->