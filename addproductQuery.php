<?php
include "Connections/dbconnect.php";

// Delete Query

if(isset($_POST['delete_product'])){
    $product_id = mysqli_real_escape_string($con,$_POST['product_id']);

    $sql="DELETE FROM `products` WHERE id='$product_id'";
    $result = mysqli_query($con,$sql);

    if($result){
        $res = [
            'status' => 200,
            'message' => "Customer Deleted Successfully"
        ];
        echo json_encode($res);
        return false;
    }
    else{
        $res = [
            'status' => 500,
            'message' => "Customer Not Deleted"
        ];
        echo json_encode($res);
        return false;
    }

}
// Add Customer Query

if(isset($_POST['add_product']))
{
    
    $name = mysqli_real_escape_string($con, $_POST['productName']);
    $quantity = mysqli_real_escape_string($con, $_POST['productQuantity']);
  
    $price2 = mysqli_real_escape_string($con, $_POST['productPrice2']);
    $price3 = mysqli_real_escape_string($con, $_POST['productPrice3']);
    $price4 = mysqli_real_escape_string($con, $_POST['productPrice4']);

    if($name == NULL || $quantity == NULL  || $price2 == NULL || $price3 == NULL|| $price4 == NULL){
        $res = [
            'status' => 422,
            'message' => "All field are mandatory"
        ];
        echo json_encode($res);
        return false;
    }


    $sql="INSERT INTO `products`(`name`, `quantity`,  `price_250g`, `price_500g`, `price_1kg`)
    VALUES ('$name','$quantity ','$price2','$price3','$price4')";
    $query_run=mysqli_query($con,$sql);
   

    if($query_run){
        $res = [
            'status' => 200,
            'message' => "Product: Created Successfully"
        ];
        echo json_encode($res);
        return false;
    }
    else{
        $res = [
            'status' => 500,
            'message' => "Product Not Created"
        ];
        echo json_encode($res);
        return false;
    }


}

// Get Customer Details Query

if($_POST['product_id'] != ""){

    $id = $_POST["product_id"];

    $sql = "SELECT * FROM products WHERE id ='".$_POST['product_id']."'";
    $result = $con->query($sql);

    if($result->num_rows > 0){

        $array_result = array();
        while($row = $result->fetch_assoc()){
    
            $array_result['productid'] = $row['id'];
            $array_result['UproductName'] = $row['name'];
            $array_result['UproductQuantity'] = $row['quantity'];
            
            $array_result['UproductPrice2'] = $row['price_250g'];
            $array_result['UproductPrice3'] = $row['price_500g'];
            $array_result['UproductPrice4'] = $row['price_1kg'];
            
    
        }
    
        echo json_encode($array_result);
    }


}




?>