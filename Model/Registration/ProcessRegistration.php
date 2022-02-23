<?php

include '../config.php';
include '../Constants/AppConstants.php';
include '../commonfunctions.php';
//include '../Login/Processlogin.php';



$errurl=REGISTERPAGE_URL;

$userCredentials = getRegisterFormData();

//var_dump($userCredentials);
//echo "<br>";

registerUser($userCredentials);

function registerUser($userCredentials)
{ global $errurl;
  $errorMessages=validateForm($userCredentials);
  $sql = 'INSERT INTO Users (Roleid, Employeename, Username, Password)
VALUES ("'.$userCredentials['roleid'].'", "'.$userCredentials['employeename'].'","'.$userCredentials['username'].'","'.     $userCredentials['password'].'")';
  $conn = getDatabaseConnection();
  //var_dump($errorMessages);
  //echo "<br>";
  //var_dump($conn);
  //echo "<br>";
  //echo $sql."<br>";

  if(empty($errorMessages))
  {
  setCookievalues($userCredentials);
  echo "There is no error"."<br>";
  $result = $conn->query($sql);
  redirectToURL(LOGINPAGE_URL);
  }
  else
  {
  echo "Error Found";
  redirectToURLwithMessage($errurl,$errorMessages);
  }
}

$conn->close();

function getRegisterFormData(){
  $userCredentials = array('roleid'=>$_POST['rid'],'employeename'=>$_POST['ename'],'username'=> $_POST['uname'], 'password'=> $_POST['pwd']);
  return $userCredentials;
}
//function getDatabaseConnection(){
//  global $databaseCredentials,$conn;
//  $conn = new mysqli($databaseCredentials['servername'], $databaseCredentials['username'], $databaseCredentials['password'],$databaseCredentials['dbname']);
//  if ($conn->connect_error) {
//   throw new Exception("Database Connection Error");
//  }
//  return $conn;
//}  

function setCookievalues($userCredentials){
  setCookie("Employeename",$userCredentials['employeename'], time()+3600,"/");
  setCookie("Username", $userCredentials['username'], time()+3600,"/");
  return;
}
function setSessionAsLoggedIn($userData){
  setSessionVariable('uname',getValueFromResult($userData,'Username'));
  setSessionVariable('logged',true);
}
function setSessionVariable($key,$value){
 $_SESSION[$key]=$value;
}

function validateForm($userCredentials)
{
$errorMessages=array();
if (!preg_match ("/^[a-zA-z]*$/", $userCredentials['employeename']) ) {  
    $errorMessages["errorMessage1"]="Only alphabets and whitespace are allowed in Employeename Field"; 

} 
$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
if (!preg_match ($pattern, $userCredentials['username']) ){  
    $errorMessages["errorMessage2"] ="User name must be an Email Address";  

}
      return $errorMessages;
}

function redirectToURLwithMessage($url,$message){

foreach ($message as $key=>$value)
{
$len=count($message);
if($i==0)
{
$link .="?";
}

if($i==$len-1)
{
$link .=$key;
$link .="=";
$link .=$value;
break;
}

$link .=$key;
$link .="=";
$link .=$value;
$link .="&";

$i++;
}

$newlink=$url.$link;
header("Location:".$newlink);
exit();
 
 
// echo "</br>http://localhost/Snackapp/View/Registration/Dsquaduserregistration.php?errorMessage1=username must be an email address&errorMessage2=alphabets"; 
 //exit();
}

function redirectToURL($url){
 header("Location:".$url);
 exit();
}

?>
