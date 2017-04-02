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
		<p>
		@if (!empty(session('status')))
			@if (session('status'))
			<div class="alert alert-success">
				Your Payment was successful!
			</div>
			@else
			<div class="alert alert-danger">
				Your Payment was not successful!
			</div>
			@endif
		@endif
		</p>
		<label class="rl-label">Choose your Payment Method</label>
		<!-- RADIO -->
		@if (Auth::check())
		<?php
		  $wallet = Auth::user()->pointWallet;
		  $balance = (int) ($wallet->point - $wallet->balance)
		?>
		<input type="radio" form="checkout-form" id="credit_card" name="payment_method" value="cc">
		<label for="credit_card" class="linked-radio">
			<span class="radio primary"><span></span></span>
			Point Wallet : Balance {{ $balance }} point(s)
		</label>
		@endif
		<!-- /RADIO -->
		@if ($paymentGateways->count() > 0)
		@foreach($paymentGateways as $paymentGateway)
		@if ($paymentGateway->name == 'Stripe')
		<p> Pay with {{ $paymentGateway->name }}</p>
		<form action="{{ route('stripe_payment') }}" method="POST">
			<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ $paymentGateway->client_id }}" data-amount="{{ $product->price * 1000 }}" data-name="{{ $product->name }}" data-description="Payments" data-image="{{ $paymentGateway->logo }}" data-locale="auto" data-currency="krw"
			@if (Auth::check())
			data-email="{{ Auth::user()->email }}"
			@endif
			>
			</script>
			{{ csrf_field() }}
			<input type="hidden" name="amount" value="{{ $product->price * 1000 }}" />
			<input type="hidden" name="product_id" value="{{ $product->id }}" />
			<input type="hidden" name="payment_gateway_id" value="{{ $paymentGateway->id }}" />
		</form>
		@endif
		@endforeach
		@endif
		<hr class="line-separator top">
	</div>
	<!-- /FORM BOX ITEM -->
</div>
<!-- /FORM BOX ITEMS -->
<style type="text/css">
	.alert-success {
		color: #3c763d;
		background-color: #dff0d8;
		border-color: #d6e9c6;
	}
	.alert {
		padding: 15px;
		margin-bottom: 20px;
		border: 1px solid transparent;
		border-radius: 4px;
	}
	.alert-danger {
		color: #a94442;
		background-color: #f2dede;
		border-color: #ebccd1;
	}
</style>
@endsection