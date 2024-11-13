<?php
session_start();
require_once "classes/payment.php";
// this is the page that paystack will send data to after payment is complete
// we need to verify from paystack again the real status of the transaction before we update our database

$reference = $_SESSION['trxref']; //isset($_get['reference'])? $_get['reference] : 0;

$pay = new Payment;

if($reference){
$confirmation = $pay->paystack_verify($reference);
$status = $confirmation->status;
$message_from_paygate = $confirmation->message;
if($status ==1){

    $amount_paid = $confirmation->data->amount;
    $transaction_status = 'paid'; //failed/success
    

}else{
    $amount_paid = 0;
    $transaction_status = 'failed';
   
}
$pay->update_database($amount_paid, $transaction_status, $message_from_paygate,$reference);
header("location:purchase.php");
exit();


}else{
$_SESSION['errormsg'] = "Transaction Reference Missing";
header("location:mycart.php");
exit();


}
?>