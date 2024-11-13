<?php
    error_reporting(E_ALL);
    session_start();
    require_once "../classes/utility.php";
    require_once "../classes/Admin.php";

    $c = new Admin;

    if(isset($_POST['btnupdate'])){
        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";
        // die;
        
        $product = sanitizer($_POST['product']);
        $description = sanitizer($_POST['description']);
        $image = $_FILES['image'];
        $availability = sanitizer($_POST["availability"]);
        $price = sanitizer($_POST["price"]);
        $product_id = sanitizer($_POST['product_id']);
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // die;
       

        if(empty($product)){
            $_SESSION['errormsg'] = "The product name can not be empty";
            header("location:../manage_product.php");
            exit();
        }else{
            $c->update_product($product,$description,$image, $availability, $price,$product_id);
            $_SESSION['good_msg'] = "Product Updated Successfully";
            header("location:../list_product.php");
            exit();
        }
    }
?>