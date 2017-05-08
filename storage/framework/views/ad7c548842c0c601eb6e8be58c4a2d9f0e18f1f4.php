<?php echo $__env->make('partial.dashboard.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
	<?php echo $__env->make('partial.dashboard.side_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="dashboard-body">
        <?php echo $__env->make('partial.dashboard.upper_part', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- DASHBOARD HEADER -->
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline buttons primary">
                <h4>Statistics</h4>
            </div>
            <!-- /HEADLINE -->
            <div class="graph-stats-list">
				<!-- GRAPH STATS LIST ITEM -->
				<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check( 'BUYER', Auth::user()->role_id )): ?>
				<div class="graph-stats-list-item green bars">
					<p class="text-header">Remaining Points</p>
					<h2><?php echo e($remainingPoints); ?></h2>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->

				<!-- GRAPH STATS LIST ITEM -->
				
				<div class="graph-stats-list-item violet line">
					<a href="<?php echo e(route('list_user_orders')); ?>">
						<p class="text-header">Total Orders</p>
						<h2><?php echo e($userOrdersCount); ?></h2>
					</a>
				</div>

				<div class="graph-stats-list-item green bars">
					<p class="text-header">T. Orders - T. Excellents - T. Goods</p>
					<h2>
						<?php echo e($userOrdersCount); ?> - <?php echo e(count($excellent)); ?> - <?php echo e(count($good)); ?>

					</h2>
				</div>

				<div class="graph-stats-list-item violet line">
					<a href="<?php echo e(route('list_user_orders')); ?>">
						<p class="text-header">Waiting Queue No</p>
						<h2><?php echo e($queueNo); ?></h2>
					</a>
				</div>
				<?php endif; ?>
				<!-- /GRAPH STATS LIST ITEM -->
				<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check( 'ADMIN_MANAGER', Auth::user()->role_id )): ?>
				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item blue step">
				<a href="<?php echo e(route('list_orders')); ?>">
					<p class="text-header">Total Unapproved Orders</p>
					<h2><?php echo e($totalUnapprovedOrder); ?></h2>
				</a></div>
				<?php endif; ?>
				<!-- /GRAPH STATS LIST ITEM -->
				<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check( 'ADMIN', Auth::user()->role_id )): ?>
				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item red curve">
				<a href="<?php echo e(route('stock')); ?>">
					<p class="text-header">Total Amount of Transactions</p>
					<h2><?php echo e($totalTransactionAmount); ?></h2>
				</a></div>
				<?php endif; ?>
			</div>

        </div>
        <!-- /FORM BOX -->
    </div>
    <!-- /DASHBOARD BODY -->
    <?php echo $__env->make('partial.dashboard.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>