<html>
<body>
<?php

include '../Header/header.php';

    if (!isset($_SESSION['logged']))
    {
 header("Location:http://localhost/Snackapp/index.php");
  }


echo "Hi Admin, You have not assigned snack for Today";

echo "<br><br>";

?>

<form action="/Snackapp/View/Assignment/Snackassignment.php">
    <input type="submit" value="Admin"/>
</form>

<?php
include '../Footer/footer.php';
?>
</body>
</html>
