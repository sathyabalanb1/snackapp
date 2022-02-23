<?php
include '../commonfunctions.php';
include '../Constants/AppConstants.php';

if(getAssignmentCountForToday()>0){
  redirectToURL(ADMIN_HOMEPAGE_URL);
}
else{
  redirectToURL(ASSIGNMENT_URL);
}

function getAssignmentCountForToday()
{ 
 $sql="select Snackid,Presentdate from Assignment where Presentdate=curdate()";
 $result = getQueryResult($sql);
 $numberOfRows = $result->num_rows;
 return $numberOfRows;
}
