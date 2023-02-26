<?php
include "Connections/dbconnect.php";

if(isset($_POST['updateid'])){
  $user_id=$_POST['updateid'];

  $sql =  "SELECT * FROM `customers` WHERE id=$user_id";
  $result=mysqli_query($con,$sql);
  $response=array();
  while($row=mysqli_fetch_assoc($result)){
    $response=$row;
  }
  echo json_encode($response);
}else{
  $response ['status'] = 200;
  $response ['message']="Invalid or data not found";
}


// update query

if(isset($_POST['hiddendata'])){
  $uniqueid=$_POST['hiddendata'];
  $name=$_POST['updateName'];
  $email=$_POST['updateEmail'];
  $contact=$_POST['updateContact'];
  $address=$_POST['updateAddress'];
  $date=$_POST['updateDate'];

  $sql="UPDATE `customers` SET `name`='$name',`email`='$email',`contact`= '$contact',`address`='$address',`date`='$date' WHERE id=$uniqueid";
  
  mysqli_query($con,$sql);  
}
?>
