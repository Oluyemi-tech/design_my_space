<?php
    error_reporting(E_ALL);
    session_start();
    require_once ("../classes/utility.php");
    require_once ("../classes/User.php");

    $user = new User;

    if(isset($_POST['btnsub'])){
        $fname = sanitizer($_POST["fname"]);
        $lname = sanitizer($_POST["lname"]);
        $email = sanitizer($_POST["email"]);
        $phone = sanitizer($_POST["phone"]);
        $pass1 = sanitizer($_POST["pass1"]);
        $pass2 = sanitizer($_POST["pass2"]);

        $available = $user->check_email($email);
        
        if(($pass1 != $pass2) || empty($pass1)){
            $_SESSION['errormsg'] = 'The two passwords must match and must not be blank';
        header("location:../signup.php");
        exit();
        }elseif($available){
            $_SESSION['errormsg'] = 'The email is taken';
            header("location:../signup.php");
            exit();
        }elseif(empty($fname) || empty($lname) || empty($pass1) || empty($email)){
            $_SESSION['errormsg'] = 'Please ensure you suplly your firstname, lastname and email.';
            header("location:../signup.php");
            exit();
        }else{
            
            $user->user($fname,$lname,$email,$phone,$pass1);
            $_SESSION['good_msg'] = "An account has been created for you, pls login";
            header("location:../login.php");
            exit();
        }
        }else{
        $_SESSION['errormsg'] = 'Please complete the form';
        header("location:../signup.php");
        exit();
        
    }

    


?>