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

// Check if the form has been submitted
if (isset($_POST['source']) && isset($_POST['destination'])) {
  // Retrieve the source and destination from the POST request
  $source = $_POST['source'];
  $destination = $_POST['destination'];

  // Call the stored procedure

  $procedure_sql = "CALL Enquire($source, $destination)";
  
  if (mysqli_query($conn, $procedure_sql)) {
    // Process the results of the stored procedure
    $result = mysqli_query($conn, "SELECT * FROM trainlist WHERE source = '$source' AND destination = '$destination'");
    if (mysqli_num_rows($result) > 0) {
      // Output the data for each row
      while($row = mysqli_fetch_assoc($result)) {
        echo "Train Number: " . $row['train_number'] . "<br>";
        echo "Train Name: " . $row['train_name'] . "<br>";
        echo "Source: " . $row['source'] . "<br>";
        echo "Destination: " . $row['destination'] . "<br>";
        echo "AC Fare: " . $row['ac_fare'] . "<br>";
        echo "General Fare: " . $row['general_fare'] . "<br>";
        echo "Days of Operation: " . $row['days_of_operation'] . "<br>";
      }
    } else {
      echo "No trains found with the specified source and destination";
	}
}
else{
    echo "Procedure not executing";
}
}
?>
