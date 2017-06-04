<?php $__env->startSection('title', 'List Products'); ?>
<?php $__env->startSection('page', 'List Products'); ?>
<?php $__env->startSection('body'); ?>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- TRANSACTION LIST -->
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Sn</th>
            <th>Name</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Tax</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php if($products->count() > 0): ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td><?php echo e($loop->index + 1); ?></td>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->price); ?></td>
                    <td><?php echo e($product->discount); ?></td>
                    <td><?php echo e($product->tax); ?></td>
                    <td><a href="<?php echo e(route('edit_product', ['id' => $product->id])); ?>" title="Edit <?php echo e($product->name); ?>"> <i class="glyphicon glyphicon-pencil"></i> Edit </a></td>
                    <td><a data-id="<?php echo e($product->id); ?>" class="delete-product" href="#" title="Delete <?php echo e($product->name); ?>"> <i class="glyphicon glyphicon-trash Delete"></i> Delete</a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endif; ?>
        </tbody>
    </table>
    <p>
        <?php if($products->count() > 0): ?>
            <?php echo $products->render(); ?>

        <?php endif; ?>
    </p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageScripts'); ?>
    <script type="text/javascript" src="/js/shopping.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>