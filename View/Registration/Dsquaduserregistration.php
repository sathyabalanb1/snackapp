<?php

include '../Header/header.php';
?>
<div style="padding-left:20px">
  <h1><center>Welcome to Registration Page<center></h1>
  
</div>
<?php 
//print_r($_GET);

foreach($_GET as $values)
{
//echo $values."<br>";
//Print "<strong>Height:</strong> ".$row['Height']."<br>";
print "<strong style=color:red;>$values</strong>"."<br>";
}
?>

<form action="/Snackapp/Model/Registration/ProcessRegistration.php" autocomplete="off" method="post">
  <input type="hidden" id="rid" name="rid" value="2"><br>
  <label for="ename">Employeename:</label><br>
  <input type="text" id="ename" name="ename" value="<?php echo isset ($_COOKIE['Employeename'])?$_COOKIE['Employeename']:''?>" required><br>
  <label for="uname">Username:</label><br>
  <input type="text" id="uname" name="uname" value="<?php echo isset ($_COOKIE['Username'])?$_COOKIE['Username']:''?>" required><br>
  <label for="pwd">Password:</label><br>
  <input type="password" id="pwd" name="pwd" value="<?php echo isset ($_COOKIE['Password'])?$_COOKIE['Password']:''?>"required maxlength=10><br><br>
  <input type="submit" value="Register"><br><br>
</form>





<?php
include '../Footer/footer.php';
?>

