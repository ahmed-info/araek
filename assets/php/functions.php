<?php
require_once 'fatamcon.php'; 
global $dodobe;
global $post;
function showPage($page, $data=""){
include("assets/pages/$page.php");
}
function getActiveChatUserIds(){
    global $dodobe;
    $current_user_id = $_SESSION['userdata']['user_id'];
    $query = "SELECT from_user_id,to_user_id FROM messages WHERE to_user_id = $current_user_id || from_user_id = $current_user_id ORDER BY id DESC";
    $run = mysqli_query($dodobe, $query);
    $data = mysqli_fetch_all($run,true);
    $ids = array();
    foreach($data as $ch){
        if($ch['from_user_id'] != $current_user_id && !in_array($ch['from_user_id'],$ids)){
            $ids[] = $ch['from_user_id'];
        }

        if($ch['to_user_id'] != $current_user_id && !in_array($ch['to_user_id'],$ids)){
            $ids[] = $ch['to_user_id'];
        }

    }
    return $ids;
}
function getMessages($user_id){
     global $dodobe;
    $current_user_id = $_SESSION['userdata']['user_id'];
    $query = "SELECT * FROM messages WHERE (to_user_id = $current_user_id && from_user_id = $user_id) || (from_user_id = $current_user_id && to_user_id = $user_id) ORDER BY id DESC";
    $run = mysqli_query($dodobe, $query);
    //echo $run;
    return mysqli_fetch_all($run,true);
}
function getAllMessages(){
        $active_chat_ids = getActiveChatUserIds();
        $conversion = array();
        foreach($active_chat_ids as $index => $id){
            $conversion[$index]['user_id'] = $id;
            $conversion[$index]['messages'] = getMessages($id);
        }
        // global $conversion;
         return $conversion;
}
function validateSignup($form_data){
    $response = array();
            $response['status'] = true;

    if(!$form_data['user_name']){
        $response['msg'] = "اسم المستخدم مطلوب";
        $response['status'] = false;
        $response['field'] = "user_name";
    }

    if(!$form_data['user_email']){
        $response['msg'] = "الايميل مطلوب";
        $response['status'] = false;
        $response['field'] = "user_email";
    }

    if(!$form_data['user_dep']){
        $response['msg'] = "القسم مطلوب";
        $response['status'] = false;
        $response['field'] = "user_dep";
    }
    if(!$form_data['user_num']){
        $response['msg'] = "رقم الهوية مطلوب";
        $response['status'] = false;
        $response['field'] = "user_num";
    }

    if(!$form_data['user_pass']){
        $response['msg'] = "ادخل كلمة السر";
        $response['status'] = false;
        $response['field'] = "user_pass";
    }
    if(isEmailRegistered($form_data['user_email'])){
        $response['msg'] = "هذا الايميل مسجل بالفعل";
        $response['status'] = false;
        $response['field'] = "user_email";
    }
     if(isUsernameRegistered($form_data['user_name'])){
        $response['msg'] = "اسم المستخدم موجود بالفعل";
        $response['status'] = false;
        $response['field'] = "user_name";
    }
    return $response;
}

function followUser($user_id){
    global $dodobe;
    $current_user = $_SESSION['userdata']['user_id'];
    $query = "INSERT INTO follow_list(follower_id,user_id) VALUES($current_user,$user_id)";
    $run = mysqli_query($dodobe, $query);
    return  mysqli_fetch_assoc($run)[0];

}

function like($post_id){
    global $dodobe;
    $current_user = $_SESSION['userdata']['user_id'];
    $query = "INSERT INTO likes(post_id,user_id) VALUES($post_id, $current_user)";
    return  mysqli_query($dodobe, $query);
    //return  mysqli_fetch_assoc($run)[0];
}

function addComment($post_id, $comment){
    global $dodobe;
    $comment = mysqli_real_escape_string($dodobe,$comment);
    $current_user = $_SESSION['userdata']['user_id'];
    $query = "INSERT INTO comments(post_id,user_id,comment) VALUES($post_id, $current_user,'$comment')";
    return  mysqli_query($dodobe, $query);
    //return  mysqli_fetch_assoc($run)[0];
}

function getLikes($post_id){
    global $dodobe;
    $query = "SELECT * FROM likes WHERE post_id = $post_id";
    $run =  mysqli_query($dodobe, $query);
    return  mysqli_fetch_all($run, true);

}

function unlike($post_id){
    global $dodobe;
    $current_user = $_SESSION['userdata']['user_id'];
    $query = "DELETE FROM likes WHERE user_id = $current_user && post_id = $post_id";
    return  mysqli_query($dodobe, $query);
    //return  mysqli_fetch_assoc($run)[0];

}

function unFollowUser($user_id){
    global $dodobe;
    $current_user = $_SESSION['userdata']['user_id'];
    $query = "DELETE FROM follow_list WHERE follower_id = $current_user && user_id = $user_id";
    $run = mysqli_query($dodobe, $query);
    return  mysqli_fetch_assoc($run)[0];

}
///validate login
function validateLogin($form_data){
    $response = array();
    $response['status'] = true;
    $blank = false;

    if(!$form_data['user_name_email']){
        $response['msg'] = "اسم المستخدم او الايميل مطلوب";
        $response['status'] = false;
        $response['field'] = "user_name_email";
            $blank = true;

    }
  

    if(!$form_data['user_pass']){
        $response['msg'] = "ادخل كلمة السر";
        $response['status'] = false;
        $response['field'] = "user_pass";
        $blank = true;

    }
   
    if(!$blank && !checkLogin($form_data)['status']){
        $response['msg'] = "خطأ في الايميل\اسم المستخدم او كلمة المرور";
        $response['status'] = false;
        $response['field'] = "checkuser";

    }else{
    $response['user'] = checkLogin($form_data)['user'];

    }
    
    return $response;
}
//check duplicate email
function isEmailRegistered($email){
    global $dodobe;
    $query = "SELECT count(*) as row FROM user_info WHERE user_email='$email'";
    $run = mysqli_query($dodobe, $query);
    $return_data = mysqli_fetch_assoc($run);
    return $return_data['row'];
}

function isUsernameRegistered($username){
    global $dodobe;
    $query = "SELECT count(*) as row FROM user_info WHERE user_name='$username'";
    $run = mysqli_query($dodobe, $query);
    $return_data = mysqli_fetch_assoc($run);
    return $return_data['row'];
}
function isUsernameRegisteredByOther($username){
    global $dodobe;
    $user_id = $_SESSION['userdata']['user_id'];
    $query = "SELECT count(*) as row FROM user_info WHERE user_name='$username' && user_id!='$user_id'";
    $run = mysqli_query($dodobe, $query);
    $return_data = mysqli_fetch_assoc($run);
    return $return_data['row'];
}

function showError($field){
    if(isset($_SESSION['error'])){
        $error = $_SESSION['error'];
        if(isset($error['field']) && $field == $error['field']){
?>
<div class="text-danger">
    <?=$error['msg']?>
</div>
<?php
    }
}
}

function showFormData($field){
    if(isset($_SESSION['formdata'])){
    $formdata = $_SESSION['formdata'];
    return $formdata[$field];
}
}
//checkUser
function checkLogin($login_data){
global $dodobe;
$user_name_email = $login_data['user_name_email'];
$password = md5($login_data['user_pass']);
$query = "SELECT * FROM user_info WHERE (user_name = '$user_name_email' || user_email = '$user_name_email') && user_pass = '$password'";
$run = mysqli_query($dodobe,$query);
$data['user'] = mysqli_fetch_assoc($run)?? array();

if(count($data['user'])>0){
    $data['status'] =true;
}else{
    $data['status'] =false;
}
return $data;
}

//checkUser
function getUser($user_id){
    global $dodobe;
    $query = "SELECT * FROM user_info WHERE user_id=$user_id";
    $run = mysqli_query($dodobe,$query);
    return mysqli_fetch_assoc($run);
}

function gettime($date){
    return date('H:i - (F jS, Y)',strtotime($date));
}
function getComments($post_id){
    global $dodobe;
    $query = "SELECT * FROM comments WHERE post_id=$post_id";
    $run = mysqli_query($dodobe,$query);
    return mysqli_fetch_all($run, true);
}
//for getting posts
function getPostById($user_id){
    global $dodobe;
    $query = "SELECT * FROM posts WHERE user_id = $user_id ORDER BY id DESC";
    $run = mysqli_query($dodobe,$query);
    return mysqli_fetch_all($run,true);
}

function getUserByUsername($user_name){
    global $dodobe;
    $query = "SELECT * FROM user_info WHERE user_name='$user_name'";
    $run = mysqli_query($dodobe,$query);
    return mysqli_fetch_assoc($run);
}



//for getting posts
function getPost(){
    global $dodobe;
    $query = "SELECT posts.id,posts.user_id,posts.post_img,posts.post_text,posts.created_at,user_info.user_name,user_info.user_img FROM posts JOIN user_info ON user_info.user_id=posts.user_id";
    $run = mysqli_query($dodobe,$query);
    return mysqli_fetch_all($run,true);
}

//for getting posts
function getHomePost(){
    global $dodobe;
    $query = "SELECT posts.id,posts.user_id,posts.post_img,posts.post_text,posts.created_at,user_info.user_name,user_info.user_img FROM posts JOIN user_info ON user_info.user_id=posts.user_id";
    $run = mysqli_query($dodobe,$query);
    return mysqli_fetch_all($run,true);
}
function filterPost(){
     $list = getPost();
        $filter_list = array();
        foreach($list as $post){
            if(checkFllowStatus($post['user_id']) || $post['id']==$_SESSION['userdata']['user_id']){
                $filter_list[] = $post;
            }
        }
        return $filter_list;


}
//create new user
function createUser($data){
    global $dodobe;
    $user_token = 123;
    $user_name = mysqli_real_escape_string($dodobe,$data['user_name']);
    $user_email = mysqli_real_escape_string($dodobe,$data['user_email']);
    $user_dep = mysqli_real_escape_string($dodobe,$data['user_dep']);
    $user_num = mysqli_real_escape_string($dodobe,$data['user_num']);
    $user_pass = mysqli_real_escape_string($dodobe,$data['user_pass']);
    $user_pass = md5($user_pass);
    $user_img = mysqli_real_escape_string($dodobe,$data['user_img']);
    $user_type = "ss";
    $query = "INSERT INTO user_info(user_token,user_name,user_email,user_dep,user_num,user_pass,user_img,user_type)";
    $query.= "VALUES ('$user_token','$user_name','$user_email','$user_dep','$user_num','$user_pass','$user_img','$user_type')";
    return mysqli_query($dodobe,$query);
}
function verifyEmail($email){
global $dodobe;
$query = "UPDATE user_info SET ac_status=1 WHERE user_email = '$email'";
return mysqli_query($dodobe,$query);
}

function validateUpateProfile($form_data,$image_data){
        $response = array();
            $response['status'] = true;

    if(!$form_data['user_name']){
        $response['msg'] = "اسم المستخدم مطلوب";
        $response['status'] = false;
        $response['field'] = "user_name";
    }

    if(!$form_data['user_dep']){
        $response['msg'] = "القسم مطلوب";
        $response['status'] = false;
        $response['field'] = "user_dep";
    }
    if(!$form_data['user_num']){
        $response['msg'] = "رقم الهوية مطلوب";
        $response['status'] = false;
        $response['field'] = "user_num";
    }

     if(isUsernameRegisteredByOther($form_data['user_name'])){
        $response['msg'] = $form_data['user_name'] ."اسم المستخدم موجود بالفعل";
        $response['status'] = false;
        $response['field'] = "user_name";
    }
    if($image_data['name']){
        $image = basename($image_data['name']);
        $type = strtolower(pathinfo($image,PATHINFO_EXTENSION));
        $size = $image_data['size'] /1024;

        if($type!='jpg' && $type!='jpeg' && $type!='png'){
            $response['msg'] = "only jpg,jpeg,png الامتداد المسموح";
            $response['status'] = false;
            $response['field'] = "user_img";
        }
        if($size>4096){
            $response['msg'] = "حجم الصورة يجب ان يكون اصغر من 4 ميكابيايت";
            $response['status'] = false;
            $response['field'] = "user_img";
        }
    }

    
    return $response;
}

function updateProfile($data,$imagedata){
global $dodobe;
$user_name = mysqli_real_escape_string($dodobe,$data['user_name']);
$user_dep = mysqli_real_escape_string($dodobe,$data['user_dep']);
$user_num = mysqli_real_escape_string($dodobe,$data['user_num']);
$user_pass = mysqli_real_escape_string($dodobe,$data['user_pass']);

if(!$data['user_pass']){
    $user_pass = $_SESSION['userdata']['user_pass'];
}else{
    $user_pass = md5($user_pass);
    $_SESSION['userdata']['user_pass'] = $user_pass;
}

$user_img = "";
if($imagedata['name']){
        $image_name =time(). basename($imagedata['name']);
        $image_dir = "../images/profile/$image_name";
        move_uploaded_file($imagedata['tmp_name'],$image_dir);
        //return $image_dir;
        $user_img = ", user_img='$image_name'";
    }

$query = "UPDATE user_info SET user_name = '$user_name',user_dep='$user_dep', user_num='$user_num', user_pass='$user_pass' $user_img WHERE user_id=".$_SESSION['userdata']['user_id'];
return mysqli_query($dodobe, $query);
}

//add post
function validatePostImage($image_data){
    $response = array();
    $response['status'] = true;
    if(!$image_data['name']){
        $response['msg'] = "لم يتم اختيار صورة";
        $response['status'] = false;
        $response['field'] = "post_img";
    }else{
        $image = basename($image_data['name']);
        $type = strtolower(pathinfo($image,PATHINFO_EXTENSION));
        $size = $image_data['size'] /1024;
        if($size>4096){
            $response['msg'] = "حجم الصورة يجب ان يكون اصغر من 4 ميكابيايت";
            $response['status'] = false;
            $response['field'] = "user_img";
        }

        if($type!='jpg' && $type!='jpeg' && $type!='png' &&  $type!='mp4' && $type!='wmv'){
            $response['msg'] = "only jpg,jpeg,png,mp4,wmv الامتداد المسموح";
            $response['status'] = false;
            $response['field'] = "post_img";
        }
    }
            




    return $response;
}

function validatePost($image_data){
        $response = array();
            $response['status'] = true;

    if(!$image_data['name']){
        $response['msg'] = "اختر صورة";
        $response['status'] = false;
        $response['field'] = "post_img";
    }


    if($image_data['name']){
        $image = basename($image_data['name']);
        $type = strtolower(pathinfo($image,PATHINFO_EXTENSION));
        $size = $image_data['size'] /1024;

        if($type!='jpg' && $type!='jpeg' && $type!='png'){
            $response['msg'] = "only jpg,jpeg,png الامتداد المسموح";
            $response['status'] = false;
            $response['field'] = "post_img";
        }
        if($size>4096){
            $response['msg'] = "حجم الصورة يجب ان يكون اصغر من 4 ميكابيايت";
            $response['status'] = false;
            $response['field'] = "post_img";
        }
    }

    
    return $response;
}

//create new POST
function createPOST($text,$image){
    global $dodobe;
    $post_text = mysqli_real_escape_string($dodobe,$text['post_text']);
    $user_id = $_SESSION['userdata']['user_id'];

        $image_name =time(). basename($image['name']);
        $image_dir = "../images/posts/$image_name";
        move_uploaded_file($image['tmp_name'],$image_dir);

    $query = "INSERT INTO posts(user_id,post_img,post_text)";
    $query.= "VALUES ('$user_id','$image_name','$post_text')";
    return mysqli_query($dodobe,$query);
}

//user for flow sugessions
   function getFollowSuggestion(){
        global $dodobe;
      $current_user = $_SESSION['userdata']['user_id'];
      $query = "SELECT * FROM user_info WHERE user_id != $current_user";
     $run =  mysqli_query($dodobe, $query);
    return mysqli_fetch_all($run,true);

   }

   //get count fllowers 
function getFollowers($user_id){
  global $dodobe;
      $query = "SELECT * FROM follow_list WHERE user_id = $user_id";
     $run =  mysqli_query($dodobe, $query);
    return mysqli_fetch_all($run,true);
}

function getFollowing($user_id){
  global $dodobe;
      $query = "SELECT * FROM follow_list WHERE follower_id = $user_id";
     $run =  mysqli_query($dodobe, $query);
    return mysqli_fetch_all($run,true);
}

   // filter flow suggestion

   function filterFollowSuggestion(){
        $list = getFollowSuggestion();
        $filter_list = array();
        foreach($list as $user){
            if(!checkFllowStatus($user['user_id'])){
                $filter_list[] = $user;
            }
        }
        return $filter_list;

   }

   //for checking is user flowed or not
function checkFllowStatus($user_id){
        global $dodobe;
      $current_user = $_SESSION['userdata']['user_id'];
      $query = "SELECT count(*) as row FROM follow_list WHERE follower_id = $current_user && user_id = $user_id";
    $run =  mysqli_query($dodobe, $query);
    return mysqli_fetch_assoc($run)['row'];
}

   //for checking is user flowed or not
function checkLikeStatus($post_id){
        global $dodobe;
      $current_user = $_SESSION['userdata']['user_id'];
      $query = "SELECT count(*) as row FROM likes WHERE user_id = $current_user && post_id = $post_id";
    $run =  mysqli_query($dodobe, $query);
    return mysqli_fetch_assoc($run)['row'];
}
?>