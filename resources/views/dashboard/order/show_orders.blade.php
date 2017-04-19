@extends('dashboard.base')
@section('title', 'List all Orders')
@section('page', 'List Orders')
@section('body')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<!-- TRANSACTION LIST -->
<table class="table table-hover table-bordered">
	<p>
		@if (session('message'))
	        <div class="alert alert-danger">
	            {{ session('message') }}!
	        </div>
        @endif
	</p>
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
			<th>Rating</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@if ($unapprovedOrders->count() > 0)
		@foreach($unapprovedOrders as $order)
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
			<td><input data-id="{{ $order->id }}" name="rating" value="{{ $order->ratings }}" type="number" class="rating" min=0 max=3 step=1 data-size="xs"></td>
			<td><a data-id="{{ $order->id }}" class="delete-order" href="#" title="Delete {{ $order->name }}"> <i class="glyphicon glyphicon-trash Delete"></i> Delete</a></td>
		</tr>
		@endforeach
		@endif
		
		</tbody>
		<thead>
		<tr>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
		<tbody>

		@if ($approvedOrders->count() > 0)
		@foreach($approvedOrders as $order)
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
			<td><input data-id="{{ $order->id }}" name="rating" value="{{ $order->ratings }}" type="number" class="rating" min=0 max=3 step=1 data-size="xs"></td>
			<td><a data-id="{{ $order->id }}" class="delete-order" href="#" title="Delete {{ $order->name }}"> <i class="glyphicon glyphicon-trash Delete"></i> Delete</a></td>
		</tr>
		@endforeach
		@endif
	</tbody>
</table>
<p>
	@if ($approvedOrders->count() > 0)
	{!! $approvedOrders->render() !!}
	@endif
</p>
@endsection

@section('pageScripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/js/star-rating.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/shopping.js"></script>  
@endsection
