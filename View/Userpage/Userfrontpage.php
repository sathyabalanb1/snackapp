<html>
<body>
<?php
include '../Header/header.php';
include '../../Model/commonfunctions.php';
include '../../Model/config.php';



isLoggedin();


pageDisplay();

function pageDisplay()
{

if($_SESSION['logged']==true && checkAssignment()>0)
{

$conn=getDatabaseConnection();

$userName=$_SESSION['uname'];

$que='Select Employeename from Users where Username="'.$userName.'"';

$ans = $conn->query($que);

$arr=$ans->fetch_assoc();

$employeename=$arr["Employeename"];

$_SESSION['Employeename']=$employeename;

echo "Hi ".$_SESSION['Employeename']. " Choose Your Snack<br><br><br>";

$presentdate=pickDate();

echo "Today's Date: ". $presentdate."<br>";

$snackname=pickSnack();

echo "Snack Name: ".$snackname."<br>";

}
   
else if($_SESSION['logged']==true && checkAssignment()==0)
{
$conn=getDatabaseConnection();
$userName=$_SESSION['uname'];
$que='Select Employeename from Users where Username="'.$userName.'"';
$ans = $conn->query($que);
$arr=$ans->fetch_assoc();
$employeename=$arr["Employeename"];
echo "Hi ".$arr['Employeename']."<br><br>";
$st="Today's Snack is Not Yet Assigned";
print "<strong style=color:red;>$st</strong>"."<br>";
exit();
}
else
{
echo "Now we are in User FrontPage1";
exit();
}
}
 
function isLoggedin ()
{
if($_SESSION['logged']!=true)
{
header("Location:http://localhost/Snackapp/index.php");
exit();
}
} 
  
?>
<form action="/Snackapp/Model/Count/Processcounting.php" method="post">
<input type="radio" id="yes" name="myselection" value="True">
<label for="yes">Yes</label><br>

<input type="radio" id="no" name="myselection" value="False">
<label for="no">No</label><br><br>

<input type="submit" value="submit" name="submit">
</form>

<?php

include '../Footer/footer.php';
?>

</body>
</html>

