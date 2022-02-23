<?php

include '../config.php';

include '../commonfunctions.php';


Session_start();


$conn = getDatabaseConnection();

//$userCredentials = getLoginFormData();

//print_r($userCredentials);


$value=checkAssignment();

if($value==0)
{
redirectPage(Snackassignment.php);
}
else
{
redirectPage(Adminfrontpage.php);
}



function checkAssignment()
{
global $conn;
$sql="select Snackid,Presentdate from Assignment where Presentdate=curdate()";

$result = $conn->query($sql);

if ($result->num_rows > 0) {


$rows=$result->fetch_assoc();

$length=count($rows);

return $length;
}
else
{
return 0;
}
}

function pickDate ()
{
global $conn;
$sql="select Snackid,Presentdate from Assignment where Presentdate=curdate()";

$result = $conn->query($sql);

if ($result->num_rows > 0) {


$rows=$result->fetch_assoc();

$sdate=$rows["Presentdate"];
$sid=$rows["Snackid"];
return $rows["Presentdate"];
}
else
{
return "Match not found for the given date";
}
}

function pickSnack()
{
global $conn;
$sql="select Snackid,Presentdate from Assignment where Presentdate=curdate()";

$result = $conn->query($sql);

if ($result->num_rows > 0) {


$rows=$result->fetch_assoc();

$sid=$rows["Snackid"];

$sql2='select Snackname from Snack where Snackid='.$sid.'';

//echo $sql2;

$value = $conn->query($sql2);

$temp=$value->fetch_assoc();

return $temp["Snackname"];
}
else
{
return "Match not found for the given item";
}
}
?>
