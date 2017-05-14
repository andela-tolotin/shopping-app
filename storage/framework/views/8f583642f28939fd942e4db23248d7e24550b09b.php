<?php echo $__env->make('partial.dashboard.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
    <?php echo $__env->make('partial.dashboard.side_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">
        <?php echo $__env->make('partial.dashboard.upper_part', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- DASHBOARD HEADER -->
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline buttons primary">
                <h4>Account Settings</h4>
            </div>
            <!-- /HEADLINE -->
            <?php echo $__env->make('dashboard.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <!-- /FORM BOX -->
    </div>
    <!-- /DASHBOARD BODY -->
    <?php echo $__env->make('partial.dashboard.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>