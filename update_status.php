<?php

include_once 'database.php';


$transaction_no = $_POST['transaction_no'];
$status = $_POST['status'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE hospitalfinder.info SET status='".$status."' WHERE transaction_no='".$transaction_no."'";

if ($conn->query($sql) === TRUE) {
  echo "success";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>