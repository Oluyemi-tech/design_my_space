<?php
    error_reporting(E_ALL);
    session_start();
    require_once "../classes/utility.php";
    require_once "../classes/Admin.php";

    $c = new Admin;

    if(isset($_POST['btnadd'])){
        
        $category = sanitizer($_POST['category']);
        $id = sanitizer($_POST['id']);
        

        if(empty($category)){
            $_SESSION['errormsg'] = "The category name can not be empty";
            header("location:../category.php");
            exit();
        }else{
            $c->insert_cat($category,$id);
            $_SESSION['good_msg'] = "Category inserted successfully";
            header("location:../cat_list.php");
            exit();
        }
    }
?>