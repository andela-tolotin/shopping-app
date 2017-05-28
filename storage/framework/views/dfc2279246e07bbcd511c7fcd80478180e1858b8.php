<div class="shadow-film closed"></div>
<!-- SVG ARROW -->
<svg style="display: none;">
    <symbol id="svg-arrow" viewBox="0 0 3.923 6.64014" preserveAspectRatio="xMinYMin meet">
    <path d="M3.711,2.92L0.994,0.202c-0.215-0.213-0.562-0.213-0.776,0c-0.215,0.215-0.215,0.562,0,0.777l2.329,2.329
        L0.217,5.638c-0.215,0.215-0.214,0.562,0,0.776c0.214,0.214,0.562,0.215,0.776,0l2.717-2.718C3.925,3.482,3.925,3.135,3.711,2.92z"/>
        </symbol>
    </svg>
    <!-- /SVG ARROW -->
    <!-- SVG PLUS -->
    <svg style="display: none;">
        <symbol id="svg-plus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
        <rect x="5" width="3" height="13"/>
        <rect y="5" width="13" height="3"/>
        </symbol>
    </svg>
    <!-- /SVG PLUS -->
    <!-- SVG MINUS -->
    <svg style="display: none;">
        <symbol id="svg-minus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
        <rect y="5" width="13" height="3"/>
        </symbol>
    </svg>
    <!-- /SVG MINUS -->
    <!-- jQuery -->
    <script src="<?php echo e(asset('js/vendor/jquery-3.1.0.min.js')); ?>"></script>
    <!-- XM Pie Chart -->
    <script src="<?php echo e(asset('js/vendor/jquery.xmpiechart.min.js')); ?>"></script>
    <!-- Side Menu -->
    <script src="<?php echo e(asset('js/side-menu.js')); ?>"></script>
    <!-- Dashboard Header -->
    <script src="<?php echo e(asset('js/dashboard-header.js')); ?>"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/bootbox.min.js')); ?>"></script>
    <script>
    $(document).on("click", ".delete-user, .delete-payment, .delete-advert", function(e) {
        var href = $(this).attr('href');
        bootbox.confirm("Are you sure you want to delete this user!", function(result) {
            if (result) {
                return window.location.href = href;
            }
        });
        return false;
    });
</script>
<style type="text/css">
    .modal-open .modal {
        z-index: 9999;
    }
</style>