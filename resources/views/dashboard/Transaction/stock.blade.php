@extends('dashboard.base')
@section('title', 'List all Approved Transactions')
@section('page', 'List Approved Transactions')
@section('body')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- TRANSACTION LIST -->
	<form id="form" method="GET" action="/transactions">
		<div class="row">
			<div style="margin-bottom: 20px;" class="col-lg-2">
		        <label for="from">From</label>
		        <input type="date" name="from" class="form-control" placeholder="From Date" value="{{ $_GET['from'] ?? '' }}">
		    </div>
		    <div class="col-lg-2">
		        <label for="to">To</label>
		        <input type="date" name="to" class="form-control" placeholder="To Date" value="{{ $_GET['to'] ?? '' }}">
		    </div>
		    <div style="margin-top: 23px;" class="col-lg-2">
		        <button type="submit" class="btn btn-primary filter-submit">Submit</button>
		        <button id="reset" type="reset" class="btn btn-default filter-submit">Clear</button>
		    </div>
	    </div>
    </form>
    <table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Sn</th>
			<th>Customer name</th>
			<th>Customer email</th>
			<th>Item Name</th>
			<th>Price</th>
		</tr>

	</thead>
	<tbody>
		@if ($approvedTransactions->count() > 0)
		@foreach($approvedTransactions as $transaction)
		<tr>
			<td>{{ $loop->index + 1 }}</td>
			<td>
				@if ($transaction->user_id)
					{{ $transaction->user->name }}
				@else
					Unregistered User
				@endif
			<td>{{ $transaction->email }}</td>
			<td>{{ $transaction->item_name }}</td>
			<td>{{ $transaction->item_price }}</td>
		</tr>
	</tbody>
	@endforeach
	@endif
	<tfoot>
		<tr>
			<td><b>Total Points</b></td>
			<td></td>
			<td></td>
			<td></td>
			<td><b>{{ $approvedTransactionsTotal }}</b></td>
		</tr>
	</tfoot>
</table>
<p>
	@if ($approvedTransactions->count() > 0)
	{!! $approvedTransactions->render() !!}
	@endif
</p>
@endsection

@section('pageScripts')
    <script type="text/javascript" src="/js/shopping.js"></script>
@endsection