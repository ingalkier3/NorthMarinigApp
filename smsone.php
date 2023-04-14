<!DOCTYPE html>
<?php
	if (isset($_POST['send'])) {
		$from = $_POST['femail'];
		$phoneno = $_POST['phoneno'];
		$message = $_POST['message'];
		$carrier = $_POST['carrier'];
		if (empty($from)) {
			echo ("enter the email");
			exit();
			

		}elseif (empty($phoneno)) {
			echo ("enter the phoneno");
			exit();
		
		}elseif (empty($message)) {
			echo ("enter the message");
			exit();
		
		}elseif (empty($carrier)) {
			echo ("enter the carrier");
			exit();
		
		}else{
			$message = wordwrap($message, 70);
			$header = 'From: '.$from;
			$subject = 'from submission';
			$to = $phoneno.'@'.$carrier;
			//$result = mail($to, $subject, $message , $header);
			
			$result = mail("NMC@gmail.com","My subject",$message);
			
			if($result) {
			    echo("message sent to".$to);
			}else {
			     $errorMessage = error_get_last()['message'];
			     echo($errorMessage);
			}
			
			
	}	
}
?>

<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form action="smsone.php" method="post">
		<table align="center">

			<tr>
				<td>from:</td>
					<td><input type="email" name="femail" placeholder="example@example.com"></td><br>
			</tr>

			<tr>
				<td>Phone Number:</td>
					<td><input type="text" name="phoneno" placeholder="Enter Phone number"></td><br>
			</tr>

			<tr>
				<td>Carrier:</td>
					<td><input type="text" name="carrier" placeholder="Enter Carrier"></td><br>
			</tr>

			<tr>
				<td>Message:</td>
				<td><textarea rows="6" cols="50" name="message"></textarea></td><br>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" value="send" name="send"></td><br>
			</tr>
			

		</table>
	</form>
</body>
</html>