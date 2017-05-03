(function() {
  payWithPoint();

  function payWithPoint() {
    var payButton = $('button#pay_with_point_wallet');

    payButton.on('click', function() {
      var _this = $(this);
      _this
        .attr('disabled', 'disabled')
        .css('background', '#ccc');

      var productId = _this.attr('data-id');
      var userPoint = _this.attr('data-point');
      var token = _this.attr('data-token');
      var locale = _this.attr('data-locale');

      var message = $('p#status');

      var route = '/'+locale+'/product/'+productId+'/pay_with_point';

      makeAjaxCall(route, {
        'point': userPoint,
        '_token': token
      }).done(function(data) {
        if (data.message == true) {
          message.html(`<div class="alert alert-success">
              Your Payment was successful!
              </div>`
            );
          return setTimeout(function() {
            window.location.href = '/'+locale+'/product/'+productId+'/checkout';
          }, 2000);
        }
        message.html(`<div class="alert alert-danger">`+data.message+`</div>`);

        return setTimeout(function() {
          window.location.href = '/'+locale+'/product/'+productId+'/checkout';
        }, 2000);
      }).fail(function(error) {
        console.log(error);
      });

      return false;
    });
  }

  function makeAjaxCall(url, params) {
    return $.ajax({
      url: url,
      type: 'POST',
      data: params
    });
  }
})(jQuery);