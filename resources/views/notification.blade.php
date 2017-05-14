@extends('dashboard.base')
@section('title', 'Your Notifications')
@section('page', 'Your Notifications')
@section('href', '<a id="all-read" href="#" class="button mid-short primary">Mark all as Read</a>')
@section('body')
        <!-- NOTIFICATION CLOSE -->
            <div class="profile-notifications">
                <!-- PROFILE NOTIFICATION -->
                @can ( 'BUYER', Auth::user()->role_id )
                    @foreach($allBuyerNotifications as $notification)
                    <div class="profile-notification">
                        <div class="profile-notification-date">
                            <p>{{ $notification->created_at->diffForHumans(\Carbon\Carbon::now()) }}</p>
                        </div>
                        <div class="profile-notification-body">
                            <p>
                                @if ($notification->status ===  1)
                                     <b>{{ $notification->message }}</b>
                                @else
                                    {{ $notification->message }}
                                @endif
                            </p>
                        </div>
                        <div class="profile-notification-type">
                            <span class="type-icon icon-heart primary"></span>

                        </div>
                    </div>
                    @endforeach
                @endcan

                @can ( 'ADMIN', Auth::user()->role_id )
                    @foreach($allAdminNotifications as $notification)
                    <div class="profile-notification">
                        <div class="profile-notification-date">
                            <p>{{ $notification->created_at->diffForHumans(\Carbon\Carbon::now()) }}</p>
                        </div>
                        <div class="profile-notification-body">
                            <a href="{{ $notification->url }}">
                            <p>
                                @if ($notification->status ===  1)
                                     <b>{{ $notification->message }}</b>
                                @else
                                    {{ $notification->message }}
                                @endif
                            </p>
                            </a>
                        </div>
                        <div class="profile-notification-type">
                            <span class="type-icon icon-heart primary"></span>

                        </div>
                    </div>
                    @endforeach
                @endcan

                @can ( 'MANAGER', Auth::user()->role_id )
                    @foreach ($allManagerNotification as $notifications)
                    @foreach ($notifications as $notification)
                    <div class="profile-notification">
                        <div class="profile-notification-date">
                            <p>{{ $notification->created_at->diffForHumans(\Carbon\Carbon::now()) }}</p>
                        </div>
                        <div class="profile-notification-body">
                            <a href="{{ $notification->url }}">
                            <p>
                                @if ($notification->status ===  1)
                                     <b>{{ $notification->message }}</b>
                                @else
                                    {{ $notification->message }}
                                @endif
                            </p>
                            </a>
                        </div>
                        <div class="profile-notification-type">
                            <span class="type-icon icon-heart primary"></span>

                        </div>
                    </div>
                    @endforeach
                    @endforeach
                @endcan
            </div>
        <!-- PROFILE NOTIFICATION -->
@endsection
@section('pageScripts')
    <script type="text/javascript" src="/js/shopping.js"></script>
@endsection