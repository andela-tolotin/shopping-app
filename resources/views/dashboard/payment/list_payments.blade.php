@extends('dashboard.base')
@section('title', 'List all payment gateways')
@section('page', 'List Payment Gateways')
@section('body')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- TRANSACTION LIST -->
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Sn</th>
			<th>Name</th>
			<th>Client ID</th>
			<th>Client Secret</th>
			<th>Callback URI</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@if ($paymentGateways->count() > 0)
		@foreach($paymentGateways as $paymentGateway)
		<tr>
			<td>{{ $loop->index + 1 }}</td>
			<td>{{ $paymentGateway->name }}</td>
			<td>{{ $paymentGateway->client_id }}</td>
			<td>{{ $paymentGateway->client_secret }}</td>
			<td>{{ $paymentGateway->callback_url }}</td>
			<td><a href="{{ route('edit_payment', ['id' => $paymentGateway->id ]) }}" title="Edit {{ $paymentGateway->name }}"> <i class="glyphicon glyphicon-pencil"></i> Edit </a></td>
			<td><a class="delete-payment" href="{{ route('delete_payment', ['id' => $paymentGateway->id ]) }}" title="Delete {{ $paymentGateway->name }}"> <i class="glyphicon glyphicon-trash Delete"></i> Delete</a></td>
		</tr>
		@endforeach
		@endif
	</tbody>
</table
@endsection