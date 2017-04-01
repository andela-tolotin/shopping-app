@extends('app')
@section('title', 'Checkout')
@section('page', 'Checkout')
@section('breadcrumb')
<!-- SECTION HEADLINE -->
<div class="section-headline-wrap v2">
	<div class="section-headline">
		<h2>Checkout</h2>
		<p>Home<span class="separator">/</span>Products<span class="separator">/</span><span class="current-section">Checkout</span></p>
	</div>
</div>
<!-- /SECTION HEADLINE -->
@endsection
<!-- SECTION -->
@section('body')
<!-- FORM BOX ITEMS -->
<div class="form-box-items">
	<!-- FORM BOX ITEM -->
	<div class="form-box-item not-padded">
		<h4>Cart Overview</h4>
		<hr class="line-separator">
		<!-- CART OVERVIEW ITEM -->
		<div class="cart-overview-item">
			<p class="text-header small">{{ $product->name }} <span class="primary">x1</span></p>
			<p class="price"><span>p</span> {{ $product->price }}</p>
			<p class="category primary">{{ $product->category->name }}</p>
		</div>
		<!-- CART TOTAL -->
		<div class="cart-total small">
			<p class="price"><span>p</span>{{ $product->price }}</p>
			<p class="text-header subtotal">Cart Subtotal</p>
		</div>
		
	</div>
	<!-- /FORM BOX ITEM -->
	<!-- FORM BOX ITEM -->
	<div class="form-box-item">
		<h4>Payment &amp; Confirmation</h4>
		<hr class="line-separator">
		<label class="rl-label">Choose your Payment Method</label>
		<!-- RADIO -->
		<input type="radio" form="checkout-form" id="credit_card" name="payment_method" value="cc">
		<label for="credit_card" class="linked-radio">
			<span class="radio primary"><span></span></span>
			Point Wallet
		</label>
		<!-- /RADIO -->
		@if ($paymentGateways->count() > 0)
		@foreach($paymentGateways as $paymentGateway)
		@if ($paymentGateway->name == 'Stripe')
		<form action="{{ route('stripe_payment') }}" method="POST">
			<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ $paymentGateway->client_id }}" data-amount="{{ $product->price * 1000  * 100 }}" data-name="{{ $product->name }}" data-description="Payments" data-image="{{ $paymentGateway->logo }}" data-locale="auto" data-currency="kwr">
			</script>
			<input type="hidden" name="amount" value="{{ $product->price * 1000 * 100 }}" />
		</form>
		@endif
		@endforeach
		@endif
		<hr class="line-separator top">
	</div>
	<!-- /FORM BOX ITEM -->
</div>
<!-- /FORM BOX ITEMS -->
@endsection