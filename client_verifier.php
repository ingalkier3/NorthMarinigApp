

<?php 
    ini_set("display_errors", "1");
    error_reporting(E_ALL);
  include_once 'database.php';
  
//   var_dump($_GET['ref']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$ref = "";

if(isset($_GET['ref'])){
    
    
    $ref  = $_GET['ref'];
}
$sql = "Select * from info  where transaction_no = '$ref';";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 
 


 ?>

<script src="datatable/jquery-3.6.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="datatable/jquery.dataTables.min.css">
<script src="datatable/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="clients_verifier.css">


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-user"></i> Client Verifier </b></h5>
  </header>


  <div style="padding: 5px;">
      
    <video id="preview" style="width:300px"></video>
    <input type="password"  id="search" name="search" placeholder="Search...">

    
                  <div class="row" style="color:white">
                <div class="col-100">
                  <label for="image">Picture</label>
                </div>
                <div class="col-100">
                   <?php if(isset($row['client_image'])) { ?>
                        <?='<img class="image" src="data:image/jpeg;base64,'.base64_encode($row['client_image']).'"/>'?>
                   <?php  }  ?>
                    
                  
                </div>
              </div>
              <div class="row" style="color:white">
                <div class="col-100">
                  <label for="transaction_no">Transaction No.</label>
                </div>
                <div class="col-100">
                  <input type="text" readonly="" value='<?=$row['transaction_no']?>' id="transaction_no" name="transaction_no" placeholder="Transaction No.">
                </div>
              </div>

              <div class="row" style="color:white">
                <div class="col-100">
                  <label for="suffix">Suffix</label>
                </div>
                <div class="col-100">
                  <input type ="text" value='<?=$row['suffix']?>' id="suffix" name="suffix" placeholder="Suffix">
                  </select>
                </div>
              </div>
              <div class="row" style="color:white">
                <div class="col-100">
                  <label for="firstname">First Name</label>
                </div>
                <div class="col-100">
                  <input required='' value='<?=$row['firstname']?>'  type="text" id="firstname" name="firstname" placeholder="Your name..">
                </div>
              </div>
              <div class="row" style="color:white">
                <div class="col-100">
                  <label for="lastname">Last Name</label>
                </div>
                <div class="col-100">
                  <input required='' value='<?=$row['lastname']?>'  type="text" id="lastname" name="lastname" placeholder="Your last name..">
                </div>
              </div>
              <div class="row" style="color:white">
                <div class="col-100">
                  <label for="bdate">Birthdate</label>
                </div>
                <div class="col-100">
                  <input required='' value='<?=$row['bdate']?>'  type="text" id="bdate" name="bdate">
                </div>
              </div>
              <div class="row" style="color:white">
                <div class="col-100">
                  <label for="address">Address</label>
                </div>
                <div class="col-100">
                  <input required='' value='<?=$row['address']?>'  type="text" id="address" name="address" placeholder="Your address..">
                </div>
              </div>
              <div class="row" style="color:white">
                <div class="col-100">
                  <label for="contact">Contact</label>
                </div>
                <div class="col-100">
                  <input required='' value='<?=$row['contact']?>'  type="text" id="contact" name="contact" placeholder="Your Contact..">
                </div>
              </div>
              <div class="row" style="color:white">
                <div class="col-100">
                  <label for="email">Email</label>
                </div>
                <div class="col-100">
                  <input required=''  value='<?=$row['email']?>' type="text" id="email" name="email" placeholder="Your Email..">
                </div>
              </div>
              <div class="row" style="color:white">
                <div class="col-100">
                  <label for="pdate">Preferred Date</label>
                </div>
                <div class="col-100">
                  <input required='' value='<?=$row['preferred_date']?>'  type="text" id="pdate" name="pdate">
                </div>
              </div>


              <div class="row" style="color:white">
                <div class="col-100">
                  <label for="space"></label>
                </div>
    
  </div>
    
  </div>
    
<script type="text/javascript">
		
	var element = document.getElementById("a_clients_verifier");
  element.classList.add("w3-blue");
 
// Select the input field by its id
const myInput = document.getElementById('search');

// Add an event listener to the input field
myInput.addEventListener('keydown', function(event) {
  // Check if Enter key was pressed
  if (event.keyCode === 13) {
    // Get the value of the input field
    const inputValue = event.target.value;
    
    // Splitting a string into an array using a separator
var myArray = inputValue.split(",");

    
    location.href = 'admin_index.php?page=client_verifier&ref='+myArray[0];
  }
});





 </script>
     
  <script src="BarcodeCameraReader/camera/adapter.min.js"></script>
<script src="BarcodeCameraReader/camera/instascan.min.js"></script>
<script src="BarcodeCameraReader/camera/vue.min.js"></script>
<script src="BarcodeCameraReader/mainScan.js"></script>
   

