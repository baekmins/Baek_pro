<?php
  $host = "localhost";
  $user = "root";
  $password = "123456";
  $DB_name = "test";

  $conn = mysql_connect($host, $user, $password);
  $sel = mysql_select_db($DB_name, $conn);

  if(!$conn) {
    echo "connect Failed" . mysql_error();
  }
  if (!$sel) {
    echo "select Failed" . mysql_error();
  }
?>
