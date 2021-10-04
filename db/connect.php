<?php
$con = mysqli_connect("mysql5031.site4now.net","a7a78a_longrua","spsonglinhtk123","db_a7a78a_longrua");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
mysqli_set_charset($con,"utf8");
?>