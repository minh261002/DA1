// $(document).ready(function() {
//     $('.form-voucher').on('submit', function(e) {
//         e.preventDefault();
  
//         var voucherCode = $('#voucher').val();
  
//         $.ajax({
//             url: 'models/voucher.php', 
//             type: 'POST',
//             data: { voucher: voucherCode },
//             success: function(response) {
//                 var data = JSON.parse(response);
//                 if (data.success) {
//                   $('#voucherErr').text(data.message);
//                   $('.total-price').text(data.totalPrice);
//                   $('.discounted').text(data.discounted);
//                 } else {
//                   $('#voucherErr').text(data.message); 
//                 }
//             },
//             error: function() {
//                 $('#voucherErr').text('Có lỗi xảy ra khi xử lý yêu cầu.'); 
//             }
//         });
//     });
//   });
  
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
                  $('#voucherErr').text(data.message); n
                }
            },
            error: function() {
                $('#voucherErr').text('Có lỗi xảy ra khi xử lý yêu cầu.'); 
            }
        });
    });
  });