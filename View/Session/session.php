<?php
session_start();
function redirectToLoginPageOnInvalidLogin(){
  if(!isLoggedIn())
    {
      header("Location:http://localhost/Snackapp/index.php");
      exit();
    }
}

function isLoggedIn(){
  if(isset($_SESSION['logged']))
  {
    return true;
  }
  return false;
}


//redirectToLoginPageOnInvalidLogin();

