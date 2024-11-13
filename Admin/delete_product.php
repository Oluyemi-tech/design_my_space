<?php
    session_start();
    require_once "classes/Admin.php";
    $product = new Admin;

    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $product->delete_product($product_id);
    header("location:list_product.php");
    exit();
       
    }

?>