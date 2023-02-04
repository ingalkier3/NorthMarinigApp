<?php
$link = mysqli_connect("localhost", "root", "", "hospitalfinder");
if($link===false){
  die("error:could not connect.".mysqli_connect_error());
}

$transaction_no= mysqli_real_escape_string($link, $_REQUEST['transaction_no']);
$firstName= mysqli_real_escape_string($link, $_REQUEST['firstName']);
$lastName= mysqli_real_escape_string($link, $_REQUEST['lastName']);
$Location= mysqli_real_escape_string($link, $_REQUEST['Location']);
$Contact= mysqli_real_escape_string($link, $_REQUEST['Contact']);
$Email= mysqli_real_escape_string($link, $_REQUEST['Email']);
$Age= mysqli_real_escape_string($link, $_REQUEST['Age']);

$sql= "INSERT INTO `info`( `transaction_no`, `First_name`, `Last_name`, `Location`, `Contact`, `Email`, `Age`) VALUES ('$transaction_no','$firstName','$lastName','$Location','$Contact','$Email','$Age')";
if(mysqli_query ($link, $sql)){
  header("location:thankyou.html");
  echo "Adding Record Successful";
}
else {

  echo "ERROR:unable to display $sql." . mysqli_error($link);

}
mysqli_close($link);
?>
