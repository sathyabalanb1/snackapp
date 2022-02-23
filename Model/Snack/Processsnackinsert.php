<?php
$servername = "localhost";
$username = "sample_user";
$password = "Reshmasathya@50";
$dbname = "mine_database";

include '../../View/Header/header.php';

$sn=$_POST['sname'];

$validsnack=true;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
//if (!preg_match ("/^[a-zA-z]*$/", $sn) )
if (!preg_match ("/^[a-zA-Z ]*$/",$sn)) 
{ 
    $ErrMsg = "Only alphabets and whitespace are allowed in Snackname Field.<br>";  
             echo $ErrMsg;  
             $validsnack = false;
} 
}

if ($validsnack)
{
$sql = 'INSERT INTO Snack (Snackname) VALUES ("'.$sn.'")';
}

if ($conn->query($sql) === true) {
  echo "New Snack Added Successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

include '../../View/Footer/footer.php';
$conn->close();
?>
