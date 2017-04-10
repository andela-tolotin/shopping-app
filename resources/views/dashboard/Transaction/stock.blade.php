@extends('dashboard.base')
@section('title', 'List all Approved Transactions')
@section('page', 'List Approved Transactions')
@section('body')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
<!-- TRANSACTION LIST -->
	<form id="form" method="GET" action="/{{ App::getLocale() }}/transactions">
		<div class="row">
			<div class="col-lg-2">
		        <div class='input-group date'>
			        <input type="text" name="from" class="form-control" placeholder="YYYY-MM-DD" value="{{ $_GET['from'] ?? '' }}">
			    	<span class="input-group-addon">
			            <span class="glyphicon glyphicon-calendar"></span>
			       	</span>
		    	</div>
		    </div>
		    <div class="col-lg-2">
			    <div class='input-group date'>
			        <input type="text" name="to" class="form-control" placeholder="YYYY-MM-DD" value="{{ $_GET['to'] ?? '' }}" />
			    	<span class="input-group-addon">
		            	<span class="glyphicon glyphicon-calendar"></span>
		        	</span>
			    </div>
		    </div>

		    <div style="margin-top: 5px;" class="col-lg-2">
		        <button type="submit" class="btn btn-primary filter-submit">Submit</button>
		        <button id="reset" type="reset" class="btn btn-default filter-submit">Clear</button>
		    </div>
	    </div>
    </form>
    <table style="margin-top: 22px;" class="table table-hover table-bordered">
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
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="/js/shopping.js"></script>
@endsection