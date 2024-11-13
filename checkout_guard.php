<?php

if(!isset($_SESSION['user_id'])){
    $_SESSION['errormsg'] = "You need to login as a User to purchase Product";
    header("location:login.php");
    exit();
}

if(empty($_SESSION['cartitems'])){
    $_SESSION['errormsg'] = "Please add items to your cart";
    header("location:mycart.php");
    exit();
}
?>