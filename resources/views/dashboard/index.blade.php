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
            <!-- /DASHBOARD HEADER ITEM -->
            <!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item stats">
                <!-- STATS META -->
                <div class="stats-meta">
                    <div class="pie-chart pie-chart1">
                        <!-- SVG PLUS -->
                        <svg class="svg-plus primary">
                            <use xlink:href="#svg-plus"></use>
                        </svg>
                        <!-- /SVG PLUS -->
                    </div>
                    <h6>64.579</h6>
                    <p>New Original Visits</p>
                </div>
                <!-- /STATS META -->
            </div>
            <!-- /DASHBOARD HEADER ITEM -->
            <!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item stats">
                <!-- STATS META -->
                <div class="stats-meta">
                    <div class="pie-chart pie-chart2">
                        <!-- SVG PLUS -->
                        <svg class="svg-minus tertiary">
                            <use xlink:href="#svg-minus"></use>
                        </svg>
                        <!-- /SVG PLUS -->
                    </div>
                    <h6>20.8</h6>
                    <p>Less Sales Than Last Month</p>
                </div>
                <!-- /STATS META -->
            </div>
            <!-- /DASHBOARD HEADER ITEM -->
            <!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item stats">
                <!-- STATS META -->
                <div class="stats-meta">
                    <div class="pie-chart pie-chart3">
                        <!-- SVG PLUS -->
                        <svg class="svg-plus primary">
                            <use xlink:href="#svg-plus"></use>
                        </svg>
                        <!-- /SVG PLUS -->
                    </div>
                    <h6>322k</h6>
                    <p>Total Visits This Month</p>
                </div>
                <!-- /STATS META -->
            </div>
            <!-- /DASHBOARD HEADER ITEM -->
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
                <button form="profile-info-form" class="button mid-short primary">Save Changes</button>
            </div>
            <!-- /HEADLINE -->
            <!-- FORM BOX ITEMS -->
            <div class="form-box-items">
                <!-- FORM BOX ITEM -->
                <div class="form-box-item">
                    <h4>Profile Information</h4>
                    <hr class="line-separator">
                    <!-- PROFILE IMAGE UPLOAD -->
                    <div class="profile-image">
                        <div class="profile-image-data">
                            <figure class="user-avatar medium">
                                <img src="images/dashboard/profile-default-image.png" alt="profile-default-image">
                            </figure>
                            <p class="text-header">Profile Photo</p>
                            <p class="upload-details">Minimum size 70x70px</p>
                        </div>
                        <a href="#" class="button mid-short dark-light">Upload Image...</a>
                    </div>
                    <!-- PROFILE IMAGE UPLOAD -->
                    <form id="profile-info-form">
                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="acc_name" class="rl-label required">Account Name</label>
                            <input type="text" id="acc_name" name="acc_name" value="Johnny Fisher" placeholder="Enter your account name here...">
                        </div>
                        <!-- /INPUT CONTAINER -->
                        <!-- INPUT CONTAINER -->
                        <div class="input-container half">
                            <label for="new_pwd" class="rl-label">New Password</label>
                            <input type="password" id="new_pwd" name="new_pwd" placeholder="Enter your password here...">
                        </div>
                        <!-- /INPUT CONTAINER -->
                        <!-- INPUT CONTAINER -->
                        <div class="input-container half">
                            <label for="new_pwd2" class="rl-label">Repeat Password</label>
                            <input type="password" id="new_pwd2" name="new_pwd2" placeholder="Repeat your password here...">
                        </div>
                        <!-- /INPUT CONTAINER -->
                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="new_email" class="rl-label">Email</label>
                            <input type="email" id="new_email" name="new_email" placeholder="Enter your email address here...">
                        </div>
                        <div class="input-container half">
                            <label for="country1" class="rl-label required">Gender</label>
                            <label for="country1" class="select-block">
                                <select name="country1" id="country1">
                                    <option value="">Select your Gender...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <!-- SVG ARROW -->
                                <svg class="svg-arrow">
                                    <use xlink:href="#svg-arrow"></use>
                                </svg>
                                <!-- /SVG ARROW -->
                            </label>
                        </div>
                        <!-- /INPUT CONTAINER -->
                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            {{-- <label for="about" class="rl-label">About</label>
                            <input type="text" id="about" name="about" placeholder="This will appear bellow your avatar... (max 140 char)"> --}}
                        </div>
                        <!-- /INPUT CONTAINER -->
                    </form>
                </div>
                <!-- /FORM BOX ITEM -->
            </div>
            <!-- /FORM BOX -->
        </div>
        <!-- DASHBOARD CONTENT -->
        <!-- DASHBOARD CONTENT -->
    </div>
    <!-- /DASHBOARD BODY -->
    @include('partial.dashboard.footer')
</body>
</html>