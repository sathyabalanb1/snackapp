<?php
include '../Header/header.php';
include '../Adminpage/AdminMenu.php'
?>

<form action="/Snackapp/Model/Count/Processcounting.php" method="post">
  <input type="radio" id="yes" name="myselection" value="True">
  <label for="yes">Yes</label><br>

  <input type="radio" id="no" name="myselection" value="False">
  <label for="no">No</label><br><br>

  <input type="submit" value="submit" name="submit"><br><br>
</form>

<form action="Newsnackinsert.php">
    <input type="submit" value="Addnew Snack"/>
</form> 

<form action="/Snackapp/View/Registration/AdminRegistration.php">
    <input type="submit" value="Make Admin"/>
</form>

<?php
include '../Footer/footer.php';
?>

