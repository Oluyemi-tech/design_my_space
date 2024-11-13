<?php
    if(!isset($_SESSION['Admin_id'])){
        $_SESSION['errormsg']= "You need to logged in as an Admin to have access";
        header("location:admin_login.php");
        exit();
    }

?>