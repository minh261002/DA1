var decrementButtons = document.querySelectorAll(".decrement");
var incrementButtons = document.querySelectorAll(".increment");
var quantityInputs = document.querySelectorAll(".quantity");
var subTotalElements = document.querySelectorAll("#sub-total");
var temporaryElements = document.querySelectorAll(".temporary"); // Sử dụng .temporary thay vì temporary
var totalPriceElement = document.querySelector(".total-price");

var priceElements = document.querySelectorAll(".cart-price");

function updateSubtotal(rowIndex) {
  var quantity = parseInt(quantityInputs[rowIndex].value);
  var price = parseFloat(priceElements[rowIndex].getAttribute("data-price"));
  var subtotal = quantity * price;
  subTotalElements[rowIndex].textContent = numberFormat(subtotal) + " đ";
  return subtotal;
}

function numberFormat(number) {
  return number.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
}

decrementButtons.forEach(function (decrementButton, index) {
  decrementButton.addEventListener("click", function (e) {
    e.preventDefault();
    var currentQuantity = parseInt(quantityInputs[index].value);
    if (currentQuantity > 1) {
      quantityInputs[index].value = currentQuantity - 1;
      var newSubtotal = updateSubtotal(index);
      updateTemporaryAndTotal();
    }
  });
});

incrementButtons.forEach(function (incrementButton, index) {
  incrementButton.addEventListener("click", function (e) {
    e.preventDefault();
    var currentQuantity = parseInt(quantityInputs[index].value);
    if (currentQuantity < 10) {
      // Giới hạn số lượng tối đa
      quantityInputs[index].value = currentQuantity + 1;
      var newSubtotal = updateSubtotal(index);
      updateTemporaryAndTotal();
    }
  });
});

function updateTotalPrice() {
  var subtotals = Array.from(subTotalElements).map(function (subtotalElement) {
    return parseFloat(subtotalElement.textContent.replace(/\D/g, ""));
  });
  var total = subtotals.reduce(function (acc, subtotal) {
    return acc + subtotal;
  }, 0);
  totalPriceElement.textContent = numberFormat(total) + " đ";
}

function updateTemporary() {
  var subtotals = Array.from(subTotalElements).map(function (subtotalElement) {
    return parseFloat(subtotalElement.textContent.replace(/\D/g, ""));
  });
  var temporary = subtotals.reduce(function (acc, subtotal) {
    return acc + subtotal;
  }, 0);
  temporaryElements.forEach(function (element) {
    element.textContent = numberFormat(temporary) + " đ";
  });
}

function updateTemporaryAndTotal() {
  updateTotalPrice();
  updateTemporary();
}

updateTemporaryAndTotal();
