
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

$sql = "SELECT * FROM info;";

$result = $conn->query($sql);

$arr_status = array('for approval');

if (isset($_GET['book'])) {
$arr_status = array('approved','disapproved');
}



 ?>

<script src="datatable/jquery-3.6.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="datatable/jquery.dataTables.min.css">
<script src="datatable/jquery.dataTables.min.js"></script>


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-history"></i> Booking </b></h5>
    <?php if (isset($_GET['book'])): ?>
      <a href="admin_index.php?page=booking" style="float: right; " class="w3-btn w3-ripple w3-blue" > Pending Booking </a>
    <?php else: ?>
        <a href="admin_index.php?page=booking&book=history" style="float: right; " class="w3-btn w3-ripple w3-blue" > Booking History</a>
    <?php endif ?>
    
  </header>


  <div style="padding: 5px;">
    
    <table id="myTable" class="table">
      <thead>
        <tr>
          <th scope="col">Transaction No.</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Location</th>
          <th scope="col">Contact</th>
          <th scope="col">Email</th>
          <th scope="col">Birthdate</th>
          <th scope="col">Status</th>
           <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0): ?>

          <?php while ($row = $result->fetch_assoc()): ?>
            

            <?php if(in_array($row['status'], $arr_status)): ?>
               <tr>
                <td><?=$row['transaction_no']?></td>
                <td ><?=$row['firstname']?></td>
                <td ><?=$row['lastname']?></td>
                <td ><?=$row['address']?></td>
                <td><?=$row['contact']?></td>
                <td ><?=$row['email']?></td>
                <td><?=$row['bdate']?></td>
                <td><?=$row['status']?></td>
                <td class="">
                    
                     <?php if (!isset($_GET['book'])): ?>
                        <button  onclick="openModal('<?=$row['transaction_no']?>', '<?=$row['firstname'].' '.$row['lastname']?>','<?=$row['status']?>' )" class="w3-btn w3-ripple w3-green">Change Status</button>
                    <?php endif ?>
                   
                </td>
              </tr>
            <?php endif ?>


          <?php endwhile ?>
          
        <?php endif ?>
       
       
      </tbody>
    </table>

  </div>
  


<div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2 id="transaction_no_modal">Modal Header</h2>
      </header>
      <div class="w3-container">
        <p id="name_modal"></p>
        <p id="status_modal"></p>
      </div>
      <footer class="w3-container ">
        <p style="float: right"> 
          <button class="w3-btn w3-ripple w3-green" onclick="approved()">Approved</button>
          <button class="w3-btn w3-ripple w3-red" onclick="disapproved()">Disapproved</button>
        </p>
         

      </footer>
    </div>
  </div>


</div>


<script type="text/javascript">
		
	var element = document.getElementById("a_booking");
  element.classList.add("w3-blue");


  $(document).ready( function () {
    $('#myTable').DataTable();
  });


  function openModal(transaction_no, name, status){


    document.getElementById('id01').style.display='block';
    document.getElementById('transaction_no_modal').innerHTML = transaction_no;
    document.getElementById('name_modal').innerHTML = "Name :"+name;
    document.getElementById('status_modal').innerHTML = "Status: "+status;

  }


  function approved() {

    transaction_no =  document.getElementById('transaction_no_modal').innerHTML;
    change_status(transaction_no, 'approved');
  }

  function disapproved(){

    transaction_no =  document.getElementById('transaction_no_modal').innerHTML;
     change_status(transaction_no, 'disapproved');
  }

  function change_status(transaction_no, status){

      var data = new FormData();
    data.append('transaction_no', transaction_no);
    data.append('status', status);

    var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function() {

          if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
             if (xmlhttp.status == 200) {
                  
                  if(xmlhttp.responseText == 'success') {

                  alert("Record updated successfully")
                  location.reload();
               }else {

                alert("Error updating record")
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

      xmlhttp.open("POST", "update_status.php", true);
      xmlhttp.send(data);


  }
</script>