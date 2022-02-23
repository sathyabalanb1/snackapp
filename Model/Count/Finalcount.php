<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mine_database";

//$pdate=$_POST['gdate'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql1='select * from Selection where is_selected=True && DATE(CreatedTime)=curdate()';

$sql2='select * from Selection where is_selected=False && DATE(CreatedTime)=curdate()';

$sql3='select * from Selection where is_selected is NULL && DATE(CreatedTime)=curdate()';

$val1=$conn->query($sql1);

$total1=$val1->num_rows;


$val2=$conn->query($sql2);

$total2=$val2->num_rows;

$val3=$conn->query($sql3);

$total3=$val3->num_rows;

echo "Number of Employees who want the Snack ". $total1."<br>";

echo "Number of Employees who Don't want the Snack ". $total2."<br>";

echo "Number of Employees who have not responded ". $total3."<br>";

?>

