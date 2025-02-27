<html>
<body>
<div>
<form>
<div class="btn-block">
          <a href="javascript:history.back()">  Go Back   </a>
        </div>
        
      </form>
    </div>
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
  
 ?><?php
  // Retrieve the ticket ID from the form
  $ticket_id = $_POST['ticket_id'];
//Create a stored procedure

$sql = "select * from passenger inner join trainlist ON passenger.train_number=trainlist.train_number WHERE ticket_id=$ticket_id;";
//"CALL CheckStatus($ticket_id)";

  $result = mysqli_query( $conn,$sql);
if ($result) {
  if (mysqli_num_rows($result) > 0) {
    // Output the data for each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "Train Name: " . $row['train_name'] . "<br>";
      echo "Source: " . $row['source'] . "<br>";
      echo "Destination: " . $row['destination'] . "<br>";
      echo "Ticket ID: " . $row['ticket_id'] . "<br>";
      echo "Train Number: " . $row['train_number'] . "<br>";
      echo "Departure Date: " . $row['ticket_date'] . "<br>";
      echo "Name: " . $row['passenger_name'] . "<br>";
      echo "Sex: " . $row['sex'] . "<br>";
      echo "Address: " . $row['address'] . "<br>";
      echo "Ticket Status: " . $row['reservation_status'] . "<br>";
      echo "Ticket Category: " . $row['ticket_category'] . "<br>";
    }
  }
  else {
        echo "No ticket found with this ID";
    }
}
      
      else {
  // Print an error message if the query was not successful
  echo "Error: " . mysqli_error($conn);
}


      ?>
  </body>
  
</html>
