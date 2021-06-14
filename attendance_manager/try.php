<?php
session_start();
require_once('database.php');
$sql = "SELECT roll_no FROM se_comps_student";
$stores_ip = Array();
if ($result = mysqli_query($con, $sql)) {
  while ($row = mysqli_fetch_row($result)) {
    $stores_ip[] = $row[0];
  }
  mysqli_free_result($result);
}
  $j = 0;
  $k = 2;
  $count_stores_ip = count($stores_ip);
  for ($i=1; $i < $count_stores_ip; $i++) {
    if ($stores_ip[$i] == $k) {
      $j = $j + 1;
    }
  }
  $check_ip = "select * from se_comps_student where roll_no='2' OR roll_no='3'";
  $result_ip = mysqli_query($con, $check_ip);
  $num_ip = mysqli_num_rows($result_ip);
  echo $num_ip;
 ?>
