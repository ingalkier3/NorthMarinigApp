  
<?php 
    ini_set("display_errors", "1");
    error_reporting(E_ALL);
    include_once 'database.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbl_appointment;";

$result = $conn->query($sql);



 ?>

<script src="datatable/jquery-3.6.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="datatable/jquery.dataTables.min.css">
<script src="datatable/jquery.dataTables.min.js"></script>


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-home"></i> Appointment  </b></h5>

    <style type="text/css">
      
      form .row input {
        width: 100%;
        padding: 5px;
      }

    </style>
   

  </header>


  <div style="padding: 15px;">
    
    <form action="addNewAppointment.php">

    <div class="row">
      <div class="col-25">
        <label for="date">Date: </label>
      </div>
      <div class="col-75">
        <input type="date" name="date" id="date"  
        >
      </div>
    </div>  

    <div class="row" >
      <div class="col-25">
        <label for="appointment_per_day">No. of people</label>
      </div>
      <div class="col-75">
        <input type="text" id="appointment_per_day" name="appointment_per_day" placeholder="Appointment per day..">
      </div>
    </div>

    

    <div class="row" style="margin-top: 5px">
      <input type="submit" value="Submit" style="float: right; " class="w3-btn w3-ripple w3-green">
    </div>
  </form>

  </div>

  <br>


  <div style="padding: 15px;">
    
    <h3>List of Available Dates</h3>
    <table id="myTable" class="table">
      <thead>
        <tr>
          <th scope="col">Date</th>
          <th scope="col">No. of people</th>
      
           <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0): ?>

          <?php while ($row = $result->fetch_assoc()): ?>
            

           
               <tr> 
                <td><?=$row['appointment_day']?></td>
                <td ><?=$row['no_of_appointment']?></td>
            
                <td class="">
                   <button  onclick="openModal('<?=$row['id']?>')" class="w3-btn w3-ripple w3-red">Deleted</button>
                </td>
              </tr>



          <?php endwhile ?>
          
        <?php endif ?>
       
       
      </tbody>
    </table>

  </div>
  


<div id="deleteModal" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('deleteModal').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Are you sure you want to Delete?</h2>
      </header>
      <div class="w3-container">
        <p>you can still add the schedule</p>
      </div>
      <footer class="w3-container ">
        <p style="float: right"> 
          <button class="w3-btn w3-ripple w3-red" onclick="delete_schedule()">Delete</button>
          <button class="w3-btn w3-ripple w3-green" onclick="closeModal()">Cancel</button>
        </p>
         

      </footer>
    </div>
  </div>


</div>


<script type="text/javascript">
		
	var element = document.getElementById("a_clinic");
  element.classList.add("w3-blue");
  var globalId = "";

  $(document).ready( function () {
    $('#myTable').DataTable();
  });



  function openModal(id){
    document.getElementById('deleteModal').style.display='block';
    globalId = id;
  }

  function closeModal(){
    document.getElementById('deleteModal').style.display='none'
  }

  function delete_schedule(){

    var data = new FormData();
    data.append('id', globalId);

    var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function() {

          if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
             if (xmlhttp.status == 200) {
                  
                  if(xmlhttp.responseText == 'success') {

                  alert("Record successfully deleted")
                  location.reload();
               }else {

                alert("Error deleting the record")
               }
              
             }
             else if (xmlhttp.status == 400) {
                alert('There was an error 400');
             }
             else {
                 alert('something else other than 200 was returned');
             }
          }

      };

      xmlhttp.open("POST", "delete_schedule.php", true);
      xmlhttp.send(data);


  }
</script>