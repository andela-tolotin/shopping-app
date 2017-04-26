@extends('dashboard.base')
@section('title', 'Your Notifications')
@section('page', 'Your Notifications')
@section('href', '<a href="#" class="button mid-short primary">Mark all as Read</a>')
@section('body')
    <!-- PROFILE NOTIFICATIONS -->
    
            <!-- NOTIFICATION CLOSE -->
                @foreach($notifications as $notification)
                    <div class="profile-notifications">
                        <!-- PROFILE NOTIFICATION -->
                        <div class="profile-notification">
                            <div class="profile-notification-date">
                                <p>{{ $notification->created_at->diffForHumans(\Carbon\Carbon::now()) }}</p>
                            </div>
                            <div class="profile-notification-body">
                                <figure class="user-avatar">
                                    <img src="images/avatars/avatar_05.jpg" alt="">
                                </figure>
                                <p>{{ $notification->message }}</p>
                            </div>
                            <div class="profile-notification-type">
                                <span class="type-icon icon-heart primary"></span>
                            </div>
                        </div>
                    </div>
                @endforeach
        <!-- PROFILE NOTIFICATION -->
    </div>
@endsection

@section('pageScripts')
    <script type="text/javascript" src="/js/shopping.js"></script>
@endsection