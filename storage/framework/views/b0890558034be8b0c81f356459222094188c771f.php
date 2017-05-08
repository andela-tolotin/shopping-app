<?php $__env->startSection('title', 'List all Orders'); ?>
<?php $__env->startSection('page', 'List Orders'); ?>
<?php $__env->startSection('body'); ?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- TRANSACTION LIST -->
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Sn</th>
			<th>Customer name</th>
			<th>Item Name</th>
			<th>Item Quantity</th>
			<th>Payment Status</th>
			<th>Admin Status</th>
			<th>Price</th>
		</tr>

	</thead>
	<tbody>
		<?php if($orders->count() > 0): ?>
		<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($loop->index + 1); ?></td>
			<td>
				<?php if($order->user_id): ?>
					<?php echo e($order->user->name); ?>

				<?php else: ?>
					Unregistered User
				<?php endif; ?>
			</td>
			<td><?php echo e($order->transaction->item_name); ?></td>
			<td><?php echo e($order->transaction->item_quantity); ?></td>
			<td>
				<?php if($order->transaction->status === 1): ?>
					Succesful
				<?php else: ?>
					Failed
				<?php endif; ?>
			</td>
			<td>
				<?php if($order->status === 0): ?>
					Pending
				<?php else: ?>
					Approved
				<?php endif; ?>
			</td>
			<td><?php echo e($order->transaction->item_price); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		<?php endif; ?>
	</tbody>
	<tfoot>
		<tr>
			<td><b>Total Points</b></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><b><?php echo e($orderTotal); ?></b></td>
		</tr>
	</tfoot>
</table>
<p>
	<?php if($orders->count() > 0): ?>
	<?php echo $orders->render(); ?>

	<?php endif; ?>
</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageScripts'); ?>
    <script type="text/javascript" src="/js/shopping.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>