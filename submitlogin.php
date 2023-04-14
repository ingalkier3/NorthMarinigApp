<?php

include_once 'database.php';

$link = new mysqli($servername, $username, $password, $dbname);

// var_dump($_FILES);
// return;


if($link===false){
  die("error:could not connect.".mysqli_connect_error());
}

$image = $_FILES['picture']['tmp_name'];
$imageData = file_get_contents($image);
$transaction_no= mysqli_real_escape_string($link, $_REQUEST['transaction_no']);
$firstname= mysqli_real_escape_string($link, $_REQUEST['firstname']);
$lastname= mysqli_real_escape_string($link, $_REQUEST['lastname']);
$address= mysqli_real_escape_string($link, $_REQUEST['address']);
$contact= mysqli_real_escape_string($link, $_REQUEST['contact']);
$email= mysqli_real_escape_string($link, $_REQUEST['email']);
$bdate= mysqli_real_escape_string($link, $_REQUEST['bdate']);
$pdate= mysqli_real_escape_string($link, $_REQUEST['pdate']);
$suffix= mysqli_real_escape_string($link, $_REQUEST['suffix']);

$username= mysqli_real_escape_string($link, $_REQUEST['username']);
$referral_code= mysqli_real_escape_string($link, $_REQUEST['referral_code']);


//checking if the preferred date is available




if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error);
}

$isAvailable = true;

$sql = "SELECT appointment_day as `start`, no_of_appointment as `title`, (SELECT count(id) FROM info Where preferred_date = a.appointment_day and status = 'approved') as `occupied` FROM tbl_appointment as a where appointment_day = '$pdate'";


$status = 'new';
$result = $link->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {

		 $available = (int)$row['title'] - (int)$row['occupied'];
		 if($available < 1) {

		 	$isAvailable = false;
		 }
	}
}else {
	$isAvailable = false;
}
 if($isAvailable == false) {
 	header("location:not_available.php");
 	return;
 }


$sql = "INSERT INTO info (client_image,transaction_no,firstname, lastname, address, contact, email, bdate, preferred_date, suffix, client_username, referral_code, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
// Create a prepared statement

 $stmt = $link->prepare($sql);
// Bind the image data to the prepared statement
$stmt->bind_param('sssssssssssss', $imageData, $transaction_no, $firstname, $lastname, $address, $contact, $email, $bdate, $pdate, $suffix, $username, $referral_code, $status);

// Execute the prepared statement
mysqli_stmt_execute($stmt);

// Check for insertion error
if (mysqli_errno($link)) {
    echo "Error inserting image: " . mysqli_error($link);
}else {
 	  $lastInsertedId = mysqli_insert_id($link);
	 header("location:proceed.php?temp=$lastInsertedId"."&email=$email");
}

// Close statement and database connection



// $sql= "INSERT INTO `info`( `client_image`,`transaction_no`, `firstname`, `lastname`, `address`, `contact`, `email`, `bdate`, `preferred_date`, `suffix`, `client_username`, `referral_code`, `status`) VALUES ('$imageData','$transaction_no','$firstname','$lastname','$address','$contact','$email','$bdate', '$pdate', '$suffix', '$username', '$referral_code','new')";
// if(mysqli_query($link, $sql)){
	
// 	  $lastInsertedId = mysqli_insert_id($link);
// 	  header("location:proceed.php?temp=$lastInsertedId"."&email=$email");
// 	  echo "Adding Record Successful";
// }
// else {
//   echo "ERROR:unable to display $sql." . mysqli_error($link);
// }
mysqli_stmt_close($stmt);
mysqli_close($link);
?>
