<?php $__env->startSection('title', 'Buy Point'); ?>
<?php $__env->startSection('page', 'Add Point To Wallet'); ?>
<?php $__env->startSection('body'); ?>
<!-- FORM POPUP -->
<div class="form-box-items">
    <!-- FORM BOX ITEM -->
    <div class="form-box-item">
        <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li style="color: red;"><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php $__currentLoopData = $paymentGateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentGateway): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php if($paymentGateway->name == 'Stripe'): ?>
        <p> Pay with <?php echo e($paymentGateway->name); ?></p>
        <form action="<?php echo e(route('buy_point_with_stripe', ['locale' => App::getLocale()])); ?>" method="POST">
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo e($paymentGateway->client_id); ?>" data-amount="<?php echo e($amount * 1000); ?>" data-name="Buy Point" data-description="Payments" data-image="<?php echo e($paymentGateway->logo); ?>" data-locale="auto" data-currency="krw"
            <?php if(Auth::check()): ?>
            data-email="<?php echo e(Auth::user()->email); ?>"
            <?php endif; ?>
            >
            </script>
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="amount" id="amount" value="<?php echo e($amount * 1000); ?>" />
            <input type="hidden" name="payment_gateway_id" value="<?php echo e($paymentGateway->id); ?>" />
        </form>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>