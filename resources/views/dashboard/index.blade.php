@include('partial.dashboard.header')
<body>
	@include('partial.dashboard.side_menu')
	<div class="dashboard-body">
        @include('partial.dashboard.upper_part')
        <!-- DASHBOARD HEADER -->
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline buttons primary">
                <h4>Statistics</h4>
            </div>
            <!-- /HEADLINE -->
            <div class="graph-stats-list">
				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item green bars">
					<p class="text-header">Remaining Points</p>
					<h2>{{ $remainingPoints }}</h2>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->

				<!-- GRAPH STATS LIST ITEM -->
				<a href="{{ route('list_user_orders', ['locale' => App::getLocale()]) }}"><div class="graph-stats-list-item violet line">
					<p class="text-header">Total Orders</p>
					<h2>{{ $userOrders }}</h2>
				</div></a>
				<!-- /GRAPH STATS LIST ITEM -->
				@can ( 'ADMIN_MANAGER', Auth::user()->role_id )
				<!-- GRAPH STATS LIST ITEM -->
				<a href="{{ route('list_orders', ['locale' => App::getLocale()]) }}"><div class="graph-stats-list-item blue step">
					<p class="text-header">Total Unapproved Orders</p>
					<h2>{{ $totalUnapprovedOrder }}</h2>
				</div></a>
				@endcan
				<!-- /GRAPH STATS LIST ITEM -->
				@can ( 'ADMIN', Auth::user()->role_id )
				<!-- GRAPH STATS LIST ITEM -->
				<a href="{{ route('stock', ['locale' => App::getLocale()]) }}"><div class="graph-stats-list-item red curve">
					<p class="text-header">Total Amount of Transactions</p>
					<h2>{{ $totalTransactionAmount }}</h2>
				</div></a>
				@endcan
			</div>

        </div>
        <!-- /FORM BOX -->
    </div>
    <!-- /DASHBOARD BODY -->
    @include('partial.dashboard.footer')
</body>
</html>