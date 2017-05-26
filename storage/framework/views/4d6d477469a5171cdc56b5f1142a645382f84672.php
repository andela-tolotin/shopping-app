<?php $__env->startSection('title', 'List all Users'); ?>
<?php $__env->startSection('page', 'List Users'); ?>
<?php $__env->startSection('body'); ?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- TRANSACTION LIST -->
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Sn</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Gender</th>
			<th>Role</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php if($users->count() > 0): ?>
		<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($loop->index + 1); ?></td>
			<td><?php echo e($user->name); ?></td>
			<td><?php echo e($user->email); ?></td>
			<td><?php echo e($user->phone); ?></td>
			<td><?php echo e($user->gender); ?></td>
			<td><?php echo e(ucwords($user->role->name)); ?></td>
			<td><a href="<?php echo e(route('edit_user', ['id' => $user->id])); ?>" title="Edit <?php echo e($user->name); ?>"> <i class="glyphicon glyphicon-pencil"></i> Edit </a></td>
			<td><a class="delete-user" href="<?php echo e(route('delete_user', ['id' => $user->id])); ?>" title="Delete <?php echo e($user->name); ?>"> <i class="glyphicon glyphicon-trash Delete"></i> Delete</a></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		<?php endif; ?>
	</tbody>
</table>
<p>
	<?php if($users->count() > 0): ?>
	<?php echo $users->render(); ?>

	<?php endif; ?>
</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>