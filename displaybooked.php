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
  
 ?>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	$sql = "select * from passenger;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	
	if($resultCheck>0){
		while($row = mysqli_fetch_assoc($result)){
        echo $row['ticket_id']." ";
        echo $row['train_number']." ";
		echo $row['ticket_date']." ";
		echo $row['passenger_name']." ";
        echo $row['age']." ";
        echo $row['sex']." ";
        echo $row['address']." ";
        echo $row['reservation_status']." ";
		echo $row['ticket_category']."<br>";
		}
		}
?>
</body>
</html>