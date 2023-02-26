<?php
include "Connections/dbconnect.php";
?>
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet" />
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/> 
<div class="grid-container"> 
<?php
        include "templates/header.php";
        include "templates/sidebar.php";
    ?>     

        <!-- Main -->    
    <main class="main-container">
 <?php
      include "templates/dropdownlist.php";
      ?>

      <!-- Delete Modal -->

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="color:black">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
        <form id="deleteID">
      <input type="hidden" name="delete_id" id="delete_id">
        <h4>Are you sure you want to delete this data?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class=" btn btn-danger">Delete</button>
      </div>
</form>
    </div>
  </div>
</div>
      <!-- Modal Fade Add Product Form -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:black;">
        <h5 class="modal-title fs-5" id="exampleModalLabel" >Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
 <div class="modal-body" style="color:black;">
 <div id="errorMessage"class="alert alert-warning d-none"></div>
  <form id="addProduct">
  <div class="mb-3">
    <label for="productName" class="form-label">Name</label>
    <input type="text" class="form-control" name="productName" aria-describedby="emailHelp" placeholder="Enter your name" > 
  </div>
  <div class="mb-3">
    <label for="productQuantity" class="form-label">Quantity</label>
    <input type="text" class="form-control"  name="productQuantity" aria-describedby="emailHelp" placeholder="Enter your quantity" > 
  </div>
  
  <div class="mb-3">
    <label for="productPrice2" class="form-label">Price (250g)</label>
    <input type="text" class="form-control" name="productPrice2" aria-describedby="emailHelp" placeholder="Enter your price" > 
  </div>
  <div class="mb-3">
    <label for="productPrice3" class="form-label">Price (500g)</label>
    <input type="text" class="form-control" name="productPrice3" aria-describedby="emailHelp" placeholder="Enter your price" > 
  </div>
  <div class="mb-3">
    <label for="productPrice4" class="form-label">Price (1000g)</label>
    <input type="text" class="form-control" name="productPrice4" aria-describedby="emailHelp" placeholder="Enter your price" > 
  </div>

 
</div>
<!-- Modal Footer -->
<div class="modal-footer">
        <button type="submit" class="btn btn-success" >Submit</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"onclick="myFunction()" value="Reset form">close</button>
        
      </div>   
      </form> 
      </div>                                
    </div>
  </div>

  <!-- Update Form -->
  <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:black;">
        <h5 class="modal-title fs-5" id="exampleModalLabel" >Edit Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
<div class="modal-body" style="color:black">
<form id=updateProduct> 
<div id="errorMessageUpdate"class="alert alert-warning d-none"></div>
<input type="hidden" name="product_id" id="product_id">

<div class="mb-3">
    <label for="productName" class="form-label">Name</label>
    <input type="text" class="form-control" name="productName"  id="UproductName"aria-describedby="emailHelp" placeholder="Enter your name" > 
  </div>
  <div class="mb-3">
    <label for="productQuantity" class="form-label">Quantity</label>
    <input type="text" class="form-control"  name="productQuantity" id="UproductQuantity" aria-describedby="emailHelp" placeholder="Enter your quantity" > 
  </div>
  <div class="mb-3">
    <label for="productPrice2" class="form-label">Price (250g)</label>
    <input type="text" class="form-control" name="productPrice2"  id="UproductPrice2"aria-describedby="emailHelp" placeholder="Enter your price" > 
  </div>
  <div class="mb-3">
    <label for="productPrice3" class="form-label">Price (500g)</label>
    <input type="text" class="form-control" name="productPrice3"  id="UproductPrice3"aria-describedby="emailHelp" placeholder="Enter your price" > 
  </div>
  <div class="mb-3">
    <label for="productPrice4" class="form-label">Price (1000g)</label>
    <input type="text" class="form-control" name="productPrice4"  id="UproductPrice4"aria-describedby="emailHelp" placeholder="Enter your price" > 
  </div>
</div>
<!-- Modal Footer -->
<div class="modal-footer">
        <button type="submit"  id="saveUpdate" class="btn btn-success">Update</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">close</button>
 
      </div> 
</form>   
      </div>                                
    </div>
  </div>

    <div class="container-fluid px-4">
    <h2 class="mt-4">PRODUCT LIST</h2>
   
  

       <!-- Add Customer button Modal -->
<button type="button" id="btncustomer" class="btn btn-dark my-3" data-bs-toggle="modal" data-bs-target="#productModal">
  Add Products

</button>
<div class="card-body my-3">
  <table id="myTable" class="table fs-5 text-white">
    <thead class="thead text-primary fs-4">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Quantity</th>
        
        <th>Price<br>(250g)</th>
        <th>Price<br>(500g)</th>
        <th>Price<br>(1kg)</th>
        <th>Operation</th>
        
      </tr>
    </thead>
    <tbody>
      <?php
       $sql="SELECT * FROM `products`";
       $result=mysqli_query($con,$sql);
       if(mysqli_num_rows($result) > 0){
          foreach($result as $product){
            ?>
               <tr>
        <td><?=$product['id'] ?></td>
        <td><?=$product['name'] ?></td>
        <td><?=$product['quantity'] ?></td>
       
        <td><?=$product['price_250g'] ?></td>
        <td><?=$product['price_500g'] ?></td>
        <td><?=$product['price_1kg'] ?></td>
        <td>
          
          
          <button type="button" id="getData" dataid="<?=$product['id']?>"  class="updateBtn btn btn-primary" data-bs-toggle="modal" data-bs-target="#UpdateModal">Edit</button>
        
          <button type="button"id="getData" delete_id="<?=$product['id']?>" class="delteBtn btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
          Delete
</button>
        </td>
      </tr>
            <?php
          }
       }
       
      ?>

      
    </tbody>
  </table>
</div>
    </main>
        <!-- End Main -->
</div>
<script
   src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" >
  </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    ></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="JS/product.js"></script>

      