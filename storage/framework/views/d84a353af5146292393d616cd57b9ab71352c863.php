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
            $managerNotificationCount =+ count($allManagerNotification); 
        }

        $allBuyerNotifications = App\Notification::where([['status', 1], ['action', 'Login succesfully'], ['user_id', Auth::user()->id]])->orWhere([['status', 1], ['action', 'Approve Order'], ['user_id', Auth::user()->id]])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC')->get();
        $allAdminNotifications = App\Notification::where([['status', 1], ['action', 'Login succesfully'], ['user_id', Auth::user()->id]])->orWhere([['status', 1], ['action', 'Made Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC')->get();
    }

    $totalUnapprovedOrdercount;

    $serviceManager = App\ServiceManager::where('user_id', Auth::user()->id)->get();

    if ($serviceManager->count() > 0 ) {
        foreach ($serviceManager as $key => $value) {
            $unapproveOrders = App\Order::where([['status', 0], ['product_id', $value->product_id]])->orWhere([['status', 0], ['admin_id', 3]])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC')->get()->count();
            $totalUnapprovedOrdercount = $unapproveOrders;
        }
    } else {
        $unapproveOrders = App\Order::Where([['status', 0], ['admin_id', Auth::user()->role_id]])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC')->get()->count();
        $totalUnapprovedOrdercount = $unapproveOrders;
    }
?>

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
                        <?php if(!is_null(Auth::user()->profile_picture)): ?>
                        <img src="<?php echo e(asset('images/dashboard/profile-default-image.png')); ?>" alt="profile-default-image">
                        <?php else: ?>
                        <img src="<?php echo e(Auth::user()->profile_picture); ?>">
                        <?php endif; ?>
                    </figure>
                </div>
            </a>
            <!-- /USER AVATAR -->
            <!-- USER INFORMATION -->
            <p class="user-name"><?php echo e(Auth::user()->name); ?></p>
            <p class="user-money"><?php echo e(Auth::user()->role->name); ?></p>
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
            <a href="<?php echo e(route('dashboard_index')); ?>">
                <span class="sl-icon icon-home"></span>
                Home
            </a>
        </li>
        <li class="dropdown-item active">
            <a href="<?php echo e(route('profile')); ?>">
                <span class="sl-icon icon-settings"></span>
                Account Settings
            </a>
        </li>

        <li class="dropdown-item active">
            <a href="<?php echo e(route('view_notification')); ?>">
                <span class="sl-icon icon-bell"></span>
                Notifications
            </a>
            <span class="pin soft-edged big primary">
                <?php if(Auth::user()->role_id === 1): ?>
                    <?php echo e(count($allBuyerNotifications)); ?>

                <?php elseif(Auth::user()->role_id === 2): ?>
                    <?php echo e($managerNotificationCount); ?>

                <?php else: ?>
                    <?php echo e(count($allAdminNotifications)); ?>

                <?php endif; ?>
            </span>
        </li>
        <!-- /DROPDOWN ITEM -->
        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check( 'BUYER', Auth::user()->role_id )): ?>
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="<?php echo e(route('list_user_orders')); ?>">
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
                <a href="<?php echo e(route('load_buy_point')); ?>">
                    <span class="sl-icon icon-arrow-up-circle"></span>
                    Buy Point
                </a>
            </li>
            <!-- /DROPDOWN ITEM -->
        </ul>
        <?php endif; ?>
        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check( 'ADMIN_MANAGER', Auth::user()->role_id )): ?>
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="<?php echo e(route('list_orders')); ?>">
                <span class="sl-icon icon-star"></span>
                Manage Orders
            </a>
            <!-- PIN -->
                <span class="pin soft-edged big primary">
                    <?php echo e($totalUnapprovedOrdercount); ?>

                </span>
            <!-- /PIN -->
        </li>
        <?php endif; ?>
    </ul>
    <!-- /DROPDOWN -->
    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check( 'ADMIN', Auth::user()->role_id )): ?>
    <!-- /SIDE MENU HEADER -->
    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">User Management</p>
    <!-- /SIDE MENU TITLE -->
    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect interactive">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item active">
            <a href="<?php echo e(route('manage_user')); ?>">
                <span class="sl-icon icon-settings"></span>
                Manage User
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>
    <?php endif; ?>
    </ul>
    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check( 'ADMIN', Auth::user()->role_id )): ?>
    <!-- /DROPDOWN -->
    <p class="side-menu-title">Category</p>
    <!-- /SIDE MENU TITLE -->
    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="<?php echo e(route('load_category')); ?>">
                <span class="sl-icon icon-arrow-up-circle"></span>
                Add Category
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="<?php echo e(route('list_categories')); ?> ">
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
            <a href="<?php echo e(route('load_product')); ?>">
                <span class="sl-icon icon-arrow-up-circle"></span>
                Add Product
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="<?php echo e(route('list_products')); ?>">
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
            <a href="<?php echo e(route('stock')); ?>">
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
            <a href="<?php echo e(route('config_payment')); ?>">
                <span class="sl-icon icon-arrow-up-circle"></span>
                Configure Payment
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="<?php echo e(route('list_payments')); ?>">
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
            <a href="<?php echo e(route('load_advert')); ?>">
                <span class="sl-icon icon-arrow-up-circle"></span>
                Add Advert
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="<?php echo e(route('list_adverts')); ?>">
                <span class="sl-icon icon-folder-alt"></span>
                Manage Advert
            </a>
        </li>
    </ul>
    <!-- /DROPDOWN -->
    <?php endif; ?>
    <a href="<?php echo e(route('signout')); ?>" class="button medium secondary">Logout</a>
</div>
<!-- /SIDE MENU -->
