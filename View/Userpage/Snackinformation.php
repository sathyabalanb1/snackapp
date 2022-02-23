
<?php
Session_start();

    if (!isset($_SESSION['logged']))
	{
	  header("Location:http://localhost/Snackapp/index.php");
	}

include '../Header/userheader.php';


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mine_database";

$conn = new mysqli($servername, $username, $password, $dbname);

$userName=$_SESSION['uname'];

$que='Select Employeename from Users where Username="'.$userName.'"';

$ans = $conn->query($que);

$arr=$ans->fetch_assoc();

$employeename=$arr["Employeename"];

$_SESSION['Employeename']=$employeename;

echo "Hi ".$_SESSION['Employeename']."<br><br><br>";
    
echo "Today's snack is not yet assigned<br>";

include '../Footer/footer.php';
?>

