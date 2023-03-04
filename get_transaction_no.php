<?php

include_once 'database.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT count(*) as `c` FROM info;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
	  while($row = $result->fetch_assoc()) {
	  	
	  	$bId = str_pad((int)$row["c"]+1, 4, '0', STR_PAD_LEFT);
	    echo 'B-'.date('Y').'-'.$bId;
	  }
	} else {
	  echo "0 results";
	}
$conn->close();
?>