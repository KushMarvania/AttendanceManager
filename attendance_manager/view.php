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
$year = $_POST['year'];
$stream = $_POST['stream'];
$yearstream = $year."_".$stream."_student";
$yearstreamt = $year."_".$stream."_teacher";

$sql = "select * from ".$yearstream."";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);

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

for ($i=1; $i <= $num ; $i++) {
  $student_data = "select * from ".$yearstream." where roll_no='$i'";
  $student_data_result = mysqli_query($con, $student_data);
  $student_data_fetch = mysqli_fetch_assoc($student_data_result);
  $student_data_email[$i] = $student_data_fetch['email'];
  $student_data_roll_no[$i] = $student_data_fetch['roll_no'];
  $student_data_total_attendance[$i] = 0;
  for ($x=1; $x <= $subject_count ; $x++) {
    $student_data_subject_attendace[$i][$x] = $student_data_fetch[$subject_name[$x]];
    if ($subject_total_lectures[$x] == 0) {
      $student_data_subject_attendace_percent[$i][$x] == 0;
    }
    else {
      $student_data_subject_attendace_percent[$i][$x] = round($student_data_subject_attendace[$i][$x]/$subject_total_lectures[$x]*100);
    }
    $student_data_total_attendance[$i] = $student_data_total_attendance[$i]+$student_data_subject_attendace_percent[$i][$x];
  }
  $student_data_total_attendance_percent[$i] = round($student_data_total_attendance[$i]/$subject_count);
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link href="css/view.css" rel='stylesheet' type='text/css'>
    <title>overview</title>
    <style media="screen">
      input:focus, textarea:focus, select:focus, button:focus{
        outline: none;
      }
    </style>
  </head>
  <body>
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
        username
      </div>
    </div>
    <div class="indicators">
      <font style='font-weight:bold'>Note:</font><br>
      <canvas style='background-color: white; border: 1px solid black;'></canvas> Indicates 75% and above attendance<br>
      <canvas style='background-color: #add8e6;'></canvas> Indicates 50% to 74% attendance<br>
      <canvas style='background-color: black;'></canvas> Indicates less than 50% attendance<br>
    </div>
    <div class="table" id="myDIV">
    <table cellspacing='0' cellpadding='5' >
      <?php
      echo "<tr>";
      echo "<th>No.</th>";
      echo "<th>email</th>";
      for ($i=1; $i <= $subject_count ; $i++) {
        echo "<th colspan='3'>$subject_name[$i]</th>";
      }
      echo "<th colspan='2'>total</th>";
      echo "</tr>";
      for ($i=1; $i <= $num; $i++) {
        echo "<tr>";
        echo "<td>$student_data_roll_no[$i]</td>";
        echo "<td>$student_data_email[$i]</td>";
        for ($x=1; $x <= $subject_count ; $x++) {
          echo "<td>".$student_data_subject_attendace[$i][$x]."/$subject_total_lectures[$x]</td>";
          if ($student_data_subject_attendace_percent[$i][$x] > 74)  {
            echo "<td><canvas style='background-color: white; border: 1px solid black;'></td>";
          }
          elseif ($student_data_subject_attendace_percent[$i][$x] > 49)  {
            echo "<td><canvas style='background-color: #add8e6;'></td>";
          }
          else {
            echo "<td><canvas style='background-color: black;'></td>";
          }
          echo "<td>".$student_data_subject_attendace_percent[$i][$x]."%</td>";
        }
        if ($student_data_total_attendance_percent[$i] > 74)  {
          echo "<td><canvas style='background-color: white; border: 1px solid black;'></td>";
        }
        elseif ($student_data_total_attendance_percent[$i] > 49)  {
          echo "<td><canvas style='background-color: #add8e6;'></td>";
        }
        else {
          echo "<td><canvas style='background-color: black;'></td>";
        }
        echo "<td>$student_data_total_attendance_percent[$i]%</td>";
        echo "</tr>";
      }
       ?>
    </table>
  </div>
  </body>
</html>
