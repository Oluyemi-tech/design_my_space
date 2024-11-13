<?php 
error_reporting(E_ALL);
session_start();
require_once "../classes/Admin.php";
$a =new Admin;
if(isset($_POST['btnlogin'])){
    $username = $_POST['username'];
    $password = $_POST['pass'];


    if(empty($username) || empty($password)){
        $_SESSION['errormsg']= "please fill all fields";
        header("location:../admin_login.php");
        exit();
    }else{
        $res= $a->login($username,$password);
        if($res){
            $_SESSION['Admin_id'] = $res;
            header("location:../admin_dashboard.php");
            exit();
        }else{
            
            header("location:../admin_login.php");
            exit();
        }
       
    }
}else{
    $_SESSION['errormsg']= "please fill the form and click the submit button";
    header("location:../admin_login.php");
    exit();
}

?>