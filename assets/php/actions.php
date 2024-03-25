<?php 
require_once 'functions.php';

//for signup
    if(isset($_GET['signup'])){
     $response =   validateSignup($_POST);
     if($response['status']){
        if(createUser($_POST)){
            header('location:../../login_en.php?login&newuser');
        }else{
                echo "<script>alert('error something')</script>";
        }
        //isEmailRegistered($_POST['user_email']);
     }else{
        $_SESSION['error'] = $response;
        $_SESSION['formdata'] = $_POST;
        header("location:../../signup_en.php?signup");
     }
    }
   

    //for login
    if(isset($_GET['login'])){
     $response =   validateLogin($_POST);
    if($response['status']== true){
        $_SESSION['Auth'] = true;
        $_SESSION['userdata'] = $response['user'];
        header("location:../../");

     }else{
        $_SESSION['error'] = $response;
        $_SESSION['formdata'] = $_POST;
        //return "action else";
        header("location:../../login_en.php?login");
     }
    }
?> 