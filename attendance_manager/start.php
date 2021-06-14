<?php
session_start();
if(!isset($_SESSION['email'])){
  header('location:index.php');
}
$role = $_SESSION['role'];
if ($role !== "teacher") {
  header('location:index.php');
}
$year = $_POST['year'];
$stream = $_POST['stream'];
if (!isset($year) || !isset($stream)) {
  header('location:over.php');
}

require_once('database.php');
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$yearstream = $year."_".$stream."_student";
$yearstreamt = $year."_".$stream."_teacher";
$_SESSION['yearstreamt'] = $yearstreamt;
$pin = rand(1000,9999);

$sql = "select * from ".$yearstreamt." where email = '$email'";
$result = mysqli_query($con, $sql);
$fetch = $result->fetch_assoc();
$subject = $fetch['subject'];
$subject_lecture_count = $fetch['t_lec'];
$subject_lecture_count_current = $subject_lecture_count+1;
$update_pin = "update ".$yearstreamt." set pin = '$pin' where email = '$email'";
mysqli_query($con, $update_pin);
$update_lecture_count = "update ".$yearstreamt." set t_lec = t_lec+1 where email = '$email'";
mysqli_query($con, $update_lecture_count);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link href="css/start.css" rel='stylesheet' type='text/css'>
    <title>session</title>
    <style media="screen">
      input:focus, textarea:focus, select:focus, button:focus{
        outline: none;
      }
    </style>
  </head>
  <body>
    <script type="text/javascript">
      var sec = 0;
      function pad ( val ) { return val > 9 ? val : "0" + val; }
      setInterval( function(){
      document.getElementById("seconds").innerHTML=pad(++sec%60);
      document.getElementById("minutes").innerHTML=pad(parseInt(sec/60,10));
      }, 1000);

      function alertFunction(){
        document.getElementById("alert").style.display = "";
        document.getElementById("opacity").style.display = "none";
      }
      function alert_hideFunction(){
        document.getElementById("alert").style.display = "none";
        document.getElementById("opacity").style.display = "";
      }
    </script>
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
        <?php echo $username ?>
      </div>
      <div class="data">
        <?php echo $subject ?> session,<br>
        lecture number : <?php echo $subject_lecture_count_current ?>
        <div class="stopwatch"><span id="minutes"></span>:<span id="seconds"></span></div>
      </div>
    </div>
    <div class="pin">
      secure code-<br>
      <span><?php echo $pin ?></span>
    </div>
    <form class="stop_button" action="stop.php" method="post">
      <div id="opacity">
        <a id="button1" onclick="alertFunction()";>+</a>
      </div>
      <div class="alert" id='alert' style="display:none">
        <p>Confirm to continue,<br>this will end this session</p>
        <a id="button2" onclick="alert_hideFunction()";>no</a>
        <input type="submit" id="button3" value="yes" formaction="stop.php">
      </div>
    </form>
    <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
    </script>
  </body>
</html>
