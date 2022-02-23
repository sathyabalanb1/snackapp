<?php

include '../Header/header.php';
include '../../Model/Constants/AppConstants.php';


?>

<div style="padding-left:20px">
  <h1><center>Welcome to Dsquad Login Page<center></h1>
  
</div>
<form action="/Snackapp/Model/Login/Processlogin.php" method="post">
<label for="uname">Username:</label><br>
<input type="text" id="uname" name="<?php echo LOGIN_FORM_USERNAME?>"><br>
<label for="pwd">Password:</label><br>
<input type="password" id="pwd" name="<?php echo LOGIN_FORM_PASSWORD?>"><br><br>
<input type="submit" value="Submit">
</form>

<?php
include '../Footer/footer.php';
?>


