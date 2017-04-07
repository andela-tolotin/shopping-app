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
			<th>Price</th>
			<th>Payment Status</th>
			<th>Admin Status</th>
			<th>Approval</th>
			<th>Delete</th>
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
			<td>{{ $order->transaction->item_name }}</td>
			<td>{{ $order->transaction->item_quantity }}</td>
			<td>{{ $order->transaction->item_price }}</td>
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
			<td>
				<a id ="approve" data-id="{{ $order->id }}" class="approve-order" href="#" title="Approve {{ $order->id }}"> <i class="glyphicon glyphicon-check"></i>
					@if ($order->status === 0)
						Approve
					@else
						Dissapprove
					@endif 
				</a>
			</td>
			<td><a data-id="{{ $order->id }}" class="delete-order" href="#" title="Delete {{ $order->name }}"> <i class="glyphicon glyphicon-trash Delete"></i> Delete</a></td>
		</tr>
		@endforeach
		@endif
	</tbody>
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