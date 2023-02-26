var selectedItem = {
  qty: 0,
  uom: "",
  price_250g: 0.0,
  price_500g: 0.0,
  price_1kg: 0.0,
};

var itemsCollection = [];

$(document).ready(function () {
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
    $(".txt-contact").val(contact);
  });

  $(document).on("click", ".add-more-item", function () {
    var selFlavorItem = $(".sel-flavor-item").val();
    var selRoastItem = $(".sel-roast-item").val();
    var selGrindItem = $(".sel-grind-item").val();
    var txtQuantity = $(".txt-quantity").val();
    var selMeasurement = $(".sel-measurement").val();
    var txtPrice = $(".txt-price").val();

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

    resetSelectedItemsForm();
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

function listOfItemsCollection() {
  var html = "";
  $.each(itemsCollection, function (k, v) {
    html += "<tr>";
    html += "   <td>" + v.selFlavorItem + "</td>";
    html += "   <td>" + v.selRoastItem + "</td>";
    html += "   <td>" + v.selGrindItem + "</td>";
    html += "   <td>" + v.txtQuantity + "</td>";
    html += "   <td>" + v.selMeasurement + "</td>";
    html += "   <td>" + v.txtPrice + "</td>";
    html += "</td>";
  });

  $("#tbl-items > tbody").html(html);
  getTotalQuantity();
  getTotalPrice();
}

function getTotalQuantity() {
  var sum = $.map(itemsCollection, function (obj) {
    return obj.txtQuantity;
  }).reduce(function (sum, value) {
    return sum + value;
  }, 0);

  // return sum;
  $(".spn-qty").empty().append(sum.toLocaleString());
}

function getTotalPrice() {
  var sum = $.map(itemsCollection, function (obj) {
    return obj.txtPrice;
  }).reduce(function (sum, value) {
    return sum + value;
  }, 0);

  var price = sum.toLocaleString(undefined, {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2,
  });

  $(".spn-price").empty().append(price);
}

function resetSelectedItemsForm() {
  selectedItem.qty = 0;
  selectedItem.uom = "";
  selectedItem.price_250g = 0.0;
  selectedItem.price_500g = 0.0;
  selectedItem.price_1kg = 0.0;
}

// let form = document.forms["my-form"];
// let menu = form.flavor;
// let options = form.flavor.options;

// // menu.disabled = true;
// // menu.required = true;
// options[0].selected = true;
// menu.onchange = function () {
//   let optionValue = this.value;
//   // document.body.remove();
//   optionText = this[this.selectedIndex].innerText;
//   // let index = this.selectedIndex;
//   // optionText = this.options[index].innerText;
//   console.log(optionText);
// };

// if (document.readyState == "loading") {
//   document.addEventListener("DOMContentLoaded", ready);
// } else {
//   ready();
// }
// function ready() {
//   const select = document.querySelector(".flavor-item");
//   const button = document.querySelector(".add-more-item");

//   button.addEventListener("click", function () {
//     localStorage.setItem("lastname", "Smith");
//     document.getElementById("paste-item").innerHTML =
//       localStorage.getItem("lastname");
//     console.log(select.value);
//   });
// }

// var addItemButtons = document.getElementsByClassName("add-more-item");
// for (var i = 0; i < addItemButtons.length; i++) {
//   var button = addItemButtons[i];
//   button.addEventListener("click", addItemClicked);
// }
// function addItemClicked(event) {
//   var button = event.target;
//   var flavorItem = button.parentElement.parentElement;
//   var flavor = flavorItem.getElementsByClassName("flavor-item")[0].innerText;
//   console.log(flavor);
// }
