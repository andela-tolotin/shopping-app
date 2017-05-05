<?php $__env->startSection('title', 'List all Approved Transactions'); ?>
<?php $__env->startSection('page', 'List Approved Transactions'); ?>
<?php $__env->startSection('body'); ?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
<!-- TRANSACTION LIST -->
	<form id="form" method="GET" action="/<?php echo e(App::getLocale()); ?>/transactions">
		<div class="row">
			<div class="col-lg-2">
		        <div class='input-group date'>
			        <input type="text" name="from" class="form-control" placeholder="YYYY-MM-DD" value="<?php echo e($_GET['from'] ?? ''); ?>">
			    	<span class="input-group-addon">
			            <span class="glyphicon glyphicon-calendar"></span>
			       	</span>
		    	</div>
		    </div>
		    <div class="col-lg-2">
			    <div class='input-group date'>
			        <input type="text" name="to" class="form-control" placeholder="YYYY-MM-DD" value="<?php echo e($_GET['to'] ?? ''); ?>" />
			    	<span class="input-group-addon">
		            	<span class="glyphicon glyphicon-calendar"></span>
		        	</span>
			    </div>
		    </div>

		    <div style="margin-top: 5px;" class="col-lg-2">
		        <button type="submit" class="btn btn-primary filter-submit">Submit</button>
		        <button id="reset" type="reset" class="btn btn-default filter-submit">Clear</button>
		    </div>
	    </div>
    </form>
    <table style="margin-top: 22px;" class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Sn</th>
			<th>Customer name</th>
			<th>Customer email</th>
			<th>Item Name</th>
			<th>Price</th>
		</tr>

	</thead>
	<tbody>
		<?php if($approvedTransactions->count() > 0): ?>
		<?php $__currentLoopData = $approvedTransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($loop->index + 1); ?></td>
			<td>
				<?php if($transaction->user_id): ?>
					<?php echo e($transaction->user->name); ?>

				<?php else: ?>
					Unregistered User
				<?php endif; ?>
			<td><?php echo e($transaction->email); ?></td>
			<td><?php echo e($transaction->item_name); ?></td>
			<td><?php echo e($transaction->item_price); ?></td>
		</tr>
	</tbody>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	<?php endif; ?>
	<tfoot>
		<tr>
			<td><b>Total Points</b></td>
			<td></td>
			<td></td>
			<td></td>
			<td><b><?php echo e($approvedTransactionsTotal); ?></b></td>
		</tr>
	</tfoot>
</table>
<p>
	<?php if($approvedTransactions->count() > 0): ?>
	<?php echo $approvedTransactions->render(); ?>

	<?php endif; ?>
</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageScripts'); ?>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="/js/shopping.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>