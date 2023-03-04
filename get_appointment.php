<?php 
	

		include_once 'database.php';
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection

		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT appointment_day as `start`, no_of_appointment as `title`, (SELECT count(id) FROM info Where preferred_date = a.appointment_day and status = 'approved') as `occupied` FROM tbl_appointment as a";

		$result = $conn->query($sql);
		$arr = [];

		if ($result->num_rows > 0) {
	
	  		echo json_encode($result->fetch_all(MYSQLI_ASSOC));
			$result->free_result();
		  	
		} else {
		  echo "failed";
		}


		//echo json_encode($arr);

		$conn->close();


 ?>