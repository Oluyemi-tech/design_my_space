<?php
    session_start();
    require_once "classes/Admin.php";
    $cat = new Admin;

    if (isset($_GET['id'])) {
        $cat_id = $_GET['id'];
        $cat->delete_cat($cat_id);
    header("location:cat_list.php");
    exit();
       
    }

?>