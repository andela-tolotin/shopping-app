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
				@can ( 'BUYER', Auth::user()->role_id )
				<div class="graph-stats-list-item green bars">
					<p class="text-header">Remaining Points</p>
					<h2>{{ $remainingPoints }}</h2>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->

				<!-- GRAPH STATS LIST ITEM -->
				
				<div class="graph-stats-list-item violet line">
					<a href="{{ route('list_user_orders') }}">
						<p class="text-header">Total Orders</p>
						<h2>{{ $userOrdersCount }}</h2>
					</a>
				</div>

				<div class="graph-stats-list-item green bars">
					<p class="text-header">T. Orders - T. Excellents - T. Goods</p>
					<h2>
						{{ $userOrdersCount }} - {{ count($excellent) }} - {{ count($good) }}
					</h2>
				</div>

				<div class="graph-stats-list-item violet line">
					<a href="{{ route('list_user_orders') }}">
						<p class="text-header">Waiting Queue No</p>
						<h2>{{ $queueNo }}</h2>
					</a>
				</div>
				@endcan
				<!-- /GRAPH STATS LIST ITEM -->
				@can ( 'ADMIN_MANAGER', Auth::user()->role_id )
				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item blue step">
				<a href="{{ route('list_orders') }}">
					<p class="text-header">Total Unapproved Orders</p>
					<h2>{{ $totalUnapprovedOrder }}</h2>
				</a></div>
				@endcan
				<!-- /GRAPH STATS LIST ITEM -->
				@can ( 'ADMIN', Auth::user()->role_id )
				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item red curve">
				<a href="{{ route('stock') }}">
					<p class="text-header">Total Amount of Transactions</p>
					<h2>{{ $totalTransactionAmount }}</h2>
				</a></div>
				@endcan
			</div>

        </div>
        <!-- /FORM BOX -->
    </div>
    <!-- /DASHBOARD BODY -->
    @include('partial.dashboard.footer')
</body>
</html>