<?php

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

$an=$_POST['aname'];
$un=$_POST['uname'];

$sql='Select * from Users where Employeename="'.$an.'" && Username="'.$un.'"';

$result=$conn->query($sql);

$output=$result->fetch_assoc();

$count=count($output);

if($count>0)
{
$sql2='Update Users Set Roleid=1 where Employeename="'.$an.'" && Username="'.$un.'"';


if($conn->query($sql2) ===true)
{
header("Location:http://localhost/Snackapp/index.php");
}
}
else
{
header("Location:http://localhost/Snackapp/View/Registration/AdminRegistration.php");
}

?>






?>



