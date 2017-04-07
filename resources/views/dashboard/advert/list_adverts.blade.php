@extends('dashboard.base')
@section('title', 'List all adverts')
@section('page', 'List Adverts')
@section('body')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- TRANSACTION LIST -->
<table class="table table-hover table-badverted">
	<thead>
		<tr>
			<th>Sn</th>
			<th>Uploaded By</th>
			<th>Thumbnails</th>
			<th>Product Associated With</th>
			<th>Status</th>
			<th>Display</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@if ($adverts->count() > 0)
		@foreach($adverts as $advert)
		<tr>
			<td>{{ $loop->index + 1 }}</td>
			<td>{{ $advert->user->name }}</td>
			<td>
				@foreach(json_decode($advert->advert_photos) as $photo)
				<img src="{{ $photo }}" class="img-responsive" alt="{{ $advert->user->name }}" style="width: 52px; height: auto; float: left; padding: 2px;">
				@endforeach
			</td>
			<td>{{ $advert->product->name }}</td>
			<td>
				@if ($advert->status === 0)
					Pending
				@else
					Displayed
				@endif
			</td>
			<td>
				<a id ="display" data-id="{{ $advert->id }}" class="display-advert" href="#" title="Approve {{ $advert->id }}"> <i class="glyphicon glyphicon-eye-open"></i>
					@if ($advert->status === 0)
						Display
					@else
						Undisplay
					@endif 
				</a>
			</td>
			<td><a class="delete-advert" href="{{ route('delete_advert', ['id' => $advert->id ]) }}" title="Delete {{ $advert->name }}"> <i class="glyphicon glyphicon-trash Delete"></i> Delete</a></td>
		</tr>
		@endforeach
		@endif
	</tbody>
</table>
<p>
	@if ($adverts->count() > 0)
	{!! $adverts->render() !!}
	@endif
</p>
@endsection

@section('pageScripts')
    <script type="text/javascript" src="/js/shopping.js"></script>
@endsection