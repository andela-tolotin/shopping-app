<?php $__env->startSection('title', 'List all Orders'); ?>
<?php $__env->startSection('page', 'List Orders'); ?>
<?php $__env->startSection('body'); ?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<!-- TRANSACTION LIST -->
<table class="table table-hover table-bordered">
	<p>
		<?php if(session('message')): ?>
	        <div class="alert alert-danger">
	            <?php echo e(session('message')); ?>!
	        </div>
        <?php endif; ?>
	</p>
	<thead>
		<tr>
			<th>Sn</th>
			<th>Customer name</th>
			<th>Item Name</th>
			<th>Item Quantity</th>
			<th>Price</th>
			<th>Payment Status</th>
			<th>Admin Status</th>
			<th>Approval</th>
			<th>Rating</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php if($unapprovedOrders->count() > 0): ?>
		<?php $__currentLoopData = $unapprovedOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($loop->index + 1); ?></td>
			<td>
				<?php if($order->user_id): ?>
					<?php echo e($order->user->name); ?>

				<?php else: ?>
					Unregistered User
				<?php endif; ?>
			<td><?php echo e($order->transaction->item_name); ?></td>
			<td><?php echo e($order->transaction->item_quantity); ?></td>
			<td><?php echo e($order->transaction->item_price); ?></td>
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
			<td>
				<a id ="approve" data-id="<?php echo e($order->id); ?>" class="approve-order" href="#" title="Approve <?php echo e($order->id); ?>"> <i class="glyphicon glyphicon-check"></i>
					<?php if($order->status === 0): ?>
						Approve
					<?php else: ?>
						Dissapprove
					<?php endif; ?> 
				</a>
			</td>
			<td><input data-id="<?php echo e($order->id); ?>" name="rating" value="<?php echo e($order->ratings); ?>" type="number" class="rating" min=0 max=2 step=1 data-size="xs"></td>
			<td><a data-id="<?php echo e($order->id); ?>" class="delete-order" href="#" title="Delete <?php echo e($order->name); ?>"> <i class="glyphicon glyphicon-trash Delete"></i> Delete</a></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		<?php endif; ?>
		
		</tbody>
		<thead>
		<tr>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
		<tbody>

		<?php if($approvedOrders->count() > 0): ?>
		<?php $__currentLoopData = $approvedOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($loop->index + 1); ?></td>
			<td>
				<?php if($order->user_id): ?>
					<?php echo e($order->user->name); ?>

				<?php else: ?>
					Unregistered User
				<?php endif; ?>
			<td><?php echo e($order->transaction->item_name); ?></td>
			<td><?php echo e($order->transaction->item_quantity); ?></td>
			<td><?php echo e($order->transaction->item_price); ?></td>
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
			<td>
				<a id ="approve" data-id="<?php echo e($order->id); ?>" class="approve-order" href="#" title="Approve <?php echo e($order->id); ?>"> <i class="glyphicon glyphicon-check"></i>
					<?php if($order->status === 0): ?>
						Approve
					<?php else: ?>
						Dissapprove
					<?php endif; ?> 
				</a>
			</td>
			<td><input data-id="<?php echo e($order->id); ?>" name="rating" value="<?php echo e($order->ratings); ?>" type="number" class="rating" min=0 max=2 step=1 data-size="xs"></td>
			<td><a data-id="<?php echo e($order->id); ?>" class="delete-order" href="#" title="Delete <?php echo e($order->name); ?>"> <i class="glyphicon glyphicon-trash Delete"></i> Delete</a></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		<?php endif; ?>
	</tbody>
</table>
<p>
	<?php if($approvedOrders->count() > 0): ?>
	<?php echo $approvedOrders->render(); ?>

	<?php endif; ?>
</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageScripts'); ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/js/star-rating.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/shopping.js"></script>  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>