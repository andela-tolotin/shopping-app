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
					<h2>863k</h2>
					<p class="text-header">Visitors this Month</p>
					<p>Avg 28766 per Day</p>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->

				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item violet line">
					<h2>36.428</h2>
					<p class="text-header">Referals this Month</p>
					<p>Avg 1214 per Day</p>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->

				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item blue step">
					<h2>7.698</h2>
					<p class="text-header">Conversions this Month</p>
					<p>Avg 256 per Day</p>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->

				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item red curve">
					<h2>65.254</h2>
					<p class="text-header">Returns this Month</p>
					<p>Avg 2175 per Day</p>
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