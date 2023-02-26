<?php
include 'Connections/dbconnect.php';
include 'Controllers/CustomerController.php';

$customerController = new CustomerController($con);

$result = $customerController->read();
echo $result;