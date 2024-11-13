<?php 
error_reporting(E_ALL);
session_start();
require_once "../classes/User.php";

$user =new User;

if(isset($_POST['btnlogin'])){
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $data = $user->login($email,$password);
    if($data){
        $_SESSION['user_id']=$data;
        header("location:../user_dashboard.php");
        exit();
    }else{
        header("location:../login.php");
        exit();

    }
}else{
    $_SESSION['errormsg']="Please complete the form";
    header("location:../login.php");
    exit();

}

?>