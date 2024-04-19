<?php
    if(@$_COOKIE['login']!='9'){
        echo'
        <link href="style_home.css" rel="stylesheet"/>
        <div class="style09">
            <img width="500" src="pic/error icon.gif" />
            <p> عذرا تحتاج الى انشاء حساب او تسجيل دخول </p>
        </div>
        <meta http-equiv="refresh" content="3, url=index.php" />
        ';
        exit();
    }
    require "fatamcon.php";
    global $dodobe;

    $cheackToken= "SELECT * FROM post";
    @$runcheackToken= mysqli_query($dodobe,$cheackToken);

    $GetTokenCookie= $_COOKIE['token'];
    $cheack= "SELECT * FROM user_info WHERE user_token='$GetTokenCookie'";
    $runcheack= mysqli_query($dodobe,$cheack);
    $name= mysqli_fetch_array($runcheack);
    @$namee=$name['user_name'];
    @$image=$name['user_img'];

    if(isset($_POST['load03'])){
        $repost="SELECT * FROM post";
        $runrepost= mysqli_query($dodobe,$repost);
        $rowrepost= mysqli_fetch_array($runrepost);
        @$post_uimg=$rowrepost['post_uimg'];
        @$post_name=$rowrepost['post_name'];
        @$post_t=$rowrepost['post_t'];
        @$post_img=$rowrepost['post_img'];
        @$post_vid=$rowrepost['post_vid'];
        $ok = "INSERT INTO repost
            (
                repost_name,
                post_uimg,
                post_name,
                post_t,
                post_img,
                post_vid
            )VALUES(
                '$namee',
                '$post_uimg',
                '$post_name',
                '$post_t',
                '$post_img',
                '$post_vid'
            )
        ";
        if(mysqli_query($dodobe, $ok)){
            echo'
                <link href="style_upload.css" rel="stylesheet"/>
                <div class="fatam09">
                    <img width="500" src="pic/yes icon.gif" />
                    <p> posted succesfully  </p>
                </div>
                <meta http-equiv="refresh" content="5, url=home.php" />
            ';
        }
    }

    @$GetUrlToken= $_GET['T'];
    if(@$_GET['D']=='D'){
        $drop= "DELETE FROM post WHERE post_token='$GetUrlToken'";
        $rundrop= mysqli_query($dodobe,$drop);
        echo'
        <link href="style_home.css" rel="stylesheet"/>
        <div class="style09">
            <img width="500" src="pic/error icon.gif" />
            <p> تم حذف المنشور نهائيا </p>
        </div>
        <meta http-equiv="refresh" content="3, url=admin.php" />
        ';
        exit();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="style_home.css" />
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/brands.css" rel="stylesheet">
    <link href="fontawesome/css/solid.css" rel="stylesheet">
<body>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="style01">
        <table class="style02">
            <tr>
            <td><img class="style05" src="pic/lolo.jpeg"/></td>
            <td><a class="style07">University of Baghdad College of Science Department of Computer Science</a></td>
            <td><a class="style07">ADMIN</a></td>
            </tr>
        </table>
    </div>
    <!-- <div class="style10">
        <span class="style06"><a href="upload_ar.php"><i class="fa-solid fa-plus style08"></i></a></span>
    </div> -->
    <br/>
    <div>
        <?php 
            $number=1;
            while($rowtoken= mysqli_fetch_array($runcheackToken)){
                if(empty($rowtoken['post_img']) && empty($rowtoken['post_vid'])){
                    echo'<tr>
                        <td>'.$number++.'</td>
                        <td><span class="style07"><img width=30px hight=30px src="user_img/'.$rowtoken['post_uimg'].'"/></span></td>
                        <td><p class="style12">'.$rowtoken['post_name'].'</p></td>
                        </br>
                        <td><p class="style12">'.$rowtoken['post_t'].'</p></td>
                        </br>
                        <td>'.$rowtoken['post_date'].'</td>
                    </tr>
                    </br>
                    <td><a href="admin.php?D=D&T='.$rowtoken['post_token'].'">حذف</a></td>
                    </br></br>
                    <hr>
                    </br>';
                } elseif(empty($rowtoken['post_vid'])){
                    echo'<tr>
                            <td>'.$number++.'</td>
                            <td><span class="style07"><img width=30px hight=30px src="user_img/'.$rowtoken['post_uimg'].'"/></span></td>
                            <td><p class="style12">'.$rowtoken['post_name'].'</p></td>
                            </br>
                            <td><p class="style12">'.$rowtoken['post_t'].'</p></td>
                            </br>
                            <td><img width=200px hight=200px src="post/'.$rowtoken['post_img'].'"/></td>
                            </br>
                            <td>'.$rowtoken['post_date'].'</td>
                        </tr>
                        </br>
                        <td><a href="admin.php?D=D&T='.$rowtoken['post_token'].'">حذف</a></td>
                        </br></br>
                        <hr>
                        </br>';
                } elseif(empty($rowtoken['post_img'])){
                    echo'<tr>
                        <td>'.$number++.'</td>
                        <td><span class="style07"><img width=30px hight=30px src="user_img/'.$rowtoken['post_uimg'].'"/></span></td>
                        <td><p class="style12">'.$rowtoken['post_name'].'</p></td>
                        </br>
                        <td><p class="style12">'.$rowtoken['post_t'].'</p></td>
                        </br>
                        <td><video width=200px hight=200px muted controls preload="none">
                                    <source src="uploads/'.$rowtoken['post_vid'].'" type="video/mp4"/>
                            </video>
                        </td>
                        </br>
                        <td>'.$rowtoken['post_date'].'</td>
                    </tr>
                    </br>
                    <td><a href="admin.php?D=D&T='.$rowtoken['post_token'].'">حذف</a></td>
                    </br></br>
                    <hr>
                    </br>';
                } else{
                echo'
                    <tr>
                        <td>'.$number++.'</td>
                        <td><span class="style07"><img width=30px hight=30px src="user_img/'.$rowtoken['post_uimg'].'"/></span></td>
                        <td><p class="style12">'.$rowtoken['post_name'].'</p></td>
                        </br>
                        <td><p class="style12">'.$rowtoken['post_t'].'</p></td>
                        </br>
                        <td><img width=200px hight=200px src="post/'.$rowtoken['post_img'].'"/></td>
                        <td><video width=200px hight=200px muted controls preload="none">
                                <source src="uploads/'.$rowtoken['post_vid'].'" type="video/mp4"/>
                            </video>
                        </td>
                        </br>
                        <td>'.$rowtoken['post_date'].'</td>
                    </tr>
                    </br>
                    <td><a href="admin.php?D=D&T='.$rowtoken['post_token'].'">حذف</a></td>
                    </br></br>
                    <hr>
                    </br>';
                }
            }
        ?>
    </div>
    </br></br>
</form>
</body>
</html>