<html>
<body>
<?php
include '../Header/header.php';
include '../Adminpage/AdminMenu.php'
?>

<form action="/Snackapp/Model/Snack/Processsnackinsert.php" method="post">
<label for="sname">Enter the New Snack:</label><br>
<input type="text" id="sname" name="sname" required><br><br>
<input type="submit" value="Add">

<?php

include '../Footer/footer.php';

?>
</body>
</html>
