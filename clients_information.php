
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

$sql = "SELECT m1.*, (Select count(*) FROM info where referral_code = m1.client_username) as `no_of_ref` FROM info m1 LEFT JOIN info m2 ON (m1.client_username = m2.client_username AND m1.id < m2.id) WHERE m2.id IS NULL;";

$result = $conn->query($sql);


 ?>

<script src="datatable/jquery-3.6.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="datatable/jquery.dataTables.min.css">
<script src="datatable/jquery.dataTables.min.js"></script>


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-user"></i> Client Information </b></h5>
  </header>


  <div style="padding: 5px;">
    
    <table id="myTable" class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Contact</th>
          <th scope="col">Email</th>
          <th scope="col">No. of Referrals</th>
          <th scope="col">Action</th>
      
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0): ?>

          <?php while ($row = $result->fetch_assoc()): ?>
          
               <tr>
                <td ><?=$row['suffix'].' '.$row['firstname'].' '.$row['lastname']?></td>
                <td><?=$row['contact']?></td>
                <td ><?=$row['email']?></td>
                <td ><?=$row['no_of_ref']?></td>

                <td class="">
                   <button  onclick="openInfoModal('<?=$row['client_username']?>')" class="w3-btn w3-ripple w3-green">View Info</button>

                    <button onclick="openTransactionModal('<?=$row['client_username']?>' )" class="w3-btn w3-ripple w3-green">View Transaction/s</button>
                 
                </td>
              </tr>

          <?php endwhile ?>
          
        <?php endif ?>
       
       
      </tbody>
    </table>

  </div>
  


<div id="modal_info" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('modal_info').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2 id="info_client_info">Modal Header</h2>
      </header>
      <div class="w3-container">
        <p id="name_modal"></p>
        <p id="contact_modal"></p>
        <p id="email_modal"></p>
        <p id="bdate_modal"></p>
        <p id="address_modal"></p>
      </div>
      <footer class="w3-container ">
        <p style="float: right"> 
          <button class="w3-btn w3-ripple w3-green" onclick="closeModal()">Close</button>
        </p>
         
      </footer>
    </div>
  </div>
</div>

<div id="modal_transaction" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('modal_transaction').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2 id="trans_client_info">Modal Header</h2>
      </header>

      <div class="w3-container">
        <br>
        <table id = "myTableTransaction">      
              <thead>
                <tr>
                  <th>Transaction No.</th> 
                  <th>Name</th>
                  <th>Contact</th> 
                  <th>Email</th>  
                  <th>Preferred Date</th> 
                  <th>status</th> 
                </tr>
             
              </thead>


        </table>
      </div>
      <footer class="w3-container ">
        <p style="float: right"> 
          <button class="w3-btn w3-ripple w3-green" onclick="closeModal()">Close</button>
        </p>
         
      </footer>
    </div>
  </div>
</div>



<script type="text/javascript">
		
	var element = document.getElementById("a_clients_information");
  element.classList.add("w3-blue");
 
  var myTableTransaction = $('#myTableTransaction').DataTable();
  $('#myTable').DataTable();

 
  function closeModal() {
    document.getElementById('modal_info').style.display='none';
    document.getElementById('modal_transaction').style.display='none';
  }

   function openTransactionModal(client_username){

    var data = new FormData();
    data.append('client_username', client_username );
    data.append('limit', 10);

    var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function() {

          if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
             if (xmlhttp.status == 200) {
                  
                var data = JSON.parse(xmlhttp.responseText.toString());
                console.log(data);  
                
                document.getElementById('trans_client_info').innerHTML = "Client Username: "+client_username;
                myTableTransaction.clear();
                for (const key in data) {
                  if (data.hasOwnProperty(key)) {
       
                      myTableTransaction.row.add([data[key].transaction_no, data[key].firstname+" "+data[key].lastname, data[key].contact, data[key].email, data[key].preferred_date, data[key].status]).draw(false);

                  }
                }

                document.getElementById('modal_transaction').style.display='block';
          
             }
             else if (xmlhttp.status == 400) {
                alert('There was an error 400');
             }
             else {
                 alert('something else other than 200 was returned');
             }
          }
      };

      xmlhttp.open("POST", "get_client_info.php", true);
      xmlhttp.send(data);
  }



  function openInfoModal(client_username){

    var data = new FormData();
    data.append('client_username', client_username);
    data.append('limit', 1);

    var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function() {

          if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
             if (xmlhttp.status == 200) {
                  
                var data = JSON.parse( xmlhttp.responseText.toString());
                console.log(data);  
        
                document.getElementById('info_client_info').innerHTML = "Client Username: "+client_username;
                document.getElementById('name_modal').innerHTML = "Name :"+data.suffix+" "+data.firstname+" "+data.lastname;
                document.getElementById('contact_modal').innerHTML = "Contact: "+data.contact;
                document.getElementById('email_modal').innerHTML = "Email: "+data.email;
                document.getElementById('bdate_modal').innerHTML = "Birth Date: "+data.bdate;
                document.getElementById('address_modal').innerHTML = "Address: "+data.address;

                // itong code na to pampalitaw ng modal
                 document.getElementById('modal_info').style.display='block';
          
             }
             else if (xmlhttp.status == 400) {
                alert('There was an error 400');
             }
             else {
                 alert('something else other than 200 was returned');
             }
          }

      };

      xmlhttp.open("POST", "get_client_info.php", true);
      xmlhttp.send(data);
  }


</script>