<?php
include 'config.php';



function getQueryResult($sql){
  $conn = getDatabaseConnection();
  $result = $conn->query($sql);
  return $result;
}

function getDatabaseConnection(){

  global $databaseCredentials,$conn;
  $conn = new mysqli($databaseCredentials['servername'], $databaseCredentials['username'], $databaseCredentials['password'],$databaseCredentials['dbname']);
  if ($conn->connect_error) {
   throw new Exception("Database Connection Error");
  }
  return $conn;
}

function setSessionVariable($key,$value){
 $_SESSION[$key]=$value;
}

function getSessionVariable($key){
 return $_SESSION[$key];
}

function getRoleId(){
 return $_SESSION['Roleid'];
}

function redirectToURL($url){
 header("Location:".$url);
 exit();
}











