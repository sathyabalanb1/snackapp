<?php

session_start();

//echo "Now we are going to find number of orders<br>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mine_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }

$un=$_SESSION['uname'];

//echo $un;

$sqlnew='Select Userid from Users where Username="'.$un.'"';

//echo $sqlnew."<br>";

$output = $conn->query($sqlnew);

$rows=$output->fetch_assoc();

$ui=$rows["Userid"];

$buttonval=$_POST['myselection'];



if(isset($_POST["submit"]))
{
//echo $buttonval;
if($buttonval === 'True' || $buttonval === 'False')
{
$sqldup= 'Select * from Selection where Userid ="'.$ui.'" && DATE(CreatedTime)=curdate()';
$ans = $conn->query($sqldup);

$temp=$ans->fetch_assoc();
$count =  count($temp);
if($count>0)
{
$sqlup= 'update Selection set is_selected ='.$buttonval.', CreatedTime=CURRENT_TIMESTAMP where Userid="'.$ui.'" && DATE(CreatedTime)=curdate()';
$newvalue=$conn->query($sqlup);
echo $sqlup."<br>";
header("Location:http://localhost/Snackapp/index.php");
exit();
}
else
{
$sql= 'Insert into Selection (is_selected, Userid,CreatedTime) Values ('.$buttonval.',"'.$ui.'",CURRENT_TIMESTAMP)';
$result = $conn->query($sql);
echo $sql."<br>";
header("Location:http://localhost/Snackapp/index.php");
exit();
}
}
}
else
{
echo "Form is not submitted properly";
exit;
}
$conn->close();

?>
