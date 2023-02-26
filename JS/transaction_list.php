<?php
include 'Connections/dbconnect.php';
include 'Controllers/TransactionController.php';

$transactionController = new TransactionController($con);

$trans_no = isset($_GET['trans_no']) ? $_GET['trans_no'] : '';

$result = $transactionController->read($trans_no);
echo $result;