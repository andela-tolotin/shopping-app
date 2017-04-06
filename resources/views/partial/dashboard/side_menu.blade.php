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
            <a href="{{ route('profile') }}">
                <span class="sl-icon icon-settings"></span>
                Account Settings
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="#">
                <span class="sl-icon icon-star"></span>
                Notifications
            </a>
            <!-- PIN -->
            <span class="pin soft-edged big primary">49</span>
            <!-- /PIN -->
        </li>
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('list_user_orders') }}">
                <span class="sl-icon icon-tag"></span>
                Your Orders
            </a>
        </li>
        @can ( 'BUYER', Auth::user()->role_id )
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('list_orders') }}">
                <span class="sl-icon icon-star"></span>
                Manage Orders
            </a>
            <!-- PIN -->
            <span class="pin soft-edged big primary">49</span>
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
            <a href="{{ route('manage_user') }}">
                <span class="sl-icon icon-settings"></span>
                Manage User
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>
    @endcan
    <!-- /DROPDOWN -->
    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">Info &amp; Statistics</p>
    <!-- /SIDE MENU TITLE -->
    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="dashboard-statement.html">
                <span class="sl-icon icon-layers"></span>
                Sales Statement
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('dashboard_index')  }}">
                <span class="sl-icon icon-chart"></span>
                Statistics
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>
    @can ( 'BUYER', Auth::user()->role_id )
    <!-- /DROPDOWN -->
    <p class="side-menu-title">Category</p>
    <!-- /SIDE MENU TITLE -->
    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('load_category')  }}">
                <span class="sl-icon icon-arrow-up-circle"></span>
                Add Category
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('list_categories') }} ">
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
            <a href="{{ route('load_product') }}">
                <span class="sl-icon icon-arrow-up-circle"></span>
                Add Product
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('list_products') }}">
                <span class="sl-icon icon-folder-alt"></span>
                Manage Product
            </a>
        </li>
    </ul>
    @endcan

    @can ( 'ADMIN', Auth::user()->role_id )
    <!-- /DROPDOWN -->
    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">Payment Configuration</p>
    <!-- /SIDE MENU TITLE -->
    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('config_payment') }}">
                <span class="sl-icon icon-arrow-up-circle"></span>
                Configure Payment
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('list_payments') }}">
                <span class="sl-icon icon-folder-alt"></span>
                Manage Payment
            </a>
        </li>
    </ul>
    @endcan
    <!-- /DROPDOWN -->
    @can ( 'ADMIN', Auth::user()->role_id )
    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">Advertisement</p>
    <!-- /SIDE MENU TITLE -->
    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('load_advert') }}">
                <span class="sl-icon icon-arrow-up-circle"></span>
                Add Advert
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{ route('list_adverts') }}">
                <span class="sl-icon icon-folder-alt"></span>
                Manage Advert
            </a>
        </li>
    </ul>
    <!-- /DROPDOWN -->
    @endcan
    <a href="{{ route('logout') }}" class="button medium secondary">Logout</a>
</div>
<!-- /SIDE MENU -->