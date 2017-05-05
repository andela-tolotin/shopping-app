<?php $__env->startSection('title', 'List Categories'); ?>
<?php $__env->startSection('page', 'List Categories'); ?>
<?php $__env->startSection('body'); ?>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- TRANSACTION LIST -->
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Sn</th>
            <th>Name</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php if($categories->count() > 0): ?>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td><?php echo e($loop->index + 1); ?></td>
                    <td><?php echo e($category->name); ?></td>
                    <td><?php echo e($category->description); ?></td>
                    <td><a href="<?php echo e(route('edit_category', ['id' => $category->id, 'locale' => App::getLocale()])); ?>" title="Edit <?php echo e($category->name); ?>"> <i class="glyphicon glyphicon-pencil"></i> Edit </a></td>
                    <td><a data-id="<?php echo e($category->id); ?>" class="delete-category" href="#" title="Delete <?php echo e($category->name); ?>"> <i class="glyphicon glyphicon-trash Delete"></i> Delete</a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endif; ?>
        </tbody>
    </table>
    <p>
        <?php if($categories->count() > 0): ?>
            <?php echo $categories->render(); ?>

        <?php endif; ?>
    </p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageScripts'); ?>
    <script type="text/javascript" src="/js/shopping.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>