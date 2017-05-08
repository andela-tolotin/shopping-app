<?php $__env->startSection('title', 'Your Notifications'); ?>
<?php $__env->startSection('page', 'Your Notifications'); ?>
<?php $__env->startSection('href', '<a id="all-read" href="#" class="button mid-short primary">Mark all as Read</a>'); ?>
<?php $__env->startSection('body'); ?>
            <!-- NOTIFICATION CLOSE -->
                    <div class="profile-notifications">
                        <!-- PROFILE NOTIFICATION -->
                        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div class="profile-notification">
                            <div class="profile-notification-date">
                                <p><?php echo e($notification->created_at->diffForHumans(\Carbon\Carbon::now())); ?></p>
                            </div>
                            <div class="profile-notification-body">
                                <p><?php echo e($notification->message); ?></p>
                            </div>
                            <div class="profile-notification-type">
                                <span class="type-icon icon-heart primary"></span>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
        <!-- PROFILE NOTIFICATION -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageScripts'); ?>
    <script type="text/javascript" src="/js/shopping.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>