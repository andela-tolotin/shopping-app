@extends('dashboard.base')
@section('title', 'List Categories')
@section('page', 'List Categories')
@section('body')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- TRANSACTION LIST -->
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Sn</th>
            <th>Name</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @if ($categories->count() > 0)
            @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td><a href="{{ route('edit_category', ['id' => $category->id, 'locale' => App::getLocale()]) }}" title="Edit {{ $category->name }}"> <i class="glyphicon glyphicon-pencil"></i> Edit </a></td>
                    <td><a data-id="{{ $category->id }}" class="delete-category" href="#" title="Delete {{ $category->name }}"> <i class="glyphicon glyphicon-trash Delete"></i> Delete</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <p>
        @if ($categories->count() > 0)
            {!! $categories->render() !!}
        @endif
    </p>
@endsection

@section('pageScripts')
    <script type="text/javascript" src="/js/shopping.js"></script>
@endsection