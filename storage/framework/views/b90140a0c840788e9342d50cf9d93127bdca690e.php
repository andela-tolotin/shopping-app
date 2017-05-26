<?php $__env->startSection('title', 'Edit user'); ?>
<?php $__env->startSection('page', 'Edit '.$user->name); ?>
<?php $__env->startSection('body'); ?>
<!-- FORM BOX ITEMS -->
<div class="form-box-items">
    <!-- FORM BOX ITEM -->
    <div class="form-box-item">
        <h4>Edit User</h4>
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
        <form id="profile-info-form" method="post" action="<?php echo e(route('update_user', ['id' => $user->id])); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

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
            <!-- INPUT CONTAINER -->
            <div class="input-container">
                <label for="name" class="rl-label required">Account Name</label>
                <input type="text" id="name" name="name" value="<?php echo e($user->name); ?>" placeholder="Enter your account name here..." required="required">
            </div>
            <!-- /INPUT CONTAINER -->
            <!-- INPUT CONTAINER -->
            <div class="input-container half">
                <label for="role" class="rl-label required">Role</label>
                <label for="role" class="select-block">
                    <select name="role" id="role" required="required">
                        <option value="">Select user Role...</option>
                        <?php if($userRoles->count() > 0): ?>
                        <?php $__currentLoopData = $userRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php if($user->role_id == $role->id): ?>
                        <option value="<?php echo e($role->id); ?>" selected="selected"><?php echo e($role->name); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($role->id); ?>" ><?php echo e($role->name); ?></option>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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
            <!-- INPUT CONTAINER -->
            <div class="input-container half">
                <label for="status" class="rl-label required">Status</label>
                <label for="status" class="select-block">
                    <select name="status" id="status" required="required">
                        <option value="">Select user status...</option>
                        <?php if($user->status == 0): ?>
                        <option value="0" selected="selected">De-Activate</option>
                        <?php else: ?>
                        <option value="0">De-Activate</option>
                        <?php endif; ?>
                        <?php if($user->status == 1): ?>
                        <option value="1" selected="selected">Activate</option>
                        <?php else: ?>
                        <option value="1">Activate</option>
                        <?php endif; ?>
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>
            </div>

            <div class="input-container">
                <label for="email" class="rl-label">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address here..." value="<?php echo e($user->email); ?>" readonly="readonly">
            </div>

            <div class="input-container half">
                <label for="gender" class="rl-label required">Gender</label>
                <label for="gender" class="select-block">
                    <select name="gender" id="gender" required="required">
                        <option value="">Select your Gender...</option>
                        <?php if($user->gender == 'Male'): ?>
                        <option value="Male" selected="selected">Male</option>
                        <?php else: ?>
                        <option value="Male">Male</option>
                        <?php endif; ?>
                        <?php if($user->gender == 'Female'): ?>
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

            <div class="input-container half">
                <label for="product" class="rl-label required">Product</label>
                <label for="gender" class="select-block">
               <?php $serviceManager = $user->serviceManager; ?>
                    <select name="product">
                        <option value="">Product</option>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php if(!is_null($serviceManager)): ?>
                                <?php if($serviceManager->product_id == $product->id): ?>
                                    <option value="<?php echo e($product->id); ?>" selected="selected"><?php echo e($product->name); ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                            <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>
            </div>
            <!-- /INPUT CONTAINER -->
            <div class="input-container">
                <label for="phone" class="rl-label">Phone</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone here..." value="<?php echo e($user->phone); ?>" required="required">
            </div>
            <!-- INPUT CONTAINER -->
            <div class="clearfix"></div>
            <hr class="line-separator">
            <button class="button big dark">Save <span class="primary">Changes</span></button>
            <!-- /INPUT CONTAINER -->
        </form>
    </div>
    <!-- /FORM BOX ITEM -->
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>