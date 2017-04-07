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
        <form action="{{ route('buy_point') }}" method="GET">
            <div class="input-container">
                <label for="name" class="rl-label required">Amount</label>
                <input type="text" id="amount" name="amount" placeholder="Enter name of amount to buy here" required="required">
            </div>
            <button class="button mid dark">Proceed</button>
        </form>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
@endsection