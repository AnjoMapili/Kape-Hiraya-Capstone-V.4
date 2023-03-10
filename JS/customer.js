$(document).ready(function () {
  customers();
});

function customers() {
  var html = "";
  $.ajax({
    url: "customer_list.php",
    type: "GET",
    dataType: "text",
    beforeSend: function () {},
    success: function (data) {
      var json = $.parseJSON(data);
      if (json == null) return false;

      if (json.status == 200) {
        $.each(json.data, function (k, v) {
          html += "<tr>";
          html += '<td class="text-center">' + (k + 1) + "</td>";
          html += '<td class="text-center">' + v.name + "</td>";
          html += '<td class="text-center">' + v.email + "</td>";
          html += '<td class="text-center">' + v.contact + "</td>";
          html += '<td class="text-center">' + v.address + "</td>";
          html += '<td class="text-center">' + v.date + "</td>";
          html += '<td class="text-center">';
          html +=
            '<span class="material-icons-outlined spn-view-transaction" title="View transaction" data-transno="' +
            v.transaction_number +
            '">search</span>';
          html +=
            '<span class="material-icons-outlined spn-trash-transaction" title="Delete transaction" data-transno="' +
            v.transaction_number +
            '">delete</span>';
          html += "</td>";
          html += "</tr>";
        });

        $("#tbl-customers > tbody").html(html);
      }

      $("#tbl-customers").DataTable({
        scrollX: true,
      });
    },
  });
}
