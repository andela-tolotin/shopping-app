<?php $__env->startSection('title', 'Checkout'); ?>
<?php $__env->startSection('page', 'Checkout'); ?>
<?php $__env->startSection('breadcrumb'); ?>
<!-- SECTION HEADLINE -->
<div class="section-headline-wrap v2">
	<div class="section-headline">
		<h2>Checkout</h2>
		<p>Home<span class="separator">/</span>Products<span class="separator">/</span><span class="current-section">Checkout</span></p>
	</div>
</div>
<!-- /SECTION HEADLINE -->
<?php $__env->stopSection(); ?>
<!-- SECTION -->
<?php $__env->startSection('body'); ?>
<!-- FORM BOX ITEMS -->
<div class="form-box-items">
	<!-- FORM BOX ITEM -->
	<div class="form-box-item not-padded">
		<h4>Cart Overview</h4>
		<hr class="line-separator">
		<!-- CART OVERVIEW ITEM -->
		<div class="cart-overview-item">
			<p class="text-header small"><?php echo e($product->name); ?> <span class="primary">x1</span></p>
			<p class="price"><span>p</span> <?php echo e($product->price); ?></p>
			<p class="category primary"><?php echo e($product->category->name); ?></p>
		</div>
		<!-- CART TOTAL -->
		<div class="cart-total small">
			<p class="price"><span>p</span><?php echo e($product->price); ?></p>
			<p class="text-header subtotal">Cart Subtotal</p>
		</div>
		
	</div>
	<!-- /FORM BOX ITEM -->
	<!-- FORM BOX ITEM -->
	<div class="form-box-item">
		<h4>Payment &amp; Confirmation</h4>
		<hr class="line-separator">
		<p id="status">
			<?php if(!empty(session('status'))): ?>
			<?php if(session('status')): ?>
			<div class="alert alert-success">
				Your Payment was successful!
			</div>
			<?php else: ?>
			<div class="alert alert-danger">
				Your Payment was not successful!
			</div>
			<?php endif; ?>
			<?php endif; ?>
		</p>
		<label class="rl-label" style="clear: both; width: 100%;">Choose your Payment Method</label>
		<!-- RADIO -->
		<?php if(Auth::check() && Auth::user()->role_id == 1): ?>
		<?php
		$balance = 0;
		if (!is_null(Auth::user()->pointWallet)) {
			$wallet = Auth::user()->pointWallet;
			$balance = (int) ($wallet->point - $wallet->balance);
		}
		?>
		
		<label for="credit_card" class="linked-radio">
			
			Point Wallet : Balance <?php echo e($balance); ?> point(s)
			<hr class="line-separator top">
			<?php if($balance <= 0 && Auth::user()->role_id == 1): ?> 
			<a href="<?php echo e(route('load_buy_point', ['locale' => App::getLocale()])); ?>" class="button mid dark">Buy Point</a>
			<?php else: ?>
			<button type="button" class="button mid dark" id="pay_with_point_wallet" data-id="<?php echo e($product->id); ?>" data-point="<?php echo e($balance); ?>" data-token="<?php echo e(csrf_token()); ?>" data-locale="<?php echo e(App::getLocale()); ?>">Pay</button>
			<?php endif; ?>
		</label>
		<?php endif; ?>
		<!-- /RADIO -->
		<?php if(!Auth::check()): ?>
		<?php if($paymentGateways->count() > 0): ?>
		<?php $__currentLoopData = $paymentGateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentGateway): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<?php if($paymentGateway->name == 'Stripe'): ?>
		<p> Pay with <?php echo e($paymentGateway->name); ?></p>
		<form action="<?php echo e(route('stripe_payment', ['locale' => App::getLocale()])); ?>" method="POST">
			<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo e($paymentGateway->client_id); ?>" data-amount="<?php echo e($product->price * 1000); ?>" data-name="<?php echo e($product->name); ?>" data-description="Payments" data-image="<?php echo e($paymentGateway->logo); ?>" data-locale="auto" data-currency="krw"
			<?php if(Auth::check()): ?>
			data-email="<?php echo e(Auth::user()->email); ?>"
			<?php endif; ?>
			>
			</script>
			<?php echo e(csrf_field()); ?>

			<input type="hidden" name="amount" value="<?php echo e($product->price * 1000); ?>" />
			<input type="hidden" name="product_id" value="<?php echo e($product->id); ?>" />
			<input type="hidden" name="payment_gateway_id" value="<?php echo e($paymentGateway->id); ?>" />
		</form>
		<?php endif; ?>
		<?php if($paymentGateway->name == 'PayPal'): ?>
		  <div id="paypal-button"></div> 

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    paypal.Button.render({
        env: 'sandbox', // Optional: specify 'sandbox' environment
        client: {
            sandbox:    '<?php echo e($paymentGateway->client_id); ?>',
           // production: 'AFcWxV21C7fd0v3bYYYRCpSSRl31AbhPp6X-xX4lPXO3qfYiQJpyygbo'
        },
        payment: function() {
            var env    = this.props.env;
            var client = this.props.client;
            return paypal.rest.payment.create(env, client, {
                transactions: [
                    {
                        amount: { total: '<?php echo e($product->price * 1000); ?>', currency: 'KRW' }
                    }
                ]
            });
        },
        commit: true, // Optional: show a 'Pay Now' button in the checkout flow
        onAuthorize: function(data, actions) {
            // Optional: display a confirmation page here
            return actions.payment.execute().then(function() {
                // Show a success page to the buyer
            });
        }

    }, '#paypal-button');
</script>
		<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		<?php endif; ?>
		<?php endif; ?>
		<?php if(Auth::check() && Auth::user()->role_id > 1): ?>
		<p>Pls Register a Buyer Account</p>
		<?php endif; ?>
		<hr class="line-separator top">
	</div>
	<!-- /FORM BOX ITEM -->
</div>
<!-- /FORM BOX ITEMS -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>