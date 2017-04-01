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
			Credit Card
		</label>
		<!-- /RADIO -->
		<p class="pm-text credit_card">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor cididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		<!-- RADIO -->
		<input type="radio" form="checkout-form" id="ed_credits" name="payment_method" value="edc" checked>
		<label for="ed_credits" class="linked-radio">
			<span class="radio primary"><span></span></span>
			Emerald Dragon Credits
		</label>
		<!-- /RADIO -->
		<p class="pm-text ed_credits" style="display: block;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor cididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		<!-- RADIO -->
		<input type="radio" form="checkout-form" id="paypal" name="payment_method" value="pp">
		<label for="paypal" class="linked-radio">
			<span class="radio primary"><span></span></span>
			Paypal
		</label>
		<!-- /RADIO -->
		<p class="pm-text paypal">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor cididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		<hr class="line-separator top">
		<button form="checkout-form" class="button big dark">Confirm Order <span class="primary">Now!</span></button>
	</div>
	<!-- /FORM BOX ITEM -->
</div>
<!-- /FORM BOX ITEMS -->
@endsection