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
$yearstreamt = $_SESSION['yearstreamt'];
$email = $_SESSION['email'];
$update_pin = "update ".$yearstreamt." set pin = '0' where email = '$email'";
mysqli_query($con, $update_pin);
header('location:over.php');
 ?>
