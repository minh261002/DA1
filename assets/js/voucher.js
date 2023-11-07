$(document).ready(function () {
  $("form.form-voucher").on("submit", function (e) {
    e.preventDefault();

    var voucherCode = $("#voucher").val();
    var total_price = $("#voucher_total_price").val();

    $.ajax({
      type: "POST",
      url: "models/voucher.php",
      data: {
        voucher: voucherCode,
        total_price: total_price,
      },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          $(".total-price").text(response.newTotal);
          $(".discounted").text(response.discount);
        } else {
          $("#voucherErr").text(response.message);
        }
      },
    });
  });
});
