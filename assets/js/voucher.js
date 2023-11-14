$(document).ready(function() {
  $('.form-voucher').on('submit', function(e) {
      e.preventDefault();

      var voucherCode = $('#voucher').val();

      $.ajax({
          url: 'models/voucher.php', 
          type: 'POST',
          data: { voucher: voucherCode },
          success: function(response) {
              var data = JSON.parse(response);
              if (data.success) {
                $('#voucherErr').text(data.message);
                $('.total-price').text(data.totalPrice);
                $('.discounted').text(data.discounted);
              } else {
                  alert(data.message);
              }
          },
          error: function() {
              alert('Có lỗi xảy ra khi xử lý yêu cầu.');
          }
      });
  });
});
