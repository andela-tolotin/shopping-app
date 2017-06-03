@extends('dashboard.base')
@section('title', 'Waiting Lists')
@section('page', 'All User waiting lists')
@section('body')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<table style="margin-top: 22px;" class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Sn</th>
			<th>Name</th>
			<th>Position</th>
		</tr>
	</thead>
	<tbody>
		@if (count($waiters) > 0)
		@foreach($waiters as $waiter)
		<tr>
		  <td>{{ $loop->index + 1 }}</td>
		<td>{{ $waiter['user'] }}</td>
		<td>{{ $waiter['queue_no'] }}</td>
		</tr>
		@endforeach
		@else
		<h2>No waiters available</h2>
		@endif
	</tbody>
</table>
@endsection