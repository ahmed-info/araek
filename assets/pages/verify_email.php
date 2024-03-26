<?php 
global $user;
?>
<body class="style0">
<form method="post"  action="assets/php/actions.php?verify_email">


  <div class="style02 style08">
  <img class="style07" src="assets/pic/logo.png"/><br>
<h5 style="text-align: right;margin:0px 50px 10px 0px">تم الارسال الى الايميل(<?=$user['user_email'] ?>)</h5>
<div style="text-align: right;margin:24px 50px 5px 0px">ادخل 6 ارقام تم ارسالها اليك</div>
  <input  autocomplete="off" name="code" type="number" value="<?=showFormData('user_name_email')?>" class="style01" placeholder="######"/>
    <?=showError('email_verify')?>

<?php 
if(isset($_GET['resended'])){
?>
<p class="text">تم ارسال الكود!</p>
<?php
}
?>

  <div class="style03">
    <div class="right"><a class="style04" href="assets/php/actions.php?resend_code"><p class="style06">اعادة ارسال الكود </p></a></div>
    <div class="left"><button class="style04" type="submit" href="assets/php/actions.php?verify_email"><p class="style06">تأكيد</p></button></div>
  </div>
  </div>

</form>
</body>
</html>