$(document).ready(function() {
    $('.delete-category').click(function (event) {
        var id   = $(this).data('id');

        if (confirm('Are you sure you want to delete this item?')) {
            var id = $(this).data('id');

            window.location.href = '/en/category/'+id+'/delete';
        }

        event.preventDefault();
    });

    $('.delete-product').click(function (event) {
        var id = $(this).data('id');

        if (confirm('Are you sure you want to delete this item?')) {
            var id = $(this).data('id');

            window.location.href = '/en/product/'+id+'/delete';
        }

        event.preventDefault();
    });

    $('.delete-order').click(function (event) {
        var id   = $(this).data('id');

        if (confirm('Are you sure you want to delete this item?')) {
            var id = $(this).data('id');

            window.location.href = '/en/order/'+id+'/delete';
        }

        event.preventDefault();
    });

    $('.display-order').click(function (event) {
        var id   = $(this).data('id');

        if (document.getElementById('display').innerText == ' display') {
            console.log(document.getElementById('display').innerText);
            if (confirm('Are you sure you want to display this order?')) {
                var id = $(this).data('id');

                window.location.href = '/en/order/'+id+'/display';
            }
        } else {
            console.log(document.getElementById('display').innerText);
            if (confirm('Are you sure you want to Dissdisplay this order?')) {
                var id = $(this).data('id');

                window.location.href = '/en/order/'+id+'/display';
            }
        }

        event.preventDefault();
    });

    $('.approve-order').click(function (event) {
        var id  = $(this).data('id');

        if (document.getElementById('approve').innerText == ' Display') {
            console.log(document.getElementById('approve').innerText);
            if (confirm('Are you sure you want to approve this order?')) {
                var id = $(this).data('id');

                window.location.href = '/en/order/'+id+'/approve';
            }
        } else {
            console.log(document.getElementById('approve').innerText);
            if (confirm('Are you sure you want to dissaprove this order?')) {
                var id = $(this).data('id');

                window.location.href = '/en/order/'+id+'/approve';
            }
        }

        event.preventDefault();
    });

    $('.display-advert').click(function (event) {
        var id   = $(this).data('id');

        if (document.getElementById('display').innerText == 'Display') {
            console.log(document.getElementById('display').innerText);
            if (confirm('Are you sure you want to display this advert?')) {
                var id = $(this).data('id');

                window.location.href = '/en/advert/'+id+'/display';
            }
        } else {
            console.log(document.getElementById('display').innerText);
            if (confirm('Are you sure you want to Undisplay this advert?')) {
                var id = $(this).data('id');

                window.location.href = '/en/advert/'+id+'/display';
            }
        }

        event.preventDefault();
    });

    $('#all-read').click(function (event) {
        event.preventDefault();

        $.ajax({
            type: 'GET',
            url: '/en/read-all/notifications',
        }).done(function(data) {
            if (data.status == 201) {
                window.location.href = '/en/notifications';
            } else {
                window.location.href = '/en/notifications';
            }
        });
    });

    $('.rating').on('rating.change', function(e) {
        var id   = $(this).data('id');
        var ratings = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/en/order/'+id+'/ratings',
            data: {ratings: ratings},
          }).done(function(data) {
                if (data.status == 201) {
                    alert('You have succesfully rate the customer');
                } else {
                    alert('Rating failed please try again');
                }
        });
    });

    var fromDateInput = $('input[name="from"]');
    var toDateInput = $('input[name="to"]');
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : 'body';
    var options = {
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    };

    if (fromDateInput.size() > 0 && toDateInput.size() > 0 ) {
        fromDateInput.datepicker(options);
        toDateInput.datepicker(options);
    }
    

    $('#reset').click(function (event) {
        window.location.href = '/en/transactions';
        event.preventDefault();
    });

});