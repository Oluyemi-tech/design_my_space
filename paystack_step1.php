<?php
session_start();
require_once "checkout_guard.php";
require_once "classes/Payment.php";

$pay = new Payment;
// we need a method that will give us the email and amount of the order
$paydeets = $pay->get_order($_SESSION['trxref']);
$amt = $paydeets['total_amount'];
$email = $paydeets['email'];
$apidata = $pay->paystack_initialize($email,$amt,$_SESSION['trxref']);

if($apidata){
    $status = $apidata->status;
    
    if($status==1){
        $paydate = $apidata->data->authorization_url;
        header("location:$paydate");
        exit();
    }else{
        $_SESSION['errormsg']= $apidata->message;
        header("location:mycart.php");
        exit();
    }
}else{
    $_SESSION['errormsg'] = "Error connecting to endpoint";
    header('location:mycart.php');
    exit();
    echo "<pre>";
print_r($apidata);
echo "</pre>";
}
?>