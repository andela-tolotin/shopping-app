@extends('dashboard.base')
@section('title', 'Waiting Lists')
@section('page', 'All User waiting lists')
@section('body')
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
		@foreach($waiters as $index => $waiter)
		<tr>{{ $index + 1 }}</tr>
		<tr>{{ $waiter[$index]['user'] }}</tr>
		<tr>{{ $waiter[$index]['queue_no'] }}</tr>
		@endforeach
		@else
		<h2>No waiters available</h2>
		@endif
	</tbody>
</table>
@endsection