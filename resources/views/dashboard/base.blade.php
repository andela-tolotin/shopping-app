@include('partial.dashboard.header')
<body>
    @include('partial.dashboard.side_menu')
    <!-- SECTION -->
    <div class="section-wrap">
        <div class="section demo">
        @yield('body')
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- FOOTER -->
    @include('partial.footer')
</body>
</html>