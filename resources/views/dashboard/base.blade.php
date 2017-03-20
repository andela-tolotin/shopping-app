@include('partial.dashboard.header')
<body>
    @include('partial.dashboard.side_menu')
    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">
        @include('partial.dashboard.upper_part')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <div class="headline buttons primary">
                <h4>@yield('page')</h4>
            </div>
            @yield('body')
        </div>
    </div>
    <!-- /DASHBOARD BODY -->
    <!-- FOOTER -->
    @include('partial.dashboard.footer')
    @yield('pageScripts')
</body>
</html>