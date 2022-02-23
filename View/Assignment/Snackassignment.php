<html>
<body>
<?php
include '../Header/header.php';
include '../../Model/commonfunctions.php';
include '../Adminpage/AdminMenu.php'
?>

<form action="../Snack/Newsnackinsert.php">
    <input type="submit" value="Addnew Snack"/>
</form> 

<form action="/Snackapp/Model/Assignment/Processassignment.php" method="post">
<label for="currentdate">Enter the Date:</label><br>
<input type="date" id="currentdate" name="currentdate" ><br><br>
<label for="currentdate">Choose a Snack:</label><br>
<select name="snacker">

<?php
$conn = getDatabaseConnection();

showDropdown();

function showDropdown()
{
global $conn;
$sql="Select * from Snack";

$result=$conn->query($sql);


while ($rows=$result->fetch_assoc())
{
$sname=$rows["Snackname"];
$sid=$rows["Snackid"];

echo "<option id='$sname' value='$sid'>$sname</option>";
}

}
?>
</select><br><br>
<input type="submit" value="Assign"/>
</form>
<form action="/Snackapp/View/Registration/AdminRegistration.php">
    <input type="submit" value="Make Admin"/>
</form>

<?php
include '../Footer/footer.php';
?>
</body>
</html>




