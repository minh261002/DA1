$(document).ready(function () {
  $("#search").keyup(function () {
    var query = $(this).val();

    $.ajax({
      type: "GET",
      url: "models/search.php",
      data: { search: query },
      success: function (response) {
        $("#search-results").html(response);
      },
    });
  });

  $("#search").on("blur", function () {
    if (!$("#search-results").is(":hover")) {
      $("#search-results").hide();
    }
  });

  $("#search-results").on("click", function () {
    $("#search-results").show();
  });
});
