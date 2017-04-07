@extends('dashboard.base')
@section('title', 'Buy Point')
@section('page', 'Specify Amount')
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
        <form action="{{ route('buy_point') }}" method="GET">
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
            <div class="input-container">
                <label for="name" class="rl-label required">Amount</label>
                <input type="text" id="amount" name="amount" placeholder="Enter name of amount to buy here" required="required">
            </div>
            <button class="button mid dark">Proceed</button>
        </form>
    </div>
    <!-- /FORM POPUP CONTENT -->
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