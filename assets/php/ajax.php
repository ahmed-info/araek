<?php
require_once 'functions.php'; 
global $dodobe;

 if(isset($_GET['getmessages'])){
 
     $chats = getAllMessages();
      $chatlist = "";
     foreach($chats as $chat){
        $ch_user= getUser($chat['user_id']);
        $seen =false;
        if($chat['messages'][0]['read_status']==1){
          $seen = true;
        }
        $chatlist .='<li class="clearfix"  style="display: flex;margin-top: 16px;" data-bs-toggle="modal" data-bs-target="#chatbox">
                    <img src="assets/images/profile/default.jpg"  width="60" alt="avatar">
                    <div class="about">
                      <div class="name" style="font-weight: bold;">اسم</div>
                      <div class="msg">رسالة</div>
                      <div class="status">'.'<i class="fa fa-circle offline"></i>وقت</div>
                    </div>
                  </li>';

     }
     $json['chatlist']= $chatlist;
     if(isset($_POST['chatter_id']) && $_POST['chatter_id']!=0){
       $messages = getMessages($_POST['chatter_id']);
       $chatmsg = "";
       foreach($messages as $cm){
          $chatmsg .='<div>www</div>';
       }
      //$json['chat'] = $messages;
    }
    echo json_encode($json);

}
if(isset($_GET['follow'])){
//if(true){
    $user_id = $_POST['user_id'];
    if(followUser($user_id)){
        $response['status'] =true;
    }else{
        $response['status'] =false;

    }
    echo json_encode($response);
}

if(isset($_GET['unfollow'])){
    $user_id = $_POST['user_id'];
    if(unfollowUser($user_id)){
        $response['status'] =true;
    }else{
        $response['status'] =false;

    }
    echo json_encode($response);
}

if(isset($_GET['like'])){
     $post_id = $_POST['post_id'];
     $user_id = $_POST['user_id'];
     if(!checkLikeStatus($post_id)){
 if(like($post_id)){
        $response['status'] =true;
    }else{
        $response['status'] =false;

    }
    echo json_encode($response);
     } 
}

if(isset($_GET['unlike'])){
     $post_id = $_POST['post_id'];
     $user_id = $_POST['user_id'];
     if(checkLikeStatus($post_id)){
 if(unlike($post_id)){
        $response['status'] =true;
    }else{
        $response['status'] =false;

    }
    echo json_encode($response);
     } 
}


if(isset($_GET['addcomment'])){
     $post_id = $_POST['post_id'];
     $comment = $_POST['comment'];
    if(addComment($post_id,$comment)){
        $response['status'] =true;
      $cuser=  getUser($_SESSION['userdata']['user_id']);
        $response['comment'] = '<div class="card mb-3" id="comment-section'.$post_id.'" dir="rtl">
          <div class="card-body mb-3">
            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                src="assets/images/profile/'.$cuser['user_img'].'" alt="avatar" width="40"
                height="40" />
              <div class="w-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h6 class="text-primary fw-bold mb-0">
                    '.$cuser['user_name'].'
                  </h6>
                  <p class="mb-0">2 days ago</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <p class="mb-0" style="color: #aaa;">
                                        <span class="text-dark ms-2">'.$comment.'</span>
                  </p>
                 
                </div>
              </div>
            </div>
          </div>
        </div>';
    }else{
         $response['status'] =false;
    }
     echo json_encode($response);
}
?>