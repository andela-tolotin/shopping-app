<?php $__env->startSection('title', 'Your Notifications'); ?>
<?php $__env->startSection('page', 'Your Notifications'); ?>
<?php $__env->startSection('href', '<a id="all-read" href="#" class="button mid-short primary">Mark all as Read</a>'); ?>
<?php $__env->startSection('body'); ?>
        <!-- NOTIFICATION CLOSE -->
            <div class="profile-notifications">
                <!-- PROFILE NOTIFICATION -->
                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check( 'BUYER', Auth::user()->role_id )): ?>
                    <?php $__currentLoopData = $allBuyerNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="profile-notification">
                        <div class="profile-notification-date">
                            <p><?php echo e($notification->created_at->diffForHumans(\Carbon\Carbon::now())); ?></p>
                        </div>
                        <div class="profile-notification-body">
                            <p>
                                <?php if($notification->status ===  1): ?>
                                     <b><?php echo e($notification->message); ?></b>
                                <?php else: ?>
                                    <?php echo e($notification->message); ?>

                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="profile-notification-type">
                            <span class="type-icon icon-heart primary"></span>

                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>

                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check( 'ADMIN', Auth::user()->role_id )): ?>
                    <?php $__currentLoopData = $allAdminNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="profile-notification">
                        <div class="profile-notification-date">
                            <p><?php echo e($notification->created_at->diffForHumans(\Carbon\Carbon::now())); ?></p>
                        </div>
                        <div class="profile-notification-body">
                            <a href="<?php echo e($notification->url); ?>">
                            <p>
                                <?php if($notification->status ===  1): ?>
                                     <b><?php echo e($notification->message); ?></b>
                                <?php else: ?>
                                    <?php echo e($notification->message); ?>

                                <?php endif; ?>
                            </p>
                            </a>
                        </div>
                        <div class="profile-notification-type">
                            <span class="type-icon icon-heart primary"></span>

                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>

                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check( 'MANAGER', Auth::user()->role_id )): ?>
                    <?php $__currentLoopData = $allManagerNotification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notifications): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="profile-notification">
                        <div class="profile-notification-date">
                            <p><?php echo e($notification->created_at->diffForHumans(\Carbon\Carbon::now())); ?></p>
                        </div>
                        <div class="profile-notification-body">
                            <a href="<?php echo e($notification->url); ?>">
                            <p>
                                <?php if($notification->status ===  1): ?>
                                     <b><?php echo e($notification->message); ?></b>
                                <?php else: ?>
                                    <?php echo e($notification->message); ?>

                                <?php endif; ?>
                            </p>
                            </a>
                        </div>
                        <div class="profile-notification-type">
                            <span class="type-icon icon-heart primary"></span>

                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
            </div>
        <!-- PROFILE NOTIFICATION -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageScripts'); ?>
    <script type="text/javascript" src="/js/shopping.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>