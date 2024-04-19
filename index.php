<?php 
require_once('assets/php/functions.php');
// echo "<pre>";
// print_r(getPost());
if(isset($_GET['newfb'])){
    unset($_SESSION['auth_temp']);
    unset($_SESSION['forgot_email']);
    unset($_SESSION['forgot_code']);
}
if(isset($_SESSION['Auth'])){
$user = getUser($_SESSION['userdata']['user_id']);
$posts = getPost();
$follow_suggestion = filterFollowSuggestion();
}
$pagecount = count($_GET);
if(isset($_SESSION['Auth']) && $user['ac_status']==1 && !$pagecount){
    //showPage("header",['page_title'=>'home page','style'=>'custom']);
    showPage("home");

}
elseif(isset($_SESSION['Auth']) && $user['ac_status']==0 && !$pagecount){
    showPage("header",['page_title'=>'verify page','style'=>'style_login']);
    showPage("verify_email");

}
elseif(isset($_SESSION['Auth']) && $user['ac_status']==2 && !$pagecount){
    showPage("header",['page_title'=>'block page','style'=>'custom']);
    showPage("blocked");

}elseif(isset($_SESSION['Auth']) && isset($_GET['editprofile']) && $user['ac_status']==1){
      showPage("header",['page_title'=>'edit profile','style'=>'custom']);
    showPage("editprofile");
}
elseif(isset($_SESSION['Auth']) && isset($_GET['u']) && $user['ac_status']==1){
    $profile = getUserByUsername($_GET['u']);

    if(!$profile){
        showPage("header",['page_title'=>'user not found','style'=>'custom']);
        showPage("user_not_found");

    }else{      
        $profile_post = getPostById($profile['user_id']) ;
        $profile['followers'] = getFollowers($profile['user_id']);
        $profile['following'] = getFollowing($profile['user_id']);
        showPage("header",['page_title'=>$profile['user_name'],'style'=>'custom']);
        showPage("profile");
    }
      
}
else{

    if(!isset($_SESSION['Auth'])){
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


}

?>
