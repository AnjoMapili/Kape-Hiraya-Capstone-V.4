<?php
include "Connections/dbconnect.php";
?>

<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet" />
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/> 
<link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="CSS/transaction.css" />
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
    
  <!-- Modal Fade Add Customer Customer Form -->
<div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:black;">
        <h5 class="modal-title fs-5" id="exampleModalLabel" >New Customers Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
<div class="modal-body" style="color:black">
 <form id="addCustomer">

<div id="errorMessage"class="alert alert-warning d-none"></div>
  <div class="mb-3">
    <label for="Name" class="form-label">Name</label>
    <input type="text" class="form-control" name="completeName" aria-describedby="emailHelp" placeholder="Enter your name"  > 
   
  </div>
  <div class="mb-3">
    <label for="Email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="completeEmail" aria-describedby="emailHelp" placeholder="Enter your email" > 
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
   
  </div>
  <div class="mb-3">
    <label for="Contact" class="form-label">Contact #</label>
    <input type="text" class="form-control" name="completeContact" aria-describedby="emailHelp" placeholder="Enter your contact number" >
    
  </div>
  <div class="mb-3">
    <label for="Address" class="form-label">Address</label>
    <input type="text" class="form-control" name="completeAddress" aria-describedby="emailHelp" placeholder="Enter your Address" >
   
  </div>
  <div class="mb-3">
    <label for="Date" class="form-label">Date</label>
    <input type="date" class="form-control" name="completeDate" aria-describedby="emailHelp" placeholder="Enter your birthdate"> 
    
  </div>
</div>
<!-- Modal Footer -->
<div class="modal-footer">
        <button type="submit" class="btn btn-success">sumbit</button>
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
<form id=updateCustomer> 
<div id="errorMessageUpdate"class="alert alert-warning d-none"></div>
<input type="hidden" name="customer_id" id="customer_id">

  <div class="mb-3">
    <label for="Name" class="form-label">Name</label>
    <input type="text" class="form-control" name="completeName" id="UcompleteName" aria-describedby="emailHelp" placeholder="Enter your name"  > 
   
  </div>
  <div class="mb-3">
    <label for="Email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="completeEmail" id="UcompleteEmail" aria-describedby="emailHelp" placeholder="Enter your email" > 
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
   
  </div>
  <div class="mb-3">
    <label for="Contact" class="form-label">Contact #</label>
    <input type="text" class="form-control" name="completeContact" id="UcompleteContact" aria-describedby="emailHelp" placeholder="Enter your contact number" >
    
  </div>
  <div class="mb-3">
    <label for="Address" class="form-label">Address</label>
    <input type="text" class="form-control" name="completeAddress" id="UcompleteAddress" aria-describedby="emailHelp" placeholder="Enter your Address" >
   
  </div>
  <div class="mb-3">
    <label for="Date" class="form-label">Date</label>
    <input type="date" class="form-control" name="completeDate" id="UcompleteDate" aria-describedby="emailHelp" placeholder="Enter your birthdate"> 
    
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
    

  <div class="container-fluid px-4">
    <h2 class="mt-4">CUSTOMERS LIST</h2>
   
  

       <!-- Add Customer button Modal -->
<button type="button" id="btncustomer" class="btn btn-dark my-3" data-bs-toggle="modal" data-bs-target="#completeModal">
  Add New Customers

</button>

<div class="my-3 p-3 shadow-sm tbl-container">
  <table id="tbl-customers" class="display tbl-transactions" style="width:100%">
      <thead>
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">Name</th>
          <th class="text-center">Email</th>
          <th class="text-center">Contact</th>
          <th class="text-center">Address</th>
          <th class="text-center">Date</th>
          <th class="text-center">Operation</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
  </table>
</div>


    </thead>
  
  </table>
</div>
</main>
<!-- End Main -->
        
</div>


<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

<script src="JS/adduser.js"></script>
<script src="JS/customer.js"></script>


      