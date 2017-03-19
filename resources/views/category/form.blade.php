@extends('app')
@section('title', 'Add a category')
@section('breadcrumb')
    <!-- SECTION HEADLINE -->
    <div class="section-headline-wrap">
        <div class="section-headline">
            <h2>Add a category</h2>
            <p>Home<span class="separator">/</span><span class="current-section">category</span></p>
        </div>
    </div>
    <!-- /SECTION HEADLINE -->
@endsection
@section('body')
    <!-- FORM POPUP -->
    <div class="fix-align" style="width: 50%; margin:auto;">
        <div class="form-popup">
            <!-- FORM POPUP HEADLINE -->
            <div class="form-popup-headline primary">
                <h2>Add Category</h2>
            </div>
            <!-- FORM POPUP CONTENT -->
            <div class="form-popup-content">
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
                    <label for="name" class="rl-label required">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter name of category here..." required="required">
                    <label for="description" class="rl-label required">Description</label>
                    <input type="text" id="description" name="description" placeholder="Enter description of category here...">
                    <button class="button mid dark">Add Category</button>
                </form>
            </div>
            <!-- /FORM POPUP CONTENT -->
        </div>
    </div>
@endsection