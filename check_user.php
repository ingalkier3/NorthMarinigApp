<?php 
	
	session_start();

	// variable that store the value of username and password passed by JS
	$txt_username = $_POST['username'];
	$txt_password = $_POST['password'];


	//logic to check if username and password inputted by user is correct
	
	// Create connection
		$conn = mysqli_connect("localhost", "root", "", "hospitalfinder");
		// Check connection

		$is_success = false;


		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM tbl_users where c_username = '$txt_username' and c_password = '$txt_password';";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {

		  	$_SESSION['id'] = $row['id'];
		  	$_SESSION['full_name'] = $row['c_fullname'];
		  	$_SESSION['username'] = $row['c_username'];
		  	$_SESSION['password'] = $row['c_password'];
		  	$_SESSION['is_login'] = true;

		    $is_success = true;
		  }
		} else {
		  $is_success = false;
		}

		$conn->close();

		if ($is_success) {
			header('Location: '.'http://localhost/SAD2/admin_index.php');
		}else {
			header('Location: '.'http://localhost/SAD2/login.php?err=login');
		}

		
		

 ?>