<?php
session_start();
if(!isset($_SESSION['email'])){
  header('location:index.php');
}
$role = $_SESSION['role'];
if ($role !== "student") {
  header('location:index.php');
}
$pin = $_POST['pin'];
if(!isset($pin)){
  header('location:marko.php');
}
$temp_ip = $_SERVER['REMOTE_ADDR'];
$temp_date = date("d/m/y");
require_once('database.php');
$email = $_SESSION['email'];
$year = $_SESSION['year'];
$stream = $_SESSION['stream'];
$yearstream = $year."_".$stream."_student";
$yearstreamt = $year."_".$stream."_teacher";

$sql = "select * from ".$yearstreamt." where pin = '$pin'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);

if ($num == 1) {
  $fetch = $result->fetch_assoc();
  $subject_name = $fetch['subject'];

  $student_data = "select * from ".$yearstream." where email = '$email'";
  $student_data_result = mysqli_query($con, $student_data);
  $student_data_fetch = $student_data_result->fetch_assoc();
  $student_pin_before = $student_data_fetch['pin'];
  $student_temp_ip = $student_data_fetch['temp_ip'];
  $student_temp_date = $student_data_fetch['temp_date'];

  if ($student_temp_date == $temp_date) {
    if ($student_temp_ip == $temp_ip) {
      if ($student_pin_before == $pin) {
        $_SESSION['message'] = 'attendance_already_marked';
        header('location:alert.php');
      }
      else {
        $student_attendace_update = "update ".$yearstream." set `". $subject_name ."`=`". $subject_name ."`+1 where email = '$email'";
        mysqli_query($con, $student_attendace_update);
        $student_pin_update = "update ".$yearstream." set pin = '$pin' where email = '$email'";
        mysqli_query($con, $student_pin_update);
        $_SESSION['message'] = 'attendance_success';
        header('location:alert.php');
      }
    }
    else {
      $_SESSION['message'] = 'use_same_device';
      header('location:alert.php');
    }
  }
  else {
    $check_ip = "select * from ".$yearstream." where temp_ip='$temp_ip' AND temp_date='$temp_date'";
    $result_ip = mysqli_query($con, $check_ip);
    $num_ip = mysqli_num_rows($result_ip);

    if ($num_ip == 1) {
      $_SESSION['message'] = 'use_same_device';
      header('location:alert.php');
    }
    else {
      $update_date_ip = "update ".$yearstream." set temp_date='$temp_date', temp_ip='$temp_ip' where email = '$email'";
      mysqli_query($con, $update_date_ip);

      if ($student_pin_before == $pin) {
        $_SESSION['message'] = 'attendance_already_marked';
        header('location:alert.php');
      }
      else {
        $student_attendace_update = "update ".$yearstream." set `". $subject_name ."`=`". $subject_name ."`+1 where email = '$email'";
        mysqli_query($con, $student_attendace_update);
        $student_pin_update = "update ".$yearstream." set pin = '$pin' where email = '$email'";
        mysqli_query($con, $student_pin_update);
        $_SESSION['message'] = 'attendance_success';
        header('location:alert.php');
      }
    }
  }
}
else {
  $_SESSION['message'] = 'wrong_pin';
  header('location:alert.php');
}
 ?>
