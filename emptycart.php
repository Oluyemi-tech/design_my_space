<?php
session_start();
require_once "classes/cart.php";
$cart = new Cart;

$cart->empty();
header("location:mycart.php");
exit();

?>