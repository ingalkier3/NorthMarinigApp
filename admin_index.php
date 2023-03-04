<!DOCTYPE html>
<html>
<title>Admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"><img src="marinig1.png" style="width: 45px; height: 45px;"></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome,<strong><br>Administrator</strong></span><br>
    
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Menu</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>

    <a id="a_dashboard" href="http://localhost/SAD2/admin_index.php?page=dashboard" class="w3-bar-item w3-button w3-padding"><i class="fa fa-dashboard fa-fw"></i>  Dashboard </a>


    <a id="a_booking" href="http://localhost/SAD2/admin_index.php?page=booking" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  Booking </a>


     <a id="a_clinic" href="http://localhost/SAD2/admin_index.php?page=clinic" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home fa-fw"></i> Clinic Appointment </a>


    <a id="a_clients_information" href="http://localhost/SAD2/admin_index.php?page=clients_information" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i> Clients Information </a>



    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-power-off fa-fw"></i>  Logout </a>

  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>


<?php if (!isset($_GET['page'])): 
    include_once 'dashboard.php';
  ?>  
<?php elseif ($_GET['page'] == 'booking'): 
    include_once 'booking.php';
  ?>  
<?php elseif ($_GET['page'] == 'add_admin'): 
    include_once 'add_admin.php';
  ?>  

<?php elseif ($_GET['page'] == 'clinic'): 
    include_once 'clinic.php';
  ?> 

  <?php elseif ($_GET['page'] == 'clients_information'): 
    include_once 'clients_information.php';
  ?>  

<?php else: 

   include_once 'dashboard.php';?>
 
<?php endif ?>


<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
