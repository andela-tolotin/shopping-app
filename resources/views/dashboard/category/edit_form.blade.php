@extends('dashboard.base')
@section('title', 'Edit category')
@section('page', 'Edit category')
@section('body')
    <!-- FORM POPUP -->
    <div class="form-box-items">
        <!-- FORM BOX ITEM -->
        <div class="form-box-item">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="register-form4" method="post" action="{{ route('update_category', ['id' => $category->id, 'locale' => App::getLocale()]) }}">
                {{ csrf_field() }}
                <div class="input-container">
                    <label for="name" class="rl-label required">Name</label>
                    <input type="text" id="name" name="name" value="{{ $category->name }}" required="required">
                </div>
                <div class="input-container">
                    <label for="description" class="rl-label required">Description</label>
                    <input type="text" id="description" name="description" value="{{ $category->description }}">
                </div>
                <button type="submit" class="button mid dark">Update Category</button>
            </form>
        </div>
        <!-- /FORM POPUP CONTENT -->
    </div>
    </div>
@endsection