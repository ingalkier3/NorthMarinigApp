<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="home1.css">
    <link rel="stylesheet" href="fb.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <title>North Marinig Center</title>
<style>
      body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>


  </head>
  <body>
    <div class="header bg-icon1">
      <h1 style="color:#144e06; ">
        <img src="marinig1.png" alt="logo" style="float:left;width:75px;height:75px;"> North Marinig Center
      </h1>
    </div>
    <div class="topnav">
      <a href="front.html">
        <i class="fa fa-home" style="padding: 0px;"></i> Home </a>
      <a href="About covid.html">About COVID-19</a>
      <a href="map.html">Map</a>
      <a class="" href="HOTLINE.html">
        <i class="fa fa-phone" style="padding: 0px;"></i>
        <span> Hotlines</span>
      </a>
      <a style="float:right" href="login.php">Login</a>
    </div>
    <div class="row">
      <div class="leftcolumn">
        <div class="card">
          <h2>Please Fill Up The Form</h2>
          <div class="container">
            <form action="submitlogin.php">
              <div class="row" style="color:white">
                <div class="col-25">
                  <label for="transaction_no">Transaction No.</label>
                </div>
                <div class="col-75">
                  <input type="text" readonly="" id="transaction_no" name="transaction_no" placeholder="Transaction No.">
                </div>
              </div>
              <div class="row" style="color:white">
                <div class="col-25">
                  <label for="username">Username</label>
                </div>
                <div class="col-75">
                  <input required=''  type="text" id="username" name="username" placeholder="Your username..">
                </div>
              </div>

              <div class="row" style="color:white">
                <div class="col-25">
                  <label for="suffix">Suffix</label>
                </div>
                <div class="col-75">
                  <select  required='' id="suffix" name="suffix">
                    <option disabled="" selected=""></option>
                    <option value="Mr">Mr</option>
                    <option value="Mrs"> Mrs</option>
                    <option value="Ms">Ms</option>
                  </select>
                </div>
              </div>
              <div class="row" style="color:white">
                <div class="col-25">
                  <label for="firstname">First Name</label>
                </div>
                <div class="col-75">
                  <input required=''  type="text" id="firstname" name="firstname" placeholder="Your name..">
                </div>
              </div>
              <div class="row" style="color:white">
                <div class="col-25">
                  <label for="lastname">Last Name</label>
                </div>
                <div class="col-75">
                  <input required=''  type="text" id="lastname" name="lastname" placeholder="Your last name..">
                </div>
              </div>
              <div class="row" style="color:white">
                <div class="col-25">
                  <label for="bdate">Birthdate</label>
                </div>
                <div class="col-75">
                  <input required=''  type="date" id="bdate" name="bdate">
                </div>
              </div>
              <div class="row" style="color:white">
                <div class="col-25">
                  <label for="address">Address</label>
                </div>
                <div class="col-75">
                  <input required=''  type="text" id="address" name="address" placeholder="Your address..">
                </div>
              </div>
              <div class="row" style="color:white">
                <div class="col-25">
                  <label for="contact">Contact</label>
                </div>
                <div class="col-75">
                  <input required=''  type="text" id="contact" name="contact" placeholder="Your Contact..">
                </div>
              </div>
              <div class="row" style="color:white">
                <div class="col-25">
                  <label for="email">Email</label>
                </div>
                <div class="col-75">
                  <input required=''  type="text" id="email" name="email" placeholder="Your Email..">
                </div>
              </div>
              <div class="row" style="color:white">
                <div class="col-25">
                  <label for="pdate">Preferred date</label>
                </div>
                <div class="col-75">
                  <input required=''  type="date" min="<?php echo date("Y-m-d"); ?>" id="pdate" name="pdate">
                </div>
              </div>


                <div class="row" style="color:white">
                <div class="col-25">
                  <label for="username">Referral Code</label>
                </div>
                <div class="col-75">
                  <input   type="text" id="referral_code" name="referral_code" placeholder="Optional referral code/Username of who refer you..">
                </div>
              </div>

              <div class="row" style="color:white">
                <div class="col-25">
                  <label for="Email"></label>
                </div>
                <div class="col-75">
                  <input required="" type="checkbox" id="agreement" name="agreement"> Terms and Agreement
                </div>
              </div>



              <div class="row" style="margin-top: 5px">
                <a class="btn" target="_blank" href="available_dates">Available Dates</a>
                <input type="submit" value="Submit">
              </div>

              

            </form>
          </div>
          <a style="font-size: 90%; font-style: Garamond; ">This System will help you to your appointment</a>
        </div>
      </div>
      <div class="rightcolumn ">
        <div class="card bg-icon">
          <h2>About Us</h2>
          <h5>North Marinig Health Center is a Public health department located at Purok 2 Marinig, Cabuyao, Laguna 4026, PH.The business is listed under public health department category. </h5>
          <h4>Telephone: (049) 831 6038</h4>
          <i class='fas fa-location'>Address: Purok 2 Brgy. Marinig, Cabuyao , Laguna </i>
        </div>
        <div class="card bg-icon">
          <h2>Quotes</h2>
          <h5>A fit body, a calm mind, a house full of love. These things cannot be bought – they must be earned.” – Naval Ravikant </h5>
          <h5>“A good laugh and a long sleep are the best cures in the doctor’s book.” – Irish proverb </h5>
        </div>
        <div class="card ">
          <h3>Visit Us</h3>
          <a href="https://www.facebook.com/brgymarinig">
            <img src="facebook.png" style="height: 50px; width: 50px;">
          </a>
        </div>
      </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <h4>AWIN USER AGREEMENT </h4>
        <p>This User Agreement sets out the terms between you and AWIN Limited (“AWIN”)
        under which you may access the intranet and software platform operated by AWIN
        (the “Interface”). This User Agreement applies to all users of the Interface (each
        a “User” or “You”, collectively “Users”) and constitutes a legally binding
        agreement between each User individually and AWIN. If you, the User do not accept
        the terms of this User Agreement, you cannot use the Interface.
        By clicking the ‘Step Two’ button during the registration process you accept the
        terms and conditions of this User Agreement.
        1. YOUR USER ACCOUNT
        1.1 When you register on the Website you will be allocated a personal account
        on the Interface, which you can access by entering your username and
        password (“User Account”).
        1.2 The User Account is for a single User only. AWIN will not permit you to share
        your username and password with any other person nor with multiple Users
        on a network. Responsibility for the security and confidentiality of any
        passwords issued rests with you. AWIN will not be liable for any losses or
        damages suffered by you due to the disclosure of any User Account
        passwords.
        1.3 All User Accounts must be registered with your own name and a valid
        personal email address that you access regularly so that moderation emails
        can be sent to you. User Accounts registered with someone else's email
        address, or with temporary email addresses, may be closed without notice.
        AWIN may require Users to revalidate their User Account if AWIN believes
        they have been using an invalid email address.
        1.4 You will be responsible and liable for all activities occurring under your User
        Account. If you suspect that a third party has gained unauthorised access to
        access data, you must inform DWL immediately by sending an e-mail to
        compliance@awin.com or such other e-mail address as may be notified to
        you from time to time.</p>

        <input id="btn_accept" type="button" class="btn red" value="Accept">
        <input  id="btn_declined" type="button" class="btn red" value="Declined">

      </div>

    </div>


    </div>
    <div class="footer">
      <h4>All Right Reserve © to the researchers of the group and presented in Saint Vincent College of Cabuyao.</h4>
    </div>

  </body>
  <script type="text/javascript">

    // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var agreement = document.getElementById("agreement");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
agreement.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


var btn_accept = document.getElementById("btn_accept");
var btn_declined = document.getElementById("btn_declined");

btn_accept.onclick = function() {

  agreement.checked = true;
  modal.style.display = "none";
}

btn_declined.onclick = function() {
   agreement.checked = false;
   modal.style.display = "none";
}




    setInterval(() => {
      var xmlhttp = new XMLHttpRequest();
      var data = new FormData();
      data.append('g', '0');
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
          if (xmlhttp.status == 200) {
            document.getElementById("transaction_no").value = xmlhttp.responseText;
          } else if (xmlhttp.status == 400) {
            alert('There was an error 400');
          } else {
            alert('something else other than 200 was returned');
          }
        }
      };
      xmlhttp.open("POST", "get_transaction_no.php", true);
      xmlhttp.send(data);
    }, 3000);
  </script>
</html>

