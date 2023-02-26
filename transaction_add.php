<?php
include 'Connections/dbconnect.php';
include 'Controllers/TransactionController.php';

if (isset($_POST['action']) && $_POST['action'] === 'submit') {
   $customer_payment_method = $_POST['customer_payment_method'];
   $customer_name = $_POST['customer_name'];
   $customer_address = $_POST['customer_address'];
   $customer_contact_number = $_POST['customer_contact_number'];
   $data = json_decode($_POST['data'], true); // decode the JSON string

   // build the data array to pass to the create() function
   $transaction_data = [
      'customer_payment_method' => $customer_payment_method,
      'customer_name' => $customer_name,
      'customer_address' => $customer_address,
      'customer_contact_number' => $customer_contact_number,
      'data' => $data
   ];

   // create a new instance of TransactionController and call the create() function
   $transactionController = new TransactionController($con);
   $result = $transactionController->create($transaction_data);

   // return the JSON response from the create() function
   echo $result;
}