<?php
    if(@$_COOKIE['login']=='9'){
        echo'
        <link href="style_login.css" rel="stylesheet"/>
        <div class="style10">
            <img width="500" src="pic/error icon.gif" />
            <p>You are already logged in</p>
        </div>
        <meta http-equiv="refresh" content="3, url=home.php" />
        ';
        exit();
    }
    require "fatamcon.php";
    global $dodobe;

    @$user_email = $_POST['user_email'];
    @$user_pass = $_POST['user_pass'];
    @$user_num = $_POST['user_num'];

    if(isset($_POST['login'])){
        if(empty($user_email) || empty($user_pass)){
            $errormasseg = '<p class="style11"> يجب ادخال البيانات </p>';
        } 
        else{
            $check = "SELECT * FROM user_info WHERE user_email='$user_email' && user_pass='$user_pass'";
            $runcheck = mysqli_query($dodobe,$check);
            if(mysqli_num_rows($runcheck)>'0'){
                $rownum = mysqli_fetch_array($runcheck);
                $user_email = $rownum['user_email'];
                $user_pass = $rownum['user_pass'];
                $user_token = $rownum['user_token'];
                if($user_email != $user_email && $user_pass != $user_pass){
                    $errormasseg = '<p class="style11">عذرا الايميل او كلمة المرور غير صحيحة </p>';
                }else{
                    setcookie("token","$user_token",time()+(86400 * 14),"/");
                    setcookie("user_email","$user_email",time()+(86400 * 14),"/");
                    setcookie("login","9",time()+(86400 * 14),"/");
                    echo'
                    <link href="style_login.css" rel="stylesheet"/>
                    <div class="fatam12">
                        <img width="500" src="pic/yes icon.gif" />
                        <p> Log in </p>
                    </div>
                    <meta http-equiv="refresh" content="3, url=home.php" />
                ';
                }
                exit();
            }else{
                $errormesseg = '<p class="style11">عذرا المعلومات غير صحيحة </p>';
            }
        }
    }

?>
<!DOCTYPE html>
<?php 
require_once('assets/functions.php');
showPage("header",['page_title'=>'صفحة الدخول','style'=>'style_login']);
?>
<body class="style0">
<form action="" method="post">

  <div class="style0"></div>

  <div class="style02 style08">
  <img class="style07" src="assets/pic/logo.png"/>

  <?php echo @$errormasseg; ?>
  <?php echo @$errormesseg; ?>

  <input required autocomplete="off" name="user_email" class="style01" type="email"  placeholder="الايميل"/>
  <input required autocomplete="off" name="user_num" class="style01" type="number" placeholder=" ID Number"/>
  <input required autocomplete="off" name="user_pass" class="style01" type="password" placeholder="كلمة السر"/>
  <div class="style03">
  <div class="main"><input name="login" type="submit" value="تسجيل الدخول" class="style05"/></div> 
  <div class="right"><a class="style04" href="signup_ar.php"><p class="style06">انشاء الحساب</p></a></div>
  <div class="left"><a class="style04" href="index_ar.php"><p class="style06">رجوع</p></a></div>
  </div>
  </div>

</form>
</body>
</html>