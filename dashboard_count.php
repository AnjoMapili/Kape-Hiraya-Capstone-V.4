<?php
include 'Connections/dbconnect.php';
include 'Controllers/TransactionController.php';

$transactionController = new TransactionController($con);
$transaction_count = $transactionController->numberOfTransaction();

header('Content-Type: application/json');
echo json_encode([
   'transaction' => $transaction_count,
   'products' => 0,
   'customers' => 0
]);
