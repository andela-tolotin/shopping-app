@extends('dashboard.base')
@section('title', 'Buy Point')
@section('page', 'Add Point To Wallet')
@section('body')
<!-- FORM POPUP -->
<div class="form-box-items">
    <!-- FORM BOX ITEM -->
    <div class="form-box-item">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if ($paymentGateway->name == 'Stripe')
        <p> Pay with {{ $paymentGateway->name }}</p>
        <form action="{{ route('stripe_payment') }}" method="POST">
            <div class="input-container">
                <label for="name" class="rl-label required">Amount</label>
                <input type="text" id="name" name="name" placeholder="Enter name of amount to buy here" required="required">
            </div>
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
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
@endsection