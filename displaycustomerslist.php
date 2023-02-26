
<?php
include "Connections/dbconnect.php";


if(isset($_GET['displaySend'])){
     $table='<table class="table fs-5 text-white">
    <thead class="thead text-primary fs-4">
      <tr>
        <th scope="col">ID</th> 
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Contact</th>
        <th scope="col">Address</th>
        <th scope="col">Date</th>
        <th scope="col">Operations</th>
      </tr>
    </thead>';
    $sql="SELECT * FROM `customers`";
    $result=mysqli_query($con,$sql);
    $number=1;
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id']; 
        $name=$row['name'];  
        $email=$row['email']; 
        $contact=$row['contact']; 
        $address=$row['address']; 
        $date=$row['date']; 
        $table.='  <tr>
        
        <td scope="row">'.$number.'</td>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$contact.'</td>
        <td>'.$address.'</td>
        <td>'.$date.'</td>
        <td> 
  <button class="btn btn-primary"onclick="GetDetails('.$id.')">Update</button>
  <button class="btn btn-danger"onclick="getdeleteDetails('.$id.')">Delete</button>
  
</td>
      </tr>'; 
      $number++;
    }
    $table.='</table>';
    echo $table;
}

?>




