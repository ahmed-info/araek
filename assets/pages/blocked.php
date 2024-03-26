<?php 
global $user;
?>
<body class="style0">
    <div class="container">
<div class="row">
  <div class="col-lg-6 offset-lg-3">
      <div class="card mt-5 alert alert-danger" role="alert">
  <div class=" text-end text-danger h4 fw-bold">
    تنوية
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p class="text-center"> تم حظرك  بواسطة الادمن <?=$user['user_name']?></p>
      <a href="assets/php/actions.php?logout" class="btn btn-primary float-end">تسجيل خروج</a>
    </blockquote>
  </div>
    </div>
  </div>
</div>

</div>
</body>
</html>

