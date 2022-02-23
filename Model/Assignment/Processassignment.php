<?php
//echo "Now we are in Assigningdata file";
include '../../View/Header/userheader.php';
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

$sid=$_POST['snacker'];
$sdate=$_POST['currentdate'];
//echo $sid;

$sql='Select Snackid from Snack where Snackname= $snname';

//echo $sql;
//exit;
//$sid=$conn->query($sql);

//echo $sid;

$sqlnew='Insert into Assignment(Snackid,Presentdate) values ("'.$sid.'","'.$sdate.'")';

if ($conn->query($sqlnew) === true) {
  echo "Today snack assignment completed successfully";
} else {
  echo "Error: " . $sqlnew . "<br>" . $conn->error;
}

include '../../View/Footer/footer.php';

$conn->close();
?>



