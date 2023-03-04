<?php
include "Connections/dbconnect.php";
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/dist/css/themes/bootstrap.min.css" /> -->
<link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="CSS/transaction.css" />
<div class="grid-container">
   <?php
   include "templates/header.php";
   include "templates/sidebar.php";
   ?>

   <!-- Main -->

   <main class="main-container">
      <?php include("templates/dropdownlist.php"); ?>

      <div class="container-fluid px-4">
         <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 mt-2 border-bottom">
            <h1 class="h2">Transactions</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
               <div class="btn-group mr-2">
                  <button class="btn btn-sm btn-secondary btn-create-sales">Create Sales</button>
               </div>
            </div>
         </div>

         <div class="my-3 p-3 shadow-sm tbl-container">
            <table id="tbl-transactions" class="display tbl-transactions" style="width:100%">
               <thead>
                  <tr>
                     <th class="text-center">Trans #</th>
                     <th class="text-center">Customer</th>
                     <th class="text-center">Delivery Address</th>
                     <th class="text-center">Contact No.</th>
                     <th class="text-center">Payment Method</th>
                     <th class="text-center">Date</th>
                     <th class="text-center">Total Qty</th>
                     <th class="text-right">Total Price</th>
                     <th class="text-right"></th>
                  </tr>
               </thead>
               <tbody>
               </tbody>
            </table>
         </div>

         <div class="modal fade" id="TransactionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
               <div class="modal-content ">
                  <div class="modal-header " style="color:black;">
                     <h4 class="modal-title" id="exampleModalLabel">Add Sales</h4>
                  </div>


                  <!-- Modal Body -->
                  <div class="modal-body" style="color:black">

                     <div class="col-12 mt-4">
                        <label for="titleInfo" class="form-label">
                           <H3>CUSTOMER INFORMATION</H3>
                        </label>
                     </div>

                     <form class="row g-3">

                        <div class="col-md-12">
                           <label for="inputPayment" class="form-label">Payment Method</label>
                           <select name="payment" class="form-select form-select-lg mb-3 sel-payment-method" aria-label=".form-select-lg example">
                              <option disabled selected>--select--</option>
                              <option value="Cash">Cash</option>
                              <option value="Gcash">Gcash</option>

                           </select>

                        </div>
                        <div class="col-md-4">
                           <label for="name" class="form-label">Name</label>
                           <select name='customer' class='customer-name form-control fs-5 sel-customer-name' aria-label='Default select example'>
                              <option disabled selected>--select--</option>
                              <?php
                              $sql = "SELECT * FROM customers
          ";
                              $result = $con->query($sql);

                              if ($result->num_rows > 0) {
                                 while ($row = $result->fetch_assoc()) {

                              ?>
                                    <option value="<?= $row['name'] ?>" data-address="<?= $row['address'] ?>" data-contact="<?= $row['contact'] ?>"><?= $row['name'] ?></option>
                              <?php }
                              }
                              ?>
                           </select>
                        </div>
                        <div class="col-md-4">
                           <label for="inputEmail4" class="form-label">Address</label>
                           <input type="email" class="form-control txt-address" readonly id="inputEmail4" placeholder="Enter your address">
                        </div>

                        <div class="col-md-4 mb-4">
                           <label for="inputAddress" class="form-label">Contact #</label>
                           <input type="text" class="form-control txt-contact-number" readonly id="inputAddress" placeholder="Enter your contact number">
                        </div>
                        <hr style="height:1px;border-width:0;color:black;background-color:black;margin-top:20px;margin-bottom:40px;">
                        <div class="col-12">
                           <label for="inputAddress2" class="form-label">
                              <H3>ITEM INFORMATION</H3>
                           </label>
                        </div>
                        <table class="table mt-0 fs-5" id="tbl-items">
                           <thead>
                              <tr>
                                 <th scope="col">
                                    <div class="mb-2">Flavor</div>
                                    <select name='flavor' class='sel-flavor-item form-control fs-5' aria-label='Default select example'>
                                       <option disabled selected>--select--</option>
                                       <?php
                                       $sql = "SELECT * FROM products";
                                       $result = $con->query($sql);


                                       if ($result->num_rows > 0) {
                                          while ($row = $result->fetch_assoc()) {


                                       ?>
                                             <option value="<?= $row['name'] ?>" data-price_250g="<?= $row['price_250g'] ?>" data-price_500g="<?= $row['price_500g'] ?>" data-price_1kg="<?= $row['price_1kg'] ?>">
                                                <?= $row['name'] ?>
                                             </option>

                                       <?php }
                                       }
                                       ?>
                                    </select>
                                 </th>
                                 <th scope="col">
                                    <div class="mb-2">Type of Roast</div>
                                    <select name='roast' class='sel-roast-item form-control fs-5' aria-label='Default select example'>
                                       <option disabled selected>--select--</option>
                                       <?php
                                       $sql = "SELECT * FROM  typeofroast
            ";
                                       $result = $con->query($sql);

                                       if ($result->num_rows > 0) {
                                          while ($row = $result->fetch_assoc()) {

                                       ?>
                                             <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
                                       <?php }
                                       }
                                       ?>
                                    </select>
                                 </th>
                                 <th scope="col">
                                    <div class="mb-2"> Type of Grind</div>
                                    <select name='grind' class='sel-grind-item form-control fs-5' aria-label='Default select example'>
                                       <option disabled selected>--select--</option>
                                       <?php
                                       $sql = "SELECT * FROM  typeofgrind
          ";
                                       $result = $con->query($sql);

                                       if ($result->num_rows > 0) {
                                          while ($row = $result->fetch_assoc()) {

                                       ?>
                                             <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
                                       <?php }
                                       }
                                       ?>
                                    </select>
                                 </th>
                                 <th scope="col">
                                    <div class="mb-2"> Quantity</div>
                                    <div class="input-group">
                                       <input type="number" min="0" class="form-control txt-quantity" placeholder="Quantity" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    </div>
                                 </th>
                                 <th scope="col">
                                    <div class="mb-2"> Grams</div>
                                    <?php
                                    $selected = "--select--";
                                    $options = array('','250G', '500G', '1KG');


                                    echo "<select name='grams' class='sel-measurement form-control fs-5' aria-label='Default select example'>";
                                    echo"<option disabled selected>--select--</option";
                                    foreach ($options as $option) {
                                       if ($selected == $option) {
                                          echo "<option selected = 'selected' value='$option'>$option</option>";
                                       } else {
                                          echo "<option value='$option'>$option</option>";
                                       }
                                    }
                                    echo "</select>";
                                    ?>
                                 </th>
                                 <th scope="col">
                                    <div class="mb-2 ml-0">Price</div>
                                    <div class="input-group">
                                       <input type="text" readonly class="form-control txt-price" placeholder="Price" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    </div>
                                 </th>
                                 <th scope="col">
                                    <div class="mb-2">Input Item</div>
                                    <button type="button" class="add-more-item btn btn-info btn-sm">Add Item</button>
                                 </th>

                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td colspan="7" class="text-center">No items available.</td>
                              </tr>
                           </tbody>
                        </table>




                  </div>
                  </form>
                  <!-- Modal Footer -->
                  <div class="modal-footer justify-content-between">
                     <div style="color: #000;">Total Quantity: <span class="spn-qty">0</span> | Total Price: ₱<span class="spn-price">0.00</span></div>
                     <div>
                        <button type="submit" value="Submit" class="btn btn-success" id="btn-submit-item">Sumbit</button>
                        <button type="button" class="btn btn-secondary btn-close-mdl" value="Close">Close</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>

        
   </main>

   <div class="modal fade" id="mdl-view-details" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
               <div class="modal-content ">
                  <div class="modal-header" style="color:black;">
                     <h4 class="modal-title" id="exampleModalLabel">Detailed Transaction</h4>
                  </div>

                  <!-- Modal Body -->
                  <div class="modal-body" id="dv-detail-mdl-body-print" style="color:black">

                     <div class="dv-head">Customer Information</div>

                     <table class="table" id="tbl-detail-customer">
                        <thead>
                           <tr>
                              <th class="text-center">Trans #</th>
                              <th class="text-center">Customer</th>
                              <th class="text-center">Delivery Address</th>
                              <th class="text-center">Contact No.</th>
                              <th class="text-center">Payment Method</th>
                              <th class="text-center">Date</th>
                              <!-- <th class="text-center">Total Qty</th> -->
                              <!-- <th class="text-end">Total Price</th> -->
                           </tr>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>

                     <div class="dv-head" style="margin-top: 30px;">List of items</div>

                     <table class="table" id="tbl-detail-items">
                        <thead>
                           <tr>
                              <th class="text-center">#</th>
                              <th class="text-center">Flavor</th>
                              <th class="text-center">Type of Roast</th>
                              <th class="text-center">Type of Grind</th>
                              <th class="text-center">Quantity</th>
                              <th class="text-center">Grams</th>
                              <th class="text-end">Price</th>
                           </tr>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>
                  </div>

                  <!-- Modal Footer -->
                  <div class="modal-footer border-0">
                     <button type="button" class="btn btn-secondary btn-close-print-mdl" value="Close">Close</button>
                     <button type="button" class="btn btn-outline-secondary btn-print-mdl" value="Print">Print</button>
                  </div>
               </div>
            </div>
         </div>
   <!-- End Main -->

</div>


<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

<script src="JS/transaction.js"></script>