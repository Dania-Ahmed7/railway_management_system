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
	<title>TRAIN LIST</title>

</head>
<body>
<?php 
	$sql = "select * from trainlist;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	echo "<table>";
echo "<tr>";
echo "<th>Train number</th>";
echo "<th>Train Name</th>";
echo "<th>Source</th>";
echo "<th>Destination</th>";
echo "<th>AC Fare</th>";
echo "<th>General Fare</th>";
echo "<th>Weekdays</th>";
echo "</tr>";

while($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['train_number'] . "</td>";
  echo "<td>" . $row['train_name'] . "</td>";
  echo "<td>" . $row['source'] . "</td>";
  echo "<td>" . $row['destination'] . "</td>";
  echo "<td>" . $row['ac_fare'] . "</td>";
  echo "<td>" . $row['general_fare'] . "</td>";
  echo "<td>" . $row['weekdays'] . "</td>";
  echo "</tr>";
}

echo "</table>";

?>
<a href="javascript:history.back()">HOME </a>

</body>
</html>