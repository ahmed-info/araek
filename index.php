<?php 
require_once('assets/php/functions.php');
if(isset($_SESSION['Auth'])){
$user = getUser($_SESSION['userdata']['user_id']);
}
if(isset($_SESSION['Auth']) && $user['ac_status']==1){
    //showPage("header",['page_title'=>'home page','style'=>'custom']);
    showPage("home");

}
elseif(isset($_SESSION['Auth']) && $user['ac_status']==0){
    showPage("header",['page_title'=>'verify page','style'=>'style_login']);
    showPage("verify_email");

}
elseif(isset($_SESSION['Auth']) && $user['ac_status']==2){
    showPage("header",['page_title'=>'block page','style'=>'custom']);
    showPage("blocked");

}else{
    showPage("header",['page_title'=>'home page','style'=>'custom']);
?>
    <div class="lang">
        <a href="index_ar.php">AR</a>
    </div>
    
   

    <div class="bg-img">
        <img src="assets\pic\1.jpg" alt="University Of Baghdad" title="University Of Baghdad">
    </div>

    <div class="btn-login">
        <a href="signup_en.php"><p>SIGN UP</p></a>
    </div>
    <div class="btn-login">
        <a href="login_en.php"><p>LOG IN</p></a>
    </div>

    <?php 
showPage("footer");


}

?>
