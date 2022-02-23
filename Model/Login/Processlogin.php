<?php
include '../config.php';
include '../Constants/AppConstants.php';
include '../commonfunctions.php';

$conn;

session_start();

$userCredentials = getLoginFormData();
$userData = getUserData($userCredentials);


if($userData != false)
{
  setSessionAsLoggedIn($userData);
  redirectToHomepage(getUserRoleId($userData));
}  
else{
  redirectToURL(LOGINPAGE_URL);
}
$conn->close();

function setSessionAsLoggedIn($userData){

  setSessionVariable(SESSION_USERNAME,getValueFromUserData($userData,'Username'));
  setSessionVariable(SESSION_USERID,getValueFromUserData($userData,'Userid'));
  setSessionVariable(SESSION_ROLEID,getValueFromUserData($userData,'Roleid'));
  setSessionVariable(SESSION_LOGGED,true);
}


function redirectToHomepage($role){
  if($role == ROLE_ADMIN)
  {
    redirectToURL(ADMIN_HOMEPAGE_REDIRECT_URL);
  }  
  else 
  {
    redirectToURL(USER_HOMEPAGE_URL);
  }
  
}


function getLoginFormData(){
  $userCredentials = array('username'=> $_POST[LOGIN_FORM_USERNAME], 'password'=> $_POST[LOGIN_FORM_PASSWORD]);
  return $userCredentials;
}

function getUserData($userCredentials){
  $sql='select * from Users where Username ="'.$userCredentials['username'].'"and Password="'.$userCredentials['password'].'"';
  $result = getQueryResult($sql);
  $count = mysqli_num_rows($result);

  if($count==1){
    return $result->fetch_assoc();
  }
  return false;
}


function getUserRoleId($result){
 $roleId = getValueFromUserData($result,ROLE_ID);
 return $roleId;
}


function getValueFromUserData($userData,$key){
 $value = $userData[$key];
 return $value;
}

