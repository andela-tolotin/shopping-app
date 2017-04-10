@extends('dashboard.base')
@section('title', 'List User Transactions')
@section('page', 'List User Transactions')
@section('body')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- TRANSACTION LIST -->
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Sn</th>
			<th>Options</th>
			<th>Value</th>
		</tr>

	</thead>
	<tbody>
		@foreach($transactions as $key => $value)
		<tr>
			<td>{{ $loop->index + 1 }}</td>
			<td>{{ $key }}</td>
			<td><a href="#">{{ $value }}</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection

@section('pageScripts')
    <script type="text/javascript" src="/js/shopping.js"></script>
@endsection