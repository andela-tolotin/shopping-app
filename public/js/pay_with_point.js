(function() {
  payWithPoint();

  function payWithPoint() {
    var payButton = $('button#pay_with_point_wallet');

    payButton.on('click', function() {
      var _this = $(this);
      var productId = _this.attr('data-id');
      var userPoint = _this.attr('data-point');
      var token = _this.attr('data-token');

      var route = '/product/'+productId+'/pay_with_point';

      makeAjaxCall(route, {
        'point': userPoint,
        '_token': token
      }).done(function(data) {
        console.log(data);
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