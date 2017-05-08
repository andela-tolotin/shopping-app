<div class="header-wrap">
    <header>
        <!-- LOGO -->
        <a href="<?php echo e(route('home')); ?>">
            <figure class="logo">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="logo">
            </figure>
        </a>
        <!-- /LOGO -->
        <!-- MOBILE MENU HANDLER -->
        <div class="mobile-menu-handler left primary">
            <img src="<?php echo e(asset('images/pull-icon.png')); ?>" alt="pull-icon">
        </div>
        <!-- /MOBILE MENU HANDLER -->
        <!-- LOGO MOBILE -->
        <a href="<?php echo e(route('home')); ?>">
            <figure class="logo-mobile">
                <img src="<?php echo e(asset('images/logo_mobile.png')); ?>" alt="logo-mobile">
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
                    <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li class="dropdown-item">
                        <a rel="alternate" hreflang="<?php echo e($localeCode); ?>" href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode)); ?>">
                            <?php echo e($properties['native']); ?>

                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
                <!-- /DROPDOWN -->
            </div>
            <!-- /DROPDOWN -->
            <!-- USER QUICKVIEW -->
            <?php if(Auth::check()): ?>
            <div class="user-quickview">
                <!-- USER AVATAR -->
                <a href="<?php echo e(route('dashboard_index')); ?>">
                    <div class="outer-ring">
                        <div class="inner-ring"></div>
                        <figure class="user-avatar">
                            <img src="<?php echo e(asset('images/avatars/avatar_01.jpg')); ?>" alt="avatar">
                        </figure>
                    </div>
                </a>
                <!-- /USER AVATAR -->
                <!-- USER INFORMATION -->
                
                <p class="user-name"><?php echo e(Auth::user()->name); ?></p>
                <p class="user-money"><?php echo e(Auth::user()->role->name); ?></p>
                <!-- SVG ARROW -->
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg>
                
                <!-- DROPDOWN -->
                <ul class="dropdown small hover-effect closed">
                    <li class="dropdown-item">
                        <div class="dropdown-triangle"></div>
                        <a href="<?php echo e(route('profile')); ?>">Profile Page</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="<?php echo e(route('list_orders')); ?>">Orders</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="<?php echo e(route('signout')); ?>">Log out</a>
                    </li>
                </ul>
                <!-- /DROPDOWN -->
            </div>
            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check( 'ADMIN_MANAGER', Auth::user()->role_id )): ?>
            <div  class="user-quickview">
                <span class="icon-settings">
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </span>
                <!-- PIN -->
                <span class="pin soft-edged primary"><?php echo e($adminNotificationCount); ?></span>
                <!-- /PIN -->
                <?php if($adminNotificationCount === 0): ?>
                <?php else: ?>
                <!-- DROPDOWN NOTIFICATIONS -->
                <ul class="dropdown notifications no-hover closed">
                    
                    <!-- DROPDOWN ITEM -->
                    <?php $__currentLoopData = $adminNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li class="dropdown-item">
                        <a href="<?php echo e($notification->url); ?>">
                            <figure class="user-avatar">
                                <img src="images/avatars/avatar_05.jpg" alt="">
                            </figure>
                        </a>
                        <p class="title">
                            <a href="<?php echo e($notification->url); ?>"><span></span><?php echo e($notification->message); ?></a>
                        </p>
                        <p class="timestamp"><?php echo e($notification->created_at->diffForHumans(\Carbon\Carbon::now())); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <span class="notification-type icon-tag"></span>
                        <a href="<?php echo e(route('view_notification')); ?>" class="button primary">View all Notifications</a>
                    </li>
                    
                    <!-- /DROPDOWN ITEM -->
                </ul>
                <!-- /DROPDOWN NOTIFICATIONS -->
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check( 'BUYER', Auth::user()->role_id )): ?>
            <div  class="user-quickview">
                <span class="icon-settings">
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </span>
                <!-- PIN -->
                <span class="pin soft-edged primary"><?php echo e($buyerNotificationCount); ?></span>
                <!-- /PIN -->
                <?php if($buyerNotificationCount === 0): ?>
                <?php else: ?>
                <!-- DROPDOWN NOTIFICATIONS -->
                <ul class="dropdown notifications no-hover closed">
                    
                    <!-- DROPDOWN ITEM -->
                    <?php $__currentLoopData = $buyerNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li class="dropdown-item">
                        <a href="<?php echo e($notification->url); ?>">
                            <figure class="user-avatar">
                                <img src="images/avatars/avatar_05.jpg" alt="">
                            </figure>
                        </a>
                        <p class="title">
                            <a href="<?php echo e($notification->url); ?>"><span> </span><?php echo e($notification->message); ?></a>
                        </p>
                        <p class="timestamp"><?php echo e($notification->created_at->diffForHumans(\Carbon\Carbon::now())); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <span class="notification-type icon-tag"></span>
                        <a href="<?php echo e(route('view_notification')); ?>" class="button primary">View all Notifications</a>
                    </li>
                    
                    <!-- /DROPDOWN ITEM -->
                </ul>
                <!-- /DROPDOWN NOTIFICATIONS -->
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php endif; ?>
            <div class="account-actions">
                <?php if(!Auth::check()): ?>
                <a href="<?php echo e(route('register')); ?>" class="button primary">Register</a>
                <a href="<?php echo e(route('login')); ?>" class="button secondary">Login</a>
                <?php else: ?>
                <a href="<?php echo e(route('signout')); ?>" class="button primary">Logout</a>
                <a href="<?php echo e(route('dashboard_index')); ?>" class="button secondary">Dashboard</a>
                <?php endif; ?>
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
                        <img src="<?php echo e(asset('images/avatars/avatar_01.jpg')); ?>" alt="avatar">
                    </figure>
                </div>
            </a>
            <!-- /USER AVATAR -->
            <!-- USER INFORMATION -->
            <?php if(Auth::check()): ?>
            <p class="user-name"><?php echo e(Auth::user()->name); ?></p>
            <?php endif; ?>
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
            <a href="<?php echo e(route('profile')); ?>">Profile Page</a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="<?php echo e(route('profile')); ?>">Account Settings</a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>
    <!-- /DROPDOWN -->
    <a href="<?php echo e(route('signout')); ?>" class="button medium secondary">Logout</a>
    <a href="<?php echo e(route('home')); ?>" class="button medium secondary">Dashboard</a>
</div>
<!-- /SIDE MENU -->
<!-- MAIN MENU -->
<div class="main-menu-wrap">
    <div class="menu-bar">
        <nav>
            <ul class="main-menu">
                <!-- MENU ITEM -->
                <li class="menu-item">
                    <a href="<?php echo e(route('home')); ?>">Home</a>
                </li>
                <!-- /MENU ITEM -->
            </ul>
        </nav>
        <form class="search-form">
            <input type="text" class="rounded" name="search" id="search_products" placeholder="Search products here...">
            <input type="image" src="<?php echo e(asset('images/search-icon.png')); ?>" alt="search-icon">
        </form>
    </div>
</div>