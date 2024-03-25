
<?php 
require_once('assets/php/functions.php');
showPage("header",['page_title'=>'login page','style'=>'style_login']);
?>


<body class="style0">
<form method="post"  action="assets/php/actions.php?login">


  <div class="style02 style08">
  <img class="style07" src="assets/pic/logo.png"/>

  <input  autocomplete="off" name="user_name_email" type="text" value="<?=showFormData('user_name_email')?>" class="style01" placeholder="Email or username"/>
    <?=showError('checkuser')?>


  <input autocomplete="off" name="user_pass" type="password" value="<?=showFormData('user_pass')?>"  class="style01" placeholder=" Password"/>
      <?=showError('user_pass')?>

  <div class="style03">
  <div class="main"><input name="login" type="submit" value="Login" class="style05"/></div> 
  <div class="right"><a class="style04" href="signup_en.php"><p class="style06">Sign up </p></a></div>
  <div class="left"><a class="style04" href="index.php"><p class="style06">Back</p></a></div>
  </div>
  </div>

</form>
</body>
</html>