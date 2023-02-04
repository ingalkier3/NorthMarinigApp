

<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="home.css">
	<link rel="stylesheet" href="home1.css">
	<link rel="stylesheet" href="fb.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<form action="submitlogin.php" method="post">
<title>North Marinig Center</title>

</head>
<body>

<div class="header">
  <h1><img src="marinig1.png"alt="logo" style=float:left;width:75px;height:75px>North Marinig Center </h1>
</div>

<div class="topnav">
  <a  href="front.html"> <i class="fa fa-home" style="padding: 0px;"></i> Home</a>
  <a href="About covid.html">About</a>
  <a href="map.html">Map</a>
  <a  class=""href="HOTLINE.html"> <i class="fa fa-phone" style="padding: 0px;"></i> <span> Hotlines</span> </a>

  
  <a style="float:right" href="login.php">Login</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2>Please Fill Up The Form</h2>

      <div class="container">
  <form action="submitlogin.php">

       <div class="row"  style="color:white">
      <div class="col-25">
        <label for="transaction_no">Transaction No.</label>
      </div>
      <div class="col-75">
        <input type="text" readonly="" id="transaction_no" name="transaction_no" placeholder="Transaction No.">
      </div>
    </div>
    <div class="row"  style="color:white">
      <div class="col-25">
        <label for="firstName">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="firstName" name="firstName" placeholder="Your name..">
      </div>
    </div>
    <div class="row" style="color:white">
      <div class="col-25">
        <label for="lastName">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lastName" name="lastName" placeholder="Your last name..">
      </div>
    </div>

    <div class="row" style="color:white">
      <div class="col-25">
        <label for="Location">location</label>
      </div>
      <div class="col-75">
        <input type="text" id="Location" name="Location" placeholder="Your location..">
      </div>
    </div>

    <div class="row" style="color:white">
      <div class="col-25">
        <label for="Contact">Contact</label>
      </div>
      <div class="col-75">
        <input type="text" id="Contact" name="Contact" placeholder="Your Contact..">
      </div>
    </div>

    <div class="row" style="color:white">
      <div class="col-25">
        <label for="Email">Email</label>
      </div>
      <div class="col-75">
        <input type="text" id="Email" name="Email" placeholder="Your Email..">
      </div>
    </div>


    <div class="row" style="color:white">
      <div class="col-25">
        <label for="Age">Age</label>
      </div>
      <div class="col-75">
        <input type="text" id="Age" name="Age" placeholder="Your Age..">
      </div>
    </div>

    <div class="row" style="margin-top: 5px">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>


      <a style="font-size: 90%; font-style: Garamond; ">This System will help you to find the nearest hospital to your Location</a>
    </div>

  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>About Us</h2>
      <h4>Telephone:</h4>
      <i class="fa fa-phone"> (049) 831 6038</i><br>
     <i class='fas fa-location'> Brgy. Marinig, Cabuyao , Laguna </i>
    </div>
    <div class="card">
      <h3>About Health Issue</h3>




    </div>
    <div class="card">
      <h3>Visit Us</h3>
      <a href="https://www.facebook.com/brgymarinig"><img src="facebook.png" style="height: 50px; width: 50px;"></a>
    </div>
  </div>
</div>

<div class="footer">
  <h4>All Right Reserve © to the researchers of the group and presented in Saint Vincent College of Cabuyao.</h4>
</div>

</form>
</body>


<script type="text/javascript">
  
  setInterval(()=>{

      var xmlhttp = new XMLHttpRequest();

      var data = new FormData();
      data.append('g', '0');

      xmlhttp.onreadystatechange = function() {

          if (xmlhttp.readyState == XMLHttpRequest.DONE) {  
             if (xmlhttp.status == 200) {
                
              document.getElementById("transaction_no").value =  xmlhttp.responseText;

              
             }
             else if (xmlhttp.status == 400) {
                alert('There was an error 400');
             }
             else {
                 alert('something else other than 200 was returned');
             }
          }

      };

      xmlhttp.open("POST", "get_transaction_no.php", true);
      xmlhttp.send(data);


  }, 3000);

</script>

</html>
