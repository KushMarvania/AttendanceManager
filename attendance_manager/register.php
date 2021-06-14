<?php
require_once('database.php');
$email = $_POST['email'];
$username = $_POST['username'];
$roll_no = $_POST['roll_no'];
$pass = $_POST['pass'];
$confirmpass = $_POST['confirmpass'];
$hashed_pass = password_hash($pass, PASSWORD_BCRYPT, array('cost => 12'));
$year = $_POST['year'];
$stream = $_POST['stream'];
$yearstream = $year."_".$stream."_student";

$sql = "select * from valid_email where email = '$email'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);

if ($num == 1) {
  $fetch = $result->fetch_assoc();
  $status = $fetch["status"];
  if ($status=="not_registered") {
    if ($pass==$confirmpass) {
      $reg_class_email = "insert into ".$yearstream." (email, roll_no) values('$email', '$roll_no')";
      mysqli_query($con, $reg_class_email);
      $reg_user = "insert into user (email, username, pass, year, stream, roll_no) values('$email', '$username', '$hashed_pass', '$year', '$stream', '$roll_no')";
      mysqli_query($con, $reg_user);
      $update_status = "update valid_email set status = 'registered' where email = '$email'";
      mysqli_query($con, $update_status);
      header('location:reg_done.php');
    }
    else {
      header('location:pnm.php');
    }
  }
  else {
    header('location:elr.php');
  }
}
else {
  header('location:env.php');
}
 ?>
