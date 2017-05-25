<?php echo $__env->make('partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
    <?php echo $__env->make('partial.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('breadcrumb'); ?>
    <!-- SECTION -->
    <div class="section-wrap">
        <div class="section demo">
        <?php echo $__env->yieldContent('body'); ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- FOOTER -->
    <?php echo $__env->make('partial.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>