<?php 
global $profile;
global $profile_post;
global $user;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="../assets/css/style.css">

<!------------------LIght BOx for Gallery-------------->
<link rel="stylesheet" href="../assets/css/lightbox.min.css">
<script type="text/javascript" src="../assets/js/lightbox-plus-jquery.min.js"></script>
<!------------------LIght BOx for Gallery-------------->





<title>Application</title>
</head>
<body>


    <!-------------------------------NAvigation Starts------------------>

    <nav class="navbar navbar-expand-md navbar-dark" style="background-color:#3097D1">
            <a href="index.html" class="navbar-brand"><img src="img/brand-white.png" alt="logo" class="img-fluid" width="80px" height="100px"></a>
    
            <button class="navbar-toggler" data-toggle="collapse" data-target="#responsive"><span class="navbar-toggler-icon"></span></button>
    
    
            <div class="collapse navbar-collapse" id="responsive">
                <ul class="navbar-nav mr-auto text-capitalize">
                    <li class="nav-item"><a href="index.html" class="nav-link active">home</a></li>
                    <li class="nav-item"><a href="profile.html" class="nav-link">profile</a></li>
                    <li class="nav-item"><a href="#modalview" data-toggle="modal" class="nav-link">messages</a></li>
                    <li class="nav-item"><a href="notification.html" class="nav-link">docs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link d-md-none">growl</a></li>
                    <li class="nav-item"><a href="#" class="nav-link d-md-none">logout</a></li>
    
                </ul>
    
                <form action="" class="form-inline ml-auto d-none d-md-block">
                    <input type="text" name="search" id="search" placeholder="Search" class="form-control form-control-sm">
                </form>
                <a href="notification.html" class="text-decoration-none" style="color:#CBE4F2;font-size:22px;"><i class="far fa-bell ml-3 d-none d-md-block"></i></a> 
                <img                        src="../assets/images/profile/<?=$profile['user_img']?>"
 alt="" class="rounded-circle ml-3 d-none d-md-block" width="32px" height="32px">
    
    
    
    
    
            </div>
    
    
    
    
        </nav>
    

        <!---------------------------------------------Ends navigation------------------------------>







         <!---------------------------MOdal Section  satrts------------------->

    <div class="modal fade" id="modalview" >
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    
                <div class="modal-content">
    
    
                    <div class="modal-header">
                        <div class="modal-title h4">Messages</div>
    
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
    
    
                    <div class="modal-body">
    
    
                        <ul class="list-unstyled">
    
    
                         <a href="#" class="text-decoration-none">
                            <li class="media hover-media">
                               
                                    <img src="img/avatar-dhg.png" alt="img" width="60px" height="60px" class="rounded-circle mr-3">
    
                                    <div class="media-body text-dark">
                                            <h6 class="media-header">Jchob Thunder and <strong> 1 others</strong></h6>
                                            <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    
                                    </div>
    
                            </li>
                        </a>
                        <hr class="my-3">
    
    
                        
                        <a href="#" class="text-decoration-none">
                                <li class="media hover-media">
                                   
                                        <img src="../assets/img/avatar-fat.jpg" alt="img" width="60px" height="60px" class="rounded-circle mr-3">
        
                                        <div class="media-body text-dark">
                                                <h6 class="media-header">Mark Otto and <strong> 3 others</strong></h6>
                                                <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        
                                        </div>
        
                                </li>
                            </a>
    
    
                            <hr class="my-3">
    
    
                            <a href="#" class="text-decoration-none">
                                <li class="media hover-media">
                                   
                                        <img src="img/avatar-mdo.png" alt="img" width="60px" height="60px" class="rounded-circle mr-3">
        
                                        <div class="media-body text-dark">
                                                <h6 class="media-header">Archer andu and <strong> 5 others</strong></h6>
                                                <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        
                                        </div>
        
                                </li>
                            </a>
    
                            <hr class="my-3">
    
    
                            <a href="#" class="text-decoration-none">
                                    <li class="media hover-media">
                                       
                                            <img src="img/avatar-dhg.png" alt="img" width="60px" height="60px" class="rounded-circle mr-3">
            
                                            <div class="media-body text-dark">
                                                    <h6 class="media-header">Jchob Thunder and <strong> 1 others</strong></h6>
                                                    <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            
                                            </div>
            
                                    </li>
                                </a>
                                <hr class="my-3">
            
            
                                
                                <a href="#" class="text-decoration-none">
                                        <li class="media hover-media">
                                           
                                                <img src="img/avatar-fat.jpg" alt="img" width="60px" height="60px" class="rounded-circle mr-3">
                
                                                <div class="media-body text-dark">
                                                        <h6 class="media-header">Mark Otto and <strong> 3 others</strong></h6>
                                                        <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                
                                                </div>
                
                                        </li>
                                    </a>
            
            
                                    <hr class="my-3">
            
            
                                    <a href="#" class="text-decoration-none">
                                        <li class="media hover-media">
                                           
                                                <img src="../img/avatar-mdo.png" alt="img" width="60px" height="60px" class="rounded-circle mr-3">
                
                                                <div class="media-body text-dark">
                                                        <h6 class="media-header">Archer andu and <strong> 5 others</strong></h6>
                                                        <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                
                                                </div>
                
                                        </li>
                                    </a>
    
                            
                                    <hr class="my-3">
                                    <a href="#" class="text-decoration-none">
                                            <li class="media hover-media">
                                               
                                                    <img src="img/avatar-dhg.png" alt="img" width="60px" height="60px" class="rounded-circle mr-3">
                    
                                                    <div class="media-body text-dark">
                                                            <h6 class="media-header">Jchob Thunder and <strong> 1 others</strong></h6>
                                                            <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    
                                                    </div>
                    
                                            </li>
                                        </a>
                                        <hr class="my-3">
                    
                    
                                        
                                        <a href="#" class="text-decoration-none">
                                                <li class="media hover-media">
                                                   
                                                        <img src="../img/avatar-fat.jpg" alt="img" width="60px" height="60px" class="rounded-circle mr-3">
                        
                                                        <div class="media-body text-dark">
                                                                <h6 class="media-header">Mark Otto and <strong> 3 others</strong></h6>
                                                                <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        
                                                        </div>
                        
                                                </li>
                                            </a>
                    
                    
                                            <hr class="my-3">
                    
                    
                                            <a href="#" class="text-decoration-none">
                                                <li class="media hover-media">
                                                   
                                                        <img src="img/avatar-mdo.png" alt="img" width="60px" height="60px" class="rounded-circle mr-3">
                        
                                                        <div class="media-body text-dark">
                                                                <h6 class="media-header">Archer andu and <strong> 5 others</strong></h6>
                                                                <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        
                                                        </div>
                        
                                                </li>
                                            </a>
        
        
    
    
                        </ul>
    
    
    
                        
    
                    </div>
                </div>
    
    
            </div>
    
    
        </div>
    
        <!-------------------------------MOdal Ends---------------------------->
    



















        <!-----------------------------------Banner/img Starts-------------------->


        <div class="banner">
            <div class="banner-title d-flex flex-column justify-content-center align-items-center">
                <img src="../assets/images/profile/<?=$profile['user_img']?>" alt="img" class="rounded-circle" width="80px" height="80px">
                <h3 class="text-dark"><?=$profile['user_name']?></h3>
               
<?php if($user['user_id'] != $profile['user_id']){

      if(checkFllowStatus($profile['user_id'])){
?>
 <button class="btn btn-danger unfollowbtn" data-user-id="<?=$profile['user_id']?>">
        un follow1
</button>
<?php

}else{
        ?>
         <button class="btn btn-primary followBtn" data-user-id="<?=$profile['user_id']?>">
        follow
</button>
        <?php
} ?>
        <?php
        }
        ?>
<div class="d-flex mt-2">
    <div class="btn btn-info d-flex mr-2"><?=count($profile_post)?> post</div>
        <div class="btn btn-success d-flex mr-2"><?=count($profile['following'])?> following</div>
        <div class="btn btn-warning d-flex mr-2"><?=count($profile['followers'])?> follower</div>
</div>

 <?php
                if(count($profile_post) <1){
                ?>
                                <p class="text-dark bg-white w-75 text-center mt-3 py-2 ">لا توجد منشورات</p>

                <?php
                }
                ?>
    
                
            </div>


            <div class="banner-end d-flex justify-content-center align-items-end">
                <ul class="nav text-light">
                    <li class="nav-item nav-link active">Photos</li>
                    <li class="nav-item nav-link">Others</li>
                    <li class="nav-item nav-link">Anothers</li>

                </ul>

            </div>


            

        </div>

        <!--------------------Image Portfolio----------------->


        <div class="grid-template container my-4">
                <?php foreach($profile_post as $index=> $item){
                        ?>
                        <div class="item-<?=$index +1?>">
                                <a href="../portfolio/img1.jpg" data-lightbox="id"><img src="assets/images/posts/<?=$item['post_img']?>" alt="" class="img-fluid" style="width:455px; height: 255px;"></a>     
                        </div>
                        <?php
                        }?>
          
           




                        
                                
                                
            
        
    




        </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
	$(document).ready(function(){
        $('.unfollowbtn').click(function () {
        
         $.ajax({
            type: "POST",
            url: "assets/php/ajax.php?unfollow",
            data: { user_id: user_id_value },
            dataType: 'json',
            success: function (response) {
                //console.log(response);
                if (response.status) {
                    $(button).text('متابعة');
                    $(button).data("userId", 0);
                    $(button).html("<i class='bi bi-check-circle-fill'></i>");
                } else {
                        $(button).removeClass('btn-primary');
                    $(button).addClass('btn-danger');
                }
                console.log(response);
            },
            error: function (error) {
                console.log(error.responseText);

            }

        });

        

        



         $('.folowBtn').click(function () {
        var user_id_value = $(this).data("userId");
        var button = this;
        $(button).attr('disabled', true);

        $.ajax({
            type: "POST",
            url: "assets/php/ajax.php?follow",
            data: { user_id: user_id_value },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $(button).attr('disabled', false);
                    $(button).data("userId", 0);
                    $(button).html("<i class='bi bi-check-circle-fill'></i>");
                } else {

                }
                console.log(response);
            },
            error: function (error) {
                console.log(error.responseText);

            }

        });
    });
    });
        });
</script>


</body>
</html>