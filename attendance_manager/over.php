<?php
session_start();
if(!isset($_SESSION['email'])){
  header('location:index.php');
}
$role = $_SESSION['role'];
if ($role !== "teacher") {
  header('location:index.php');
}
require_once('database.php');
$email = $_SESSION['email'];
$username = $_SESSION['username'];

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link href="css/over.css" rel='stylesheet' type='text/css'>
    <title>dashboard</title>
    <style media="screen">
      input:focus, textarea:focus, select:focus, button:focus{
        outline: none;
      }
    </style>
  </head>
  <body>
    <script type="text/javascript">
    function menuOpen(){
      document.getElementById("sub_menu").style.display = "";
      document.getElementById("openB").style.display = "none";
      document.getElementById("user").style.display = "none";
    }
    function menuClose(){
      document.getElementById("sub_menu").style.display = "none";
      document.getElementById("openB").style.display = "";
      document.getElementById("user").style.display = "";
    }
    function alertFunction(){
      document.getElementById("alert").style.display = "";
      document.getElementById("opacity").style.display = "none";
    }
    function alert_hideFunction(){
      document.getElementById("alert").style.display = "none";
      document.getElementById("opacity").style.display = "";
    }
    </script>
    <div class="sub_menu" id="sub_menu" style="display: none">
      <button type="button" id="closeB" name="button" onclick="menuClose()">-</button>
      <div class="blank">
      </div>
      <a href="logout.php">Logout</a><br><br>
    </div>
    <div class="nav">
      <button type="button" id="openB" name="button" onclick="menuOpen()">+</button>
    </div>
    <div class="user" id="user">
      <div class="date">
        <?php echo date("d/m/y"); ?>
        <?php echo"<br>"; ?>
        <?php echo date("l,"); ?>
      </div>
      <div class="hello">
        hello,
      </div>
      <div class="name">
        <?php echo $username; ?>
      </div>
    <div class="animation">
      <canvas id="canvas1"></canvas>
      <canvas id="canvas2"></canvas>
      <canvas id="canvas3"></canvas>
      <canvas id="canvas2"></canvas>
      <canvas id="canvas1"></canvas>
      <canvas id="canvas2"></canvas>
      <canvas id="canvas3"></canvas>
      <canvas id="canvas2"></canvas>
      <canvas id="canvas1"></canvas>
    </div>
    <div class="form">
      <form id="action_form" method="post">
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
        <div class="btns">
          <div id="opacity">
            <input type="submit" id="button1" value="view" formaction="view.php">
            <a id="button2" onclick="alertFunction()";>start</a>
          </div>
          <div class="alert" id='alert' style="display:none">
            <p>Confirm to continue,<br>this will add a session in the records</p>
            <a id="button3" onclick="alert_hideFunction()";>no</a>
            <input type="submit" id="button4" value="yes" formaction="start.php">
          </div>
       </div>
      </form>
    </div>
    </div>
    <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
    </script>
  </body>
</html>
