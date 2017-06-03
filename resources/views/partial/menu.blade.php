<?php
    if (Auth::check()) {
        $serviceManager = App\ServiceManager::where('user_id', Auth::user()->id)->get();
        $allManagerNotification = [];
        $managerNotificationCount = 0;

        if (count($serviceManager) > 0 ) {
            foreach ($serviceManager as $key => $value) {
                $managerNotification = App\Notification::where([['status', 1], ['action', 'Login succesfully'], ['user_id', Auth::user()->id]])->orWhere([['status', 1], ['action', 'Made Order'], ['product_id', $value['product_id']]])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC')->get();
                array_push($allManagerNotification, $managerNotification);
            }

            foreach ($allManagerNotification as $key => $value) {
                $managerNotificationCount += count($value);
            }
        } else {
            $managerNotification = App\Notification::where([['status', 1], ['action', 'Login succesfully'], ['user_id', Auth::user()->id]])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC')->get();
            array_push($allManagerNotification, $managerNotification);

            foreach ($allManagerNotification as $key => $value) {
                $managerNotificationCount += count($value);
            }
        }

        $allBuyerNotifications = App\Notification::where([['status', 1], ['action', 'Login succesfully'], ['user_id', Auth::user()->id]])->orWhere([['status', 1], ['action', 'Approve Order'], ['user_id', Auth::user()->id]])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC')->get();
        $allAdminNotifications = App\Notification::where([['status', 1], ['action', 'Login succesfully'], ['user_id', Auth::user()->id]])->orWhere([['status', 1], ['action', 'Made Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC')->get();
    }
?>
<div class="header-wrap">
    <header>
        <!-- LOGO -->
        <a href="{{ route('home') }}">
            <figure class="logo">
                <img src="{{ asset('images/new_logo.png') }}" alt="logo">
            </figure>
        </a>
        <!-- /LOGO -->
        <!-- MOBILE MENU HANDLER -->
        <div class="mobile-menu-handler left primary">
            <img src="{{ asset('images/pull-icon.png') }}" alt="pull-icon">
        </div>
        <!-- /MOBILE MENU HANDLER -->
        <!-- LOGO MOBILE -->
        <a href="{{ route('home') }}">
            <figure class="logo-mobile">
                <img src="{{ asset('images/new_logo.png') }}" alt="logo-mobile">
            </figure>
        </a>
        <!-- /LOGO MOBILE -->
        <!-- MOBILE ACCOUNT OPTIONS HANDLER -->
        <div class="mobile-account-options-handler right secondary">
            <span class="icon-user"></span>
        </div>
        <!-- /MOBILE ACCOUNT OPTIONS HANDLER -->
        <!-- USER BOARD -->
        <div class="user-board">
            <div class="user-quickview">
                <p class="user-name">Language</p>
                <!-- SVG ARROW -->
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg>
                <!-- DROPDOWN -->
                <ul class="language_bar_chooser dropdown small hover-effect closed">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="dropdown-item">
                        <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                <!-- /DROPDOWN -->
            </div>
            <!-- /DROPDOWN -->
            <!-- USER QUICKVIEW -->
            @if(Auth::check())
            <div class="user-quickview">
                <!-- USER AVATAR -->
                <a href="{{ route('dashboard_index') }}">
                    <div class="outer-ring">
                        <div class="inner-ring"></div>
                        <figure class="user-avatar">
                            <img src="{{ asset('images/avatars/avatar_01.jpg') }}" alt="avatar">
                        </figure>
                    </div>
                </a>
                <!-- /USER AVATAR -->
                <!-- USER INFORMATION -->
                {{--  @if(Auth::check()) --}}
                <p class="user-name">{{ Auth::user()->name }}</p>
                <p class="user-money">{{ Auth::user()->role->name }}</p>
                <!-- SVG ARROW -->
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg>
                
                <!-- DROPDOWN -->
                <ul class="dropdown small hover-effect closed">
                    <li class="dropdown-item">
                        <div class="dropdown-triangle"></div>
                        <a href="{{ route('profile') }}">Profile Page</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="{{ route('list_orders') }}">Orders</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="{{ route('signout') }}">Log out</a>
                    </li>
                </ul>
                <!-- /DROPDOWN -->
            </div>
            @can ( 'ADMIN', Auth::user()->role_id )
            <div  class="user-quickview">
                <span class="icon-bell">
                    <!-- SVG ARROW -->
                    {{-- <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg> --}}
                    <!-- /SVG ARROW -->
                </span>
                <!-- PIN -->
                <span class="pin soft-edged primary">{{ count($allAdminNotifications) }}</span>
                <!-- /PIN -->
                @if (count($allAdminNotifications) === 0)
                @else
                <!-- DROPDOWN NOTIFICATIONS -->
                <ul class="dropdown notifications no-hover closed">
                    
                    <!-- DROPDOWN ITEM -->
                    @foreach($allAdminNotifications as $notification)
                    <li class="dropdown-item">
                        <a href="{{ $notification->url }}">
                            <figure class="user-avatar">
                                <img src="images/avatars/avatar_05.jpg" alt="">
                            </figure>
                        </a>
                        <p class="title">
                            <a href="{{ $notification->url }}"><span></span>{{ $notification->message }}</a>
                        </p>
                        <p class="timestamp">{{ $notification->created_at->diffForHumans(\Carbon\Carbon::now()) }}</p>
                        @endforeach
                        <span class="notification-type icon-tag"></span>
                        <a href="{{ route('view_notification') }}" class="button primary">View all Notifications</a>
                    </li>
                    
                    <!-- /DROPDOWN ITEM -->
                </ul>
                <!-- /DROPDOWN NOTIFICATIONS -->
                @endif
            </div>
            @endcan
            @can ( 'BUYER', Auth::user()->role_id )
            <div  class="user-quickview">
                <span class="icon-bell">
                    <!-- SVG ARROW -->
                    {{-- <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg> --}}
                    <!-- /SVG ARROW -->
                </span>
                <!-- PIN -->
                <span class="pin soft-edged primary">{{ count($allBuyerNotifications) }}</span>
                <!-- /PIN -->
                @if (count($allBuyerNotifications) === 0)
                @else
                <!-- DROPDOWN NOTIFICATIONS -->
                <ul class="dropdown notifications no-hover closed">
                    
                    <!-- DROPDOWN ITEM -->
                    @foreach($allBuyerNotifications as $notification)
                    <li class="dropdown-item">
                        <a href="{{ $notification->url }}">
                            <figure class="user-avatar">
                                <img src="images/avatars/avatar_05.jpg" alt="">
                            </figure>
                        </a>
                        <p class="title">
                            <a href="{{ $notification->url }}"><span> </span>{{ $notification->message }}</a>
                        </p>
                        <p class="timestamp">{{ $notification->created_at->diffForHumans(\Carbon\Carbon::now()) }}</p>
                        @endforeach
                        <span class="notification-type icon-tag"></span>
                        <a href="{{ route('view_notification') }}" class="button primary">View all Notifications</a>
                    </li>
                    
                    <!-- /DROPDOWN ITEM -->
                </ul>
                <!-- /DROPDOWN NOTIFICATIONS -->
                @endif
            </div>
            @endcan
            @can ( 'MANAGER', Auth::user()->role_id )
            <div  class="user-quickview">
                <span class="icon-bell">
                    <!-- SVG ARROW -->
                    {{-- <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg> --}}
                    <!-- /SVG ARROW -->
                </span>
                <!-- PIN -->
                <span class="pin soft-edged primary">{{ $managerNotificationCount }}</span>
                <!-- /PIN -->
                @if ($managerNotificationCount === 0)
                @else
                <!-- DROPDOWN NOTIFICATIONS -->
                <ul class="dropdown notifications no-hover closed">
                    
                    <!-- DROPDOWN ITEM -->
                    @foreach ($allManagerNotification as $notifications)
                    @foreach ($notifications as $notification)
                    <li class="dropdown-item">
                        <a href="{{ $notification->url }}">
                            <figure class="user-avatar">
                                <img src="images/avatars/avatar_05.jpg" alt="">
                            </figure>
                        </a>
                        <p class="title">
                            <a href="{{ $notification->url }}"><span></span>{{ $notification->message }}</a>
                        </p>
                        <p class="timestamp">{{ $notification->created_at->diffForHumans(\Carbon\Carbon::now()) }}</p>
                        @endforeach
                        @endforeach
                        <a href="{{ route('view_notification') }}" class="button primary">View all Notifications</a>
                    </li>
                    
                    <!-- /DROPDOWN ITEM -->
                </ul>
                <!-- /DROPDOWN NOTIFICATIONS -->
                @endif
            </div>
            @endcan
            @endif
            <div class="account-actions">
                @if(!Auth::check())
                <a href="{{ route('register') }}" class="button primary">Register</a>
                <a href="{{ route('login') }}" class="button secondary">Login</a>
                @else
                <a href="{{ route('signout') }}" class="button primary">Logout</a>
                <a href="{{ route('dashboard_index') }}" class="button secondary">Dashboard</a>
                @endif
            </div>
            <!-- /ACCOUNT ACTIONS -->
        </div>
        <!-- /USER BOARD -->
    </header>
</div>
<!-- /HEADER -->
<!-- SIDE MENU -->
<div id="account-options-menu" class="side-menu right closed">
    <!-- SVG PLUS -->
    <svg class="svg-plus">
        <use xlink:href="#svg-plus"></use>
    </svg>
    <!-- /SVG PLUS -->
    <!-- SIDE MENU HEADER -->
    <div class="side-menu-header">
        <!-- /USER QUICKVIEW -->
    </div>
    <!-- /SIDE MENU HEADER -->
    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title"></p>
    <!-- /SIDE MENU TITLE -->
    <div class="account-actions">
        @if(!Auth::check())
        <a href="{{ route('register') }}" class="button primary">Register</a>
        <a href="{{ route('login') }}" class="button secondary">Login</a>
        @else
        <a href="{{ route('signout') }}" class="button primary">Logout</a>
        <a href="{{ route('dashboard_index') }}" class="button secondary">Dashboard</a>
        @endif
    </div>
</div>
<!-- /SIDE MENU -->
<!-- MAIN MENU -->
<div class="main-menu-wrap">
    <div class="menu-bar">
        <nav>
            <ul class="main-menu">
                <!-- MENU ITEM -->
                <li class="menu-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <!-- /MENU ITEM -->
            </ul>
        </nav>
        <form class="search-form">
            <input type="text" class="rounded" name="search" id="search_products" placeholder="Search products here...">
            <input type="image" src="{{ asset('images/search-icon.png') }}" alt="search-icon">
        </form>
    </div>
</div>
<style type="text/css">
    span.icon-bell {
        color: white;
    }
</style>