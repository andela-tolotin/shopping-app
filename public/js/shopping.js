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

});