<?php

include_once 'database.php';


$id = $_POST['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "Delete FROM tbl_appointment WHERE id=".$id;

if ($conn->query($sql) === TRUE) {
  echo "success";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>