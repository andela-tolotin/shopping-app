@extends('dashboard.base')
@section('title', 'Add a category')
@section('page', 'Add a category')
@section('body')
<!-- FORM POPUP -->
<div class="form-box-items">
    <!-- FORM BOX ITEM -->
    <div class="form-box-item">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form id="register-form4" method="post" action={{ route('post_category') }}>
            {{ csrf_field() }}
            <div class="input-container">
                <label for="name" class="rl-label required">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter name of category here..." required="required">
            </div>
            <div class="input-container">
                <label for="description" class="rl-label required">Description</label>
                <input type="text" id="description" name="description" placeholder="Enter description of category here...">
            </div>
            <button class="button mid dark">Add Category</button>
        </form>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
@endsection