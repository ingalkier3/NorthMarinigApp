<?php


	include_once 'database.php';

	$link = new mysqli($servername, $username, $password, $dbname);
if($link===false){
  die("error:could not connect.".mysqli_connect_error());
}

$date= mysqli_real_escape_string($link, $_REQUEST['date']);
$appointment_per_day= mysqli_real_escape_string($link, $_REQUEST['appointment_per_day']);



$sql= "INSERT INTO `tbl_appointment`( `appointment_day`, `no_of_appointment`) VALUES ('$date','$appointment_per_day')";

try
{
	 if(mysqli_query ($link, $sql)){
		
	  header("location:admin_index.php?page=clinic");
	  echo "Adding Record Successful";
	}
	else {

	  echo "ERROR:unable to display $sql." . mysqli_error($link);

	}
}
catch(Exception $e)
{
    header("location:admin_index.php?page=clinic");
}

mysqli_close($link);

?>
