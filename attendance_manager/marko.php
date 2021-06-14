<?php
session_start();
if(!isset($_SESSION['email'])){
  header('location:index.php');
}
$role = $_SESSION['role'];
if ($role !== "student") {
  header('location:index.php');
}
require_once('database.php');
$email = $_SESSION['email'];
$year = $_SESSION['year'];
$stream = $_SESSION['stream'];
$yearstream = $year."_".$stream."_student";
$yearstreamt = $year."_".$stream."_teacher";

$sql = "select * from user where email = '$email'";
$result = mysqli_query($con, $sql);
$fetch = $result->fetch_assoc();
$roll_no = $fetch['roll_no'];
$username = $fetch['username'];

$total_subjects = "select * from ".$yearstreamt."";
$total_subjects_result = mysqli_query($con, $total_subjects);
$subject_count = mysqli_num_rows($total_subjects_result);
for ($i=1; $i <= $subject_count; $i++) {
  $subject_data_teacher = "select * from ".$yearstreamt." where id = ".$i."";
  $subject_data_result = mysqli_query($con, $subject_data_teacher);
  $subject_data_fetch = $subject_data_result->fetch_assoc();
  $subject_name[$i] = $subject_data_fetch['subject'];
  $subject_total_lectures[$i] = $subject_data_fetch['t_lec'];
}
for ($i=1; $i <= $subject_count; $i++) {
  $subject_data_student = "select * from ".$yearstream." where email = '$email'";
  $subject_data_student_result = mysqli_query($con, $subject_data_student);
  $subject_data_student_fetch = $subject_data_student_result->fetch_assoc();
  $subject_attendance[$i] = $subject_data_student_fetch[$subject_name[$i]];
}
$total_attendance = 0;
for ($i=1; $i <= $subject_count; $i++) {
  if ($subject_total_lectures[$i] == 0) {
    $subject_attendance_percent[$i] = 0;
  }
  else {
    $subject_attendance_percent[$i] = ($subject_attendance[$i]/$subject_total_lectures[$i])*100;
  }
  $total_attendance = $total_attendance+$subject_attendance_percent[$i];
}
$total_attendance_percent = $total_attendance/$subject_count;

$wave_per = round($total_attendance_percent);
$wave_rem = ((100-$wave_per) / 1.35);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link href="css/marko.css" rel='stylesheet' type='text/css'>
    <title>dashboard</title>
    <style media="screen">
      input:focus, textarea:focus, select:focus, button:focus{
        outline: none;
      }

      .circle::before{
        content: "";
        position: absolute;
        width: 92vw;
        height: 74vw;
        left: -50%;
        top: <?php echo $wave_rem; ?>vw;
        background-color: #8fe3d9;
        opacity: 0.3;
        animation-name: wave;
        animation-duration: 4s;
        animation-timing-function: ease-out;
        z-index: -1;
      }
      @keyframes wave {
        from{top: 74vw;}
        to{top: <?php echo $wave_rem; ?>vw;}
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

      function getForm(){
        var x = document.getElementById("form");
        if (window.getComputedStyle(x).display === "none") {
          document.getElementById("form").style.display = "";
        }
        else {
          document.getElementById("form").style.display = "none";
        }
      }
    </script>
    <div class="sub_menu" id="sub_menu" style="display: none">
      <button type="button" id="closeB" name="button" onclick="menuClose()">-</button>
      <div class="blank">
      </div>
      <a onclick="getForm()">Attend</a><br><br>
      <div class="form" id="form" style="display: none">
        <form id="action_form" method="post">
          <input type="number" name="pin" max="9999" min="1000" placeholder="Enter Pin"/ required><hr>
          <div class="btns">
            <button type="submit" id="button" formaction="attend.php">submit</button>
          </div>
        </form>
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
      <div class="roll">
        <?php echo $roll_no; ?>
      </div>
      <div class="attendance_view">
        <div class="circle">
          <?php echo $wave_per; ?>%
        </div>
        <?php
         for ($i=1; $i <= $subject_count; $i++) {
           echo "<div id='full'><div id='subject_name'><font>$subject_name[$i]</font></div>";
           echo "<span>$subject_attendance[$i]/$subject_total_lectures[$i]</span>";
           $label[$i] = round($subject_attendance[$i]/$subject_total_lectures[$i]*100);
           echo "<section> $label[$i]%</section></div>";
         }
         ?>
         <canvas id="canvas" width="100vw" height="10px"></canvas>
      </div>
    </div>
    <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
    </script>
  </body>
</html>
