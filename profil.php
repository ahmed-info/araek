<?php
  if(@$_COOKIE['login']!='9'){
    echo'
    <link href="style_profil.css" rel="stylesheet"/>
    <div class="style06">
        <img width="500" src="pic/error icon.gif" />
        <p> عذرا تحتاج الى انشاء حساب او تسجيل دخول </p>
    </div>
    <meta http-equiv="refresh" content="3, url=index.php" />
    ';
    exit();
  }
  require("fatamcon.php");
  global $dodobe;

  $GetTokenCookie= $_COOKIE['token'];
  $cheackToken= "SELECT * FROM user_info WHERE user_token='$GetTokenCookie'";
  $runcheackToken= mysqli_query($dodobe,$cheackToken);
  $rowtoken= mysqli_fetch_array($runcheackToken);

  @$bro01 = $_POST['load01'];
  @$bro02 = $_POST['load02'];
  @$bro03 = $_POST['load03'];
  @$bro04 = $_POST['load04'];
  @$bro05 = $_POST['load05'];

  $image= @$_FILES['load06']['name'];
  $image_temp= @$_FILES['load06']['tmp_name'];
  @$pathimg= "user_img/";
  @$target= $pathimg.basename($_FILES['load06']['name']);
  $imgtarget= strtolower(pathinfo($target,PATHINFO_EXTENSION));
  $loadimg= 1;
  @$newimg= uniqid('user_img-', true).'.'.strtolower(pathinfo($_FILES['load06']['name'],PATHINFO_EXTENSION));

  if(isset($_POST['load07'])){
    if(empty($bro01) OR empty($bro02) OR empty($bro03) OR empty($bro04) OR empty($bro05)){
      $errormasseg = '<p class="style11"> enter information </p>';
    }else{
      if($imgtarget !='' && $imgtarget !='jpg' && $imgtarget !='png' && $imgtarget !='jpeg'){
        $loadimg = 0;
      }
      if($loadimg == 0){
        echo'
        <link href="style_profil.css" rel="stylesheet"/>
        <div class="style06">
          <img width="500" src="pic/error icon.gif" />
          <p> عذرا الامتداد غير مسموح به </p>
        </div>
        <meta http-equiv="refresh" content="3, url=profile.php" />
        ';
        exit();
      }
      if($image !=''){
        move_uploaded_file($image_temp,"user_img/$newimg");
      }else{
        @$newimg = $rowtoken['user_img'];
      }
      $update_info= "UPDATE teacher_info SET
      user_name= '$bro01',
      user_email= '$bro02',
      user_dep= '$bro03',
      user_num= '$bro04',
      user_pass= '$bro05',
      user_img= '$newimg'
      WHERE user_token = '$GetTokenCookie'
      ";
      if(mysqli_query($dodobe,$update_info)){
        echo'
        <link href="style_profile.css" rel="stylesheet"/>
        <div class="style10">
          <img width="500" src="pic/yes icon.gif" />
          <p> تم تحديث البيانات </p>
        </div>
        <meta http-equiv="refresh" content="5, url=profil.php" />
        ';
        exit();
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="style_profil.css"/>
</head>
<body class="style0">
<form action="" method="POST" enctype="multipart/form-data">

  <div class="style02 style09">
    <?php if ($rowtoken['user_img'] != '' && $rowtoken['user_img'] != null ) { ?>
  <img class="style12" src="user_img/<?php echo $rowtoken['user_img']; ?>"/>
  <?php } else { ?>
      <img class="style12" src="user_img/person.jpg"/>

<?php } ?>
  <?php echo @$ERROR; ?>
  <?php echo @$ERROR1; ?>

  <input value="<?php echo $rowtoken['user_name']; ?>" required autocomplete="off" name="load01" class="style01" type="text" placeholder=".... اسمك الكامل">
  <input value="<?php echo $rowtoken['user_email']; ?>" required autocomplete="off" name="load02" class="style01" type="text" placeholder=".... الايميل">
  <input value="<?php echo $rowtoken['user_dep']; ?>" required autocomplete="off" name="load03" class="style01" type="text" placeholder=".... القسم">
  <input value="<?php echo $rowtoken['user_num']; ?>" required autocomplete="off" name="load04" class="style01" type="number" placeholder=".... رقم الهوية">
  <input value="<?php echo $rowtoken['user_pass']; ?>" required autocomplete="off" name="load05" class="style01" type="password" placeholder=".... كلمة المرور">
  <input class="style03" name="load06" type="file" value="اختر صورة">
  <input name="load07" class="style04" type="submit" value=" edit ">
  <a class="style05" href="logout.php"> LogOut </a></div>
  </div>
  </div>
</form>
</body>
</html>