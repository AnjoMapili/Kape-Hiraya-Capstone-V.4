$(document).ready(function () {
  dashboardCount();
});

function dashboardCount() {
  $.ajax({
    url: "dashboard_count.php",
    type: "GET",
    dataType: "text",
    beforeSend: function () {},
    success: function (data) {
      var json = $.parseJSON(data);
      if (json == null) return false;

      $(".transaction-count").text(json.transaction);
    },
  });
}
