<!-- SIDE MENU -->
<div id="dashboard-options-menu" class="side-menu dashboard left closed">
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
            <a href="#">
                <div class="outer-ring">
                    <div class="inner-ring"></div>
                    <figure class="user-avatar">
                        @if (!is_null(Auth::user()->profile_picture))
                        <img src="{{ asset('images/dashboard/profile-default-image.png') }}" alt="profile-default-image">
                        @else
                        <img src="{{ Auth::user()->profile_picture }}">
                        @endif
                    </figure>
                </div>
            </a>
            <!-- /USER AVATAR -->
            <!-- USER INFORMATION -->
            <p class="user-name">{{ Auth::user()->name }}</p>
            <p class="user-money">{{ Auth::user()->role->name }}</p>
            <!-- /USER INFORMATION -->
        </div>
        <!-- /USER QUICKVIEW -->
    </div>
    <!-- /SIDE MENU HEADER -->
    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">Your Account</p>
    <!-- /SIDE MENU TITLE -->
    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect interactive">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item active">
            <a href="{{ route('dashboard_index', ['locale' => App::getLocale()]) }}">
                <span class="sl-icon icon-home"></span>
                Home
            </a>
        </li>
        <li class="dropdown-item active">
            <a href="{{ route('profile', ['locale' => App::getLocale()]) }}">
                <span class="sl-icon icon-settings"></span>
                Account Settings
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
        @can ( 'BUYER', Auth::user()->role_id )
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('list_user_orders', ['locale' => App::getLocale()]) }}">
                <span class="sl-icon icon-tag"></span>
                Your Orders
            </a>
        </li>
        <p class="side-menu-title">Point Wallet</p>
        <!-- /SIDE MENU TITLE -->
        <!-- DROPDOWN -->
        <ul class="dropdown dark hover-effect">
            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="{{ route('load_buy_point', ['locale' => App::getLocale()]) }}">
                    <span class="sl-icon icon-arrow-up-circle"></span>
                    Buy Point
                </a>
            </li>
            <!-- /DROPDOWN ITEM -->
        </ul>
        @endcan
        @can ( 'ADMIN_MANAGER', Auth::user()->role_id )
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('list_orders', ['locale' => App::getLocale()]) }}">
                <span class="sl-icon icon-star"></span>
                Manage Orders
            </a>
            <!-- PIN -->
                <span class="pin soft-edged big primary">{{ App\Order::where('status', 0)->count() }}</span>
            <!-- /PIN -->
        </li>
        @endcan
    </ul>
    <!-- /DROPDOWN -->
    @can ( 'ADMIN', Auth::user()->role_id )
    <!-- /SIDE MENU HEADER -->
    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">User Management</p>
    <!-- /SIDE MENU TITLE -->
    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect interactive">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item active">
            <a href="{{ route('manage_user', ['locale' => App::getLocale()]) }}">
                <span class="sl-icon icon-settings"></span>
                Manage User
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>
    @endcan
    </ul>
    @can ( 'ADMIN', Auth::user()->role_id )
    <!-- /DROPDOWN -->
    <p class="side-menu-title">Category</p>
    <!-- /SIDE MENU TITLE -->
    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('load_category', ['locale' => App::getLocale()])  }}">
                <span class="sl-icon icon-arrow-up-circle"></span>
                Add Category
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('list_categories', ['locale' => App::getLocale()]) }} ">
                <span class="sl-icon icon-folder-alt"></span>
                Manage Category
            </a>
        </li>
    </ul>
    <!-- /DROPDOWN -->
    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">Product</p>
    <!-- /SIDE MENU TITLE -->
    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('load_product', ['locale' => App::getLocale()]) }}">
                <span class="sl-icon icon-arrow-up-circle"></span>
                Add Product
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('list_products', ['locale' => App::getLocale()]) }}">
                <span class="sl-icon icon-folder-alt"></span>
                Manage Product
            </a>
        </li>
    </ul>

    <p class="side-menu-title">Transactions</p>
    <!-- /SIDE MENU TITLE -->
    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('stock', ['locale' => App::getLocale()]) }}">
                <span class="sl-icon icon-arrow-up-circle"></span>
                Transactions
            </a>
        </li>
    </ul>
    <!-- /DROPDOWN -->
    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">Payment Configuration</p>
    <!-- /SIDE MENU TITLE -->
    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('config_payment', ['locale' => App::getLocale()]) }}">
                <span class="sl-icon icon-arrow-up-circle"></span>
                Configure Payment
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('list_payments', ['locale' => App::getLocale()]) }}">
                <span class="sl-icon icon-folder-alt"></span>
                Manage Payment
            </a>
        </li>
    </ul>
    <!-- /DROPDOWN -->
    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">Advertisement</p>
    <!-- /SIDE MENU TITLE -->
    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('load_advert', ['locale' => App::getLocale()]) }}">
                <span class="sl-icon icon-arrow-up-circle"></span>
                Add Advert
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('list_adverts', ['locale' => App::getLocale()]) }}">
                <span class="sl-icon icon-folder-alt"></span>
                Manage Advert
            </a>
        </li>
    </ul>
    <!-- /DROPDOWN -->
    @endcan
    <a href="{{ route('signout', ['locale' => App::getLocale()]) }}" class="button medium secondary">Logout</a>
</div>
<!-- /SIDE MENU -->
