<?php
session_start();
require_once "classes/cart.php";

if(isset($_GET['id']) && (int)$_GET['id']!=0){

$cart = new Cart;

$cart->addbundle($_GET['id']);
header("location:mycart.php");
exit();
}else{
    header("location:index.php");
    exit();
}



?>