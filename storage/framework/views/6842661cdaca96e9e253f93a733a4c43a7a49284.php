<?php $__env->startSection('title', 'List all adverts'); ?>
<?php $__env->startSection('page', 'List Adverts'); ?>
<?php $__env->startSection('body'); ?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- TRANSACTION LIST -->
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Sn</th>
			<th>Thumbnails</th>
			<th>Uploaded By</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php if($adverts->count() > 0): ?>
		<?php $__currentLoopData = $adverts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advert): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($loop->index + 1); ?></td>
			<td><?php echo e($advert->user->name); ?></td>
			<td>
			<?php $__currentLoopData = json_decode($advert->advert_photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<img src="<?php echo e($photo); ?>" class="img-responsive" alt="<?php echo e($advert->user->name); ?>" style="width: 52px; height: auto; float: left; padding: 2px;">
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</td>
			<td><a class="delete-advert" href="<?php echo e(route('delete_advert', ['id' => $advert->id ])); ?>" title="Delete <?php echo e($advert->name); ?>"> <i class="glyphicon glyphicon-trash Delete"></i> Delete</a></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		<?php endif; ?>
	</tbody>
</table>
<p>
	<?php if($adverts->count() > 0): ?>
	<?php echo $adverts->render(); ?>

	<?php endif; ?>
</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>