<?php 
    if(@$_COOKIE['login']=='9'){
        echo'
        <link href="style_login.css" rel="stylesheet"/>
        <div class="style10">
            <img width="500" src="pic/error icon.gif" />
            <p> انت مسجل دخول بالفعل </p>
        </div>
        <meta http-equiv="refresh" content="3, url=home.php" />
        ';
        exit();
    }
    require "fatamcon.php";
    global $dodobe;

    @$user_name = $_POST['user_name'];
    @$user_email = $_POST['user_email'];
    @$user_dep = $_POST['user_dep'];
    @$user_num = $_POST['user_num'];
    @$user_pass = $_POST['user_pass'];

    $token = date("ymdhis");
    $RandNumber = rand(100,500);
    $fintoken = $token.$RandNumber;

    if(isset($_POST['signup'])){
        if(empty($user_name) || empty($user_email) || empty($user_dep) || empty($user_num) || empty($user_pass)){
            $errormesseg = '<p class="style11"> يجب ادخال البيانات كاملة </p>';
        }else{
            $check = "SELECT * FROM user_info WHERE user_email='$user_email' || user_num='$user_num'";
            $runcheck = mysqli_query($dodobe,$check);
            if(mysqli_num_rows($runcheck)>'0'){
                $errormasseg = '<p class="style11">عذرا الايميل او رقم الهوية مستخدم سابقا ادخل اسم او رقم اخر<</p>';
            }
            if($user_num<=2000){
                $ok = "INSERT INTO user_info
                (
                    user_token,
                    user_name,
                    user_email,
                    user_dep,
                    user_num,
                    user_pass,
                    user_type
                )VALUES(
                    '$fintoken',
                    '$user_name',
                    '$user_email',
                    '$user_dep',
                    '$user_num',
                    '$user_pass',
                    't'
                )";
                if(mysqli_query($dodobe, $ok)){
                    setcookie("token","$fintoken",time()+(86400 * 14),"/");
                    setcookie("user_name","$user_name",time()+(86400 * 14),"/");
                    setcookie("login","9",time()+(86400 * 14),"/");
                    echo'
                        <link href="style_login.css" rel="stylesheet"/>
                        <div class="style12">
                            <img width="500" src="pic/yes icon.gif" />
                            <p> Account successfully created </p>
                        </div>
                        <meta http-equiv="refresh" content="5, url=home.php" />
                    ';
                exit();
                }
            }
            if($user_num>2000 && $user_num<=3000){
                $ok = "INSERT INTO user_info
                (
                    user_token,
                    user_name,
                    user_email,
                    user_dep,
                    user_num,
                    user_pass,
                    user_type
                )VALUES(
                    '$fintoken',
                    '$user_name',
                    '$user_email',
                    '$user_dep',
                    '$user_num',
                    '$user_pass',
                    'e'
                )";
                if(mysqli_query($dodobe, $ok)){
                    setcookie("token","$fintoken",time()+(86400 * 14),"/");
                    setcookie("user_name","$user_name",time()+(86400 * 14),"/");
                    setcookie("login","9",time()+(86400 * 14),"/");
                    echo'
                        <link href="style_login.css" rel="stylesheet"/>
                        <div class="style12">
                            <img width="500" src="pic/yes icon.gif" />
                            <p> Account successfully created </p>
                        </div>
                        <meta http-equiv="refresh" content="5, url=home.php" />
                    ';
                exit();
                }
            }
            if($user_num>3000){
                $ok = "INSERT INTO user_info
                (
                    user_token,
                    user_name,
                    user_email,
                    user_dep,
                    user_num,
                    user_pass
                )VALUES(
                    '$fintoken',
                    '$user_name',
                    '$user_email',
                    '$user_dep',
                    '$user_num',
                    '$user_pass',
                    's'
                )";
                if(mysqli_query($dodobe, $ok)){
                    setcookie("token","$fintoken",time()+(86400 * 14),"/");
                    setcookie("user_name","$user_name",time()+(86400 * 14),"/");
                    setcookie("login","9",time()+(86400 * 14),"/");
                    echo'
                        <link href="style_login.css" rel="stylesheet"/>
                        <div class="style12">
                            <img width="500" src="pic/yes icon.gif" />
                            <p> Account successfully created </p>
                        </div>
                        <meta http-equiv="refresh" content="5, url=home.php" />
                    ';
                exit();
                }
            }
        }
    }
?>
<?php 
require_once('assets/functions.php');
showPage("header",['page_title'=>'تسجيل الدخول','style'=>'style_login']);
?>

<body class="style0">
<form action="" method="post">

  <div class="style09">
  <img class="style07" src="assets/pic/logo.png"/>

  <?php echo @$errormasseg; ?>
  <?php echo @$errormesseg; ?>

  <input required autocomplete="off" name="user_name" class="style01" type="text" placeholder="الاسم"/>
  <input required autocomplete="off" name="user_email" class="style01" type="email" placeholder="الايميل"/>
  <input required autocomplete="off" name="user_dep" class="style01" type="text" placeholder="القسم"/>
  <input required autocomplete="off" name="user_num" class="style01" type="number" placeholder="رقم الهوية"/>
  <input required autocomplete="off" name="user_pass" class="style01" type="password" placeholder="كلمة السر"/>

  <div class="style03">
  <div class="main"><input name="signup" type="submit" value="انشاء الحساب" class="style05"/></div> 
  <div class="right"><a class="style04" href="login_ar.php"><p class="style06">تسجيل الدخول </p></a></div>
  <div class="left"><a class="style04" href="index_ar.php"><p class="style06">رجوع</p></a></div>
  </div>
  </div>

</form>
<?php
showPage("footer");
?>