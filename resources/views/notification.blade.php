@extends('dashboard.base')
@section('title', 'Your Notifications')
@section('page', 'Your Notifications')
@section('href', '<a id="all-read" href="#" class="button mid-short primary">Mark all as Read</a>')
@section('body')
            <!-- NOTIFICATION CLOSE -->
                    <div class="profile-notifications">
                        <!-- PROFILE NOTIFICATION -->
                        @foreach($notifications as $notification)
                        <div class="profile-notification">
                            <div class="profile-notification-date">
                                <p>{{ $notification->created_at->diffForHumans(\Carbon\Carbon::now()) }}</p>
                            </div>
                            <div class="profile-notification-body">
                                <p>{{ $notification->message }}</p>
                            </div>
                            <div class="profile-notification-type">
                                <span class="type-icon icon-heart primary"></span>
                            </div>
                        </div>
                        @endforeach
                    </div>
        <!-- PROFILE NOTIFICATION -->
@endsection
@section('pageScripts')
    <script type="text/javascript" src="/js/shopping.js"></script>
@endsection