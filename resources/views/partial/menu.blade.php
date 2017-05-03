<div class="header-wrap">
    <header>
        <!-- LOGO -->
        <a href="{{ route('home', ['locale' => App::getLocale()]) }}">
            <figure class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
            </figure>
        </a>
        <!-- /LOGO -->
        <!-- MOBILE MENU HANDLER -->
        <div class="mobile-menu-handler left primary">
            <img src="{{ asset('images/pull-icon.png') }}" alt="pull-icon">
        </div>
        <!-- /MOBILE MENU HANDLER -->
        <!-- LOGO MOBILE -->
        <a href="{{ route('home', ['locale' => App::getLocale()]) }}">
            <figure class="logo-mobile">
                <img src="{{ asset('images/logo_mobile.png') }}" alt="logo-mobile">
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
                <ul class="dropdown small hover-effect closed">
                    <li class="dropdown-item">
                        <div class="dropdown-triangle"></div>
                        <a href="{{-- route(Route::current()->getName(), ['locale' => 'en']) --}}">EN</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="{{-- route(Route::current()->getName(), ['locale' => 'kr']) --}}">KR</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="{{-- route(Route::current()->getName(), ['locale' => 'fr']) --}}">FR</a>
                    </li>
                </ul>
                <!-- /DROPDOWN -->
            </div>
            <!-- /DROPDOWN -->
            <!-- USER QUICKVIEW -->
            @if(Auth::check())
            <div class="user-quickview">
                <!-- USER AVATAR -->
                <a href="{{ route('dashboard_index', ['locale' => App::getLocale()]) }}">
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
                        <a href="{{ route('profile', ['locale' => App::getLocale()]) }}">Profile Page</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="{{ route('list_orders', ['locale' => App::getLocale()]) }}">Orders</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="{{ route('signout', ['locale' => App::getLocale()]) }}">Log out</a>
                    </li>
                </ul>
                <!-- /DROPDOWN -->
            </div>
            @can ( 'ADMIN_MANAGER', Auth::user()->role_id )
            <div  class="user-quickview">
                <span class="icon-settings">
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </span>

                <!-- PIN -->
                <span class="pin soft-edged primary">{{ $adminNotificationCount }}</span>
                <!-- /PIN -->
                @if ($adminNotificationCount === 0)

                @else

                <!-- DROPDOWN NOTIFICATIONS -->
                <ul class="dropdown notifications no-hover closed">
                    
                    <!-- DROPDOWN ITEM -->
                    @foreach($adminNotifications as $notification)
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
                        <a href="{{ route('view_notification', ['locale' => App::getLocale()]) }}" class="button primary">View all Notifications</a>
                    </li>
                    
                    <!-- /DROPDOWN ITEM -->
                </ul>
                <!-- /DROPDOWN NOTIFICATIONS -->
                @endif
            </div>
            @endcan
            @can ( 'BUYER', Auth::user()->role_id )
            <div  class="user-quickview">
                <span class="icon-settings">
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </span>

                <!-- PIN -->
                <span class="pin soft-edged primary">{{ $buyerNotificationCount }}</span>
                <!-- /PIN -->
                @if ($buyerNotificationCount === 0)

                @else
                <!-- DROPDOWN NOTIFICATIONS -->
                <ul class="dropdown notifications no-hover closed">
                    
                    <!-- DROPDOWN ITEM -->
                    @foreach($buyerNotifications as $notification)
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
                        <a href="{{ route('view_notification', ['locale' => App::getLocale()]) }}" class="button primary">View all Notifications</a>
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
                <a href="{{ route('load_register', ['locale' => App::getLocale()]) }}" class="button primary">Register</a>
                <a href="{{ route('load_login', ['locale' => App::getLocale()]) }}" class="button secondary">Login</a>
                @else
                <a href="{{ route('signout', ['locale' => App::getLocale()]) }}" class="button primary">Logout</a>
                <a href="{{ route('dashboard_index', ['locale' => App::getLocale()]) }}" class="button secondary">Dashboard</a>
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
        <!-- USER QUICKVIEW -->
        <div class="user-quickview">
            <!-- USER AVATAR -->
            <a href="author-profile.html">
                <div class="outer-ring">
                    <div class="inner-ring"></div>
                    <figure class="user-avatar">
                        <img src="{{ asset('images/avatars/avatar_01.jpg') }}" alt="avatar">
                    </figure>
                </div>
            </a>
            <!-- /USER AVATAR -->
            <!-- USER INFORMATION -->
            @if (Auth::check())
            <p class="user-name">{{ Auth::user()->name }}</p>
            @endif
            <!-- /USER INFORMATION -->
        </div>
        <!-- /USER QUICKVIEW -->
    </div>
    <!-- /SIDE MENU HEADER -->
    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">Dashboard</p>
    <!-- /SIDE MENU TITLE -->
    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('profile', ['locale' => App::getLocale()]) }}">Profile Page</a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('profile', ['locale' => App::getLocale()]) }}">Account Settings</a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>
    <!-- /DROPDOWN -->
    <a href="{{ route('signout', ['locale' => App::getLocale()]) }}" class="button medium secondary">Logout</a>
    <a href="{{ route('home', ['locale' => App::getLocale()]) }}" class="button medium secondary">Dashboard</a>
</div>
<!-- /SIDE MENU -->
<!-- MAIN MENU -->
<div class="main-menu-wrap">
    <div class="menu-bar">
        <nav>
            <ul class="main-menu">
                <!-- MENU ITEM -->
                <li class="menu-item">
                    <a href="{{ route('home', ['locale' => App::getLocale()]) }}">Home</a>
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