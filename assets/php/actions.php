<?php 
require_once 'functions.php';
require_once 'send_code.php';
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
     echo "<pre>";
     echo $response;
    if($response['status']== true){
        $_SESSION['Auth'] = true;
        $_SESSION['userdata'] = $response['user'];
        if($response['user']['ac_status'] ==0){
         $_SESSION['code'] =  $code = rand(100000,999999);
         $email = $response['user']['user_email'];
         sendCode($response['user']['user_email'],"Verify your email",$code);
        }
        header("location:../../");

     }else{
        $_SESSION['error'] = $response;
        $_SESSION['formdata'] = $_POST;
        //return "action else";
        header("location:../../login_en.php?login");
     }
    }
    if(isset($_GET['resend_code'])){
         $_SESSION['code'] =  $code = rand(100000,999999);
         sendCode($_SESSION['userdata']['user_email'],"Verify your email",$code);
         header("location:../../?resended");

    }

    if(isset($_GET['verify_email'])){
         $user_code = $_POST['code'];
         $code =$_SESSION['code'] ;
         if($user_code == $code){
           if(verifyEmail($_SESSION['userdata']['user_email'])){
            header('location:../../');
            }
             
         }else{
            $response['msg'] = 'خطأ في الرمز';
            if(!$_POST){
               $response['msg'] = 'ادخل الرقم المكون من6 ارقام';
               header('location:../../');
            }
                  header('location:../../');

         }
         
}else{
   $response['msg'] = 'خطأ في رمز التأكيد';
   $response['field'] = 'email_verify';
   $_SESSION['error'] = $response;

}

    
    if(isset($_GET['logout'])){
      session_destroy();
      header('location:../../');
    }
?> 