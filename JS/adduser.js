/*----------------------------------- Add Customer -----------------------------------*/

$(document).on("submit", "#addCustomer", function (e) {
  e.preventDefault();
  var formData = new FormData(this);
  formData.append("add_customer", true);

  $.ajax({
    type: "POST",
    url: "addcustomerQuery.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 422) {
        $("#errorMessage").removeClass("d-none");
        $("#errorMessage").text(res.message);
      } else if (res.status == 200) {
        $("#errorMessage").addClass("d-none");
        $("#completeModal").modal("hide");
        $("#addCustomer")[0].reset();
        alertify.set("notifier", "position", "top-right");
        alertify.success(res.message);
        $("#myTable").load(location.href + " #myTable");
      }
    },
  });
});
function myFunction() {
  document.getElementById("addCustomer").reset();
}

/*----------------------------------- Edit Customer -----------------------------------*/

$(document).on("click", ".updateBtn", function () {
  var customer_id = $(this).attr("dataid");
  $("#customer_id").val(customer_id);

  // console.log($(this).attr("dataid"));
  $.ajax({
    type: "POST",
    dataType: "JSON",
    data: { customer_id: customer_id },
    url: "addcustomerQuery.php?customer_id=" + customer_id,
    success: function (data) {
      $("#UcompleteName").val(data.UcompleteName);
      $("#UcompleteEmail").val(data.UcompleteEmail);
      $("#UcompleteContact").val(data.UcompleteContact);
      $("#UcompleteAddress").val(data.UcompleteAddress);
      $("#UcompleteDate").val(data.UcompleteDate);
    },
  });
});

/*--------------------------------- Update Customer ---------------------------------*/

$(document).on("submit", "#updateCustomer", function (e) {
  e.preventDefault();
  var formData = new FormData(this);

  formData.append("update_customer", true);

  $.ajax({
    type: "POST",
    url: "addcustomerQuery.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      var res = jQuery.parseJSON(response);

      if (res.status == 422) {
        $("#errorMessageUpdate").removeClass("d-none");
        $("#errorMessageUpdate").text(res.message);
      } else if (res.status == 200) {
        $("#errorMessageUpdate").addClass("d-none");
        alertify.set("notifier", "position", "top-right");
        alertify.success(res.message);
        $("#UpdateModal").modal("hide");

        $("#myTable").load(location.href + " #myTable");
      }
    },
  });
});

/*--------------------------------- Delete Customer ---------------------------------*/
$(document).on("click", ".delteBtn", function () {
  var customer_id = $(this).attr("delete_id");
  $("#delete_id").val(customer_id);

  // console.log($(this).attr("dataid"));
  $(document).on("submit", "#deleteID", function () {
    $.ajax({
      type: "POST",
      url: "addcustomerQuery.php",
      data: {
        delete_customer: true,
        customer_id: customer_id,
      },
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 500) {
          alert(res.message);
        } else {
          alertify.set("notifier", "position", "top-right");
          alertify.success(res.message);
          $("#deleteModal").modal("hide");
          $("#myTable").load(location.href + " #myTable");
        }
      },
    });
  });
});
