<?php 
require_once('assets/functions.php');
showPage("header",['page_title'=>'الصفحة الرئيسية','style'=>'custom']);
?>
    <div class="lang">
        <a href="index.php">EN</a>
    </div>
    

    <div class="bg-img">
        <img src="assets\pic\1.jpg" alt="University Of Baghdad" title="جامعة بغداد">
    </div>

    <div class="btn-login">
        <a href="signup_ar.php"><p>انشاء الحساب</p></a>
    </div>
    <div class="btn-login">
        <a href="login_ar.php"><p>تسجيل الدخول</p></a>
    </div>
    <?php 
showPage("footer");
?>