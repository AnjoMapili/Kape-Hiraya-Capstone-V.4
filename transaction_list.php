<?php


//error na sya kasi ang ineexpect no transaction_list.php mo sa trans_no
// kaso ang binato sample_id
//Kailan po talaga same? YES ah ok po noted po sir March
//Hinahap ko po yan di ko makita hehe. Yon pala yon.
//Pwede po makita ajax yan sir March?

// aya yun

// echo $_GET['trans_no'];
// echo  $_GET['firstname'] . ' ' . $_GET['lastname'];

include 'Connections/dbconnect.php';
include 'Controllers/TransactionController.php';

$transactionController = new TransactionController($con);

$trans_no = isset($_GET['trans_no']) ? $_GET['trans_no'] : '';

$result = $transactionController->read($trans_no);
echo $result;

// transaction_list.php?trans_no=600924
// = ito ung ajax, na lalagay sya ng params sa transaction_list.php which it
// itong file na to...

//$_GET['trans_no'] = ang purpose neto ige-GET nya ung trans_no na binato ni ajax
// para un ung gagamitin nyang identifier sa pag search sa database....

//AJAX
// transaction_list.php?firstname=john

//PHP
//$firstnae = $_GET['firstname'];


//dpat lging match yan, para alam nya kng ano ung kukunin nya
// dapat if firtname ko po inilagay yan same po dito sa name nato
// or kahit random po ito? 

// dapat palaging match yang parameter..