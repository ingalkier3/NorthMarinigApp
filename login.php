<?php 

    session_start();

  
    if (isset($_SESSION['is_login'])) {
    
      if ($_SESSION['is_login']) { 
       header('Location: '.'admin_index.php');
      }

    }


 ?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="index.css">

<title>Log In</title>

<div class="container">
  <form method="POST" action="check_user.php">
    <div class="row" style="padding: 13px;">
      <h2 style="text-align:center; color: white">Admin Login</h2>

        <?php if (isset($_GET['err'])): ?>
            <div style="color:#970e0e; text-align: center; font-size: 30px">
            Username/Password is invalid
            </div>
        <?php endif ?>
      

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login"></a>
      </div>

    </div>
  </form>
</div>

<div class="bottom-container" style="margin-top: 10px">
  <div class="row">
    <div class="col=2">
      <a href="index.php" style="color:white" class="btn">Book Appointment</a>
    </div>

  </div>
</div>
