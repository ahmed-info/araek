<?php
require_once 'fatamcon.php'; 
global $dodobe;
function showPage($page, $data=""){
include("assets/pages/$page.php");
}

function validateSignup($form_data){
    $response = array();
            $response['status'] = true;

    if(!$form_data['user_name']){
        $response['msg'] = "اسم المستخدم مطلوب";
        $response['status'] = false;
        $response['field'] = "user_name";
    }

    if(!$form_data['user_email']){
        $response['msg'] = "الايميل مطلوب";
        $response['status'] = false;
        $response['field'] = "user_email";
    }

    if(!$form_data['user_dep']){
        $response['msg'] = "القسم مطلوب";
        $response['status'] = false;
        $response['field'] = "user_dep";
    }
    if(!$form_data['user_num']){
        $response['msg'] = "رقم الهوية مطلوب";
        $response['status'] = false;
        $response['field'] = "user_num";
    }

    if(!$form_data['user_pass']){
        $response['msg'] = "ادخل كلمة السر";
        $response['status'] = false;
        $response['field'] = "user_pass";
    }
    if(isEmailRegistered($form_data['user_email'])){
        $response['msg'] = "هذا الايميل مسجل بالفعل";
        $response['status'] = false;
        $response['field'] = "user_email";
    }
     if(isUsernameRegistered($form_data['user_name'])){
        $response['msg'] = "اسم المستخدم موجود بالفعل";
        $response['status'] = false;
        $response['field'] = "user_name";
    }
    return $response;
}

///validate login
function validateLogin($form_data){
    $response = array();
    $response['status'] = true;
    $blank = false;

    if(!$form_data['user_name_email']){
        $response['msg'] = "اسم المستخدم او الايميل مطلوب";
        $response['status'] = false;
        $response['field'] = "user_name_email";
            $blank = true;

    }
  

    if(!$form_data['user_pass']){
        $response['msg'] = "ادخل كلمة السر";
        $response['status'] = false;
        $response['field'] = "user_pass";
        $blank = true;

    }
   
    if(!$blank && !checkLogin($form_data)['status']){
        $response['msg'] = "خطأ في الايميل\اسم المستخدم او كلمة المرور";
        $response['status'] = false;
        $response['field'] = "checkuser";

    }else{
    $response['user'] = checkLogin($form_data)['user'];

    }
    
    return $response;
}
//check duplicate email
function isEmailRegistered($email){
    global $dodobe;
    $query = "SELECT count(*) as row FROM user_info WHERE user_email='$email'";
    $run = mysqli_query($dodobe, $query);
    $return_data = mysqli_fetch_assoc($run);
    return $return_data['row'];
}

function isUsernameRegistered($username){
    global $dodobe;
    $query = "SELECT count(*) as row FROM user_info WHERE user_name='$username'";
    $run = mysqli_query($dodobe, $query);
    $return_data = mysqli_fetch_assoc($run);
    return $return_data['row'];
}

function showError($field){
    if(isset($_SESSION['error'])){
        $error = $_SESSION['error'];
        if(isset($error['field']) && $field == $error['field']){
?>
<div class="text-danger">
    <?=$error['msg']?>
</div>
<?php
    }
}
}

function showFormData($field){
    if(isset($_SESSION['formdata'])){
        $formdata = $_SESSION['formdata'];
    return $formdata[$field];
}
}
//checklogin
function checkLogin($login_data){
global $dodobe;
$user_name_email = $login_data['user_name_email'];
$password = md5($login_data['user_pass']);
$query = "SELECT * FROM user_info WHERE (user_name = '$user_name_email' || user_email = '$user_name_email') && user_pass = '$password'";
$run = mysqli_query($dodobe,$query);
$data['user'] = mysqli_fetch_assoc($run)?? array();

if(count($data['user'])>0){
    $data['status'] =true;
}else{
    $data['status'] =false;
}
return $data;
}
//create new user
function createUser($data){
global $dodobe;
$user_token = 123;
$user_name = mysqli_real_escape_string($dodobe,$data['user_name']);
$user_email = mysqli_real_escape_string($dodobe,$data['user_email']);
$user_dep = mysqli_real_escape_string($dodobe,$data['user_dep']);
$user_num = mysqli_real_escape_string($dodobe,$data['user_num']);
$user_pass = mysqli_real_escape_string($dodobe,$data['user_pass']);
$user_pass = md5($user_pass);
$user_img = mysqli_real_escape_string($dodobe,$data['user_img']);
$user_type = "ss";
$query = "INSERT INTO user_info(user_token,user_name,user_email,user_dep,user_num,user_pass,user_img,user_type)";
$query.= "VALUES ('$user_token','$user_name','$user_email','$user_dep','$user_num','$user_pass','$user_img','$user_type')";
return mysqli_query($dodobe,$query);
}
?>