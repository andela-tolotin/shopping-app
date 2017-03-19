@include('partial.dashboard.header')
<body>
    @include('partial.dashboard.side_menu')
    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">
        <!-- DASHBOARD HEADER -->
        <div class="dashboard-header retracted">
            <!-- DB CLOSE BUTTON -->
            <a href="index.html" class="db-close-button">
                <img src="images/dashboard/back-icon.png" alt="back-icon">
            </a>
            <!-- DB CLOSE BUTTON -->
            <!-- DB OPTIONS BUTTON -->
            <div class="db-options-button">
                <img src="images/dashboard/db-list-right.png" alt="db-list-right">
                <img src="images/dashboard/close-icon.png" alt="close-icon">
            </div>
            <!-- DB OPTIONS BUTTON -->
            <!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item title">
                <!-- DB SIDE MENU HANDLER -->
                <div class="db-side-menu-handler">
                    <img src="images/dashboard/db-list-left.png" alt="db-list-left">
                </div>
                <!-- /DB SIDE MENU HANDLER -->
                <h6>Your Dashboard</h6>
            </div>
            <!-- /DASHBOARD HEADER ITEM -->
            <!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item form">
                <form class="dashboard-search">
                    <input type="text" name="search" id="search_dashboard" placeholder="Search on dashboard...">
                    <input type="image" src="images/dashboard/search-icon.png" alt="search-icon">
                </form>
            </div>
            <!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item back-button">
                <a href="index.html" class="button mid dark-light">Back to Homepage</a>
            </div>
            <!-- /DASHBOARD HEADER ITEM -->
        </div>
        <!-- DASHBOARD HEADER -->
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline buttons primary">
                <h4>Account Settings</h4>
            </div>
            <!-- /HEADLINE -->
            @include('dashboard.profile')
            </div>
            <!-- /FORM BOX -->
        </div>
    </div>
    <!-- /DASHBOARD BODY -->
    @include('partial.dashboard.footer')
</body>
</html>