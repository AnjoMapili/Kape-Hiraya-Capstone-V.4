
<?php
include "Connections/dbconnect.php";


if(isset($_GET['displaySend'])){
     $table='<table class="table fs-5 text-white">
    <thead class="thead text-primary fs-4">
      <tr>
        <th scope="col">ID</th> 
        <th scope="col">Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price<br>(250g)</th>
        <th scope="col">Price<br>(500g)</th>
        <th scope="col">Price<br>(1kg)</th>
        <th scope="col">Operations</th>
      </tr>
    </thead>';
    $sql="SELECT * FROM `products`";
    $result=mysqli_query($con,$sql);
    $number=1;
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id']; 
        $name=$row['name'];  
        $quantity=$row['quantity']; 
        $price1=$row['price_250g']; 
        $price2=$row['price_500g']; 
        $price3=$row['price_1kg']; 
        // $price4=$row['price4']; 
        $table.='  <tr>
        <td scope="row">'.$number.'</td>
        <td>'.$name.'</td>
        <td>'.$quantity.'</td>
        <td>'.$price1.'</td>
        <td>'.$price2.'</td>
        <td>'.$price3.'</td>
        <td> 
  <button class="btn btn-primary"onclick="GetProductDetais('.$id.')">Update</button>
  <button class="btn btn-danger"onclick="DeleteUser('.$id.')">Delete</button>
  
</td>
      </tr>'; 
      $number++;
    }
    $table.='</table>';
    echo $table;
}

?>




