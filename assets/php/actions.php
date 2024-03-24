<?php 
require_once 'functions.php';
    if(isset($_GET['signup'])){
     $response =   validateSignup($_POST);
     if($response['status']){
        if(createUser($_POST)){
            header('location:../../login_en.php?login');
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
?> 