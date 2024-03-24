<?php
     setcookie("token",null,-1,"/");
     setcookie("user_name",null,-1,"/");
     setcookie("login",null,-1,"/");
     echo'
        <link href="style_login.css" rel="stylesheet"/>
        <div class="fatam10">
            <img width="500" src="pic/error icon.gif" />
            <p> تم تسجيل الخروج </p>
        </div>
        <meta http-equiv="refresh" content="3, url=index.php" />
        ';
?>