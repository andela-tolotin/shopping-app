@extends('dashboard.base')
@section('title', 'List all Orders')
@section('page', 'List Orders')
@section('body')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- TRANSACTION LIST -->
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Sn</th>
			<th>Customer name</th>
			<th>Item Name</th>
			<th>Item Quantity</th>
			<th>Payment Status</th>
			<th>Admin Status</th>
			<th>Price</th>
		</tr>

	</thead>
	<tbody>
		@if ($orders->count() > 0)
		@foreach($orders as $order)
		<tr>
			<td>{{ $loop->index + 1 }}</td>
			<td>
				@if ($order->user_id)
					{{ $order->user->name }}
				@else
					Unregistered User
				@endif
			</td>
			<td>{{ $order->transaction->item_name }}</td>
			<td>{{ $order->transaction->item_quantity }}</td>
			<td>
				@if ($order->transaction->status === 1)
					Succesful
				@else
					Failed
				@endif
			</td>
			<td>
				@if ($order->status === 0)
					Pending
				@else
					Approved
				@endif
			</td>
			<td>{{ $order->transaction->item_price }}</td>
		</tr>
		@endforeach
		@endif
	</tbody>
	<tfoot>
		<tr>
			<td><b>Total Points</b></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><b>{{ $orderTotal }}</b></td>
		</tr>
	</tfoot>
</table>
<p>
	@if ($orders->count() > 0)
	{!! $orders->render() !!}
	@endif
</p>
@endsection

@section('pageScripts')
    <script type="text/javascript" src="/js/shopping.js"></script>
@endsection