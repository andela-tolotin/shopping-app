<?php echo $__env->make('partial.dashboard.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
    <?php echo $__env->make('partial.dashboard.side_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">
        <?php echo $__env->make('partial.dashboard.upper_part', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <div class="headline buttons primary">
                <h4><?php echo $__env->yieldContent('page'); ?></h4>
                <?php echo $__env->yieldContent('href', ''); ?>
            </div>
            <?php echo $__env->yieldContent('body'); ?>
        </div>
    </div>
    <!-- /DASHBOARD BODY -->
    <!-- FOOTER -->
    <?php echo $__env->make('partial.dashboard.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('pageScripts'); ?>
</body>
</html>