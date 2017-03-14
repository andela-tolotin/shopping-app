@yield('title')
@include('partial.header')
<body>
    @include('partial.menu')
    @yield('breadcrumb')
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