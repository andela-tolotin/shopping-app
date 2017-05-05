<?php $__env->startSection('title', 'List all payment gateways'); ?>
<?php $__env->startSection('page', 'List Payment Gateways'); ?>
<?php $__env->startSection('body'); ?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- TRANSACTION LIST -->
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Sn</th>
			<th>Name</th>
			<th>Logo</th>
			<th>Client ID</th>
			<th>Client Secret</th>
			<th>Callback URI</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php if($paymentGateways->count() > 0): ?>
		<?php $__currentLoopData = $paymentGateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentGateway): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($loop->index + 1); ?></td>
			<td><?php echo e($paymentGateway->name); ?></td>
			<td>
			<img src="<?php echo e($paymentGateway->logo); ?>" class="img-responsive" alt="<?php echo e($paymentGateway->name); ?>" style="width: auto; height: auto; float: left; padding: 2px;">
			</td>
			<td><?php echo e($paymentGateway->client_id); ?></td>
			<td><?php echo e($paymentGateway->client_secret); ?></td>
			<td><?php echo e($paymentGateway->callback_url); ?></td>
			<td><a href="<?php echo e(route('edit_payment', ['id' => $paymentGateway->id, 'locale' => App::getLocale()])); ?>" title="Edit <?php echo e($paymentGateway->name); ?>"> <i class="glyphicon glyphicon-pencil"></i> Edit </a></td>
			<td><a class="delete-payment" href="<?php echo e(route('delete_payment', ['id' => $paymentGateway->id, 'locale' => App::getLocale() ])); ?>" title="Delete <?php echo e($paymentGateway->name); ?>"> <i class="glyphicon glyphicon-trash Delete"></i> Delete</a></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		<?php endif; ?>
	</tbody>
</table
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>