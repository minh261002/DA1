const form = document.getElementById("form-cart");
form.addEventListener("submit", function (event) {
  var colorChecked = false;
  var sizeChecked = false;

  //  màu
  var colorInputs = document.getElementsByName("color");
  for (var i = 0; i < colorInputs.length; i++) {
    if (colorInputs[i].checked) {
      colorChecked = true;
      break;
    }
  }

  // size
  var sizeInputs = document.getElementsByName("size");
  for (var j = 0; j < sizeInputs.length; j++) {
    if (sizeInputs[j].checked) {
      sizeChecked = true;
      break;
    }
  }

  if (!colorChecked) {
    event.preventDefault();
    document.getElementById("colorErr").innerText = "Vui lòng chọn màu.";
  } else {
    document.getElementById("colorErr").innerText = "";
  }

  if (!sizeChecked) {
    event.preventDefault();
    document.getElementById("sizeErr").innerText = "Vui lòng chọn kích thước.";
  } else {
    document.getElementById("sizeErr").innerText = "";
  }
});
