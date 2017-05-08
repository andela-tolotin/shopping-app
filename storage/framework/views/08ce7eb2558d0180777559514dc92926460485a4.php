<!-- DASHBOARD HEADER -->
<div class="dashboard-header retracted">
    <!-- DB CLOSE BUTTON -->
    <a href="/" class="db-close-button">
        <img src="<?php echo e(asset('images/dashboard/back-icon.png')); ?>" alt="back-icon">
    </a>
    <!-- DB CLOSE BUTTON -->
    <!-- DB OPTIONS BUTTON -->
    <div class="db-options-button">
        <img src="<?php echo e(asset('images/dashboard/db-list-right.png')); ?>" alt="db-list-right">
        <img src="<?php echo e(asset('images/dashboard/close-icon.png')); ?>" alt="close-icon">
    </div>
    <!-- DB OPTIONS BUTTON -->
    <!-- DASHBOARD HEADER ITEM -->
    <div class="dashboard-header-item title">
        <!-- DB SIDE MENU HANDLER -->
        <div class="db-side-menu-handler">
            <img src="<?php echo e(asset('images/dashboard/db-list-left.png')); ?>" alt="db-list-left">
        </div>
        <!-- /DB SIDE MENU HANDLER -->
        <h6>Your Dashboard</h6>
    </div>
    <!-- /DASHBOARD HEADER ITEM -->
    <!-- DASHBOARD HEADER ITEM -->
    <div class="dashboard-header-item form">
        <form class="dashboard-search">
            <input type="text" name="search" id="search_dashboard" placeholder="Search on dashboard...">
            <input type="image" src="<?php echo e(asset('images/dashboard/search-icon.png')); ?>" alt="search-icon">
        </form>
    </div>
    <!-- DASHBOARD HEADER ITEM -->
    <div class="dashboard-header-item back-button">
        <a href="<?php echo e(route('home')); ?>" class="button mid dark-light">Back to Homepage</a>
    </div>
    <!-- /DASHBOARD HEADER ITEM -->
</div>