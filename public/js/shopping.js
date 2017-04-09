$(document).ready(function() {
    $(".delete-category").click(function (event) {
        var id   = $(this).data("id");

        if (confirm('Are you sure you want to delete this item?')) {
            var id = $(this).data("id");

            window.location.href = "/category/"+id+"/delete";
        }

        event.preventDefault();
    });

    $(".delete-product").click(function (event) {
        var id   = $(this).data("id");

        if (confirm('Are you sure you want to delete this item?')) {
            var id = $(this).data("id");

            window.location.href = "/product/"+id+"/delete";
        }

        event.preventDefault();
    });

    $(".delete-order").click(function (event) {
        var id   = $(this).data("id");

        if (confirm('Are you sure you want to delete this item?')) {
            var id = $(this).data("id");

            window.location.href = "/order/"+id+"/delete";
        }

        event.preventDefault();
    });

    $(".display-order").click(function (event) {
        var id   = $(this).data("id");

        if (document.getElementById("display").innerText == ' display') {
            console.log(document.getElementById("display").innerText);
            if (confirm('Are you sure you want to display this order?')) {
                var id = $(this).data("id");

                window.location.href = "/order/"+id+"/display";
            }
        } else {
            console.log(document.getElementById("display").innerText);
            if (confirm('Are you sure you want to Dissdisplay this order?')) {
                var id = $(this).data("id");

                window.location.href = "/order/"+id+"/display";
            }
        }

        event.preventDefault();
    });

    $(".approve-order").click(function (event) {
        var id   = $(this).data("id");

        if (document.getElementById("approve").innerText == ' Display') {
            console.log(document.getElementById("approve").innerText);
            if (confirm('Are you sure you want to approve this order?')) {
                var id = $(this).data("id");

                window.location.href = "/order/"+id+"/approve";
            }
        } else {
            console.log(document.getElementById("approve").innerText);
            if (confirm('Are you sure you want to dissaprove this order?')) {
                var id = $(this).data("id");

                window.location.href = "/order/"+id+"/approve";
            }
        }

        event.preventDefault();
    });

    $(".display-advert").click(function (event) {
        var id   = $(this).data("id");

        if (document.getElementById("display").innerText == 'Display') {
            console.log(document.getElementById("display").innerText);
            if (confirm('Are you sure you want to display this advert?')) {
                var id = $(this).data("id");

                window.location.href = "/advert/"+id+"/display";
            }
        } else {
            console.log(document.getElementById("display").innerText);
            if (confirm('Are you sure you want to Undisplay this advert?')) {
                var id = $(this).data("id");

                window.location.href = "/advert/"+id+"/display";
            }
        }

        event.preventDefault();
    });

    var fromDateInput = $('input[name="from"]');
    var toDateInput = $('input[name="to"]');
    var container = $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    };
    fromDateInput.datepicker(options);
    toDateInput.datepicker(options);

    $("#reset").click(function (event) {
        window.location.href = "/transactions";
        event.preventDefault();
    });
});