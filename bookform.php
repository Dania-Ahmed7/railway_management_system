<?php 
// Set the database credentials
$db_host = '';
$db_user = '';
$db_password = '';
$db_name = '';

// Connect to the database
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
  
  // Check if the form has been submitted
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the parameters from the form
 $train_num = $_POST['train_number'];
$date = $_POST['date'];
$name = $_POST['name'];
$p_age = $_POST['age'];
$p_add = $_POST['add'];
$sex = isset($_POST['Male']) ? $_POST['Female'] : '';
$ticket_category = isset($_POST['AC']) ? $_POST['general'] : '';



  }

  // Call the stored procedure
$sql = "CALL Booking($train_num, $date, $ticket_category, $name, $p_age, $sex, $p_add)";

if (mysqli_query($conn, $sql)) {
  echo "Stored procedure created successfully";
} else {
  echo "Error creating stored procedure: " . mysqli_error($conn);
}



if (mysqli_query($conn, $sql)) {
  // Display the booking details
  $result = mysqli_query($conn, "SELECT * FROM Passenger WHERE ticket_id = $ticket_id");
  if (mysqli_num_rows($result) > 0) {
    // Output the data for each row
    while($row = mysqli_fetch_assoc($result)) {
  echo "Train Number: " . $row['train_number'] . "<br>";
  echo "Date: " . $row['date'] . "<br>";
  echo "Name: " . $row['name'] . "<br>";
  echo "Age: " . $row['age'] . "<br>";
  echo "Sex: " . $row['sex'] . "<br>";
  echo "Address: " . $row['address'] . "<br>";
  echo "Ticket Category: " . $row['ticket_category'] . "<br>";
  echo "<br>";
}
}}

?>
