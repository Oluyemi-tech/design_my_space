<?php
    session_start();
    require_once "../classes/utility.php";
    require_once "../classes/Admin.php";

    $c = new Admin;

    if(isset($_POST['btnupdate'])){
        
        $product = sanitizer($_POST['product']);
        $description = sanitizer($_POST['description']);
        $image = $_FILES['image'];
        $price = $_POST["price"];
        $availability = $_POST['availability'];

        if(empty($product)){
            $_SESSION['errormsg'] = "The product name can not be empty";
            header("location:../Admin_profile.php");
            exit();
        }else{
            $check = $c->update_center($product,$description,$image, $availability,$price);
            header("location:../Admin_profile.php");
            exit();

        }
        



    }else{
        $_SESSION['errormsg'] = "You need to submit the form";
        header("location:../Admin_profile.php");
        exit();
    }


?>