<?php
include 'Connections/dbconnect.php';
include 'Controllers/TransactionController.php';

if (isset($_POST['action']) && $_POST['action'] === 'delete') {
   $trans_no = $_POST['trans_no'];
   $transactionController = new TransactionController($con);
   $result = $transactionController->delete($trans_no);
   echo $result;
}