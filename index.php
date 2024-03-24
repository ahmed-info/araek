<?php 
require_once('assets/php/functions.php');
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


?>
