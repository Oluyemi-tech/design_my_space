<?php
    session_start();
    require_once("classes/Admin.php");
    $ad = new Admin;
    $ad->signout();
    $_SESSION['good_msg'] = "You have successfully logged out...";
    header("location:Admin_login.php");

?>