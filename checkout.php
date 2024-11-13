<?php
session_start();
require_once "classes/payment.php";
require_once "checkout_guard.php";

// we will generate a transaction ref no,insert the details into db
//redirect them to a page to confirm the transaction
$pay = new Payment;
$ref = time() .rand();
$_SESSION['trxref'] = $ref;

$orderid = $pay->insert_order($_SESSION['cartitems'],$_SESSION['user_id'],$ref);
if($orderid){
    $_SESSION['orderid']= $orderid;
    header("location:confirm_pay.php");
    exit();
}else{
    $_SESSION['errormsg'] = "Error adding order, please try checkout again";
    header("location:mycart.php");
    exit();
}


?>