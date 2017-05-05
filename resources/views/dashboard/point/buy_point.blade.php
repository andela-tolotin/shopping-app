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
        @foreach ($paymentGateways as $paymentGateway)
        @if ($paymentGateway->name == 'Stripe')
        <p> Pay with {{ $paymentGateway->name }}</p>
        <form action="{{ route('buy_point_with_stripe') }}" method="POST">
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ $paymentGateway->client_id }}" data-amount="{{ $amount * 1000 }}" data-name="Buy Point" data-description="Payments" data-image="{{ $paymentGateway->logo }}" data-locale="auto" data-currency="krw"
            @if (Auth::check())
            data-email="{{ Auth::user()->email }}"
            @endif
            >
            </script>
            {{ csrf_field() }}
            <input type="hidden" name="amount" id="amount" value="{{ $amount * 1000 }}" />
            <input type="hidden" name="payment_gateway_id" value="{{ $paymentGateway->id }}" />
        </form>
        @endif
        @endforeach
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
@endsection