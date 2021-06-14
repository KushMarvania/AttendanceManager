<?php
session_start();
require_once('database.php');
$email = $_POST['email'];
$pass = $_POST['pass'];
$sql = "select * from user where email = '$email'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);

if ($num == 1) {
  $fetch = $result->fetch_assoc();
  $hashed_pass = $fetch["pass"];
  if (password_verify($pass, $hashed_pass)) {
    $role = $fetch["role"];
    if ($role=='student') {
      $year = $fetch["year"];
      $stream = $fetch["stream"];
      $_SESSION['role'] = $role;
      $_SESSION['email'] = $email;
      $_SESSION['year'] = $year;
      $_SESSION['stream'] = $stream;
      header('location:marko.php');
    }
    else if ($role=='teacher') {
      $username = $fetch["username"];
      $_SESSION['role'] = $role;
      $_SESSION['email'] = $email;
      $_SESSION['username'] = $username;
      header('location:over.php');
    }
    else {
      echo "something went wrong hit back";
    }
  }
  else {
    header('location:pnm.php');
  }
}
else {
  header('location:enr.php');
}
 ?>
