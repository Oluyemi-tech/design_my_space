<?php
    error_reporting(E_ALL);
    session_start();
    require_once "../classes/utility.php";
    require_once "../classes/Admin.php";

    $c = new Admin;

    if(isset($_POST['btninsert'])){
        
        $product = sanitizer($_POST['product']);
        $description = sanitizer($_POST['description']);
        $image = $_FILES['image'];
        $price = sanitizer($_POST["price"]);
        $stock = sanitizer($_POST["stock"]);
       

        if(empty($product) || empty($description) ||empty($image) ||empty($price) || empty($stock)){
            $_SESSION['errormsg'] = "The product name can not be empty";
            header("location:../product.php");
            exit();
        }else{
            $c->product($product,$description,$image, $price,$stock);
            $_SESSION['good_msg'] = "Item Inserted successfully";
            header("location:../product.php");
            exit();
        }
    }
?>