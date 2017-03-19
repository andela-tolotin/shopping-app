@extends('dashboard.base')
@section('title', 'List all Users')
@section('page', 'List Users')
@section('body')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- TRANSACTION LIST -->
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Sn</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Gender</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@if ($users->count() > 0)
		@foreach($users as $user)
		<tr>
			<td>{{ $loop->index + 1 }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->phone }}</td>
			<td>{{ $user->gender }}</td>
			<td><a href="{{ route('edit_user', ['id' => $user->id ]) }}" title="Edit {{ $user->name }}"> <i class="glyphicon glyphicon-pencil"></i> Edit </a></td>
			<td><a href="" title="Delete {{ $user->name }}"> <i class="glyphicon glyphicon-trash Delete"></i> Delete</a></td>
		</tr>
		@endforeach
		@endif
	</tbody>
</table>
<p>
	@if ($users->count() > 0)
	{!! $users->render() !!}
	@endif
</p>
@endsection