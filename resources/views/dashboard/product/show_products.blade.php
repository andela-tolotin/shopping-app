@extends('dashboard.base')
@section('title', 'List Products')
@section('page', 'List Products')
@section('body')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- TRANSACTION LIST -->
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Sn</th>
            <th>Name</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Tax</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @if ($products->count() > 0)
            @foreach($products as $product)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->discount }}</td>
                    <td>{{ $product->tax }}</td>
                    <td><a href="{{ route('edit_product', ['id' => $product->id, 'locale' => App::getLocale()]) }}" title="Edit {{ $product->name }}"> <i class="glyphicon glyphicon-pencil"></i> Edit </a></td>
                    <td><a data-id="{{ $product->id }}" class="delete-product" href="#" title="Delete {{ $product->name }}"> <i class="glyphicon glyphicon-trash Delete"></i> Delete</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <p>
        @if ($products->count() > 0)
            {!! $products->render() !!}
        @endif
    </p>
@endsection

@section('pageScripts')
    <script type="text/javascript" src="/js/shopping.js"></script>
@endsection