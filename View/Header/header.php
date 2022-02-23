<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/Snackapp/Static/CSS/Style.css" type="text/css">
</head>
<body>
<div class="header">
  <div class="header">
  <img src="/Snackapp/Static/Images/dsquadlogo.webp" alt="logo" />
  <h1>DiligentSquad</h1>
</div>
  <div class="header-right">
<?php
include '/var/www/html/Snackapp/View/Session/session.php';
if(isset($_SESSION['logged']))
{
include '/var/www/html/Snackapp/View/Header/loggedinlinks.php';
}
else
{
include '/var/www/html/Snackapp/View/Header/loggedoutlinks.php';
}
 ?>   
  </div>
</div>



