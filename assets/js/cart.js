$(document).ready(function() {
    //cập nhật giao diện sau AJAX
    function updateUI(data) {
        $('.total-price').text(data.totalPrice);
        $('.total_order').text(data.totalOrder);
        $('#sub-total-' + data.productId).text(data.subtotal);
        $('.temporary').text(data.totalPrice);
        $('.quantity').val(data.quantity);
    }
  
    // click tăng giảm
    $('.cart-quantity').on('click', '.decrement, .increment', function(e) {
        e.preventDefault();
        var productId = $(this).closest('.cart-quantity').find('input[name="productId"]').val();
        var quantity = parseInt($(this).closest('.cart-quantity').find('.quantity').val());
        var action = $(this).hasClass('decrement') ? 'decrement' : 'increment';
  
        $.ajax({
            url: './models/update_cart.php',
            type: 'POST',
            data: {productId: productId, quantity: quantity, action: action},
            success: function(response) {
                var data = JSON.parse(response);
                updateUI(data);
            }
        });
    });
  });
  