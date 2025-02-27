<?php
$dbServerName="localhost";
$db_user="id20080104_dania_railway_ms";
$db_pass= "BirdsBeBlue?010";
$db_name='id20080104_dania_railwaydb';

$conn=mysqli_connect($dbServerName,$db_user,
$db_pass, 
$db_name);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>
 