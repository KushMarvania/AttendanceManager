<?php
session_start();
require_once('database.php');
if(!isset($_SESSION['email'])){
  header('location:index.php');
}
$message = $_SESSION['message'];
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link href="css/alert.css" rel='stylesheet' type='text/css'>
    <title>message</title>
    <style media="screen">
      input:focus, textarea:focus, select:focus, button:focus{
        outline: none;
      }
    </style>
  </head>
  <body>
    <?php
    if ($message == 'wrong_pin') {
      echo "<div id='container'><p>Ooops!<p>";
      echo "<div id='main'>Enter a valid pin</div>";
      echo "<div id='link'><a id='single' href='marko.php'>Return</a></div></div>";
    }
    elseif ($message == 'attendance_success') {
      echo "<div id='container'><p>Great!<p>";
      echo "<div id='main'>Your attendance is successfully marked for this session</div>";
      echo "<div id='link'><a id='single' href='marko.php'>Return</a></div></div>";
    }
    elseif ($message == 'attendance_already_marked') {
      echo "<div id='container'><p>Ooops!<p>";
      echo "<div id='main'>Your attendance for this session is already marked</div>";
      echo "<div id='link'><a id='single' href='marko.php'>Return</a></div></div>";
    }
    elseif ($message == 'use_same_device') {
      echo "<div id='container'><p>Ooops!<p>";
      echo "<div id='main'>Use the same device you used today to mark your attendance</div>";
      echo "<div id='link'><a id='single' href='marko.php'>Return</a></div></div>";
    }
    else {
      echo "<p>Ooops!<p>";
    }
     ?>
  </body>
</html>
