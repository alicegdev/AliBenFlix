$(document).ready(function () {
  $("#clicked-thumbnail").click(function () {
    $.ajax({
      method: "POST",
      url: "?action=setLastWatched",
      dataType: "json",
      data: { movie_id: $("#movie_id").val() },
    });
  });
});
