<html>
<body>

<?php
include '../Header/header.php';



if($_SESSION['logged']==true)
{


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

echo "Hi ".$_SESSION['Employeename']. " Choose Your Snack<br><br><br>";
  }
  else
  {
    header("Location:http://localhost/Snackapp/index.php");
    exit();
  }  
?>

<?php

Session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mine_database";

$conn = new mysqli($servername, $username, $password, $dbname);
  
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
//echo "Connected Successfully<br>";
}

//$sql="select Snackid,Presentdate from Assignment where Presentdate=curdate()";
$sql="select Snackid,Presentdate from Assignment where Presentdate=curdate()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {


$rows=$result->fetch_assoc();

//foreach($rows as $data=>$value){
//echo $data."<br>";
//echo $value;
//}
//echo $rows;
$sdate=$rows["Presentdate"];
$sid=$rows["Snackid"];

//echo $sdate;

echo "Date: ". $rows["Presentdate"]."<br>";

$sql2='select Snackname from Snack where Snackid='.$sid.'';

//echo $sql2;

$value = $conn->query($sql2);

//echo $value->num_rows;

$temp=$value->fetch_assoc();
//var_dump($temp);

//if(empty($value))
//{
//echo "No data";
//}
//else
//{
//echo "Data found";
//}
//echo $value;

echo "Today's Snack: ". $temp["Snackname"]."<br><br>";

}
else
{
echo "0 results";
}
?>
<form action="/Snackapp/Model/Count/Processcounting.php" method="post">
<input type="radio" id="yes" name="myselection" value="True">
<label for="yes">Yes</label><br>

<input type="radio" id="no" name="myselection" value="False">
<label for="no">No</label><br><br>

<input type="submit" value="submit" name="submit">
</form>

<html>
<body>

<form action="/Snackapp/Model/Count/Finalcount.php">
    <input type="submit" value="Totalcount"/>
</form>

<form action="/Demoproject/Finalcount.php">
    <input type="submit" value="Earliercount"/>
</form> 

</body>
</hmtl>

<?php

include '../Footer/footer.php';
?>

</body>
</html>

