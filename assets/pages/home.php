<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">


  <title>الصفحة الرئيسية</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link href="assets/css/style_home.css" rel="stylesheet">

</head>

<body>
  <?php
  global $user;
  global $posts;
  global $follow_suggestion;
  //echo "<pre>";
  print_r($follow_suggestion);
  ?>
  <div class="container">
    <div class="profile-page tx-13">
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="profile-header">
            <div class="cover">
              <div class="gray-shade"></div>
              <figure>
                <img src="https://bootdey.com/img/Content/bg1.jpg" class="img-fluid" alt="profile cover">
              </figure>
              <div class="cover-body d-flex justify-content-between align-items-center">
                <div>
                  <img class="profile-pic" src="assets/images/profile/<?= $user['user_img'] ?>" alt="profile">
                  <span class="profile-name">
                    <a href="?u=<?= $user['user_name'] ?>">
                      <?= $user['user_name'] ?>

                    </a>
                  </span>
                </div>
                <div class="d-none d-md-block">
                  <a href="?editprofile" class="btn btn-primary btn-icon-text btn-edit-profile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit btn-icon-prepend">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg> تعديل البروفايل
                  </a>
                  <a href="assets/php/actions.php?logout" class="btn btn-primary">logout</a>
                </div>
              </div>
            </div>
            <div class="header-links">
              <ul class="links d-flex align-items-center mt-3 mt-md-0">
                <li class="header-link-item d-flex align-items-center active">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns mr-1 icon-md">
                    <path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path>
                  </svg>
                  <a class="pt-1px d-none d-md-block" href="#">Timeline</a>
                </li>
                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mr-1 icon-md">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                  </svg>
                  <a class="pt-1px d-none d-md-block" href="assets/pages/chat_app.php">مراسلة</a>
                </li>
                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users mr-1 icon-md">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                  </svg>
                  <a class="pt-1px d-none d-md-block" href="#">Friends <span class="text-muted tx-12">3,765</span></a>
                </li>
                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image mr-1 icon-md">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                    <polyline points="21 15 16 10 5 21"></polyline>
                  </svg>
                  <a class="pt-1px d-none d-md-block" href="#">Photos</a>
                </li>
                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                  <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 885.389 885.389" xml:space="preserve">
                    <g>
                      <path d="M560.988,212.188c-179.2,0-324.4,145.2-324.4,324.4s145.2,324.4,324.4,324.4c179.2,0,324.4-145.2,324.4-324.4
		S740.188,212.188,560.988,212.188z M745.789,570.188c0,11-9,20-20,20h-91.2c-11,0-20,9-20,20v91.2c0,11-9,20-20,20h-67.2
		c-11,0-20-9-20-20v-91.2c0-11-9-20-20-20H386.188c-5.5,0-10-4.5-10-10v-77.199c0-11,9-20,20-20h91.201c11,0,20-9,20-20v-91.2
		c0-11,9-20,20-20h67.2c11,0,20,9,20,20v91.2c0,11,9,20,20,20h91.2c11,0,20,9,20,20V570.188z" />
                      <path d="M153.588,416.489c5.6,0.1,10.7-3.301,12.8-8.4l60.7-145.8c2-4.9,5.9-8.8,10.8-10.8l145.8-60.7c5.2-2.2,8.5-7.2,8.4-12.8
		c-0.101-5.6-3.601-10.6-8.8-12.6l-364.4-140.1c-5.1-1.9-10.8-0.7-14.6,3.1l-0.3,0.3c-3.8,3.8-5,9.6-3.1,14.6l140.1,364.399
		C142.988,412.989,147.988,416.489,153.588,416.489z" />
                    </g>
                  </svg>
                  <a class="pt-1px d-none d-md-block" href="#" data-bs-toggle="modal" data-bs-target="#addpost">اضافة منشور</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row profile-body">

        <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
          <div class="card rounded">
            <div class="card-body">
              <div id="plist" class="people-list">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Search...">
                </div>
                <ul class="list-unstyled chat-list mt-2 mb-0" id="chatlist">
                  <li class="clearfix"  style="display: flex;">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"  width="60" alt="avatar">
                    <div class="about">
                      <div class="name" style="font-weight: bold;">Vincent</div>
                      <div class="msg">Vincent</div>
                      <div class="status"> <i class="fa fa-circle online"></i> left 7 mins ago </div>
                    </div>
                  </li>
                  
                  
                  
                </ul>
              </div>
            </div>
          </div>
        </div>


        <div class="col-md-8 col-xl-6 middle-wrapper">
          <div class="row">
            <?php
            showError("post_img");
            foreach ($posts as $post) {
              $likes = getLikes($post['id']);
              $comments = getComments($post['id']);
            ?>
              <div class="col-md-12 mb-2">
                <div class="card rounded">
                  <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="d-flex align-items-center">
                        <?php
                        $myimg = "";
                        if ($post['post_img'] == '' || $post['post_img'] == null) {
                          $myimg = "assets/images/profile/default.jpg";
                        } else {

                          $myimg = "assets/images/profile/" . $post['user_img'];
                        }
                        ?>

                        <img class="img-xs rounded-circle" src="<?= $myimg ?>" alt="ok">
                        <div class="ml-2">
                          <p><?= $post['user_name'] ?></p>
                          <p class="tx-11 text-muted">1 min ago</p>
                        </div>
                      </div>
                      <div class="dropdown">
                        <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg pb-3px">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="19" cy="12" r="1"></circle>
                            <circle cx="5" cy="12" r="1"></circle>
                          </svg>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                          <a class="dropdown-item d-flex align-items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-meh icon-sm mr-2">
                              <circle cx="12" cy="12" r="10"></circle>
                              <line x1="8" y1="15" x2="16" y2="15"></line>
                              <line x1="9" y1="9" x2="9.01" y2="9"></line>
                              <line x1="15" y1="9" x2="15.01" y2="9"></line>
                            </svg> <span class>Unfollow</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-right-up icon-sm mr-2">
                              <polyline points="10 9 15 4 20 9"></polyline>
                              <path d="M4 20h7a4 4 0 0 0 4-4V4"></path>
                            </svg> <span class>Go to post</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2 icon-sm mr-2">
                              <circle cx="18" cy="5" r="3"></circle>
                              <circle cx="6" cy="12" r="3"></circle>
                              <circle cx="18" cy="19" r="3"></circle>
                              <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                              <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                            </svg> <span class>Share</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy icon-sm mr-2">
                              <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                              <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg> <span class>Copy link</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <p class="mb-3 tx-14"><?= $post['post_text'] ?></p>
                    <img class="img-fluid" src="assets/images/posts/<?= $post['post_img'] ?>" alt>
                  </div>
                  <div class="card-footer">
                    <div class="d-flex post-actions" style="margin-bottom: 0;padding-bottom: 0;">
                      <?php if (checkLikeStatus($post['id'])) {
                      ?>
                        <a href="javascript:;" class="fa-regular fa-heart fa-solid text-decoration-none text-muted me-3 unlike_btn" data-user-id="<?= $user['user_id'] ?>" data-post-id="<?= $post['id'] ?>">

                        <?php
                      } else {
                        ?>
                          <a href="javascript:;" class="fa-regular fa-heart text-decoration-none text-muted me-3 like_btn" data-user-id="<?= $user['user_id'] ?>" data-post-id="<?= $post['id'] ?>">

                          <?php

                        } ?>



                          Like</i>
                          </a>
                          <a href="javascript:;" id="comment" class="text-decoration-none text-muted me-3">

                            <p class=""><i class="fa-regular fa-message"></i>Comment</p>

                          </a>

                    </div>
                    <span id="countLike" style="top: -10px;">
                      <?= count($likes) ?>
                    </span> Like

                    <span id="countLike" style="top: -10px;">
                      <?= count($comments) ?>
                    </span> Comments
                    <div id="commentBar" class="d-flex" dir="rtl">
                      <input type="text" class="form-control comment-input" name="comment" class="form-control" placeholder="اكتب تعليقا...">
                      <button class="add-comment btn btn-primary" data-cs="comment-section<?= $post['id'] ?>" type="submit" class="btn btn-primary mx-2" data-post-id="<?= $post['id'] ?>">اضافة</button>
                    </div>

                    <!-- comment -->
                    <section style="background-color: #f7f6f6;">
                      <div class="container my-1 py-4 text-dark">
                        <div class="row d-flex justify-content-center">
                          <div class="col-md-12 col-lg-12 col-xl-12">
                            <?php
                            $comments = getComments($post['id']);
                            if (count($comments) < 1) {
                            ?>
                              <p style="text-align: right;">لا توجد تعليقات</p>
                            <?php
                            }
                            foreach ($comments as $comment) {
                              $cuser = getUser($comment['user_id']);

                            ?>
                              <div class="card mb-3" id="comment-section<?= $post['id'] ?>" dir="rtl">
                                <div class="card-body">
                                  <div class="d-flex flex-start">
                                    <img class="rounded-circle shadow-1-strong me-3" src="assets/images/profile/<?= $cuser['user_img'] ?>" alt="avatar" width="40" height="40" />
                                    <div class="w-100">
                                      <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="text-primary fw-bold mb-0">
                                          <?= $cuser['user_name'] ?>
                                        </h6>
                                        <p class="mb-0">2 days ago</p>
                                      </div>
                                      <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0" style="color: #aaa;">
                                          <span class="text-dark ms-2"><?= $comment['comment'] ?></span>
                                        </p>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php
                            }
                            ?>



                          </div>
                        </div>
                      </div>
                    </section>
                    <!-- end comment -->



                  </div>

                </div>
              </div>
            <?php
            }
            ?>



          </div>
        </div>


        <div class="d-none d-xl-block col-xl-3 right-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card rounded">
                <div class="card-body">
                  <h6 class="card-title">latest photos</h6>
                  <div class="latest-photos">
                    <div class="row">
                      <div class="col-md-4">
                        <figure>
                          <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt>
                        </figure>
                      </div>
                      <div class="col-md-4">
                        <figure>
                          <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt>
                        </figure>
                      </div>
                      <div class="col-md-4">
                        <figure>
                          <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt>
                        </figure>
                      </div>
                      <div class="col-md-4">
                        <figure>
                          <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt>
                        </figure>
                      </div>
                      <div class="col-md-4">
                        <figure>
                          <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar5.png" alt>
                        </figure>
                      </div>
                      <div class="col-md-4">
                        <figure>
                          <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt>
                        </figure>
                      </div>
                      <div class="col-md-4">
                        <figure class="mb-0">
                          <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt>
                        </figure>
                      </div>
                      <div class="col-md-4">
                        <figure class="mb-0">
                          <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar8.png" alt>
                        </figure>
                      </div>
                      <div class="col-md-4">
                        <figure class="mb-0">
                          <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar9.png" alt>
                        </figure>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 grid-margin">
              <div class="card rounded">
                <div class="card-body">

                  <h6 class="card-title">suggestions for you</h6>
                  <?php
                  if (count($follow_suggestion) < 1) {
                    echo "<p>لا توجد</p>";
                  }
                  foreach ($follow_suggestion as $sugest) {
                  ?>
                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                      <div class="d-flex align-items-center hover-pointer">
                        <img class="img-xs rounded-circle" src="assets/images/profile/<?= $sugest['user_img'] ?>" alt>
                        <div class="ml-2">
                          <a href="?u=<?= $sugest['user_name'] ?>" class="text-muted">

                            <p><?= $sugest['user_name'] ?></p>
                          </a>
                          <p class="tx-11 text-muted">12 Mutual Friends</p>
                        </div>
                      </div>
                      <button class="btn btn-icon folowBtn" data-user-id="<?= $sugest['user_id'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus" data-toggle="tooltip" title data-original-title="Connect">
                          <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                          <circle cx="8.5" cy="7" r="4"></circle>
                          <line x1="20" y1="8" x2="20" y2="14"></line>
                          <line x1="23" y1="11" x2="17" y2="11"></line>
                        </svg>
                      </button>
                    </div>
                  <?php
                  }

                  ?>






                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="addpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <h1 class="modal-title fs-5" id="exampleModalLabel">اضافة منشور</h1>
        </div>
        <div class="modal-body text-right" dir="rtl">
          <img src="../assets/images/profile/default.jpg" height="300" alt="" id="post_img" style="display:none">
          <form method="POST" action="assets/php/actions.php?addpost" enctype="multipart/form-data">
            <label for="exampleInputFile">اختر صورة او فيديو</label>

            <div class="my-3">
              <input type="file" name="post_img" class="form-control" id="select_post_img">
            </div>

            <textarea name="post_text" id="" class="form-control mb-3" style="padding-top: 10px;" cols="30" rows="5"></textarea>
            <button type="submit" class="btn btn-primary">نشر</button>
          </form>
        </div>

      </div>
    </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="chatbox" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column gap-2" id="user_chat">
        <div class="py-2 px-3 border rounded shadow-sm col-8 d-inline-block">
          hiii how are you <br>
          <span style="font-size: small;" class="text-muted">14:0, 7-12-2024</span>
      </div>

      <div class="py-2 px-3 border rounded shadow-sm col-8 align-self-end bg-primary text-light d-inline-block">
          fine thanks <br>
          <span style="font-size: small;">14:0, 7-12-2024</span>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="../assets/js/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
  <script src="../assets/js/custom.js?v=<?= time() ?>">

  </script>

</body>

</html>