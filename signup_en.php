<?php 
require_once('assets/php/functions.php');
showPage("header",['page_title'=>'signup page','style'=>'style_login']);
?>
<body class="style0">
<form method="POST" action="assets/php/actions.php?signup">

  <div class="style09">
  <img class="style07" src="assets/pic/logo.png"/>

  <input  autocomplete="off" name="user_name" class="style01" type="text" value="<?=showFormData('user_name')?>" placeholder="Name"/>
  <?=showError('user_name')?>
  <input  autocomplete="off" name="user_email" class="style01" type="email" value="<?=showFormData('user_email')?>"  placeholder="Email"/>
      <?=showError('user_email')?>

  <input  autocomplete="off" name="user_dep" class="style01" type="text" value="<?=showFormData('user_dep')?>" placeholder="Department"/>
     <?=showError('user_dep')?>

  <input  autocomplete="off" name="user_num" class="style01" type="number" value="<?=showFormData('user_num')?>" placeholder=" ID Number"/>
    <?=showError('user_num')?>

  <input  autocomplete="off" name="user_pass" class="style01" type="password" value="<?=showFormData('user_pass')?>"  placeholder="Password"/>
    <?=showError('user_pass')?>

  <div class="style03">
  <div class="main"><input name="signup" type="submit" value="Sign up" class="style05"/></div> 
  <div class="right"><a class="style04" href="login_en.php"><p class="style06">Login</p></a></div>
  <div class="left"><a class="style04" href="index.php"><p class="style06">Back</p></a></div> 
  </div>
  </div>

</form>
<?php
showPage("footer");
unset($_SESSION['error']);
unset($_SESSION['formdata']);
?>