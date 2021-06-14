<?php
session_start();
if(isset($_SESSION["email"]) && $_SESSION["role"] == true){
  $role = $_SESSION['role'];
  if ($role == "student") {
    header('location:marko.php');
    exit();
  }
  elseif ($role == "teacher") {
    header('location:over.php');
    exit();
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link href="css/index.css" rel='stylesheet' type='text/css'>
    <title>a-manager</title>
    <style media="screen">
      input:focus, textarea:focus, select:focus, button:focus{
        outline: none;
      }
    </style>
  </head>
  <body>
    <script type="text/javascript">
      function inFunction() {
        document.getElementById("login_page").style.display = "";
        document.getElementById("signup_page").style.display = "none";
        document.getElementById("lb").style.backgroundColor = "#8fe3d9";
        document.getElementById("sb").style.backgroundColor = "#ffffff";
        document.getElementById("lb").style.fontWeight = "bold";
        document.getElementById("sb").style.fontWeight = "normal";
      }
      function upFunction() {
        document.getElementById("signup_page").style.display = "";
        document.getElementById("login_page").style.display = "none";
        document.getElementById("sb").style.backgroundColor = "#8fe3d9";
        document.getElementById("lb").style.backgroundColor = "#ffffff";
        document.getElementById("sb").style.fontWeight = "bold";
        document.getElementById("lb").style.fontWeight = "normal";
      }
      var check = function() {
      if (document.getElementById('password').value ==
        document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').style.fontSize = '12px';
        document.getElementById("message").style.margin = "5px 0px 0px 30px";
        document.getElementById('message').innerHTML = 'password matching';
      }
      else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').style.fontSize = '12px';
        document.getElementById("message").style.margin = "5px 0px 0px 30px";
        document.getElementById('message').innerHTML = 'password not matching';
      }
      }
    </script>
    <canvas id="canvas" width="100vw" height="25px"></canvas>
    <div class="ani">
      <div class="box">
        <div class="ball">
        </div>
      </div>
    </div>
    <div class="container">
      <button id="lb" class="login" type="button" name="login" onclick="inFunction()"/>Log In</button>
      <button id="sb" class="signup" type="button" name="signup" onclick="upFunction()"/>Sign Up</button>
    </div>
    <div class="frame_one" id="login_page" style="display:;">
      <form action="validate.php" method="post" name="form">
        <input type="email" name="email" placeholder="Your Email"/ required  ><hr>
        <input type="password" name="pass" placeholder="Your Password"/ required ><hr>
        <div class="fog">
        </div>
        <div>
            <button type="submit" value="submit" class="btn">></button>
        </div>
     </form>
   </div>
   <div class="frame_two" id="signup_page" style="display:none;">
 <form action="register.php" method="post" name="form">
   <input type="email" name="email" placeholder="Your Email"/ required ><hr>
   <input type="text" name="username" placeholder="Username"/ required  ><hr>
   <input type="number" name="roll_no" placeholder="Your Roll Number"/ required max="999" ><hr>
   <select class="" name="year"/ required>
     <option value="">Select Year:</option>
     <option value="fe">FE</option>
     <option value="se">SE</option>
     <option value="te">TE</option>
     <option value="be">BE</option>
   </select><hr>
   <select class="" name="stream"/ required>
     <option value="">Select Stream:</option>
     <option value="comps">COMP</option>
     <option value="it">IT</option>
     <option value="extc">EXTC</option>
     <option value="civil">CIVIL</option>
   </select><hr>
   <input type="password" name="pass" id="password" onkeyup='check();' placeholder="Set Password"/ required ><hr>
   <input type="password" name="confirmpass" id="confirm_password" onkeyup='check();' placeholder="Confirm Password"/ required ><hr>
   <span id='message'></span>
   <div >
     <button type="submit" value="submit" class="btn">></button>
  </div>
     </form>
   </div>
   <script>
     if ( window.history.replaceState ) {
       window.history.replaceState( null, null, window.location.href );
     }
   </script>
  </body>
</html>
