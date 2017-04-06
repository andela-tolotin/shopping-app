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

    $(".approve-order").click(function (event) {
        var id   = $(this).data("id");

        if (document.getElementById("approve").innerText == ' Approve') {
            console.log(document.getElementById("approve").innerText);
            if (confirm('Are you sure you want to Approve this order?')) {
                var id = $(this).data("id");

                window.location.href = "/order/"+id+"/approve";
            }
        } else {
            console.log(document.getElementById("approve").innerText);
            if (confirm('Are you sure you want to Dissapprove this order?')) {
                var id = $(this).data("id");

                window.location.href = "/order/"+id+"/approve";
            }
        }

        event.preventDefault();
    });

});