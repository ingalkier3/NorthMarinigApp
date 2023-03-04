<?php 
	

		include_once 'database.php';

		$client_username =  $_POST['client_username']; 
		$limit =  $_POST['limit']; 

		//logic to check if username and password inputted by user is correct
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection

		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM info where client_username='$client_username' order by id desc limit $limit";

		$result = $conn->query($sql);
		$arr = [];

		if ($result->num_rows > 0) {
		  	if($limit == 1) {
		  		while ($row = $result->fetch_assoc()) {
		  			echo  json_encode($row);
		  		}
		  	}else {
		  		echo json_encode($result->fetch_all(MYSQLI_ASSOC));
				$result->free_result();
		  	}
			

		} else {
		  echo "failed";
		}


		//echo json_encode($arr);

		$conn->close();


 ?>