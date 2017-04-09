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
				<div class="graph-stats-list-item violet line">
					<a href="user/orders"><p class="text-header">Total Orders</p></a>
					<h2>{{ $userOrders }}</h2>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->

				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item blue step">
					<a href="/orders"><p class="text-header">Total Unapproved Orders</p></a>
					<h2>{{ $totalUnapprovedOrder }}</h2>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->

				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item red curve">
					<a href="/transactions"><p class="text-header">Total Amount of Transactions</p></a>
					<h2>{{ $totalTransactionAmount }}</h2>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->
			</div>

        </div>
        <!-- /FORM BOX -->
    </div>
    <!-- /DASHBOARD BODY -->
    @include('partial.dashboard.footer')
</body>
</html>