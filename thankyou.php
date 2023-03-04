<?php 


  include_once 'database.php';
    $temp = $_GET['temp'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE info SET status='for approval' WHERE id=".$temp;

if ($conn->query($sql) === TRUE) {
  echo "success";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();


 ?>


<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="home.css">
	<link rel="stylesheet" href="about covid.css">
	<link rel="stylesheet" href="fb.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<title>North Marinig Center</title>
<script src="home.js"></script>
</head>
<body>

<div class="header">
  <h1><img src="marinig1.png" style=float:height75px;width:75px;> North Marinig Center</h1>

</div>

<div class="topnav">


  <a href="index.php">Home</a>
 

</div>




      <div class="row">
  <div class="leftcolumn">
    <div class="card"style = "text-align: center;">

      <h2>You successfully created your booking. Thank You for using this web. Come Again</h2>
      <h1><img src="doctor.jpg" style="height:500px;width:500px;"></h1>

      <div class="container">
  <form action="action_page.php">
    <div class="row">



  </form>
</div>

<div class="footer">
  <h4>All Right Reserve © to the researchers of the group and presented in Saint Vincent College of Cabuyao.</h4>
</div>


</body>
</html>
