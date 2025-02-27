<?php 
	// Set the database credentials
$db_host = 'localhost';
$db_user = 'id20080104_dania_railway_ms';
$db_password = 'BirdsBeBlue?010';
$db_name = 'id20080104_dania_railwaydb';

// Connect to the database
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
  
	$t_id	 =	$_POST['ticket_id'];
	
   // Call the stored procedure
$sql = "CALL Cancel($t_id)";

if (mysqli_query($conn, $sql)) {
  // Print the success message
  echo "Booking successfully cancelled";
} else {
  // Print the error message
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>