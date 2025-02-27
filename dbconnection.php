<?php
$dbServerName="";
$db_user="";
$db_pass= "";
$db_name='';


$conn=mysqli_connect($dbServerName,$db_user,
$db_pass, 
$db_name);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>
 
