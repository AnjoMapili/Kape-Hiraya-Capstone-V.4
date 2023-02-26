<?php
include "Connections/dbconnect.php";

if(isset($_POST['deletesend'])){
    $unique=$_POST ['deletesend'];

    $sql="DELETE FROM `products` WHERE id=$unique";
    $result=mysqli_query($con,$sql);
}
?>