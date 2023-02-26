<?php
include "Connections/dbconnect.php";
// Update Query

if(isset($_POST['update_product']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
    $name = mysqli_real_escape_string($con, $_POST['productName']);
    $quantity = mysqli_real_escape_string($con, $_POST['productQuantity']);
   
    $price2 = mysqli_real_escape_string($con, $_POST['productPrice2']);
    $price3 = mysqli_real_escape_string($con, $_POST['productPrice3']);
    $price4 = mysqli_real_escape_string($con, $_POST['productPrice4']);

    if($name == NULL || $quantity == NULL  || $price2 == NULL || $price3 == NULL || $price4 == NULL){
        $res = "All field are mandatory";
        // $res = [
        //     'status' => 422,
        //     'message' => "All field are mandatory"
        // ];
        // echo json_encode($res);
        // return false;
    }else{
        $sql="UPDATE `products` SET name='$name', quantity='$quantity', price_250g='$price2',price_500g='$price3',price_1kg='$price4' WHERE id='$product_id'";
 
        $query_run=mysqli_query($con,$sql);
    
        if($query_run){

            $res = "Product Updated Successfully";
            // $res = [
            //     'status' => 200,
            //     'message' => "Product Updated Successfully"
            // ];
            // echo json_encode($res);
            // return false;
         
        }
        else{
           $res = "Product Not Updated";
            // $res = [
            //     'status' => 500,
            //     'message' => "Product Not Updated"
            // ];
            // echo json_encode($res);
            // return false;
        }

    }
echo json_encode(array("status" => $res));

   


}
?>