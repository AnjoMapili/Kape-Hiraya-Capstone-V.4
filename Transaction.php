<?php
include "Connections/dbconnect.php";
?>

<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet" />
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/> 
      <link rel="stylesheet" href="CSS/transaction.css" />
<div class="grid-container"> 
    <?php
        include "templates/header.php";
        include "templates/sidebar.php";
    ?>     
    
        <!-- Main -->    
    
    <main class="main-container">
    <!-- <div class="scroll">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper diam at erat pulvinar, at pulvinar felis blandit. Vestibulum volutpat tellus diam, consequat gravida libero rhoncus ut.</div> -->
    <?php
      include "templates/dropdownlist.php";
      ?>
    
  
    

  <div class="container-fluid px-4">
    <h2 class="mt-4">Transactions</h2>
   
  
<!-- Modal Fade Add Customer Customer Form -->
<div class="modal fade" id="TransactionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content ">
      <div class="modal-header " style="color:black;">
        <h4 class="modal-title" id="exampleModalLabel" >Add Sales</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

  
      <!-- Modal Body -->
<div class="modal-body" style="color:black">

<div class="col-12 mt-4">
    <label for="titleInfo" class="form-label"><H3>CUSTOMER INFORMATION</H3></label>
  </div>

<form name="my-form" class="row g-3">
  
  <div class="col-md-6">
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control" id="inputDate">
  </div>
  <div class="col-md-6">
    <label for="inputPayment" class="form-label">Payment Method</label>
    <select name="payment" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
    <option selected>--Select--</option>    
    <option value="1">Cash</option>
    <option value="2">Gcash</option>
    
   </select>

  </div>
  <div class="col-md-4">
    <label for="name" class="form-label">Name</label>
    <select name='customer' class='customer-name form-control fs-5' aria-label='Default select example'>
        <option disabled selected>--select--</option>
        <?php
          $sql = "SELECT * FROM customers
          ";
          $result = $con->query($sql);
        
          if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            
          ?>
          <option value="<?=$row['id']?>" data-address="<?=$row['address']?>" data-contact="<?=$row['contact']?>"><?=$row['name']?></option>
          <?php }
          }
          ?>
          </select>
  </div>
  <div class="col-md-4">
    <label for="inputEmail4" class="form-label">Address</label>
    <input type="email" class="form-control txt-address" id="inputEmail4" placeholder="Enter your address">
  </div>
    
  <div class="col-md-4 mb-4">
    <label for="inputAddress" class="form-label">Contact #</label>
    <input type="text" class="form-control txt-contact" id="inputAddress" placeholder="Enter your contact number">
  </div>
  <hr style="height:1px;border-width:0;color:black;background-color:black;margin-top:20px;margin-bottom:40px;">
  <div class="col-12">
    <label for="inputAddress2" class="form-label"><H3>ITEM INFORMATION</H3></label>
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
        
      
        if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
        
          
        ?>
        <option 
          value="<?=$row['name']?>" 
          data-price_250g="<?=$row['price_250g']?>"
          data-price_500g="<?=$row['price_500g']?>"
          data-price_1kg="<?=$row['price_1kg']?>"
        >
          <?=$row['name']?>
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
          
            if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              
            ?>
            <option value="<?=$row['name']?>"><?=$row['name']?></option>
            <?php }
            }
            ?>
        </select>
      </th>
      <th scope="col">
       <div class="mb-2" > Type of Grind</div>
        <select name='roast' class='sel-grind-item form-control fs-5' aria-label='Default select example'>
        <option disabled selected>--select--</option>
        <?php
          $sql = "SELECT * FROM  typeofgrind
          ";
          $result = $con->query($sql);
        
          if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
           
          ?>
          <option value="<?=$row['name']?>"><?=$row['name']?></option>
          <?php }
          }
          ?>
          </select>
      </th>
      <th scope="col">
       <div class="mb-2"> Quantity</div>
        <div class="input-group">
    <input type="number" min="0" class="form-control txt-quantity" placeholder="Quantity" aria-label="Recipient's username" aria-describedby="basic-addon2"></div>
      </th>
      <th scope="col">
       <div class="mb-2"> Grams</div>
       <select name='roast' class='sel-measurement form-control fs-5' aria-label='Default select example'>
        <option disabled selected>--select--</option>
        <?php
          $sql = "SELECT * FROM  uom
          ";
          $result = $con->query($sql);
        
          if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
           
          ?>
          <option value="<?=$row['name']?>"><?=$row['name']?></option>
          <?php }
          }
          ?>
          </select> 
         
      </th>
      <th scope="col">
       <div class="mb-2 ml-0">Price</div> 
       <div class="input-group">
    <input type="text" class="form-control txt-price" placeholder="Price" aria-label="Recipient's username" aria-describedby="basic-addon2"></div>
      </th>
      <th scope="col">
      <div class="mb-2">Input Item</div>
      <button type="button" class="add-more-item btn btn-info btn-sm">Add Item</button>
      </th>
      
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td colspan="7" class="text-center ">No items available.</td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="7" style="font-weight: bold;">Total Qty: <span class="spn-qty">0</span> | Total Price: ₱<span class="spn-price">0.00</span></td>
    </tr>
  </tfoot>
</table>

 


</div>
<!-- Modal Footer -->
<div class="modal-footer">
        <button type="submit" value="Submit" class="btn btn-success">sumbit</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"onclick="myFunction()" value="Reset form">close</button>
 
      </div> 
</form>   
      </div>                                
    </div>
  </div>
       <!-- Add Customer button Modal -->
<button type="button" id="btncustomer" class="btn btn-dark my-3" data-bs-toggle="modal" data-bs-target="#TransactionModal">
  Add Sales

</button>


</main>
<!-- End Main -->
        
</div>


<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script src="JS/transaction.js"></script>


      