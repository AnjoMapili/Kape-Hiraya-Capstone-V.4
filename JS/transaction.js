var selectedItem = {
  qty: 0,
  uom: "",
  price_250g: 0.0,
  price_500g: 0.0,
  price_1kg: 0.0,
};

var itemsCollection = [];
var isPrinting = false;

$(document).ready(function () {
  transactions();

  $(document).on("click", ".btn-create-sales", function () {
    $("#TransactionModal").modal({
      backdrop: "static",
      keyboard: false,
    });
  });

  $(document).on("change", ".sel-flavor-item", function () {
    var price_250g = $(this).find("option:selected").data("price_250g");
    var price_500g = $(this).find("option:selected").data("price_500g");
    var price_1kg = $(this).find("option:selected").data("price_1kg");

    selectedItem.price_250g = price_250g;
    selectedItem.price_500g = price_500g;
    selectedItem.price_1kg = price_1kg;

    calculation();
  });

  $(document).on("change", ".sel-measurement", function () {
    var newUOM = $(this).val();
    selectedItem.uom = newUOM;
    calculation();
  });

  $(document).on("change", ".txt-quantity", function () {
    var newQTY = $(this).val();
    selectedItem.qty = parseInt(newQTY);
    calculation();
  });

  $(document).on("change", ".customer-name", function () {
    var address = $(this).find("option:selected").data("address");
    var contact = $(this).find("option:selected").data("contact");

    $(".txt-address").val(address);
    $(".txt-contact-number").val(contact);
  });

  $(document).on("click", ".add-more-item", function () {
    var selFlavorItem = $(".sel-flavor-item").val();
    var selRoastItem = $(".sel-roast-item").val();
    var selGrindItem = $(".sel-grind-item").val();
    var txtQuantity = $(".txt-quantity").val();
    var selMeasurement = $(".sel-measurement").val();
    var txtPrice = $(".txt-price").val();

    if (
      selFlavorItem === "" ||
      selRoastItem === "" ||
      selGrindItem === "" ||
      txtQuantity === "" ||
      selMeasurement === "" ||
      txtPrice === ""
    ) {
      alertify.set("notifier", "position", "top-right");
      alertify.error("Please fill out all fields.");
      return;
    }

    itemsCollection.push({
      selFlavorItem: selFlavorItem,
      selRoastItem: selRoastItem,
      selGrindItem: selGrindItem,
      txtQuantity: parseInt(txtQuantity),
      selMeasurement: selMeasurement,
      txtPrice: parseFloat(txtPrice),
    });

    listOfItemsCollection();

    $(".sel-flavor-item").val("--select--");
    $(".sel-roast-item").val("--select--");
    $(".sel-grind-item").val("--select--");
    $(".txt-quantity").val("");
    $(".sel-measurement").val("--select--");
    $(".txt-price").val("");

    reset();
  });

  $(document).on("click", "#btn-submit-item", function (e) {
    e.preventDefault();

    var customer_payment_method = $(".sel-payment-method").val();
    var customer_name = $(".sel-customer-name").val();
    var customer_address = $(".txt-address").val();
    var customer_contact_number = $(".txt-contact-number").val();

    if (
      customer_payment_method === "" ||
      customer_name === "" ||
      customer_address === "" ||
      customer_contact_number === ""
    ) {
      alertify.set("notifier", "position", "top-right");
      alertify.error("Please fill out all fields.");
      return;
    }

    var items = JSON.stringify(itemsCollection);

    $.ajax({
      url: "transaction_add.php",
      type: "POST",
      dataType: "text",
      data: {
        action: "submit",
        customer_payment_method: customer_payment_method,
        customer_name: customer_name,
        customer_address: customer_address,
        customer_contact_number: customer_contact_number,
        data: items,
      },
      success: function (data) {
        var json = $.parseJSON(data);
        if (json == null) return false;

        if (json.status == 200) {
          $("#TransactionModal").modal("hide");
          itemsCollection = [];

          alertify.set("notifier", "position", "top-right");
          alertify.success(json.message);

          setTimeout(() => {
            location.reload();
          }, 1000);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR.status);
        console.log(textStatus);
        console.log(errorThrown);
      },
    });
  });

  $(document).on("click", ".btn-close-mdl", function () {
    $("#TransactionModal").modal("hide");
    $("#mdl-view-details").modal("hide");

    reset();
    itemsCollection = [];
  });

  $(document).on("click", ".btn-close-print-mdl", function () {
    if (isPrinting) {
      location.reload();
    }

    $("#mdl-view-details").modal("hide");

    reset();
    itemsCollection = [];
  });

  $(document).on("click", ".spn-trash-collection", function () {
    var index = $(this).data("index");
    if (itemsCollection.length === 1) {
      itemsCollection.pop();
    } else {
      itemsCollection.splice(index, 1);
    }

    $(".tr-" + index).remove();
    listOfItemsCollection();

    alertify.set("notifier", "position", "top-right");
    alertify.success("Item successfully deleted");
  });

  $(document).on("click", ".spn-view-transaction", function () {
    $("#mdl-view-details").modal({
      backdrop: "static",
      keyboard: false,
    });

    var trans_no = $(this).data("transno");
    detailedTransaction(trans_no);
  });

  $(document).on("click", ".btn-print-mdl", function () {
    isPrinting = true;
    var printContents = document.getElementById(
      "dv-detail-mdl-body-print"
    ).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  });

  $(document).on("click", ".spn-trash-transaction", function () {
    var trans_no = $(this).data("transno");
    console.log(trans_no);

    $.ajax({
      url: "transaction_delete.php",
      type: "POST",
      dataType: "text",
      data: {
        action: "delete",
        trans_no: trans_no,
      },
      success: function (data) {
        var json = $.parseJSON(data);
        if (json == null) return false;

        if (json.status == 200) {
          alertify.set("notifier", "position", "top-right");
          alertify.success(json.message);

          setTimeout(() => {
            location.reload();
          }, 1000);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR.status);
        console.log(textStatus);
        console.log(errorThrown);
      },
    });
  });
});

function calculation() {
  switch (selectedItem.uom) {
    case "250G":
      var newPrice = selectedItem.price_250g;
      break;

    case "500G":
      var newPrice = selectedItem.price_500g;
      break;

    case "1KG":
      var newPrice = selectedItem.price_1kg;
      break;

    default:
      var newPrice = 0;
      break;
  }

  // Traditional if statement

  // if (selectedItem.qty <= 0) {
  //   $(".txt-price").val("0.00");
  // } else {
  //   $(".txt-price").val(newPrice * selectedItem.qty);
  // }

  // Simple condition | ternary operator
  // .toFixed(2) = Add tayo ng decimal (2 decimal)
  $(".txt-price").val(
    selectedItem.qty <= 0 ? 0.0 : (newPrice * selectedItem.qty).toFixed(2)
  );
}

function detailedTransaction(trans_no) {
  var html_a = "";
  var html_b = "";
  var total_qty = 0;
  var total_price = 0;

  $.ajax({
    url: "transaction_list.php?trans_no=" + trans_no,
    type: "GET",
    dataType: "text",
    beforeSend: function () {},
    success: function (data) {
      var json = $.parseJSON(data);
      if (json == null) return false;

      if (json.status == 200) {
        $.each(json.data, function (k, v) {
          total_price += parseFloat(v.item_price);
          total_qty += parseInt(v.item_quantity);

          html_b += "<tr>";
          html_b += '<td class="text-center">' + (k + 1) + "</td>";
          html_b += '<td class="text-center">' + v.item_flavor + "</td>";
          html_b += '<td class="text-center">' + v.item_type_of_roast + "</td>";
          html_b += '<td class="text-center">' + v.item_type_of_grind + "</td>";
          html_b += '<td class="text-center">' + v.item_quantity + "</td>";
          html_b += '<td class="text-center">' + v.item_grams + "</td>";
          html_b +=
            '<td class="text-end">' + formatCurrency(v.item_price) + "</td>";
          html_b += "</tr>";
        });
        html_b +=
          '<tr style="font-weight: bold; background-color: #047272; color: #fff;"><td colspan="4">&nbsp;</td><td class="text-center">' +
          total_qty +
          '</td><td colspan="2" class="text-end">' +
          formatCurrency(total_price) +
          "</td></tr>";

        html_a += "<tr>";
        html_a +=
          '<td class="text-center">' +
          json.data[0].transaction_number +
          "</td>";
        html_a +=
          '<td class="text-center">' + json.data[0].customer_name + "</td>";
        html_a +=
          '<td class="text-center">' + json.data[0].customer_address + "</td>";
        html_a +=
          '<td class="text-center">' +
          json.data[0].customer_contact_number +
          "</td>";
        html_a +=
          '<td class="text-center">' +
          json.data[0].customer_payment_method +
          "</td>";
        html_a +=
          '<td class="text-center">' + json.data[0].created_at + "</td>";
        // html_a +=     '<td class="text-center">' + total_qty + "</td>";
        // html_a +=     '<td class="text-end">' + formatCurrency(total_price) + "</td>";
        html_a += "</tr>";

        $("#tbl-detail-customer > tbody").html(html_a);
        $("#tbl-detail-items > tbody").html(html_b);
      }
    },
  });
}

function listOfItemsCollection() {
  var html = "";
  $.each(itemsCollection, function (k, v) {
    html += "<tr class='tr-" + k + "'>";
    html += "   <td>" + v.selFlavorItem + "</td>";
    html += "   <td>" + v.selRoastItem + "</td>";
    html += "   <td>" + v.selGrindItem + "</td>";
    html += "   <td class='text-center'>" + v.txtQuantity + "</td>";
    html += "   <td class='text-center'>" + v.selMeasurement + "</td>";
    html += "   <td class='text-end'>" + formatCurrency(v.txtPrice) + "</td>";
    html +=
      "   <td class='text-center'><span class='material-icons-outlined spn-trash-collection' title='Delete item' data-index='" +
      k +
      "'>delete</span></td>";
    html += "</td>";
  });

  $("#tbl-items > tbody").html(html);
  getTotalQuantity();
  getTotalPrice();
}

function getTotalQuantity() {
  var sum = 0;
  if (itemsCollection.length > 0) {
    sum = $.map(itemsCollection, function (obj) {
      return obj.txtQuantity;
    }).reduce(function (sum, value) {
      return sum + value;
    }, 0);
  }

  // return sum;
  $(".spn-qty").empty().append(sum.toLocaleString());
}

function getTotalPrice() {
  console.log("price: " + itemsCollection.length);
  var sum = 0;
  if (itemsCollection.length > 0) {
    sum = $.map(itemsCollection, function (obj) {
      return obj.txtPrice;
    }).reduce(function (sum, value) {
      return sum + value;
    }, 0);
  }

  var price = sum.toLocaleString(undefined, {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2,
  });

  $(".spn-price").empty().append(price);
}

function transactions() {
  var html = "";
  $.ajax({
    url: "transaction_list.php",
    type: "GET",
    dataType: "text",
    beforeSend: function () {},
    success: function (data) {
      var json = $.parseJSON(data);
      if (json == null) return false;

      if (json.status == 200) {
        $.each(json.data, function (k, v) {
          html += "<tr class='tr-trans-" + v.id + "'>";
          html += '<td class="text-center">' + v.transaction_number + "</td>";
          html += '<td class="text-center">' + v.customer_name + "</td>";
          html += '<td class="text-center">' + v.customer_address + "</td>";
          html +=
            '<td class="text-center">' + v.customer_contact_number + "</td>";
          html +=
            '<td class="text-center">' + v.customer_payment_method + "</td>";
          html += '<td class="text-center">' + v.created_at + "</td>";
          html += '<td class="text-center">' + v.total_quantity + "</td>";
          html +=
            '<td class="text-end">' + formatCurrency(v.total_price) + "</td>";
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

        $("#tbl-transactions > tbody").html(html);
      }

      $("#tbl-transactions").DataTable({
        scrollX: true,
      });
    },
  });
}

function formatCurrency(value, currency = "PHP") {
  const formatter = new Intl.NumberFormat(undefined, {
    style: "currency",
    currency,
    minimumFractionDigits: 2,
    maximumFractionDigits: 2,
  });
  return formatter.format(value);
}

function reset() {
  selectedItem.qty = 0;
  selectedItem.uom = "";
  selectedItem.price_250g = 0.0;
  selectedItem.price_500g = 0.0;
  selectedItem.price_1kg = 0.0;
}
