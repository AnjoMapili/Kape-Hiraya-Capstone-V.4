<?php
include "Connections/dbconnect.php";
// Delete Query

if(isset($_POST['delete_customer'])){
    $customer_id = mysqli_real_escape_string($con,$_POST['customer_id']);

    $sql="DELETE FROM `customers` WHERE id='$customer_id'";
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

// Update Query

if(isset($_POST['update_customer']))
{
    $customer_id = mysqli_real_escape_string($con, $_POST['customer_id']);
    $name = mysqli_real_escape_string($con, $_POST['completeName']);
    $email = mysqli_real_escape_string($con, $_POST['completeEmail']);
    $contact = mysqli_real_escape_string($con, $_POST['completeContact']);
    $address = mysqli_real_escape_string($con, $_POST['completeAddress']);
    $date = mysqli_real_escape_string($con, $_POST['completeDate']);

    if($name == NULL || $email == NULL || $contact == NULL || $address == NULL || $date == NULL){
        $res = [
            'status' => 422,
            'message' => "All field are mandatory"
        ];
        echo json_encode($res);
        return false;
    }


    $sql="UPDATE `customers` SET name='$name', email='$email', contact='$contact',address='$address',date='$date' WHERE id='$customer_id'";
 
    $query_run=mysqli_query($con,$sql);

    if($query_run){
        $res = [
            'status' => 200,
            'message' => "Customer Updated Successfully"
        ];
        echo json_encode($res);
        return false;
    }
    else{
        $res = [
            'status' => 500,
            'message' => "Customer Not Updated"
        ];
        echo json_encode($res);
        return false;
    }


}




// Add Customer Query

if(isset($_POST['add_customer']))
{
    
    $name = mysqli_real_escape_string($con, $_POST['completeName']);
    $email = mysqli_real_escape_string($con, $_POST['completeEmail']);
    $contact = mysqli_real_escape_string($con, $_POST['completeContact']);
    $address = mysqli_real_escape_string($con, $_POST['completeAddress']);
    $date = mysqli_real_escape_string($con, $_POST['completeDate']);

    if($name == NULL || $email == NULL || $contact == NULL || $address == NULL || $date == NULL){
        $res = [
            'status' => 422,
            'message' => "All field are mandatory"
        ];
        echo json_encode($res);
        return false;
    }


    $sql="INSERT INTO `customers`(`name`, `email`, `contact`, `address`, `date`)
    VALUES ('$name','$email ','$contact','$address','$date')";
    $query_run=mysqli_query($con,$sql);

    if($query_run){
        $res = [
            'status' => 200,
            'message' => "Customer: Created Successfully"
        ];
        echo json_encode($res);
        return false;
    }
    else{
        $res = [
            'status' => 500,
            'message' => "Customer Not Created"
        ];
        echo json_encode($res);
        return false;
    }


}
// Get Customer Details Query

if($_GET['customer_id'] != ""){

    $id = $_GET["customer_id"];
 
    $sql = "SELECT * FROM customers WHERE id ='".$_GET['customer_id']."'";
    $result = $con->query($sql);

    if($result->num_rows > 0){

        $array_result = array();
        while($row = $result->fetch_assoc()){
    
            
            $array_result['UcompleteName'] = $row['name'];
            $array_result['UcompleteEmail'] = $row['email'];
            $array_result['UcompleteContact'] = $row['contact'];
            $array_result['UcompleteAddress'] = $row['address'];
            $array_result['UcompleteDate'] = $row['date'];
    
        }
    
        echo json_encode($array_result);
    }


}



?>
