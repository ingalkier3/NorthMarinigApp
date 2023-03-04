<?php

include_once 'database.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT count(*) as `total_booking`,
COUNT(if(status='for approval',1,NULL)) as `pending_booking`,
COUNT(if(status='approved',1,NULL)) as `approved_booking`,
COUNT(if(status='disapproved',1,NULL)) as `disapproved_booking`
 FROM info;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
	  while($row = $result->fetch_assoc()) {
	  
	    echo $row['total_booking'].','.$row['pending_booking'].','.$row['approved_booking'].','.$row['disapproved_booking'];
	  }
	} else {
	  echo "0 results";
	}
$conn->close();
?>