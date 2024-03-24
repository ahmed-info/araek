<?php
    if(@$_COOKIE['login']!='9'){
        echo'
        <link href="style_upload.css" rel="stylesheet"/>
        <div class="fatam10">
            <img width="500" src="pic/error icon.gif" />
            <p> عذرا تحتاج الى انشاء حساب او تسجيل دخول </p>
        </div>
        <meta http-equiv="refresh" content="3, url=signup.php" />
        ';
        exit();
    }
    require "fatamcon.php";
    global $dodobe;

    @$bro01 = $_POST['load01'];

    $token = date("ymdhis");
    $RandNumber = rand(100,500);
    $fintoken = $token.$RandNumber;
    
    $imge= @$_FILES['load02']['name'];
    $image_temp= @$_FILES['load02']['tmp_name'];
    @$pathimg= "post/";
    @$target= $pathimg.basename($_FILES['load02']['name']);
    $imgtarget= strtolower(pathinfo($target,PATHINFO_EXTENSION));
    $loadimg= 1;
    @$newimg= uniqid('post-', true).'.'.strtolower(pathinfo($_FILES['load02']['name'],PATHINFO_EXTENSION));

    $video = @$_FILES['load04']['name'];
    @$video_tmp = $_FILES['load04']['tmp_name'];
    @$pathimg= "uploads/";
    @$vtarget= $pathimg.basename($_FILES['load04']['name']);
    $vidtarget= strtolower(pathinfo($vtarget,PATHINFO_EXTENSION));
    move_uploaded_file($video_tmp, 'uploads/' . $video);

    


    $GetTokenCookie= $_COOKIE['token'];
    $cheack= "SELECT * FROM user_info WHERE user_token='$GetTokenCookie'";
    $runcheack= mysqli_query($dodobe,$cheack);
    $nameea= mysqli_fetch_array($runcheack);
    @$namee=$nameea['user_name'];
    @$image=$nameea['user_img'];
    @$type=$nameea['user_type'];

    $datee = date("Y-m-d H:i:s");

    if(isset($_POST['load03'])){
        if(empty($bro01)){
            $errormasseg = '<p class="fatam11"> ادخل نص </p>';
        }else{ 
            if($imgtarget !='' && $imgtarget !='jpg' && $imgtarget !='jpeg' && $imgtarget !='png'){
            $loadimg = 0;
            }
            if($loadimg == 0){
                echo'
                    <link href="style_upload.css" rel="stylesheet"/>
                    <div class="fatam10">
                        <img width="500" src="defaultphoto/error icon.gif" />
                        <p> عذرا الامتداد غير مسموح به </p>
                    </div>
                    <meta http-equiv="refresh" content="3, url=home.php" />
                ';
            exit();
            }
            if($imge !=''){
                move_uploaded_file($image_temp,"post/$newimg");
            }
            else{
                @$newimg = '';
            }
            
            $ok = "INSERT INTO post
            (
                post_token,
                post_t,
                post_img,
                post_vid,
                post_name,
                post_uimg,
                post_date,
                post_type
            )VALUES(
                '$fintoken',
                '$bro01',
                '$newimg',
                '$video',
                '$namee',
                '$image',
                '$datee',
                '$type'
            )";
            if(mysqli_query($dodobe, $ok)){
                echo'
                    <link href="style_upload.css" rel="stylesheet"/>
                    <div class="fatam09">
                        <img width="500" src="pic/yes icon.gif" />
                        <p> posted succesfully  </p>
                    </div>
                    <meta http-equiv="refresh" content="5, url=home.php" />
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
    <title>upload</title>
    <link rel="stylesheet" href="style_upload.css" />
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/brands.css" rel="stylesheet">
    <link href="fontawesome/css/solid.css" rel="stylesheet">
</head>
<body>
    <div class="fatam01">
            <table class="fatam02">
                <tr>
                <td><p class="fatam03"> Add new post </p></td>
                <td><a href="home.php"><i class="fa-sharp fa-regular fa-backward fatam04"></i></a></td>
                </tr>
            </table>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="fatam05">
        <br/><br/><br/>
        <?php echo @$errormasseg; ?>
        <textarea name="load01" class="fatam08"></textarea>
        <p class="fatam03">اختر صورة</p>
        <input name="load02" class="fatam06" type="file">
        <p class="fatam03">اختر فيديو</p>
        <input name="load04" class="fatam06" type="file">
        <input name="load03" class="fatam07" type="submit" value=" post ">
    </div>
    </form>
</body>
</html>